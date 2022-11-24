<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Model {
    public function daily_table(){
        $status = '0';
        $query = "SELECT reservations.id, reservations.first_name, reservations.last_name, reservations.phone, rooms.room_number, reservations.check_in, reservations.check_out, reservations.status, sales.total_discount, sales.total_amount
        FROM fmitr_casarosa.reservations
        LEFT JOIN fmitr_casarosa.rooms
        ON reservations.room_id = rooms.id
        LEFT JOIN fmitr_casarosa.sales
        ON reservations.id = sales.reservation_id
        WHERE YEAR(reservations.created_at) = YEAR(NOW()) AND MONTH(reservations.created_at) = MONTH(NOW()) AND DAY(reservations.created_at) = DAY(NOW()) AND reservations.status != ?
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    public function idaily_table(){
        $status = '0';
        $query = "SELECT reservations.first_name, reservations.last_name, inventory.name, inventory.qty, inventory.total_expense, inventory.created_at 
        FROM fmitr_casarosa.inventory
        LEFT JOIN fmitr_casarosa.reservations
        ON inventory.reservation_id = reservations.id
        WHERE YEAR(inventory.created_at) = YEAR(NOW()) AND MONTH(inventory.created_at) = MONTH(NOW()) AND DAY(inventory.created_at) = DAY(NOW())
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    
    public function yesterday_table(){
        $status = '0';
        $query = "SELECT reservations.id, reservations.first_name, reservations.last_name, reservations.phone, rooms.room_number, reservations.check_in, reservations.check_out, reservations.status, sales.total_discount, sales.total_amount
        FROM fmitr_casarosa.reservations
        LEFT JOIN fmitr_casarosa.rooms
        ON reservations.room_id = rooms.id
        LEFT JOIN fmitr_casarosa.sales
        ON reservations.id = sales.reservation_id
        WHERE reservations.status != ? AND date(reservations.created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    public function iyesterday_table(){
        $status = '0';
        $query = "SELECT reservations.first_name, reservations.last_name, inventory.name, inventory.qty, inventory.total_expense, inventory.created_at 
        FROM fmitr_casarosa.inventory
        LEFT JOIN fmitr_casarosa.reservations
        ON inventory.reservation_id = reservations.id
        WHERE date(inventory.created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    public function weekly_table(){
        $status = '0';
        $query = "SELECT reservations.id, reservations.first_name, reservations.last_name, reservations.phone, rooms.room_number, reservations.check_in, reservations.check_out, reservations.status, sales.total_discount, sales.total_amount
        FROM fmitr_casarosa.reservations
        LEFT JOIN fmitr_casarosa.rooms
        ON reservations.room_id = rooms.id
        LEFT JOIN fmitr_casarosa.sales
        ON reservations.id = sales.reservation_id
        WHERE YEARWEEK(reservations.created_at) = YEARWEEK(NOW()) AND reservations.status != ?
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }
    
    public function iweekly_table(){
        $status = '0';
        $query = "SELECT reservations.first_name, reservations.last_name, inventory.name, inventory.qty, inventory.total_expense, inventory.created_at 
        FROM fmitr_casarosa.inventory
        LEFT JOIN fmitr_casarosa.reservations
        ON inventory.reservation_id = reservations.id
        WHERE YEARWEEK(inventory.created_at) = YEARWEEK(NOW())
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }
    
    public function monthly_table(){
        $status = '0';
        $query = "SELECT reservations.id, reservations.first_name, reservations.last_name, reservations.phone, rooms.room_number, reservations.check_in, reservations.check_out, reservations.status, sales.total_discount, sales.total_amount
        FROM fmitr_casarosa.reservations
        LEFT JOIN fmitr_casarosa.rooms
        ON reservations.room_id = rooms.id
        LEFT JOIN fmitr_casarosa.sales
        ON reservations.id = sales.reservation_id
        WHERE YEAR(reservations.created_at) = YEAR(NOW()) AND MONTH(reservations.created_at)=MONTH(NOW()) AND reservations.status != ?
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }

    
    public function imonthly_table(){
        $status = '0';
        $query = "SELECT reservations.first_name, reservations.last_name, inventory.name, inventory.qty, inventory.total_expense, inventory.created_at 
        FROM fmitr_casarosa.inventory
        LEFT JOIN fmitr_casarosa.reservations
        ON inventory.reservation_id = reservations.id
        WHERE YEAR(inventory.created_at) = YEAR(NOW()) AND MONTH(inventory.created_at)=MONTH(NOW())
        ORDER BY reservations.check_in ASC";
        $values = array(
            $this->security->xss_clean($status)
        );
        return $this->db->query($query, $values)->result_array();
    }
}