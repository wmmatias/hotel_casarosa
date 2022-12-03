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
            $total_sales = $this->reservation->get_total_sales();
            $daily_sales = $this->reservation->get_daily_sales();
            $total_expense = $this->reservation->get_total_expense();
            $daily_expense = $this->reservation->get_daily_expense();
            $data = array('upcoming'=>$upcoming, 'current'=>$current, 'room'=>$available_room, 'arrived'=>$arrived, 'tbooked'=>$total_booked, 'no_guest'=>$no_guest, 'no_rooms'=>$no_rooms, 't_sales'=>$total_sales, 'd_sales'=>$daily_sales, 't_expense'=>$total_expense, 'd_expense'=>$daily_expense);
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

    public function logs() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $res = $this->user->fetch_all_logs();
            $data = array('datas'=>$res);
            $this->session->set_userdata(array('page'=> 'employee'));
            $this->load->view('templates/header');
            $this->load->view('admin/logs', $data);
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
    
    public function reservation_report() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $daily = $this->report->daily_table();
            $yesterday = $this->report->yesterday_table();
            $weekly = $this->report->weekly_table();
            $monthly = $this->report->monthly_table();
            $data = array('daily'=>$daily, 'yesterday'=>$yesterday, 'weekly'=>$weekly, 'monthly'=>$monthly);
            $this->session->set_userdata(array('page'=> 'reservation'));
            $this->load->view('templates/header');
            $this->load->view('admin/report_reservation',$data);
            $this->load->view('templates/footer');
        }
    }

    public function dprint() 
    {   
        $isadmin = $this->session->userdata('auth');
        if(!$isadmin){
            redirect('/');
        }
        else{
            $res = $this->report->daily_print();
            $total = $this->report->daily_total();
            $data = array('daily' => $res, 'total'=>$total);
            $this->load->view('templates/header');
            $this->load->view('admin/preview_ddata', $data);
            $this->load->view('templates/footer');
        }
    }

    public function yprint() 
    {   
        $isadmin = $this->session->userdata('auth');
        if(!$isadmin){
            redirect('/');
        }
        else{
            $res = $this->report->yesterday_print();
            $total = $this->report->yesterday_total();
            $data = array('yesterday' => $res, 'total'=>$total);
            $this->load->view('templates/header');
            $this->load->view('admin/preview_ydata', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function wprint() 
    {   
        $isadmin = $this->session->userdata('auth');
        if(!$isadmin){
            redirect('/');
        }
        else{
            $res = $this->report->weekly_print();
            $total = $this->report->weekly_total();
            $data = array('weekly' => $res, 'total'=>$total);
            $this->load->view('templates/header');
            $this->load->view('admin/preview_wdata', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function mprint() 
    {   
        $isadmin = $this->session->userdata('auth');
        if(!$isadmin){
            redirect('/');
        }
        else{
            $res = $this->report->monthly_print();
            $total = $this->report->monthly_total();
            $data = array('monthly' => $res, 'total'=>$total);
            $this->load->view('templates/header');
            $this->load->view('admin/preview_mdata', $data);
            $this->load->view('templates/footer');
        }
    }

    public function inventory_report() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $daily = $this->report->idaily_table();
            $yesterday = $this->report->iyesterday_table();
            $weekly = $this->report->iweekly_table();
            $monthly = $this->report->imonthly_table();
            // $pdaily = $this->report->pidaily();
            // $pyesterday = $this->report->piyesterday();
            // $pweekly = $this->report->piweekly();
            // $pmonthly = $this->report->pimonthly();
            $data = array('daily'=>$daily, 'yesterday'=>$yesterday, 'weekly'=>$weekly, 'monthly'=>$monthly);
            $this->session->set_userdata(array('page'=> 'inventory'));
            $this->load->view('templates/header');
            $this->load->view('admin/report_inventory',$data);
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

    

    public function rooms_edit($id) 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            redirect("users");
        } 
        else {
            $res = $this->room->get_rooms();
            $details = $this->room->get_details($id);
            $data = array('datas'=>$res, 'details'=>$details);
            $this->session->set_userdata(array('page'=> 'rooms'));
            $this->load->view('templates/header');
            $this->load->view('admin/rooms_edit', $data);
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

}