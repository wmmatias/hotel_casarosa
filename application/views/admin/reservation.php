<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-list-alt me-1"></i>
                        Reservation
                        <a class="float-end" href="/reservations/check_availability"><i class="fas fa-add"></i> Check Availability</a>
                    </div>
                    <div class="card-body">
<?php	                if(!$this->session->flashdata('arrived')){
		                }
		                else{
?>		                    <div class="alert alert-dismissible fade show alert-success" role="alert">
                                <?=$this->session->flashdata('arrived');?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
<?php	                }
?>
<?php	                if(!$this->session->flashdata('check_out')){
		                }
		                else{
?>		                    <div class="alert alert-dismissible fade show alert-success" role="alert">
                                <?=$this->session->flashdata('check_out');?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
<?php	                }
?>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Not Verified</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Verified</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Arrived</button>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Phone</th>
                                                <th>Room Number</th>
                                                <th>Room Type</th>
                                                <th>Adult</th>
                                                <th>Children / Kids</th>
                                                <th>Extra Bed</th>
                                                <th>Extra Person</th>
                                                <th>Extra Bfast</th>
                                                <th>Extra Hour</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php                                   foreach($not as $notdata){
?>                                        <tr>
                                            <td><?=$notdata['first_name'].' '.$notdata['last_name']?></td>
                                            <td><?=$notdata['phone']?></td>
                                            <td><?=$notdata['room_number']?></td>
                                            <td>
<?php                                           if($notdata['room_type'] === '1'){
?>                                                    Junior Room
<?php                                           }
                                                elseif($notdata['room_type'] === '2') {
?>                                                    Standard Room                                                    
<?php                                           }
                                                elseif($notdata['room_type']  === '3') {
?>                                                    Intermediate Room
<?php                                           }
                                                elseif($notdata['room_type'] === '4') {
?>                                                    Twin Room
<?php                                           }
                                                elseif($notdata['room_type'] === '5') {
?>                                                    Family Room
<?php                                           }
?>                                            </td>
                                            <td><?=$notdata['adult']?></td>
                                            <td><?=$notdata['children']?></td>
                                            <td><?=$notdata['x_bed']?></td>
                                            <td><?=$notdata['x_person']?></td>
                                            <td><?=$notdata['x_bfast']?></td>
                                            <td><?=$notdata['x_hour']?></td>
                                            <td><?=$notdata['check_in']?></td>
                                            <td><?=$notdata['check_out']?></td>
                                        </tr>
<?php                                   }
?>                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="table-responsive">
                                    <table id="verified" class="table table-striped table-bordered table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Full Name</th>
                                                <th>Phone</th>
                                                <th>Room Number</th>
                                                <th>Room Type</th>
                                                <th>Adult</th>
                                                <th>Children / Kids</th>
                                                <th>Extra Bed</th>
                                                <th>Extra Person</th>
                                                <th>Extra Bfast</th>
                                                <th>Extra Hour</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php                                   foreach($verified as $vdata){
?>                                        <tr>
                                            <td><a href="/reservations/arrived/<?=$vdata['id']?>" class="btn btn-success">Arrived</a></td>
                                            <td><?=$vdata['first_name'].' '.$vdata['last_name']?></td>
                                            <td><?=$vdata['phone']?></td>
                                            <td><?=$vdata['room_number']?></td>
                                            <td>
<?php                                           if($vdata['room_type'] === '1'){
?>                                                    Junior Room
<?php                                           }
                                                elseif($vdata['room_type'] === '2') {
?>                                                    Standard Room                                                    
<?php                                           }
                                                elseif($vdata['room_type']  === '3') {
?>                                                    Intermediate Room
<?php                                           }
                                                elseif($vdata['room_type'] === '4') {
?>                                                    Twin Room
<?php                                           }
                                                elseif($vdata['room_type'] === '5') {
?>                                                    Family Room
<?php                                           }
?>                                            </td>
                                            <td><?=$vdata['adult']?></td>
                                            <td><?=$vdata['children']?></td>
                                            <td><?=$vdata['x_bed']?></td>
                                            <td><?=$vdata['x_person']?></td>
                                            <td><?=$vdata['x_bfast']?></td>
                                            <td><?=$vdata['x_hour']?></td>
                                            <td><?=$vdata['check_in']?></td>
                                            <td><?=$vdata['check_out']?></td>
                                        </tr>
<?php                                   }
?>                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                <div class="table-responsive">
                                    <table id="arrived" class="table table-striped table-bordered table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Full Name</th>
                                                <th>Phone</th>
                                                <th>Room Number</th>
                                                <th>Adult</th>
                                                <th>Children / Kids</th>
                                                <th>Extra Bed</th>
                                                <th>Extra Person</th>
                                                <th>Extra Bfast</th>
                                                <th>Extra Hour</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php                                   foreach($arrived as $adata){
?>                                        <tr>
                                            <td><a href="/reservation/check_out/<?=$adata['id']?>" class="btn btn-success">Check Out</a></td>
                                            <td><?=$adata['first_name'].' '.$adata['last_name']?></td>
                                            <td><?=$adata['phone']?></td>
                                            <td><?=$adata['room_number']?></td>
                                            <td><?=$adata['adult']?></td>
                                            <td><?=$adata['children']?></td>
                                            <td><?=$adata['x_bed']?></td>
                                            <td><?=$adata['x_person']?></td>
                                            <td><?=$adata['x_bfast']?></td>
                                            <td><?=$adata['x_hour']?></td>
                                            <td><?=$adata['check_in']?></td>
                                            <td><?=$adata['check_out']?></td>
                                        </tr>
<?php                                   }
?>                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>