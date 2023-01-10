<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'clients';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['signin/validate'] = 'users/process_signin';
$route['dashboard/signoff'] = 'users/logoff';
$route['login'] = 'users';

$route['dashboard/employee'] = 'dashboard/employee';
$route['dashboard/reservation'] = 'dashboard/reservation';
$route['dashboard/rooms'] = 'dashboard/rooms';
$route['dashboard/inventory'] = 'dashboard/inventory';
$route['dashboard/kitchen'] = 'dashboard/kitchen';
$route['dashboard/dashboard'] = 'dashboard';
$route['dashboard/reservation_report'] = 'dashboard/reservation_report';
$route['dashboard/inventory_report'] = 'dashboard/inventory_report';
$route['dashboard/change_pass'] = 'dashboard/change_password';


$route['rooms/validate'] = 'rooms/adding_rooms_proccess';
$route['rooms/delete/(:any)'] = 'rooms/delete_rooms/$1';
$route['rooms/edit/(:any)'] = 'dashboard/rooms_edit/$1';

$route['users/validate'] = 'users/adding_user_proccess';
$route['users/delete/(:any)'] = 'users/delete_users/$1';
$route['users/ban/(:any)'] = 'users/block_users/$1';
$route['users/unban/(:any)'] = 'users/unblock_users/$1';
$route['users/edit/(:any)'] = 'dashboard/employee_edit/$1';
$route['users/validate_edit'] = 'users/edit_information_process';
$route['users/credentials'] = 'users/edit_credentials';

$route['reservations/validate'] = 'reservations/reserve_proccess';
$route['reservations/show/(:any)'] = 'reservations/room_show/$1';
$route['reservations/create'] = 'reservations/create_reservation';
$route['reservations/arrived/(:any)'] = 'reservations/arrived/$1';
$route['reservation/check_out/(:any)'] = 'reservations/check_out/$1';
$route['reservation/edit_in/(:any)'] = 'reservations/edit_in/$1';
$route['reservations/check_availability'] = 'reservations/check_availability';
$route['reservations/edit/(:any)'] = 'reservations/arrived_views/$1';
$route['reservations/cancel/(:any)'] = 'reservations/cancel_booking/$1';
$route['reservations/admin_booked/(:any)'] = 'reservations/admin_booked/$1';
$route['reservations/admin_validate'] = 'reservations/admin_validate';
