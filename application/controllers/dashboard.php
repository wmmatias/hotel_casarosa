<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    /*  DOCU: This function is triggered by default which displays the sign in/dashboard.
        Owner: Wilard
    */
    public function index() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'dashboard'));
            $this->load->view('templates/header');
            $this->load->view('admin/dashboard');
            $this->load->view('templates/footer');
        }
    }
    
    public function employee() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'employee'));
            $this->load->view('templates/header');
            $this->load->view('admin/employee');
            $this->load->view('templates/footer');
        }
    }

    public function reservation() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'reservation'));
            $this->load->view('templates/header');
            $this->load->view('admin/reservation');
            $this->load->view('templates/footer');
        }
    }

    public function rooms() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'rooms'));
            $this->load->view('templates/header');
            $this->load->view('admin/rooms');
            $this->load->view('templates/footer');
        }
    }

    public function inventory() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'inventory'));
            $this->load->view('templates/header');
            $this->load->view('admin/inventory');
            $this->load->view('templates/footer');
        }
    }

    public function kitchen() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'kitchen'));
            $this->load->view('templates/header');
            $this->load->view('admin/kitchen');
            $this->load->view('templates/footer');
        }
    }
}