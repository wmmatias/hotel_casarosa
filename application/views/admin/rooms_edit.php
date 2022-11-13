<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <div class="container-fluid px-4">
        
        <div class="row mt-4">
            <div class="col-xl-8 offset-xl-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-bed me-1"></i>
                        Rooms
                        <!-- <a class="float-end" href=""><i class="fas fa-add"></i> Add</a> -->
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
?>                        <form action="/rooms/validate_edit" method="post">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="room_number" class="form-label">Room Number</label>
                                    <input type="text" class="form-control" name="room_number" id="room_number" placeholder="Room Number" value="<?=$details['room_number']?>">
                                    <?php echo form_error('room_number') ?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="room_name" class="form-label">Room Name</label>
                                    <input type="text" class="form-control" name="room_name" id="room_name" placeholder="Room Name" value="<?=$details['name']?>">
                                    <?php echo form_error('room_name') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="room_type" class="form-label">Room Type</label>
                                    <select name="room_type" class="form-control" id="room_type">
                                        <option value="0">--Select Room Type--</option>
                                        <option value="1" <?=($details['room_type'] === '1' ? 'selected' : '')?>>Junior</option>
                                        <option value="2" <?=($details['room_type'] === '2' ? 'selected' : '')?>>Standard</option>
                                        <option value="3" <?=($details['room_type'] === '3' ? 'selected' : '')?>>Intermediate</option>
                                        <option value="4" <?=($details['room_type'] === '4' ? 'selected' : '')?>>Twin</option>
                                        <option value="5" <?=($details['room_type'] === '5' ? 'selected' : '')?>>Family</option>
                                    </select>
                                    <?php echo form_error('room_type') ?>
                                    <?=$this->session->flashdata('room_type');?>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="room_rate" class="form-label">Room Rate <small>(60.00) <i>input with decimal</i></small></label>
                                    <input type="text" class="form-control" name="room_rate" id="room_rate" placeholder="Room Name" value="<?=($details['room_rate'] < '0' ? '-' : number_format($details['room_rate'],2))?>">
                                    <?php echo form_error('room_rate') ?>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $details['id']?>">
                                <div class="col-md-2">
                                    <a href="/dashboard/rooms" class="btn btn-danger mb-3">Cancel Edit</a>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary mb-3">Update Room</button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Room List
                                    </div>
                                    <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Room Number</th>
                                                <th>Name</th>
                                                <th>Room Type</th>
                                                <th>Room Rate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
        <?php                           foreach($datas as $data){
        ?>                                    <tr>
                                                <td><?= $data['room_number']?></td>
                                                <td><?= $data['name']?></td>
                                                <td>
        <?php                                       if($data['room_type'] === '1'){
        ?>                                                Junior
        <?php                                       }
                                                    elseif($data['room_type'] === '2'){
        ?>                                                Standard                                                  
        <?php                                       }
                                                    elseif($data['room_type'] === '3'){
        ?>                                                Intermediate                                                  
        <?php                                       }
                                                    elseif($data['room_type'] === '4'){
        ?>                                                Twin                                                  
        <?php                                       }
                                                    elseif($data['room_type'] === '5'){
        ?>                                                Family                                                  
        <?php                                       }                                            
        ?>                                        </td>
                                                <td><?=($data['room_rate'] < '0' ? '-' : number_format($data['room_rate'],2))?></td>
                                                <td>
                                                    <a href="/rooms/edit/<?=$data['id']?>" class="text-xxsm btn btn-primary" tabindex="0" data-toggle="tooltip" data-original-title="Edit" data-placement="left"><i class="fas fa-pen"></i></a>
                                                    <a href="/rooms/delete/<?=$data['id']?>" onclick="return confirm('Are you sure you want to DELETE this?')" class="text-xxsm btn btn-danger" tabindex="0" data-toggle="tooltip" data-original-title="Delete" data-placement="left"><i class="fas fa-trash"></i></a>
                                                </td>
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