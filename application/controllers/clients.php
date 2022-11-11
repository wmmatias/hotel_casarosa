<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    public function index_html(){
        $this->load->view("partials/personal");
    }

    public function index() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if($current_user_id) { 
            redirect("users");
        } 
        else {
            $this->load->view('client/templates/header');
            $this->load->view('client/index');
            $this->load->view('client/templates/footer');
        }
    }
}


?>