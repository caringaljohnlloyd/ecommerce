<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/shop', 'Home::shop');
$routes->get('/about', 'Home::about');
$routes->get('/blog', 'Home::blog');
$routes->get('/contact', 'Home::contact');

$routes->get('/admin', 'AdminController::admin');
$routes->get('/sidebar', 'AdminController::admin');
$routes->get('/adminchart/chart', 'AdminController::adminch');
$routes->get('/admintable/table', 'AdminController::admintab');


$routes->get('/admininventory/inventory', 'AdminController::inventory');

$routes->post('/admininventory/add', 'AdminController::add');
$routes->post('/admininventory/update/(:num)', 'AdminController::edit/$1');
$routes->get('/admininventory/delete/(:num)', 'AdminController::delete/$1');



$routes->get('register', 'Home::register');
$routes->post('register', 'Home::doRegister');

$routes->get('login', 'Home::login');
$routes->post('login', 'Home::doLogin');



