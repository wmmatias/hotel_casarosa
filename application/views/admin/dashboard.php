<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Upcoming Guest
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="upcoming" class="table table-striped table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Room</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php                               foreach($upcoming as $data){
                                    $check_in = date('m-d-Y', strtotime($data['check_in']));
                                    $check_out = date('m-d-Y', strtotime($data['check_out']));
?>                                    <tr>
                                        <td><?= $data['first_name'].' '.$data['last_name']?></td>
                                        <td><?= $data['phone']?></td>
                                        <td><?= $data['room_number']?></td>
                                        <td><?= $check_in?></td>
                                        <td><?= $check_out?></td>
                                    </tr>
<?php                               }
?>                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Guest Today
                    </div>
                    <div class="card-body">
                       
                    <table id="current" class="table table-striped table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Room</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php                               foreach($current as $data){
                                    $check_in = date('m-d-Y', strtotime($data['check_in']));
                                    $check_out = date('m-d-Y', strtotime($data['check_out']));
?>                                    <tr>
                                        <td><?= $data['first_name'].' '.$data['last_name']?></td>
                                        <td><?= $data['phone']?></td>
                                        <td><?= $data['room_number']?></td>
                                        <td><?= $check_in?></td>
                                        <td><?= $check_out?></td>
                                    </tr>
<?php                               }
?>                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Available rooms today
                    </div>
                    <div class="card-body">
                        <table id="rooms">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Room Number</th>
                                    <th>Room Type</th>
                                    <th>Capacity</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
<?php                           foreach($room as $data){
?>                                <tr>
                                    <td><?=$data['name']?></td>
                                    <td><?=$data['room_number']?></td>
                                    <td>
<?php                               if($data['room_type'] === '1'){
?>                                      Junior Room
<?php                               }
                                    elseif($data['room_type'] === '2'){
?>                                      Standard Room                                        
<?php                               }
                                    elseif($data['room_type'] === '3'){
?>                                      Intermediate Room
<?php                               }
                                    elseif($data['room_type'] === '4'){
?>                                      Twin Room
<?php                               }
                                    elseif($data['room_type'] === '5'){
?>                                      Family Room
<?php                               }
?>                                    </td>
                                    <td><?=($data['room_type'] === '5'? '4':'2')?></td>
                                    <td>
<?php                               if($data['room_type'] === '1'){
?>                                      1,550.00
<?php                               }
                                    elseif($data['room_type'] === '2'){
?>                                      1,650.00                                        
<?php                               }
                                    elseif($data['room_type'] === '3'){
?>                                      1,800.00
<?php                               }
                                    elseif($data['room_type'] === '4'){
?>                                      1,790.00
<?php                               }
                                    elseif($data['room_type'] === '5'){
?>                                      2,495.00
<?php                               }
?>                                    
                                    </td>
                                </tr>
<?php                           }
?>                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-simple me-1"></i>
                        Hotel Stats Today
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-users"></i>
                                    <h1 class="card-title"><?=$tbooked['total_booked']?></h1>
                                    <p>Confirmed</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-users"></i>
                                    <h1 class="card-title"><?=$arrived['total_arrived']?></h1>
                                    <p>Arrived</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-users"></i>
                                    <h1 class="card-title"><?=($no_guest['total_guest'] === null ? '0':$no_guest['total_guest'])?></h1>
                                    <p>Guest</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-bed"></i>
                                    <h1 class="card-title"><?=$no_rooms['total_room']?></h1>
                                    <p>Rooms</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-money-bill"></i>
                                    <h3 class="card-title"><?= number_format($t_sales['total_sales'])?></h3>
                                    <p>Total Sales</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-money-bill"></i>
                                    <h3 class="card-title"><?=number_format($d_sales['total_sales'])?></h3>
                                    <p>Today Sales</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <h3 class="card-title"><?= number_format($t_expense['total_expense'])?></h3>
                                    <p>Total Expenses</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <h3 class="card-title"><?= number_format($d_expense['total_expense'])?></h3>
                                    <p>Today Expenses</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>