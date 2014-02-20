<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = "login";
$route['404_override'] = '';
$route["login"]='login/login_form';
$route["admin"]='admin/dashboard';
$route["user"]='user/dashboard';
$route["viewusers"]='admin_users/viewusers';
$route['createuser']='admin_users/createuser';
$route["viewbooks"]='admin_books/viewbooks';
$route["view_user_books"]='user_books/view_user_books';
$route["assigned_books"]='user_books/assigned_books';
$route["request"]='user_books/request';
$route["cancel_request"]='user_books/cancel_request';
$route['edituser']='admin_users/edituser';
$route["addbooks"]='admin_books/addbooks';
$route["editbooks"]='admin_books/editbooks';
$route["request_details"]='admin_books/request_details';
$route["deletebooks"]='admin_books/deletebooks';
$route["assign_books"]='admin_books/assign_books';
$route["return_book"]='admin_books/return_book';
$route["assigned_user_records"]='admin_books/assigned_user_records';

        
//$route['(:any)'] = 'login/login_form';
 //$route['(:any)'] = "login/";

 //$route['login/login_form'] = "#";
// $route['http://localhost/lms/index.php/login/(:any)'] = "home";
/* End of file routes.php */
/* Location: ./application/config/routes.php */