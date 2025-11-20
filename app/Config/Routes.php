<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');
$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');

$routes->get('/register', 'Auth::regview');
$routes->post('/auth/register', 'Auth::register');

$routes->get('/auth/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/users', 'Users::index');
$routes->get('/users/add', 'Users::add');
$routes->post('/users/insert', 'Users::insert');
// $routes->get('users/view/(:num)', 'Users::view/$1');
// $routes->get('users/edit/(:num)', 'Users::edit/$1');
// $routes->post('users/update/(:num)', 'Users::update/$1');
// $routes->get('users/delete/(:num)', 'Users::delete/$1');

$routes->get('/equipments', 'Equipments::index');
$routes->get('/equipments/add', 'Equipments::add');
$routes->post('/equipments/insert', 'Equipments::insert');



$routes->get('/borrowItem', 'Equipments::index');
$routes->get('/returnItem', 'Equipments::index');
$routes->get('/borrow', 'Equipments::borrowview');
$routes->get('/return', 'Equipments::returnview');
$routes->get('/reserve', 'Equipments::reserveview');

