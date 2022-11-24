<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-file me-1"></i>
                        Logs
                        <a class="float-end" href="/dashboard/employee"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Activity</th>
                                        <th>By</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php                           foreach($datas as $data){
?>                                    <tr>
                                        <td><?= $data['activity']?></td>
                                        <td><?= $data['first_name'].' '.$data['last_name']?></td>
                                        <td><?= $data['created_at']?></td>
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