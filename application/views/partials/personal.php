<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$success = $this->session->flashdata('success');
$warning = $this->session->flashdata('warning');
?>            
<?php       if(!$success){

            }
            else{
?>          <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?=$this->session->flashdata('success');?>
                <button type="button" id="successbtn" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php       }
?> 
                              
<?php       if(!$warning){

}
else{
?>          <div class="alert alert-info alert-dismissible fade show" role="alert">
    <?=$this->session->flashdata('warning');?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php       }
?>                    <div id="info" class="row">
                        <div class="col form-group">
                            <label for="bed">Extra Bed:</label>
                            <input type="number" name="bed" class="form-control" min="0" value="0" required>
                            <?php echo form_error('bed') ?>
                        </div>
                        <div class="col form-group">
                            <label for="person">Extra Person:</label>
                            <input type="number" name="person" class="form-control" min="0" value="0" required>
                            <?php echo form_error('person') ?>
                        </div>
                        <div class="col form-group">
                            <label for="breakfast">Extra B-Fast:</label>
                            <input type="number" name="breakfast" class="form-control" min="0" value="0" required>
                            <?php echo form_error('breakfast') ?>
                        </div>
                        <div class="col form-group">
                            <label for="hour">Extra Hour:</label>
                            <input type="number" name="hour" class="form-control" min="0" value="0" required>
                            <?php echo form_error('hour') ?>
                        </div>
                    </div>
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                        <?php echo form_error('firstname') ?>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                        <?php echo form_error('lastname') ?>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                        <?php echo form_error('phone') ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <?php echo form_error('email') ?>
                    </div>