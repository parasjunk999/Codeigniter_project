<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->setAutoRoute(true);



$routes->get('login', 'Login::index');
$routes->get('register', 'Register::index');
$routes->get('profile', 'Profile::index');
$routes->get('pixabaysearch', 'PixabaySearch::index');

$routes->post('login', 'Login::do_login');
$routes->post('register', 'Register::do_register');
$routes->post('profile/update', 'Profile::updateProfile');
