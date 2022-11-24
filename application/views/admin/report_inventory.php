<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-list-alt me-1"></i>
                        Reservation Report 
                        <a href="/dashboard/reservation" class="float-end"><i class="fas fa-arrow-left"></i> Back</a>
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
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Daily</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="y-tab" data-bs-toggle="tab" data-bs-target="#y" type="button" role="tab" aria-controls="y" aria-selected="true">Yesterday</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Weekly</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Monthly</button>
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
                                                <th>Kit Name</th>
                                                <th>Qty</th>
                                                <th>Total Expense</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php                                   foreach($daily as $notdata){
?>                                        <tr>
                                            <td><?=$notdata['first_name'].' '.$notdata['last_name']?></td>
                                            <td><?=$notdata['name']?></td>
                                            <td><?=$notdata['qty']?></td>
                                            <td><?=$notdata['total_expense']?></td>
                                            <td><?=date('m-d-Y', strtotime($notdata['created_at']))?></td>
                                        </tr>
<?php                                   }
?>                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane" id="y" role="tabpanel" aria-labelledby="y-tab">
                                <div class="table-responsive">
                                    <table id="yesterday" class="table table-striped table-bordered table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Kit Name</th>
                                                <th>Qty</th>
                                                <th>Total Expense</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php                                   foreach($yesterday as $notdata){
?>                                        <tr>
                                            <td><?=$notdata['first_name'].' '.$notdata['last_name']?></td>
                                            <td><?=$notdata['name']?></td>
                                            <td><?=$notdata['qty']?></td>
                                            <td><?=$notdata['total_expense']?></td>
                                            <td><?=date('m-d-Y', strtotime($notdata['created_at']))?></td>
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
                                                <th>Full Name</th>
                                                <th>Kit Name</th>
                                                <th>Qty</th>
                                                <th>Total Expense</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php                                   foreach($weekly as $notdata){
?>                                        <tr>
                                            <td><?=$notdata['first_name'].' '.$notdata['last_name']?></td>
                                            <td><?=$notdata['name']?></td>
                                            <td><?=$notdata['qty']?></td>
                                            <td><?=$notdata['total_expense']?></td>
                                            <td><?=date('m-d-Y', strtotime($notdata['created_at']))?></td>
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
                                                <th>Full Name</th>
                                                <th>Kit Name</th>
                                                <th>Qty</th>
                                                <th>Total Expense</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php                                   foreach($monthly as $notdata){
?>                                        <tr>
                                            <td><?=$notdata['first_name'].' '.$notdata['last_name']?></td>
                                            <td><?=$notdata['name']?></td>
                                            <td><?=$notdata['qty']?></td>
                                            <td><?=$notdata['total_expense']?></td>
                                            <td><?=date('m-d-Y', strtotime($notdata['created_at']))?></td>
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