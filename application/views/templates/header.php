<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$current_user_id = $this->session->userdata('user_id');
$page = $this->session->userdata('page');
$fullname = $this->session->userdata('fullname');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="/assets/js/App.js"></script>
    <title>Hotel Casarosa</title>
    <script>
		function updateNewPrice() {
            var total = document.getElementById('amount').value;
			var package = document.getElementById('package').value;
            document.getElementById('amount').value = package;
			// var discountPrct = document.getElementById('percent').value;
			// if (!isNaN(oldPrice) && !isNaN(discountPrct)) {
			// 	//var discount = (oldPrice / 100) * discountPrct;
			// 	var count = (discountPrct / 100) * oldPrice;
			// 	var discount = oldPrice - count;
			// 	if (discount > 0)
			// 		document.getElementById('new_price').value = discount;
			// }
		}
	</script>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/dashboard/dashboard"><i class="fas fa-hotel"></i> Hotel Casarosa</a>
<?php
        if(!$current_user_id) { 
        }
        else{
?>        <a class="nav-link position-absolute end-0 me-3" href="/dashboard/signoff"><?=$fullname?> <i class="fas fa-power-off"></i></a>
<?php
        }
?>    </nav>
<?php
        if(!$current_user_id) { 
        }
        else{
?>    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                <li <?= ($page === 'dashboard') ? 'class="active"' : '' ?> ><a href="/dashboard/dashboard"><i class="fas fa-dashboard"></i><span>Dashboard</span> </a> </li>
                <li <?= ($page === 'employee') ? 'class="active"' : '' ?> ><a href="/dashboard/employee"><i class="fas fa-users"></i><span>Employee</span> </a> </li>
                <li <?= ($page === 'reservation') ? 'class="active"' : '' ?> ><a href="/dashboard/reservation"><i class="fas fa-list-alt"></i><span>Reservation</span> </a> </li>
                <li <?= ($page === 'rooms') ? 'class="active"' : '' ?> ><a href="/dashboard/rooms"><i class="fas fa-bed"></i><span>Rooms</span> </a> </li>
                <li <?= ($page === 'inventory') ? 'class="active"' : '' ?> ><a href="/dashboard/inventory"><i class="fas fa-warehouse"></i><span>Inventory</span> </a> </li>
                </ul>
            </div>
        </div>
        <!-- /subnavbar-inner --> 
    </div>
<?php
        }
?>