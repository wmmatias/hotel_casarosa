<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-lock me-1"></i>
                        Change Password
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
<?php	                if(!$this->session->flashdata('old_pass')){
                        }
                        else{
?>		                    <div class="alert alert-dismissible fade show alert-danger" role="alert">
                                <?=$this->session->flashdata('old_pass');?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
<?php	                }
?>                        <form action="/users/credentials" method="post">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="current" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current" placeholder="Current Password" required>
                                    <?php echo form_error('current') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="new" class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="new" placeholder="New Password" minlength="8" required>
                                    <?php echo form_error('new') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="cnew" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="cnew" placeholder="Confirm Password" minlength="8" required>
                                    <?php echo form_error('cnew') ?>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?=$this->session->user_id?>">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
      </div>