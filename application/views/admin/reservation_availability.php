<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-list-alt me-1"></i>
                        Check Availability
                        <a class="float-end" href="/dashboard/reservation"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="check_in">Check In:</label>
                                        <input type="date" name="check_in" class="form-control" value="<?=$this->session->userdata('checkin')?>">
                                    </div>
                                    <div class="col form-group">
                                        <label for="check_out">Check Out:</label>
                                        <input type="date" name="check_out" class="form-control" value="<?=$this->session->userdata('checkout')?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="adult">Adult:</label>
                                        <input type="number" name="adult" class="form-control" min="1" value="1">
                                    </div>
                                    <div class="col form-group">
                                        <label for="children">Children:</label>
                                        <input type="number" name="children" class="form-control" min="0" value="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="adult">Room Type:</label>
                                        <select name="room_type" class="form-control mb-3" id=room_type">
                                            <option value="0">--Select Room Type--</option>
                                            <option value="1">Junior Room</option>
                                            <option value="2">Standard Room</option>
                                            <option value="3">Intermediate Room</option>
                                            <option value="4">Twin Room</option>
                                            <option value="5">Family Room</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <button type="submit" class="btn btn-primary w-100">Check Availability</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <p>Available Rooms:</p>
                                <div class="room_dispay" id="room_dispay">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>