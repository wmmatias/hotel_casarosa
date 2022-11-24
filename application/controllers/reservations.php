<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends CI_Controller {

    public function index_html(){
        $this->load->view('partials/room_list');
    }

    public function admin_get_available_room(){
        $form_data = $this->input->post();
        $check = $this->reservation->admin_check_validity();
        if(empty($form_data['check_in']) || empty($form_data['check_out'])){
            $this->session->set_flashdata('error', 'Please select date range');
            $this->load->view("partials/room_list");
        }
        else{
            $in = date('Ymd', strtotime($this->input->post('check_in')));
            $out = date('Ymd', strtotime($this->input->post('check_out')));
            if($in > $out){
                $this->session->set_flashdata('error', 'checkin is advance to check out');
                $this->load->view("partials/room_list");
            }
            else{
                if($check !== 'success'){
                    $this->session->set_flashdata('input_errors', $check);
                    $this->load->view("partials/room_list");
                }
                else{
                    $res = $this->reservation->admin_get_available_room($form_data);
                    $dates = array(
                        'check_in'  => $form_data['check_in'],
                        'check_out'     => $form_data['check_out']
                    );
                
                    $this->session->set_userdata($dates);
                    $data = array('list'=>$res); 
                    $this->load->view("partials/room_list", $data);
                }
            }
        }
    }

    public function reserve_proccess() 
    {   
        $number = $this->input->post('room_number');
        $form_data = $this->input->post();
        $in = date('Ymd', strtotime($this->input->post('check_in')));
        $out = date('Ymd', strtotime($this->input->post('check_out')));
        $today = date('Ymd');
        if($in > $out){
            $this->session->set_flashdata('error', '<strong>Checking availability failed!</strong> You should check in on some of those fields below.');
            $this->session->set_flashdata('check_in', 'Check In date is advance in check out');
            $this->load->view('client/templates/header');
            $this->load->view('client/index');
            $this->load->view('client/templates/footer');
        }
        else if($in < $today){
            $this->session->set_flashdata('error', '<strong>Checking availability failed!</strong> You should check in on some of those fields below.');
            $this->session->set_flashdata('check_in', 'Past date booking is no allowed');
            $this->load->view('client/templates/header');
            $this->load->view('client/index');
            $this->load->view('client/templates/footer');
        }
        else if($this->input->post('type') === '0'){
            $this->session->set_flashdata('error', '<strong>Checking availability failed!</strong> You should check in on some of those fields below.');
            $this->session->set_flashdata('room_type', 'Please select Room Type');
            $this->load->view('client/templates/header');
            $this->load->view('client/index');
            $this->load->view('client/templates/footer');
        }
        else{
            $result = $this->reservation->validate_availability();
            if($result!= 'success')
            {
                $this->session->set_flashdata('error', '<strong>Checking availability failed!</strong> You should check in on some of those fields below.');
                $this->session->set_flashdata('rooms_error', $result);
                $this->load->view('client/templates/header');
                $this->load->view('client/index');
                $this->load->view('client/templates/footer');
            }
            else{
                $book_details = array(
                    'checkin'  => $form_data['check_in'],
                    'checkout'  => $form_data['check_out'],
                    'adult' => $form_data['adult'],
                    'children' => $form_data['children'],
                    'roomtype' => $form_data['type']
                );
                
                $this->session->set_userdata($book_details);
                $res = $this->reservation->get_availabe($form_data);
                $data = array('available'=>$res);
                $this->load->view('client/templates/header');
                $this->load->view('client/room', $data);
                $this->load->view('client/templates/footer');
            }
        }
    }

    public function process_booking(){
        $form_data = $this->input->post();
        $res = $this->reservation->validate();
        if($res !== 'success'){
            $this->session->set_flashdata('error', '<strong>Successfully Reserve!</strong> Please verify your email.');
            $this->session->set_flashdata('input_errors', $res);
            $this->load->view("partials/personal");
        }
        else{
            $check = $this->reservation->check_double_reservation($form_data);
            if(empty($check)){
                $this->session->set_flashdata('success', '<strong>Successfully Reserve!</strong> Please verify your email.');
                $this->reservation->create_reservation($form_data);
                $this->load->view("partials/personal");
            }
            else{
                $this->session->set_flashdata('warning', '<strong>You already reserve!</strong> Please verify your email.');
                $this->load->view("partials/personal");
            }
        }
    }

    public function create_reservation(){
        
        $this->load->view('client/index');
    }

    public function room_show($id)
    {
        $espicific_room = $this->reservation->get_room_details_by_id($id);
        header('Content-Type: application/json');
        echo json_encode($espicific_room);
    }

    public function verify($vkey) 
    {   
        $this->reservation->verify($vkey);
        $this->session->set_flashdata('email', 'your email has been verified wait for our call or text one day before your arrival!');
        redirect('/');
    }

    public function arrived($id){
        $form_data = $this->input->post();
        $this->reservation->arrived($id);
        $no_guest = $this->reservation->no_guest_id($id);
        $this->reservation->add_inventory($no_guest);
        $this->reservation->add_sales($form_data);
        $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' check in the guest '.$id.'');
        $this->user->log($this->session->userdata('user_id'));
        $this->session->set_flashdata('arrived', 'The guest arrived!');
        redirect('dashboard/reservation');
    }

    public function update_checkin(){
        $form_data = $this->input->post();
        $id = $form_data['edit_checkin'];
        if($form_data['pwd'] < $form_data['pwd1'] || $form_data['senior'] <  $form_data['senior1'] || $form_data['adult'] < $form_data['adult1'] || $form_data['children'] <  $form_data['children1'] || $form_data['bed'] < $form_data['bed1'] || $form_data['person'] <  $form_data['person1'] || $form_data['bfast'] < $form_data['bfast1'] || $form_data['hour'] <  $form_data['hour1']){
            $this->session->set_flashdata('error', '<p class="text-danger">Please input value not lower than original data</p>');
            $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to modified check In details due to lower value than the original data '.$id.'');
            $this->user->log($this->session->userdata('user_id'));
            $this->edit_in($id);
        }
        else{
            $this->reservation->update_details($form_data);
            $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' checkin details success '.$id.'');
            $this->user->log($this->session->userdata('user_id'));
            $this->session->set_flashdata('arrived', 'Check In details successfully update');
            redirect('dashboard/reservation');
        }
    }

    public function check_out($id){
        $this->reservation->check_out($id);
        $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' check out the guest '.$id.'');
        $this->user->log($this->session->userdata('user_id'));
        $this->session->set_flashdata('check_out', 'The guest check out!');
        redirect('dashboard/reservation');
    }

    public function edit_in($id){
        $arrived = $this->reservation->edit_checkin($id);
        $data = array('arrived'=>$arrived);
        $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' check out the guest '.$id.'');
        $this->user->log($this->session->userdata('user_id'));
        $this->session->set_userdata(array('page'=> 'reservation'));
        $this->load->view('templates/header');
        $this->load->view('admin/reservation_update', $data);
        $this->load->view('templates/footer');
    }
    
    public function check_availability(){
        $this->session->set_userdata(array('page'=> 'reservation'));
            $this->load->view('templates/header');
            $this->load->view('admin/reservation_availability');
            $this->load->view('templates/footer');
    }

    public function arrived_views($id){ 
        $arrived = $this->reservation->get_arrived_id($id);
        $data = array('arrived'=>$arrived);
        $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' attempt to check in the guest '.$id.'');
        $this->user->log($this->session->userdata('user_id'));
        $this->session->set_userdata(array('page'=> 'reservation'));
        $this->load->view('templates/header');
        $this->load->view('admin/reservation_edit', $data);
        $this->load->view('templates/footer');
    }

    public function admin_booked($id){
        $res = $this->reservation->get_room_details_by_id($id);
        $data = array('details'=>$res);
        $this->session->set_userdata(array('page'=> 'reservation'));
        $this->load->view('templates/header');
        $this->load->view('admin/reservation_admin', $data);
        $this->load->view('templates/footer');
    }


    public function admin_validate(){
        $form_data = $this->input->post();
        $res = $this->reservation->admin_validate();
        if($res !== 'success'){
            $this->session->set_flashdata('error', '<strong>Something went wrong!</strong> Please input required data.');
            $this->session->set_flashdata('input_errors', $res);
            $res = $this->reservation->get_room_details_by_id($form_data['room_id']);
            $data = array('details'=>$res);
            $this->session->set_userdata(array('page'=> 'reservation'));
            $this->load->view('templates/header');
            $this->load->view('admin/reservation_admin', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->reservation->reservation_admin_create($form_data);
            $this->session->set_flashdata('arrived', '<strong>Successfully Created!</strong>');
            redirect("dashboard/reservation");
        }
    }
}