<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$error = $this->session->flashdata('error');
?>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Casarosa</a>
                <a href="/users" accesskey="l"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-5" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://casarosa.local/#header">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://casarosa.local/#services">Services</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://casarosa.local/#book">Check Availability</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <section class = "rooms sec-width" id = "rooms">
            <div class = "title d-inline-block position-top">
                <h1 class="text-dark">ROOMS</h>
            </div>
            <div class="d-inline-block ms-5 position-top">
                <div class="alert-info p-2">
                    <h3>Available room of
<?php               if($this->session->userdata('roomtype') === '1'){
?>                  Junior Room
<?php
                    }
                    elseif($this->session->userdata('roomtype') === '2'){
?>                  Standard Room
<?php               }
                    elseif($this->session->userdata('roomtype') === '3'){
?>                  Intermediate Room
<?php               }
                    elseif($this->session->userdata('roomtype') === '4'){
?>                  Twin Room                        
<?php               }
                    elseif($this->session->userdata('roomtype') === '5'){
?>                  Family Room  
<?php               }
?>                    from: <strong><?=date('m-d-Y', strtotime($this->session->userdata('checkin')))?></strong> to: <strong><?=date('m-d-Y', strtotime($this->session->userdata('checkout')))?></strong>
                </h3>
                </div>
            </div>
            <div class = "rooms-container">
