<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user = $this->session->userdata('auth') === true;
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-users me-1"></i>
                        Employee
<?php                   if($user){
?>                        <a class="float-end btn btn-info" href="/dashboard/logs"><i class="fas fa-file"></i> user logs</a>
<?php                   }
?>                    </div>
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
                        if($user){                       
?>                        <form action="/users/validate" method="post">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                                    <?php echo form_error('firstname') ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                                    <?php echo form_error('lastname') ?>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                <?php echo form_error('email') ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="userlevel" class="form-label">User Level</label>
                                <select name="userlevel" class="form-control" id="userlevel">
                                    <option value="3">--Select User Role--</option>
                                    <option value="0">Admin</option>
                                    <option value="1">User</option>
                                </select>
                                <?php echo form_error('userlevel') ?>
                                <?=$this->session->flashdata('userlevel');?>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Add User</button>
                        </form>
<?php                   }
?>                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        User List
                                    </div>
                                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>User Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php                           foreach($datas as $data){
?>                                    <tr class="<?=($data['status'] === '1' ? 'bg-danger':'')?>">
                                        <td><?= $data['first_name'].' '.$data['last_name']?></td>
                                        <td><?= $data['email']?></td>
                                        <td>
<?php                                       if($data['user_level'] === '0'){
?>                                                Admin
<?php                                       }
                                            elseif($data['user_level'] === '1'){
?>                                                User                                                  
<?php                                       }                                       
?>                                        </td>
                                        <td>
<?php                                       if($user){
?>                                              <a href="/users/edit/<?=$data['id']?>" class="text-xxsm btn btn-primary" tabindex="0" data-toggle="tooltip" data-original-title="Edit" data-placement="left"><i class="fas fa-pen"></i></a>
                                                <a href="/users/ban/<?=$data['id']?>" onclick="return confirm('Are you sure you want to Block this user?')" class="text-xxsm btn btn-danger <?=($data['status'] === '0' ? '':'d-none')?>" tabindex="0" data-toggle="tooltip" data-original-title="Block" data-placement="left"><i class="fas fa-ban"></i></a>
                                                <a href="/users/unban/<?=$data['id']?>" onclick="return confirm('Are you sure you want to UnBlock this user?')" class="text-xxsm btn btn-success <?=($data['status'] === '1' ? '':'d-none')?>" tabindex="0" data-toggle="tooltip" data-original-title="UnBlock" data-placement="left"><i class="fas fa-check"></i></a>
<?php                                       }
?>                                        </td>
<?php                           }
?>                                    </tr>
                                </tbody>
                            </table>
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