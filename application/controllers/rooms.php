<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {
    
    public function adding_rooms_proccess() 
    {   
        $number = $this->input->post('room_number');
        $form_data = $this->input->post();
        if($this->input->post('room_type') === '0'){
            $this->session->set_flashdata('room_type', 'Please select Room Type');
            $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to add room '.$form_data['room_number'].'');
            $this->user->log($this->session->userdata('user_id'));
                redirect('/dashboard/rooms');
        }
        else{
            $result = $this->room->validate_creation();
            if($result!= 'success')
            {
                $this->session->set_flashdata('rooms_error', $result);
                $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to add room '.$form_data['room_number'].'');
                $this->user->log($this->session->userdata('user_id'));
                $res = $this->room->get_rooms();
                $data = array('datas'=>$res);
                $this->session->set_userdata(array('page'=> 'rooms'));
                $this->load->view('templates/header');
                $this->load->view('admin/rooms',$data);
                $this->load->view('templates/footer');
            }
            else
            {
                $check_number = $this->room->get_room_number($number);
                if(!$check_number){
                    $this->room->create_room($form_data);
                    $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully add room '.$form_data['room_number'].'');
                    $this->user->log($this->session->userdata('user_id'));
                    $this->session->set_flashdata('success', 'Successfully Created!');
                    redirect('/dashboard/rooms');
                }
                else{
                    $this->session->set_flashdata('error', 'Room Number already Use!');
                    redirect('/dashboard/rooms');
                }
                
            }
        }
    }

    public function validate_edit(){
        $form_data = $this->input->post();
        if($this->input->post('room_type') === '0'){
            $this->session->set_flashdata('room_type', 'Please select Room Type');
            $res = $this->room->get_rooms();
            $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to modified the room details of room '.$form_data['room_number'].'');
            $this->user->log($this->session->userdata('user_id'));
            $details = $this->room->get_details($form_data['id']);
            $data = array('datas'=>$res, 'details'=>$details);
            $this->session->set_userdata(array('page'=> 'rooms'));
            $this->load->view('templates/header');
            $this->load->view('admin/rooms_edit', $data);
            $this->load->view('templates/footer');
        }
        else{
            $result = $this->room->validate_creation();
            if($result!= 'success')
            {
                $this->session->set_flashdata('rooms_error', $result);
                $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to modified the room details of room '.$form_data['room_number'].'');
                $this->user->log($this->session->userdata('user_id'));
                $res = $this->room->get_rooms();
                $details = $this->room->get_details($form_data['id']);
                $data = array('datas'=>$res, 'details'=>$details);
                $this->session->set_userdata(array('page'=> 'rooms'));
                $this->load->view('templates/header');
                $this->load->view('admin/rooms_edit', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $check_number = $this->room->get_room_number_not_id($form_data);
                if(empty($check_number)){
                    $this->room->update_room($form_data);
                    $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully modified the room details of room '.$form_data['room_number'].'');
                    $this->user->log($this->session->userdata('user_id'));
                    $this->session->set_flashdata('success', 'Successfully Update!');
                    redirect('/dashboard/rooms');
                }
                else{
                    $this->session->set_flashdata('error', 'Room Number already Use!');
                    $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to modified the room details of room '.$form_data['room_number'].'');
                    $this->user->log($this->session->userdata('user_id'));
                    redirect('/dashboard/rooms');
                }
                
            }
        }
    }

    public function delete_rooms($id) 
    {
        $this->room->delete_room($id);
        $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully delete the room with id '.$id.'');
        $this->user->log($this->session->userdata('user_id'));
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect('/dashboard/rooms');
    }
}