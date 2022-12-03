<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Model {

    public function get_rooms()
    { 
        $query = "SELECT * FROM rooms";
        return $this->db->query($query)->result_array();
    }

    public function get_room_number($number)
    { 
        $query = "SELECT * FROM rooms WHERE room_number=?";
        return $this->db->query($query, $this->security->xss_clean($number))->result_array();
    }

    public function get_room_number_not_id($form_data){
        $query = "SELECT * FROM rooms WHERE room_number=? AND id !=?";
        $values = array(
            $this->security->xss_clean($form_data['room_number']),
            $this->security->xss_clean($form_data['id'])
        );
        return $this->db->query($query, $values)->result_array()[0];
    }

    public function get_details($id){
        $query = "SELECT * FROM rooms WHERE id = ?";
        $values = array(
            $this->security->xss_clean($id)
        );
        return $this->db->query($query, $values)->result_array()[0];
    }

    public function delete_room($id)
    { 
        return $this->db->query("DELETE FROM rooms WHERE id = ?", 
        array(
            $this->security->xss_clean($id)));
    }

    public function validate_creation() {
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        $this->form_validation->set_rules('room_number', 'Room Number', 'required');
        $this->form_validation->set_rules('room_name', 'Room Name', 'required');
        $this->form_validation->set_rules('room_type', 'Room Type', 'required');
        $this->form_validation->set_rules('room_rate', 'Room Rate', 'required|decimal');
    
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else{
            return 'success';
        }
    }

    public function create_room($form_data)
    {
        $query = "INSERT INTO rooms (room_number, name, room_type, room_rate, user_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($form_data['room_number']), 
            $this->security->xss_clean($form_data['room_name']), 
            $this->security->xss_clean($form_data['room_type']),
            $this->security->xss_clean($form_data['room_rate']),
            $this->security->xss_clean($this->session->userdata('user_id')),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))); 
        
        return $this->db->query($query, $values);
    }

    public function update_room($form_data){
        return $this->db->query("UPDATE rooms SET room_number = ?, name = ?, room_type = ?, room_rate = ?, updated_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($form_data['room_number']), 
            $this->security->xss_clean($form_data['room_name']),
            $this->security->xss_clean($form_data['room_type']), 
            $this->security->xss_clean($form_data['room_rate']), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($form_data['id'])));
    }

}