<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class User extends CI_Model {

    function get_users()
    { 
        $query = "SELECT * FROM users ";
        return $this->db->query($query)->result_array();
    }

    function delete_user($id)
    { 
        return $this->db->query("DELETE FROM users WHERE id = ?", 
        array(
            $this->security->xss_clean($id)));
    }

    function block_user($id)
    {
        $status = '1';
        return $this->db->query("UPDATE users SET status = ?, updated_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($status), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($id)));
    }

    
    function unblock_user($id)
    {
        $status = '0';
        return $this->db->query("UPDATE users SET status = ?, updated_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($status), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($id)));
    }

    function get_user_by_email($email)
    { 
        $query = "SELECT * FROM users WHERE email=? and user_level != '3'";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
    }

    function get_user_details($id)
    { 
        $query = "SELECT * FROM users WHERE id=?";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array()[0];
    }

    function create_user($user)
    {
        $password = 'Casarosa@2022';
        $query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($user['firstname']), 
            $this->security->xss_clean($user['lastname']), 
            $this->security->xss_clean($user['email']), 
            md5($this->security->xss_clean($password)),
            $this->security->xss_clean($user['userlevel']), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))); 
        
        return $this->db->query($query, $values);
    }

    function validate_signin_form() {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else {
            return "success";
        }
    }
    
    function validate_signin_match($user, $password) 
    {
        $hash_password = md5($this->security->xss_clean($password));

        if($user && $user['password'] == $hash_password) {
            return "success";
        }
        else {
            return "Incorrect email/password.";
        }
    }
    function validate_is_admin($email) 
    {
        $query = "SELECT user_level FROM users WHERE email=? and user_level = 0";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
    }

    function validate_creation() 
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');   
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
        $this->form_validation->set_rules('userlevel', 'User Level', 'required');        
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else{
            return "success";
        }
    }

    function get_user_id($id)
    {
        $query = "SELECT * FROM users WHERE id=?";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array()[0];
    }

    
    function validate_information() 
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');   
        $this->form_validation->set_rules('userlevel', 'User Level', 'required');        
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else{
            return 'success';
        }
    }

   
    function update_userinformation($form_data) 
    {
        return $this->db->query("UPDATE users SET first_name = ?, last_name = ?, user_level = ?, updated_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($form_data['firstname']), 
            $this->security->xss_clean($form_data['lastname']),
            $this->security->xss_clean($form_data['userlevel']), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($form_data['id'])));
    }

    public function validate_change_password($form_data = NULL) 
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        $this->form_validation->set_rules('current', 'Old Password', 'required');
        $this->form_validation->set_rules('new', 'Password', 'required|min_length[8]');   
        $this->form_validation->set_rules('cnew', 'Confirm Password', 'required|matches[new]');  
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if(empty($this->check_password($form_data))){
            $this->session->set_flashdata('old_pass','<p class="text-danger">incorrect old password</p>');
            return 'incorrect old password';
        }
    }

    function check_password($password){
         return $this->db->query("SELECT password FROM users WHERE id=? and password = ?", 
        array(
            $this->security->xss_clean($password['id']),
            md5($this->security->xss_clean($password['current']))))->row_array(); 
    }


    public function update_credentials($form_data) 
    {
        return $this->db->query("UPDATE users SET password = ?, updated_at = ? WHERE id = ?", 
        array(
            md5($this->security->xss_clean($form_data['new'])), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($form_data['id'])));
    }

    public function log($id)
    { 
        $query = "INSERT INTO logs (activity, created_by, created_at) VALUES (?,?,?)";
        $values = array(
            $this->security->xss_clean($this->session->userdata('activity')), 
            $this->security->xss_clean($id), 
            $this->security->xss_clean(date("Y-m-d H:i:s"))); 
        
        return $this->db->query($query, $values);
    }

    public function fetch_all_logs(){
        return $this->db->query("SELECT logs.activity, logs.created_by, users.first_name, users.last_name, logs.created_at 
        FROM fmitr_casarosa.logs 
        LEFT JOIN fmitr_casarosa.users
        ON logs.created_by = users.id
        ORDER BY created_at DESC")->result_array();
    }
}

?>