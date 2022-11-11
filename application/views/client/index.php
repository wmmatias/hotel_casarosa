<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$error = $this->session->flashdata('error');
$emailverified = $this->session->flashdata('email');
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
                        <a class="nav-link active" aria-current="page" href="#header">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#rooms">Rooms</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <header class = "header" id = "header">
<?php       if(!$error){

            }
            else{
?>          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?=$this->session->flashdata('error');?>
                <a href="#book">Check availability again?<i class="fas fa-arrow-down"></i></a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php       }
?> 
<?php       if(!$emailverified){

            }
            else{
?>          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?=$this->session->flashdata('email');?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
<?php       }
?>           <div class = "head-bottom flex">
                <h2>NICE AND COMFORTABLE PLACE TO STAY</h2>
                <h2 class="Hname">Casarosa Bed & Breakfast</h2>
                <a href="#book" class = "head-btn">BOOK NOW!</a>
            </div>
        </header>
        <!-- body content  -->
        <section class = "services sec-width" id = "services">
            <div class = "title">
                <h1 class="text-dark">services</h1>
            </div>
            <div class = "services-container">
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-utensils"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Food Service/ Food Runner</h2>
                        <p>casarosa has its own restaurant or kitchen that serves a variety of delicious dishes. it can be delivered to your room or eaten in the dining area. We also serve dishes requested by guests that are not on our menu</p>
                    </div>
                </article>
                <!-- end of single service -->
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-broom"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Housekeeping</h2>
                        <p>casarosa follows standards regarding cleanliness. we have cleaners every day who make sure that the things you need inside the room are clean and organized, you can even schedule the cleaning so that it is according to the time you want</p>
                    </div>
                </article>
                <!-- end of single service -->
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-door-closed"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Hotel & Room Security</h2>
                        <p>
                            casarosa follows security protocols for future guests and current guests management ensures that the security features of our establishment are always inspected for the benefit of our guests</p>
                    </div>
                </article>
                <!-- end of single service -->
            </div>
        </section>

        <div id="book" class = "book">
            <form class = "book-form" action="/reservations/validate" method="post">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                <div class = "form-item">
                    <label for = "check_in">Check In Date: </label>
                    <input type = "date" name="check_in" id = "chekin_date">
                    <?=$this->session->flashdata('check_in');?>
                    <?php echo form_error('check_in') ?>
                </div>
                <div class = "form-item">
                    <label for = "check_out">Check Out Date: </label>
                    <input type = "date" name="check_out" id = "chekout_date">
                    <?php echo form_error('check_out') ?>
                </div>
                <div class = "form-item">
                    <label for = "adult">Adults: </label>
                    <input type = "number" min = "1" name="adult" value = "1" id = "adult">
                    <?php echo form_error('adult') ?>
                </div>
                <div class = "form-item">
                    <label for = "children">Children: </label>
                    <input type = "number" min = "0" name="children" value = "0" id = "children">
                    <?php echo form_error('children') ?>
                </div>
                <div class = "form-item">
                    <label for = "rooms">Room Type: </label>
                    <select name="type" id="type">
                        <option value="0">-- Select Room Type --</option>
                        <option value="1">Junior Room</option>
                        <option value="2">Standard Room</option>
                        <option value="3">Intermediate Room</option>
                        <option value="4">Twin Room</option>
                        <option value="5">Family Room</option>
                    </select>
                    <?=$this->session->flashdata('room_type');?>
                </div>
                <div class = "form-item">
                    <input type = "submit" class = "btn" value="Check Availability">
                </div>
            </form>
        </div>



        <section class = "rooms sec-width" id = "rooms">
            <div class = "title">
                <h1 class="text-dark">ROOMS</h>
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
                            <!-- <form action="create_reservation" method="post"> 
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                                <input type="hidden" name="id" value="<?=$data['id']?>">
                                <input type="hidden" name="check_in" value="<?=$this->session->userdata('checkin')?>">
                                <input type="hidden" name="check_out" value="<?=$this->session->userdata('checkout')?>">
                                <input type="hidden" name="adult" value="<?=$this->session->userdata('adult')?>">
                                <input type="hidden" name="children" value="<?=$this->session->userdata('children')?>">
                                <input type="hidden" name="room_type" value="<?=$this->session->userdata('roomtype')?>"> -->
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#apply" onclick="showRoom('<?=$data['id']?>')">book now</button>
                                <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#book_details">book now</button> -->
                            <!-- </form> -->
                        </div>
                    </article>

                    <!-- Modal Apply-->
        <div class="modal fade" id="book_details" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Booking Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="details" id="body-apply">
                                <div class="row">
                                    <div class="col-sm mt-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="room_details">
                                                </div>
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="check_in">Check In:</label>
                                                            <input type="date" name="check_in" class="form-control" value="<?=$this->session->userdata('checkin')?>">
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="check_out">Check Out:</label>
                                                            <input type="date" name="check_out" class="form-control" value="<?=$this->session->userdata('checkout')?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="adult">Adult:</label>
                                                            <input type="number" name="adult" class="form-control" min="1" value="<?=$this->session->userdata('adult')?>">
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="children">Children:</label>
                                                            <input type="number" name="children" class="form-control" min="0" value="<?=$this->session->userdata('children')?>">
                                                        </div>
                                                    </div>
                                                <div class="row">
                                                    <div class="col form-group">
                                                        <label for="bed">Extra Bed:</label>
                                                        <input type="number" name="bed" class="form-control" min="0" value="0">
                                                        <?php echo form_error('bed') ?>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="person">Extra Person:</label>
                                                        <input type="number" name="person" class="form-control" min="0" value="0">
                                                        <?php echo form_error('person') ?>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="breakfast">Extra B-Fast:</label>
                                                        <input type="number" name="breakfast" class="form-control" min="0" value="0">
                                                        <?php echo form_error('breakfast') ?>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="hour">Extra Hour:</label>
                                                        <input type="number" name="hour" class="form-control" min="0" value="0">
                                                        <?php echo form_error('hour') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm mt-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="new_address" name="new" value="new">
                                                    <label class="form-check-label" for="new_address">New Address</label>
                                                </div> -->
                                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                                                <div class="form-group">
                                                    <label for="firstname">First Name:</label>
                                                    <input type="text" name="firstname" class="form-control" placeholder="First Name">
                                                    <?php echo form_error('firstname') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname">Last Name:</label>
                                                    <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                                                    <?php echo form_error('lastname') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                                                    <?php echo form_error('phone') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                                    <?php echo form_error('email') ?>
                                                </div>
                                                <button class="btn btn-primary">Book</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



                    <!-- end of single room -->
