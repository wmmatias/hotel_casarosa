<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

    public function index() 
    {   
        // $current_user_id = $this->session->userdata('user_id');
        // if(!$current_user_id) { 
        //     redirect("users");
        // } 
        // else {
            $this->load->view('client/index');
        // }
    }
}


?>