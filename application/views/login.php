<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid px-4">
        <div id="login" class="row">
            <div class="form row text-center mt-5">
                <div class="col-md-4 offset-md-4 border bg-light bg-gradient shadow p-3 mb-5 bg-body rounded">
                    <h1>Login</h1>
                    <p class="text-muted">Please provide your details</p>
                    <?=$this->session->flashdata('input_errors');?>          
                    <form action="signin/validate" method="POST">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                        <div class="form-group row mt-3">
                            <div class="col-sm-8 offset-sm-2">
                                <input type="text" class="form-control" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-sm-8 offset-sm-2">
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <div class="col-sm-8 offset-sm-2 d-grid mb-5">
                                <input type="submit" class="login btn btn-primary" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>