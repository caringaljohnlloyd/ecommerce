<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/signup', 'Home::register');
$routes->post('/signin', 'Home::LoginAuth');


$routes->get('/user', 'Home::home');
$routes->get('/shop', 'Home::shop');
$routes->get('/about', 'Home::about');
$routes->get('/blog', 'Home::blog');
$routes->get('/contact', 'Home::contact');

$routes->get('/sidebar', 'AdminController::admin',['filter'=>'authGuard']);
$routes->get('/adminchart/chart', 'AdminController::adminch',['filter'=>'authGuard']);
$routes->get('/admintable/table', 'AdminController::admintab',['filter'=>'authGuard']);
$routes->get('/admininventory/inventory', 'AdminController::inventory',['filter'=>'authGuard']);
$routes->post('/admininventory/add', 'AdminController::add',['filter'=>'authGuard']);
$routes->post('/admininventory/update/(:num)', 'AdminController::edit/$1',['filter'=>'authGuard']);
$routes->get('/admininventory/delete/(:num)', 'AdminController::delete/$1',['filter'=>'authGuard']);

$routes->get('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');






