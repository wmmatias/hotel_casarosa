<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends CI_Controller {

    public function reserve_proccess() 
    {   
        $number = $this->input->post('room_number');
        $form_data = $this->input->post();
        $in = date('Ymd', strtotime($this->input->post('check_in')));
        $out = date('Ymd', strtotime($this->input->post('check_out')));
        if($in > $out){
            $this->session->set_flashdata('error', '<strong>Checking availability failed!</strong> You should check in on some of those fields below.');
            $this->session->set_flashdata('check_in', 'Check In date is advance in check out');
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
        $this->reservation->arrived($id);
        $no_guest = $this->reservation->no_guest_id($id);
        $this->reservation->add_inventory($no_guest);
        $this->session->set_flashdata('arrived', 'The guest arrived!');
        redirect('dashboard/reservation');
    }
}