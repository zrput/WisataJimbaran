<?php

use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(true);
/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->setDefaultController('User');
// $routes->setDefaultMethod('main');

// Default routes
// $routes->get('/', 'Home::index');
// $routes->setDefaultMethod('main');

// Add routes for profile settings
$routes->get('auth/profileSettings', 'Auth::profileSettings');
$routes->post('auth/updateProfile', 'Auth::updateProfile');
$routes->get('auth/confirmPassword', 'Auth::confirmPassword');
$routes->post('auth/verifyPassword', 'Auth::verifyPassword');
$routes->get('user/pesanan', 'User::pesanan');
$routes->get('user/cancelReservation/(:num)', 'User::cancelReservation/$1');
