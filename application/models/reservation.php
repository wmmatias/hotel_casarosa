<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Model {

    public function get_reservation(){
        return $this->db->query("SELECT * FROM reservations WHERE room_id = ? AND first_name = ? AND check_in =? AND check_out = ?")->result_array();
    }

    public function get_arrived(){
        date_default_timezone_set('Asia/Manila');
        $date = $date = date('Y-m-d');
        $status = '2';
        $query = ("SELECT count(*) as total_arrived
        FROM fmitr_casarosa.reservations
        WHERE status = ? AND check_in = ?");
        $values = array(
            $this->security->xss_clean($status),
            $this->security->xss_clean($date)
        );
        return $this->db->query($query, $values)->result_array()[0];
    }

    public function get_no_guest(){
        date_default_timezone_set('Asia/Manila');
        $date = $date = date('Y-m-d');
        $status = '2';
        $query = ("SELECT sum(adult + children + x_person) as total_guest
        FROM fmitr_casarosa.reservations
        WHERE status = ? AND check_in = ?");
        $values = array(
            $this->security->xss_clean($status),
            $this->security->xss_clean($date)
        );
        return $this->db->query($query, $values)->result_array()[0];
    }

    public function get_number_rooms(){
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $query = ("SELECT count(*) as total_room
        FROM fmitr_casarosa.rooms 
        WHERE id NOT IN 
        (SELECT room_id 
        FROM fmitr_casarosa.reservations
        WHERE (check_in <= ? AND check_out >= ? AND status != '3')
		OR (check_in < ? AND check_out >= ? AND status != '3')
		OR (check_in <= ? AND check_out >= ? AND status != '3'))
        ORDER BY room_number ASC");
        $values = array(
            $this->security->xss_clean($date),
            $this->security->xss_clean($date),
            $this->security->xss_clean($date),
            $this->security->xss_clean($date),
            $this->security->xss_clean($date),
            $this->security->xss_clean($date)
        );
        return $this->db->query($query, $values)->result_array()[0];
    }

    public function get_confirmed_reserved(){
        date_default_timezone_set('Asia/Manila');
        $date = $date = date('Y-m-d');
        $status = '1';
        $query = ("SELECT count(*) as total_booked
        FROM fmitr_casarosa.reservations
        WHERE status = ? AND check_in = ?");
        $values = array(
            $this->security->xss_clean($status),
            $this->security->xss_clean($date)
        );
        return $this->db->query($query, $values)->result_array()[0];
    }
    
    public function get_upcoming_guest(){
        $status = '1';
        $query = ("SELECT reservations.first_name, reservations.last_name, reservations.phone, rooms.room_number, reservations.check_in, reservations.check_out
        FROM fmitr_casarosa.reservations
        LEFT JOIN fmitr_casarosa.rooms
        ON reservations.room_id = rooms.id
        WHERE status = ? AND DATE(`check_in`) = DATE(NOW() + INTERVAL 1 DAY)");
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    public function get_current_guest(){
        $status = '2';
        $query = ("SELECT reservations.first_name, reservations.last_name, reservations.phone, rooms.room_number, reservations.check_in, reservations.check_out,
        sum(reservations.adult + reservations.children + reservations.x_person) as no_guest
        FROM fmitr_casarosa.reservations
        LEFT JOIN fmitr_casarosa.rooms
        ON reservations.room_id = rooms.id
        WHERE status = ? AND DATE(`check_in`) = DATE(NOW())");
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    public function get_available_room(){
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $query = ("SELECT * 
        FROM fmitr_casarosa.rooms 
        WHERE id NOT IN 
        (SELECT room_id 
        FROM fmitr_casarosa.reservations
        WHERE (check_in <= ? AND check_out >= ? AND status != '3')
		OR (check_in < ? AND check_out >= ? AND status != '3')
		OR (check_in <= ? AND check_out >= ? AND status != '3'))
        ORDER BY room_number ASC");
        $values = array(
            $this->security->xss_clean($date),
            $this->security->xss_clean($date),
            $this->security->xss_clean($date),
            $this->security->xss_clean($date),
            $this->security->xss_clean($date),
            $this->security->xss_clean($date)
        );
        return $this->db->query($query, $values)->result_array();
    }

    public function get_unverified_reservation(){
        $status = '0';
        $query = "SELECT reservations.id, reservations.first_name, reservations.last_name, reservations.phone, rooms.room_number, rooms.room_type, reservations.adult, reservations.children, reservations.x_bed, reservations.x_person, reservations.x_bfast, reservations.x_hour, reservations.check_in, reservations.check_out, reservations.status
        FROM fmitr_casarosa.reservations
        LEFT JOIN fmitr_casarosa.rooms
        ON reservations.room_id = rooms.id
        WHERE reservations.status = ?
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    
    public function get_verified_reservation(){
        $status = '1';
        $query = "SELECT reservations.id, reservations.first_name, reservations.last_name, reservations.phone, rooms.room_number, rooms.room_type, reservations.adult, reservations.children, reservations.x_bed, reservations.x_person, reservations.x_bfast, reservations.x_hour, reservations.check_in, reservations.check_out, reservations.status
        FROM fmitr_casarosa.reservations
        LEFT JOIN fmitr_casarosa.rooms
        ON reservations.room_id = rooms.id
        WHERE reservations.status = ?
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    
    public function get_arrived_reservation(){
        $status = '2';
        $query = "SELECT reservations.id, reservations.first_name, reservations.last_name, reservations.phone, rooms.room_number, rooms.room_type, reservations.adult, reservations.children, reservations.x_bed, reservations.x_person, reservations.x_bfast, reservations.x_hour, reservations.check_in, reservations.check_out, reservations.status
        FROM fmitr_casarosa.reservations
        LEFT JOIN fmitr_casarosa.rooms
        ON reservations.room_id = rooms.id
        WHERE reservations.status = ?
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    public function get_availabe($form_data){
        return $this->db->query("SELECT * 
        FROM fmitr_casarosa.rooms 
        WHERE room_type = ? AND id NOT IN 
        (SELECT room_id 
        FROM fmitr_casarosa.reservations
        WHERE  (check_in <= ? AND check_out >= ? AND status != '3')
		    OR (check_in < ? AND check_out >= ? AND status != '3')
		    OR (check_in <= ? AND check_out >= ? AND status != '3'))",
        array(
            $this->security->xss_clean($form_data['type']),
            $this->security->xss_clean($form_data['check_in']),
            $this->security->xss_clean($form_data['check_in']),
            $this->security->xss_clean($form_data['check_out']),
            $this->security->xss_clean($form_data['check_out']),
            $this->security->xss_clean($form_data['check_in']),
            $this->security->xss_clean($form_data['check_in']),
        ))->result_array();
           
    }
    
    public function validate_availability() {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('check_in', 'Check In', 'required');
        $this->form_validation->set_rules('check_out', 'Check Out', 'required');
        $this->form_validation->set_rules('adult', 'Adult', 'required|greater_than_equal_to[1]');
        $this->form_validation->set_rules('children', 'Children', 'required|greater_than_equal_to[0]');
        $this->form_validation->set_rules('type', 'Room Type', 'required');
    
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else{
            return 'success';
        }
    }

    public function get_room_details_by_id($id)
    {
        $query = "SELECT * FROM rooms WHERE id=?";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    }

    public function validate(){
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        $this->form_validation->set_rules('bed', 'Extra bed', 'required');
        $this->form_validation->set_rules('person', 'Extra person', 'required');
        $this->form_validation->set_rules('breakfast', 'Extra breakfast', 'required');
        $this->form_validation->set_rules('hour', 'Extra hour', 'required');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'phone', 'required|numeric');
    
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else {
            return "success";
        }
    }

    public function check_double_reservation($form_data){
        $query = "SELECT * FROM reservations WHERE room_id = ? AND first_name = ? AND check_in =? AND check_out = ?";
        $values = array(
            $this->security->xss_clean($form_data['id']), 
            $this->security->xss_clean($form_data['firstname']), 
            $this->security->xss_clean($form_data['check_in']), 
            $this->security->xss_clean($form_data['check_out']), 
        );
        return $this->db->query($query, $values)->result_array();
    }

    public function create_reservation($form_data){
        
        $vkey = md5(time().$form_data['firstname']);
        $query = "INSERT INTO reservations (room_id, first_name, last_name, phone, email, adult, children, x_bed, x_person, x_bfast, x_hour, check_in, check_out, vkey, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($form_data['id']), 
            $this->security->xss_clean($form_data['firstname']), 
            $this->security->xss_clean($form_data['lastname']), 
            $this->security->xss_clean($form_data['phone']), 
            $this->security->xss_clean($form_data['email']), 
            $this->security->xss_clean($form_data['adult']), 
            $this->security->xss_clean($form_data['children']), 
            $this->security->xss_clean($form_data['bed']), 
            $this->security->xss_clean($form_data['person']), 
            $this->security->xss_clean($form_data['breakfast']), 
            $this->security->xss_clean($form_data['hour']), 
            $this->security->xss_clean($form_data['check_in']), 
            $this->security->xss_clean($form_data['check_out']), 
            $this->security->xss_clean($vkey), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))
        ); 
        $this->email->reservation_email($form_data, $vkey);
        $array_items = array('checkin', 'checkout', 'adult', 'children','roomtype');
        $this->session->unset_userdata($array_items);
        return $this->db->query($query, $values);
    }

    public function verify($vkey) 
    {
        $status = '1';
        return $this->db->query("UPDATE reservations SET status = ?, updated_at = ? WHERE vkey = ?", 
        array(
            $this->security->xss_clean($status), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($vkey),
            
        ));
    }

    public function arrived($id){
        $status = '2';
        return $this->db->query("UPDATE reservations SET status = ?, updated_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($status), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($id)));
    }

    public function no_guest_id($id){
        $query = ("SELECT id, sum(adult + children + x_person) as total_guest
        FROM fmitr_casarosa.reservations
        WHERE id = ?");
        $values = array(
            $this->security->xss_clean($id)
        );
        return $this->db->query($query, $values)->result_array()[0];
    }

    public function add_inventory($no_guest){
        $name = 'Hygene Kit';
        $query = "INSERT INTO inventory (reservation_id, name, qty, created_at, updated_at) VALUES (?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($no_guest['id']), 
            $this->security->xss_clean($name), 
            $this->security->xss_clean($no_guest['total_guest']), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))
        ); 
        return $this->db->query($query, $values);
    }

    public function get_inventory(){
        return $this->db->query("SELECT reservations.id, rooms.room_number, inventory.name, inventory.qty, inventory.created_at 
        FROM fmitr_casarosa.inventory
        LEFT JOIN fmitr_casarosa.reservations
        ON inventory.reservation_id = reservations.id
        LEFT JOIN fmitr_casarosa.rooms
        ON rooms.id = reservations.room_id")->result_array();
    }
}