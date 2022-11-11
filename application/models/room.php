<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Model {

    function get_rooms()
    { 
        $query = "SELECT * FROM rooms";
        return $this->db->query($query)->result_array();
    }

    function get_room_number($number)
    { 
        $query = "SELECT * FROM rooms WHERE room_number=?";
        return $this->db->query($query, $this->security->xss_clean($number))->result_array();
    }

    function delete_room($id)
    { 
        return $this->db->query("DELETE FROM rooms WHERE id = ?", 
        array(
            $this->security->xss_clean($id)));
    }

    function validate_creation() {
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        $this->form_validation->set_rules('room_number', 'Room Number', 'required|numeric');
        $this->form_validation->set_rules('room_name', 'Room Name', 'required');
        $this->form_validation->set_rules('room_type', 'Room Type', 'required');
    
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else{
            return 'success';
        }
    }

    function create_room($form_data)
    {
        $query = "INSERT INTO rooms (room_number, name, room_type, user_id, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($form_data['room_number']), 
            $this->security->xss_clean($form_data['room_name']), 
            $this->security->xss_clean($form_data['room_type']),
            $this->security->xss_clean($this->session->userdata('user_id')),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))); 
        
        return $this->db->query($query, $values);
    }

}