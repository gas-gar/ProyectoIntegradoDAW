<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['bienvenido'] = 'AdminController/bienvenido';
/** LOGIN */
$route['admin/login'] = 'AdminController/login';
$route['login/error'] = 'AdminController/login';//error de usuario o pass
$route['admin/login2'] = 'AdminController/login2';
$route['login/login2'] = 'AdminController/login2';//después del error
$route['admin'] = 'AdminController/index';
$route['admin/registro'] = 'AdminController/registro';
$route['add_cliente'] = 'AdminController/add_cliente';
/** RESERVAS */
$route['reserva'] = 'AdminController/reserva';
$route['add_reserva'] = 'AdminController/add_reserva';
$route['reserva/error'] = 'AdminController/reserva';
$route['reserva/exito'] = 'AdminController/exito';
$route['modificar_reserva'] = 'AdminController/modificar_reserva';
/** AJAX */
$route['ajax/(:any)'] = 'AdminController/ajax';

$route['salir'] = 'AdminController/salir';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
