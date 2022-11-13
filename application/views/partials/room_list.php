<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$error = $this->session->flashdata('error');
?>                                  

<?php       if(!$error){

}
else{
?>          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?=$this->session->flashdata('error');?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php       }
?>                                    
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Room Number</th>
                                                    <th>Room Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php                                       if(empty($list)){
?>		                                      <tr>
                                                <td colspan="3">No Records Found</td>
                                            </tr>
<?php						                }
                                            else{
                                                foreach($list as $data){
?>                                                <tr>
                                                    <td><?=$data['room_number']?></td>
                                                    <td>
<?php                                                   if($data['room_type'] === '1'){
?>                                                          Junior Room
<?php                                                   }
                                                        elseif($data['room_type'] === '2'){
?>                                                          Standard Room
<?php                                                   }
                                                        elseif($data['room_type'] === '3'){
?>                                                          Intermediate Room
<?php                                                   }
                                                        elseif($data['room_type'] === '4'){
?>                                                          Twin Room
<?php                                                   }
                                                        elseif($data['room_type'] === '5'){
?>                                                          Family Room
<?php                                                   }                               
?>                                                  </td>
                                                    <td>
                                                        <a href="/reservations/admin_booked/<?=$data['id']?>" class="text-xxsm btn btn-primary" tabindex="0" data-toggle="tooltip" data-original-title="Edit" data-placement="left">Booked</a>
                                                    </td>
                                                </tr>
<?php                                           }
                                            }
?>                                            </tbody>
                                        </table>
                                    </div>