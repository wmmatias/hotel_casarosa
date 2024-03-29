<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$check_in = date('Y-m-d', strtotime($arrived['check_in']));
$check_out = date('Y-m-d', strtotime($arrived['check_out']));
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-users me-1"></i>
                        Employee
                        <a class="float-end" href="/dashboard/reservation"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        
<?php	                if(!$this->session->flashdata('success')){
		                }
		                else{
?>		                    <div class="alert alert-dismissible fade show alert-success" role="alert">
                                <?=$this->session->flashdata('success');?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
<?php	                }
?>
<?php	                if(!$this->session->flashdata('error')){
                        }
                        else{
?>		                    <div class="alert alert-dismissible fade show alert-danger" role="alert">
                                <?=$this->session->flashdata('error');?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
<?php	                }
?>                        <form action="/reservations/update_checkin" method="post">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="checkin" class="form-label">Check In:</label>
                                    <input type="date" class="form-control" name="checkin" id="checkin" placeholder="Check In" value="<?=$check_in?>" readonly>
                                    <?php echo form_error('checkin') ?>
                                </div>
                                <div class="col-md mb-3">
                                    <label for="checkout" class="form-label">Check Out:</label>
                                    <input type="date" class="form-control" name="checkout" id="checkout" placeholder="Check Out" value="<?=$check_out?>" readonly>
                                    <?php echo form_error('checkout') ?>
                                </div>
                            </div>
                            <p>Personal Information</p>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?=$arrived['first_name']?>" readonly>
                                    <?php echo form_error('firstname') ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?=$arrived['last_name']?>" readonly>
                                    <?php echo form_error('lastname') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="<?=$arrived['phone']?>" readonly>
                                    <?php echo form_error('phone') ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=$arrived['email']?>" readonly>
                                    <?php echo form_error('email') ?>
                                </div>
                            </div>
                            <p>Room Details</p>
                            <hr>
                            <?=$this->session->flashdata('error');?>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="pwd" class="form-label">PWD</label>
                                    <input type="number" class="form-control" name="pwd" id="pwd" min="0" placeholder="PWD" value="<?=$arrived['pwd']?>" >
                                    <input type="hidden" class="form-control" name="pwd1" id="pwd1" placeholder="PWD" value="<?=$arrived['pwd']?>" >
                                    <?php echo form_error('pwd') ?>
                                <?=$this->session->flashdata('pwd');?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="senior" class="form-label">Senior Citizen</label>
                                    <input type="number" class="form-control" name="senior" id="senior" min="0" placeholder="Senior" value="<?=$arrived['senior']?>" >
                                    <input type="hidden" class="form-control" name="senior1" id="senior1" placeholder="Senior" value="<?=$arrived['senior']?>" >
                                    <?php echo form_error('senior') ?>
                                <?=$this->session->flashdata('senior');?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="room_number" class="form-label">Room Number</label>
                                    <input type="text" class="form-control" name="room_number" id="room_number" placeholder="Room Number" value="<?=$arrived['room_number']?>" readonly>
                                    <?php echo form_error('room_number') ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="adult" class="form-label">Adult</label>
                                    <input type="number" class="form-control" name="adult" id="adult" min="0" value="<?=$arrived['adult']?>" placeholder="Adult" readonly>
                                    
                                    <input type="hidden" class="form-control" name="adult1" id="adult" min="0" value="<?=$arrived['adult']?>" placeholder="Adult">
                                    <?php echo form_error('adult') ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="children" class="form-label">Children</label>
                                    <input type="number" class="form-control" name="children" id="children" min="0" value="<?=$arrived['children']?>" placeholder="phone" readonly>

                                    <input type="hidden" class="form-control" name="children1" id="children" min="0" value="<?=$arrived['children']?>" placeholder="phone">
                                    <?php echo form_error('children') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="bed" class="form-label">Extra Bed</label>
                                    <input type="number" class="form-control" name="bed" id="bed" min="0" value="<?=$arrived['x_bed']?>" placeholder="Bed">
                                    
                                    <input type="hidden" class="form-control" name="bed1" id="bed" min="0" value="<?=$arrived['x_bed']?>" placeholder="Bed">
                                    <?php echo form_error('bed') ?>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="person" class="form-label">Extra Person</label>
                                    <input type="number" class="form-control" name="person" id="person" min="0" value="<?=$arrived['x_person']?>"placeholder="Person">
                                    
                                    <input type="hidden" class="form-control" name="person1" id="person" min="0" value="<?=$arrived['x_person']?>"placeholder="Person">
                                    <?php echo form_error('person') ?>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="bfast" class="form-label">Extra Breakfast</label>
                                    <input type="number" class="form-control" name="bfast" id="bfast" min="0" value="<?=$arrived['x_bfast']?>"placeholder="Breakfast">
                                    
                                    <input type="hidden" class="form-control" name="bfast1" id="bfast" min="0" value="<?=$arrived['x_bfast']?>"placeholder="Breakfast">
                                    <?php echo form_error('bfast') ?>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="hour" class="form-label">Extra Hour</label>
                                    <input type="number" class="form-control" name="hour" id="hour" min="0" placeholder="Hour" value="<?=$arrived['x_hour']?>">
                                    
                                    <input type="hidden" class="form-control" name="hour1" id="hour" min="0" placeholder="Hour" value="<?=$arrived['x_hour']?>">
                                    <?php echo form_error('hour') ?>
                                </div>
                            </div>
                            <p>Payment Info</p>
                            <hr>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="package" class="form-label">Package Amount</label>
                                    <input type="text" class="form-control" name="package" id="package" value="<?= $arrived['room_rate']?>" readonly>
                                    <?php echo form_error('package') ?>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" name="reservation_id" value="<?=$arrived['id']?>">
                                <input type="hidden" name="room_id" value="<?=$arrived['room_id']?>">
                                <div class="col-md mb-3">
                                    <label for="extras" class="form-label">Total Extras</label>
                                    <input type="text" class="form-control" name="extras" id="extras" readonly>
                                    <?php echo form_error('extras') ?>
                                </div>
                                <div class="col-md mb-3">
                                    <label for="discount" class="form-label">Total Less Discount</label>
                                    <input type="text" class="form-control" name="discount" id="discount" readonly>
                                    <?php echo form_error('discount') ?>
                                </div>
                                <div class="col-md mb-3">
                                    <label for="amount" class="form-label">Total Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount" readonly>
                                    <?php echo form_error('amount') ?>
                                </div>
                            </div>
                            
                            <div class="col-md">
                                    <input type="hidden" name="edit_checkin" value="<?=$arrived['id']?>">
                                    <button class="btn btn-success w-100 mb-3">Update Details</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
      </div>