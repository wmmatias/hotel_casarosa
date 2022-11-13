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
                                <form id="admin_check" action="/reservations/admin_get_available_room" method="post">
                                    <div class="row">
                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                                        <div class="col form-group">
                                            <label for="check_in">Check In:</label>
                                            <input type="date" name="check_in" class="form-control" value="">
                                        </div>
                                        <div class="col form-group">
                                            <label for="check_out">Check Out:</label>
                                            <input type="date" name="check_out" class="form-control" value="">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            <button type="submit" class="btn btn-primary w-100 mt-5">Check Availability</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <p>Available Rooms:</p>
                                <div class="room_display" id="room_display">
                                    
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