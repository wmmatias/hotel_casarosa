<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
   
    public function index() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        } 
        else {
            redirect("dashboard");
        }
    }

    public function register() 
    {
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            $this->load->view('templates/header');
            $this->load->view('users/register');
        } 
        else {
            redirect("dashboard");
        }
    }

    public function logoff() 
    {
        $this->session->sess_destroy();
        $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully logged out');
        $this->user->log($this->session->userdata('user_id'));
        redirect("/");   
    }

    public function process_signin() 
    {
        $result = $this->user->validate_signin_form();
        if($result != 'success') {
            $this->session->set_flashdata('input_errors', $result);
            redirect("/");
        } 
        else 
        {
            $email = $this->input->post('email');
            $user = $this->user->get_user_by_email($email);
            
            $result = $this->user->validate_signin_match($user, $this->input->post('password'));
            
            if($result == "success") 
            {   
                $is_admin = $this->user->validate_is_admin($email);
                if(!empty($is_admin)){
                    $this->session->set_userdata(array('user_id'=>$user['id'], 'fullname'=>$user['first_name'].' '.$user['last_name'],'auth' => true, 'page'=> 'dashboard'));
                    $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully logged in');
                    $this->user->log($this->session->userdata('user_id'));
                    redirect("dashboard");
                }
                else{
                    $this->session->set_userdata(array('user_id'=>$user['id']));
                    $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully logged in');
                    $this->user->log($this->session->userdata('user_id'));
                    redirect("dashboard");
                }
            }
            else 
            {
                $this->session->set_flashdata('input_errors', $result);
                redirect("/");
            }
        }

    }

    public function adding_user_proccess() 
    {   
        $email = $this->input->post('email');
        $form_data = $this->input->post();
        if($this->input->post('userlevel') === '3'){
            $this->session->set_flashdata('userlevel', 'Please select User Level');
            $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to add '.$form_data['firstname'].' '.$form_data['lastname'].' to user');
            $this->user->log($this->session->userdata('user_id'));
                redirect('/dashboard/employee');
        }
        else{
            $result = $this->user->validate_creation();
            if($result!= 'success')
            {
                $this->session->set_flashdata('rooms_error', $result);
                $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to add '.$form_data['firstname'].' '.$form_data['lastname'].' to user');
                $this->user->log($this->session->userdata('user_id'));
                $res = $this->user->get_users();
                $data = array('datas'=>$res);
                $this->session->set_userdata(array('page'=> 'employee'));
                $this->load->view('templates/header');
                $this->load->view('admin/employee', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $check_email = $this->user->get_user_by_email($email);
                if(!$check_email){
                    $this->user->create_user($form_data);
                    $this->session->set_flashdata('success', 'Successfully Created!');
                    $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully add '.$form_data['firstname'].' '.$form_data['lastname'].' to user');
                    $this->user->log($this->session->userdata('user_id'));
                    redirect('/dashboard/employee');
                }
                else{
                    $this->session->set_flashdata('error', 'Email already taken!');
                    redirect('/dashboard/employee');
                }
                
            }
        }
    }

    public function profile() 
    {   
        $user_id = $this->session->user_id;
        $user = $this->user->get_user_id($user_id);
        $details = array('details'=>$user);
        $this->load->view('templates/header');
        $this->load->view('users/edit',$details); 
    }

 
    public function edit_information_process() 
    {   
        $email = $this->input->post('email');
        $id = $this->input->post('id');
        $form_data = $this->input->post();
        if($this->input->post('userlevel') === '3'){
            $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to modified the details of '.$form_data['firstname'].' '.$form_data['lastname'].' to user');
            $this->user->log($this->session->userdata('user_id'));
            $this->session->set_flashdata('userlevel', 'Please select User Level');
            $res = $this->user->get_users();
            $details = $this->user->get_user_details($id);
            $data = array('datas'=>$res, 'details'=>$details);
            $this->session->set_userdata(array('page'=> 'employee'));
            $this->load->view('templates/header');
            $this->load->view('admin/employee_edit', $data);
            $this->load->view('templates/footer');
        }
        else{
            $result = $this->user->validate_information();
            if($result != 'success') {
                $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' failed to modified the details of '.$form_data['firstname'].' '.$form_data['lastname'].' to user');
                $this->user->log($this->session->userdata('user_id'));
                $this->session->set_flashdata('input_errors', $result);
                $res = $this->user->get_users();
                $details = $this->user->get_user_details($id);
                $data = array('datas'=>$res, 'details'=>$details);
                $this->session->set_userdata(array('page'=> 'employee'));
                $this->load->view('templates/header');
                $this->load->view('admin/employee_edit', $data);
                $this->load->view('templates/footer');
            } 
            else
            {
                $this->user->update_userinformation($form_data);
                $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully modified details of '.$form_data['firstname'].' '.$form_data['lastname'].' to user');
                $this->user->log($this->session->userdata('user_id'));
                $this->session->set_flashdata('success','The user information successfully modified');
                redirect("dashboard/employee");
            }
        }
    }

    public function edit_credentials() 
    {   
        $checkpassword = $this->input->post();
        $result = $this->user->validate_change_password($checkpassword);
        if(!empty($result)) {
            $this->session->set_flashdata('credentials_errors', $result);
            redirect("users/edit");
        } 
        else
        {  
            $form_data = $this->input->post();
            $this->user->update_credentials($form_data);
            $this->session->set_flashdata('successc','your credential successfully update');
            redirect("users/edit");
        }
    }

    public function delete_users($id) 
    {
        $this->user->delete_user($id);
        $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully deleted '.$id.' to user');
        $this->user->log($this->session->userdata('user_id'));
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect('/dashboard/employee');
    }
    
}
