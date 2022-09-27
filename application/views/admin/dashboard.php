<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>    <div class="container-fluid px-4">
        
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Upcoming Guest
                    </div>
                    <div class="card-body">
                        <table id="upcoming">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Room</th>
                                    <th>Contact No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Juan Dela Cruz</td>
                                    <td>10/01/2022</td>
                                    <td>10/03/2022</td>
                                    <td>Regular</td>
                                    <td>090909090909</td>
                                </tr>
                                <tr>
                                    <td>Juan Tamad</td>
                                    <td>11/24/2022</td>
                                    <td>11/23/2022</td>
                                    <td>Regular</td>
                                    <td>090909090909</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Guest Today
                    </div>
                    <div class="card-body">
                        <table id="current">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Room #</th>
                                    <th>Number of guest</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>102</td>
                                    <td>1</td>
                                    <td>09/27/2022</td>
                                    <td>09/27/2022</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>202</td>
                                    <td>2</td>
                                    <td>09/27/2022</td>
                                    <td>10/10/2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Available rooms today
                    </div>
                    <div class="card-body">
                        <table id="rooms">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Capacity</th>
                                    <th>Bed</th>
                                    <th>Room #</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Twin Room</td>
                                    <td>Deluxe</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>201</td>
                                    <td>1500</td>
                                </tr>
                                <tr>
                                    <td>Pang Masa</td>
                                    <td>Regular</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>101</td>
                                    <td>150</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-simple me-1"></i>
                        Hotel Stats Today
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-users"></i>
                                    <h1 class="card-title">0</h1>
                                    <p>Booked</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-user"></i>
                                    <h1 class="card-title">0</h1>
                                    <p>Guest</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-utensils"></i>
                                    <h1 class="card-title">0</h1>
                                    <p>Food</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="stats card-body text-center">
                                    <i class="fas fa-bed"></i>
                                    <h1 class="card-title">0</h1>
                                    <p>Rooms</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>