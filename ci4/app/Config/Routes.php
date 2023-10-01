<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->match(['get', 'post'], '/signup', 'Home::register');
$routes->post('/signin', 'UserController::LoginAuth');


$routes->get('/user', 'Home::home',['filter'=>'authGuard']);

$routes->get('/shop', 'Home::shop',['filter'=>'authGuard']);
$routes->get('/about', 'Home::about',['filter'=>'authGuard']);
$routes->get('/blog', 'Home::blog',['filter'=>'authGuard']);
$routes->get('/contact', 'Home::contact',['filter'=>'authGuard']);

$routes->get('/sidebar', 'AdminController::admin',['filter'=>'authGuard']);
$routes->get('/adminchart/chart', 'AdminController::adminch',['filter'=>'authGuard']);
$routes->get('/admintable/table', 'AdminController::admintab',['filter'=>'authGuard']);


$routes->get('/admininventory/inventory', 'AdminController::inventory',['filter'=>'authGuard']);

$routes->post('/admininventory/add', 'AdminController::add',['filter'=>'authGuard']);
$routes->post('/admininventory/update/(:num)', 'AdminController::edit/$1');
$routes->get('/admininventory/delete/(:num)', 'AdminController::delete/$1');






