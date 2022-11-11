<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {
    
    public function adding_rooms_proccess() 
    {   
        $number = $this->input->post('room_number');
        $form_data = $this->input->post();
        if($this->input->post('room_type') === '0'){
            $this->session->set_flashdata('room_type', 'Please select Room Type');
                redirect('/dashboard/rooms');
        }
        else{
            $result = $this->room->validate_creation();
            if($result!= 'success')
            {
                $this->session->set_flashdata('rooms_error', $result);
                $this->session->set_userdata(array('page'=> 'rooms'));
                $this->load->view('templates/header');
                $this->load->view('admin/rooms');
                $this->load->view('templates/footer');
            }
            else
            {
                $check_number = $this->room->get_room_number($number);
                if(!$check_number){
                    $this->room->create_room($form_data);
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

    public function delete_rooms($id) 
    {
        $this->room->delete_room($id);
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect('/dashboard/rooms');
    }
}