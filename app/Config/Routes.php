<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');
$routes->get('login', 'Auth::index');
$routes->post('auth/login', 'Auth::login');

$routes->get('register', 'Auth::regview');
$routes->post('auth/register', 'Auth::register');

$routes->get('auth/logout', 'Auth::logout');

$routes->get('dashboard', 'Dashboard::index'); //leads to all kinds of dashboard

// ========================USERS==================================

$routes->get('/users', 'Users::index'); //view leads to user dashboard
// $routes->get('/users/add', 'Users::add');
// $routes->post('/users/insert', 'Users::insert');
$routes->get('users/view/(:num)', 'Users::view/$1');//view

$routes->get('users/edit/(:num)', 'Users::edit/$1');//view
$routes->post('users/update/(:num)', 'Users::update/$1'); //not view

$routes->get('users/delete/(:num)', 'Users::delete/$1');

// ========================EQUIPMENTS==================================

$routes->get('equipments', 'Equipments::index'); //view

$routes->get('equipments/add', 'Equipments::add'); //view
$routes->post('equipments/insert', 'Equipments::insert'); //not view

$routes->get('equipments/view/(:num)', 'Equipments::view/$1'); // view

$routes->get('equipments/edit/(:num)', 'Equipments::edit/$1');
$routes->post('equipments/update/(:num)', 'Equipments::update/$1');

$routes->get('equipments/delete/(:num)', 'Equipments::delete/$1');

// ========================RESERVATIONS==================================

$routes->get('reservation/view/(:num)', 'Reservation::view/$1');
$routes->get('reservation/edit/(:num)', 'Reservation::edit/$1');
$routes->post('reservation/update/(:num)', 'Reservation::update/$1');

// ========================BORROW==================================

$routes->get('/borrow/view', 'Borrow::view');
$routes->get('/borrow/edit', 'Borrow::edit');
$routes->get('/borrow/view/(:num)', 'Borrow::view/$1');
$routes->get('/borrow/edit/(:num)', 'Borrow::edit/$1');

$routes->post('/borrow/update/(:num)', 'Borrow::update/$1');

$routes->get('/borrow', 'Equipments::borrowview');
$routes->get('/return', 'Equipments::returnview');
$routes->get('/reserve', 'Equipments::reserveview');

// ========================PASSWORD==================================

$routes->get('password/forget', 'Password::forgetview'); // view
$routes->post('forget', 'Password::forget'); //not view

$routes->get('password/reset/(:any)', 'Password::resetview/$1'); // view
$routes->post('reset/(:any)', 'Password::reset/$1'); //not view

$routes->get('password/change', 'Password::changeview'); //view
$routes->post('passwordchange', 'Password::change'); //not view




