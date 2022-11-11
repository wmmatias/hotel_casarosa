<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function index() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $upcoming = $this->reservation->get_upcoming_guest();
            $current = $this->reservation->get_current_guest();
            $available_room = $this->reservation->get_available_room();
            $arrived = $this->reservation->get_arrived();
            $total_booked = $this->reservation->get_confirmed_reserved();
            $no_guest = $this->reservation->get_no_guest();
            $no_rooms = $this->reservation->get_number_rooms();
            $data = array('upcoming'=>$upcoming, 'current'=>$current, 'room'=>$available_room, 'arrived'=>$arrived, 'tbooked'=>$total_booked, 'no_guest'=>$no_guest, 'no_rooms'=>$no_rooms);
            $this->session->set_userdata(array('page'=> 'dashboard'));
            $this->load->view('templates/header');
            $this->load->view('admin/dashboard', $data);
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
            $res = $this->user->get_users();
            $data = array('datas'=>$res);
            $this->session->set_userdata(array('page'=> 'employee'));
            $this->load->view('templates/header');
            $this->load->view('admin/employee', $data);
            $this->load->view('templates/footer');
        }
    }

    public function employee_edit($id) 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $res = $this->user->get_users();
            $details = $this->user->get_user_details($id);
            $data = array('datas'=>$res, 'details'=>$details);
            $this->session->set_userdata(array('page'=> 'employee'));
            $this->load->view('templates/header');
            $this->load->view('admin/employee_edit', $data);
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
            $notverified = $this->reservation->get_unverified_reservation();
            $verified = $this->reservation->get_verified_reservation();
            $arrived = $this->reservation->get_arrived_reservation();
            $data = array('not'=>$notverified, 'verified'=>$verified, 'arrived'=>$arrived);
            $this->session->set_userdata(array('page'=> 'reservation'));
            $this->load->view('templates/header');
            $this->load->view('admin/reservation', $data);
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
            $res = $this->room->get_rooms();
            $data = array('datas'=>$res);
            $this->session->set_userdata(array('page'=> 'rooms'));
            $this->load->view('templates/header');
            $this->load->view('admin/rooms', $data);
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
            $res = $this->reservation->get_inventory();
            $data = array('inventory'=>$res);
            $this->session->set_userdata(array('page'=> 'inventory'));
            $this->load->view('templates/header');
            $this->load->view('admin/inventory', $data);
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