<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

//public routes
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->post('/contact', 'Home::sendContact');
$routes->get('/products', 'Home::products');
$routes->get('/products/(:num)', 'Home::productDetail/$1');

//Auth routes
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerUser');
$routes->get('/logout', 'Auth::logout');

//Protected routes - all logged in users
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'dashboard::index');
    $routes->get('/profile', 'Dashboard::profile');
    $routes->post('/my-orders', 'Dashboard::myOrders');
});

//Editor + admin routes
$routes->group('', ['filter' => 'role:editor,admin'], function($routes){
    routes->get('/products/create', 'Products::create');
    routes->post('/products/create', 'Products::store');
    routes->get('/products/edit/(:num)', 'Products::edit/$1');
    routes->post('/products/edit/(:num)', 'Products::update/$1');
    routes->post('/products/delete/(:num)', 'Products::delete/$1');
});

//Admin only routes
$routes->group('', ['filter' => 'role:admin'], function($routes){
    $routes->get('/admin', 'Admin::index');
    $routes->get('/admin/users', 'Admin::users');
    $routes->get('/admin/orders', 'Admin::orders');
    $routes->post('/admin/orders/(:num)', 'Admin::updateStatus/$1');
    $routes->post('/admin/orders/status/(:num)', 'Admin::updateStatus/$1');
    $routes->post('/admin/users/(:num)/delete', 'Admin::deleteUser/$1');
});