<?php           if(!empty($available)){
                    foreach($available as $data){
?>                    <!-- single room -->
                    <article class = "room">
<?php                       if($data['room_type'] === '1'){
?>                        <div class = "room-image">
                            <img class="room_img" src = "/assets/images/rooms/room6.jpg" alt = "Junior">
                        </div>
                        <div class = "room-text">
                            <h2>Junior Room <?=$data['room_number']?></h2>
                            <ul>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Good for 2 persons
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Can not add extra bed
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    with breakfast
                                </li>
                            </ul>
                            
                            <p class = "rate">
                                start of <span>P1,550.00 /</span> Per Night
                            </p>
                            <p>Rates inclusive of breakfast</p> 
                            <ul>
                                <li>
                                    Extra bet - <strong>P300.00</strong>
                                </li>
                                <li>
                                    Extra person - <strong>P200.00</strong>
                                </li>
                                <li>
                                    Extra breakfast - <strong>P170.00</strong>
                                </li>
                                <li>
                                    Extra hour - <strong>P200.00/hr</strong>
                                </li>
                            </ul>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#apply" onclick="showRoom('<?=$data['id']?>')">book now</button>
                        </div>
                    </article>
                    <!-- end of single room -->
<?php                       }
                            elseif($data['room_type'] === '2'){
?>                        <div class = "room-image">
                            <img class="room_img" src = "/assets/images/rooms/room2.jpg" alt = "Standard">
                        </div>
                        <div class = "room-text">
                            <h2>Standard Room <?=$data['room_number']?></h2>
                            <ul>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Good for 2 persons
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Can add 1 extra bed
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    with breakfast
                                </li>
                            </ul>
                            
                            <p class = "rate">
                                start of <span>P1,650.00 /</span> Per Night
                            </p>
                            <p>Rates inclusive of breakfast</p> 
                            <ul>
                                <li>
                                    Extra bet - <strong>P300.00</strong>
                                </li>
                                <li>
                                    Extra person - <strong>P200.00</strong>
                                </li>
                                <li>
                                    Extra breakfast - <strong>P170.00</strong>
                                </li>
                                <li>
                                    Extra hour - <strong>P200.00/hr</strong>
                                </li>
                            </ul>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#apply" onclick="showRoom('<?=$data['id']?>')">book now</button>
                        </div>
                    </article>
                    <!-- end of single room -->

                    <?php                       }
                            elseif($data['room_type'] === '3'){
?>                        <div class = "room-image">
                            <img class="room_img" src = "/assets/images/rooms/room5.jpg" alt = "Intermediate">
                        </div>
                        <div class = "room-text">
                            <h2>Intermediate Room <?=$data['room_number']?></h2>
                            <ul>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Good for 2 persons
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Can add 2 extra bed
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    with breakfast
                                </li>
                            </ul>
                            
                            <p class = "rate">
                                start of <span>P1,800.00 /</span> Per Night
                            </p>
                            <p>Rates inclusive of breakfast</p> 
                            <ul>
                                <li>
                                    Extra bet - <strong>P300.00</strong>
                                </li>
                                <li>
                                    Extra person - <strong>P200.00</strong>
                                </li>
                                <li>
                                    Extra breakfast - <strong>P170.00</strong>
                                </li>
                                <li>
                                    Extra hour - <strong>P200.00/hr</strong>
                                </li>
                            </ul>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#apply" onclick="showRoom('<?=$data['id']?>')">book now</button>
                        </div>
                    </article>
                    <!-- end of single room -->

                    <?php                       }
                            elseif($data['room_type'] === '4'){
?>                        <div class = "room-image">
                            <img class="room_img" src = "/assets/images/rooms/room7.jpg" alt = "Twin">
                        </div>
                        <div class = "room-text">
                            <h2>Twin Room <?=$data['room_number']?></h2>
                            <ul>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Good for 2 persons
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Can add 1 extra bed
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    with breakfast
                                </li>
                            </ul>
                            
                            <p class = "rate">
                                start of <span>P1,790.00 /</span> Per Night
                            </p>
                            <p>Rates inclusive of breakfast</p> 
                            <ul>
                                <li>
                                    Extra bet - <strong>P300.00</strong>
                                </li>
                                <li>
                                    Extra person - <strong>P200.00</strong>
                                </li>
                                <li>
                                    Extra breakfast - <strong>P170.00</strong>
                                </li>
                                <li>
                                    Extra hour - <strong>P200.00/hr</strong>
                                </li>
                            </ul>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#apply" onclick="showRoom('<?=$data['id']?>')">book now</button>
                        </div>
                    </article>
                    <!-- end of single room -->

                    <?php                       }
                            elseif($data['room_type'] === '5'){
?>                        <div class = "room-image">
                            <img class="room_img" src = "/assets/images/rooms/room4.jpg" alt = "Family">
                        </div>
                        <div class = "room-text">
                            <h2>Family Room <?=$data['room_number']?></h2>
                            <ul>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Good for 4 persons
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    Can add 2 extra bed
                                </li>
                                <li>
                                    <i class = "fas fa-arrow-alt-circle-right"></i>
                                    with breakfast
                                </li>
                            </ul>
                            
                            <p class = "rate">
                                start of <span>P2,495.00 /</span> Per Night
                            </p>
                            <p>Rates inclusive of breakfast</p> 
                            <ul>
                                <li>
                                    Extra bet - <strong>P300.00</strong>
                                </li>
                                <li>
                                    Extra person - <strong>P200.00</strong>
                                </li>
                                <li>
                                    Extra breakfast - <strong>P170.00</strong>
                                </li>
                                <li>
                                    Extra hour - <strong>P200.00/hr</strong>
                                </li>
                            </ul>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#apply" onclick="showRoom('<?=$data['id']?>')">book now</button>
                        </div>
                    </article>
                    <!-- end of single room -->
<?php               }

                         }
                }
                else{
?>               <div class="row">
                    <h1>No Available room on that date range</h1>
                    <p>Please <a href="te:09153802270">contact us</a> if you want to split rooms within your stay</p>
                </div>
<?php       }
?>
               
            </div>
        </section>

        <!-- Modal Apply-->
        <div class="modal fade" id="book_details" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Reservation Information</h5>
                        <!-- <button id="book_details_close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        <a href="http://casarosa.local/#book" id="backbookbtn" class="badge bg-primary p-3">Check new availability</a>
                    </div>
                    <div class="modal-body">
                        <form id="book_details" action="/reservations/process_booking" method="post">
                            <div class="details" id="body-apply">
                                <div class="row">
                                    <div class="col-sm mt-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <form id="book_info" action="" method="post">
                                                <small>
                                                    <strong>Note:</strong> This data may change upon checking availability but here you can add extras in yoor rooms
                                                </small>
                                                <div id="room_details">
                                                </div>
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="check_in">Check In:</label>
                                                            <input type="date" name="check_in" class="form-control" value="<?=$this->session->userdata('checkin')?>" readonly>
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="check_out">Check Out:</label>
                                                            <input type="date" name="check_out" class="form-control" value="<?=$this->session->userdata('checkout')?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="adult">Adult:</label>
                                                            <input type="number" name="adult" class="form-control" min="1" value="<?=$this->session->userdata('adult')?>" readonly>
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="children">Children:</label>
                                                            <input type="number" name="children" class="form-control" min="0" value="<?=$this->session->userdata('children')?>" readonly>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm mt-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="personal_info">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                            <button type="submit" id="reservebtn" class="btn btn-primary w-100">
                                                <span class="spinner-border spinner-border-sm" id="spin" role="status" aria-hidden="true"></span>
                                                Reserve
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



       
        
      