<?php                       }
                            else if($data['room_type'] === '2'){
?>                            <img class="room_img" src = "/assets/images/rooms/room2.jpg" alt = "Standard">
<?php                       }
                            else if($data['room_type'] === '3'){
?>                            <img class="room_img" src = "/assets/images/rooms/room5.jpg" alt = "Intermediate">
<?php                       }
                            else if($data['room_type'] === '4'){
?>                            <img class="room_img" src = "/assets/images/rooms/room7.jpg" alt = "Twin">
<?php                       }
                            else if($data['room_type'] === '5'){
?>                            <img class="room_img" src = "/assets/images/rooms/room4.jpg" alt = "Family">
<?php                       }
                         }
                }
                else{
?>                <!-- single room -->
                <article class = "room">
                    <div class = "room-image">
                        <img class="room_img" src = "/assets/images/rooms/room6.jpg" alt = "Junior">
                    </div>
                    <div class = "room-text">
                        <h2>Junior</h2>
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
                        <a href="http://casarosa.local/#book" class="btn btn-primary">Book Now</a>
                        <!-- <a href="http://casarosa.local/#book" class="btn btn-primary">Book Now</a> -->
                    </div>
                </article>
                <!-- end of single room -->
                <!-- single room -->
                <article class = "room">
                    <div class = "room-image">
                        <img class="room_img" src = "/assets/images/rooms/room2.jpg" alt = "standard">
                    </div>
                    <div class = "room-text">
                        <h2>Standard</h2>
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
                        <a href="http://casarosa.local/#book" class="btn btn-primary">Book Now</a>
                    </div>
                </article>
                <!-- end of single room -->
                <!-- single room -->
                <article class = "room">
                    <div class = "room-image">
                        <img class="room_img" src = "/assets/images/rooms/room5.jpg" alt = "Intermediate">
                    </div>
                    <div class = "room-text">
                        <h2>Intermediate</h2>
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
                        <a href="http://casarosa.local/#book" class="btn btn-primary">Book Now</a>
                    </div>
                </article>
                <!-- end of single room -->
                <!-- single room -->
                <article class = "room">
                    <div class = "room-image">
                        <img class="room_img" src = "/assets/images/rooms/room7.jpg" alt = "Twin">
                    </div>
                    <div class = "room-text">
                        <h2>Twin Room</h2>
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
                        <a href="http://casarosa.local/#book" class="btn btn-primary">Book Now</a>
                    </div>
                </article>
                <!-- end of single room -->
                <!-- single room -->
                <article class = "room">
                    <div class = "room-image">
                        <img class="room_img" src = "/assets/images/rooms/room4.jpg" alt = "Family">
                    </div>
                    <div class = "room-text">
                        <h2>Family Room</h2>
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
                        <a href="http://casarosa.local/#book" class="btn btn-primary">Book Now</a>
                    </div>
                </article>
                <!-- end of single room -->
<?php       }
?>
               
            </div>
        </section>