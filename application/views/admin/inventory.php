<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-warehouse me-1"></i>
                        Inventory
                        <a href="/dashboard/inventory_report" class="float-end btn btn-info"><i class="fas fa-file"></i> Reports</a>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                                    <table id="verified" class="table table-striped table-bordered table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Room Number</th>
                                                <th>name</th>
                                                <th>Quantity</th>
                                                <th>Total Expense</th>
                                                <th>Distributed at</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
<?php                                   foreach($inventory as $vdata){
?>                                        <tr>
                                            
                                            <td><?=$vdata['room_number']?></td>
                                            <td><?=$vdata['name']?></td>
                                            <td><?=$vdata['qty']?></td>
                                            <td><?=$vdata['total_expense']?></td>
                                            <td><?=$vdata['created_at']?></td>
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