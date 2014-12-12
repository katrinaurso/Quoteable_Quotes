<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users";
$route['register'] = "users/register";
$route['login'] = "users/login";
$route['logout'] = "users/logout";

$route['quotes'] = "quotes";
$route['add'] = "quotes/add_quote";
$route['add_to'] = "quotes/add_to_favorites";
$route['remove_from'] = "quotes/remove_from_favorites";
$route['404_override'] = '';
