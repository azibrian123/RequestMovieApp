<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Customer::index');
$routes->get('/register', 'Home::register');
$routes->get('/customer', 'Home::customer');

// Admin
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/customers', 'Admin\Customers::index', ['filter' => 'role:admin']);
$routes->get('/admin/customer/create', 'Admin\Customers::create', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);

$routes->get('/admin/videos', 'Admin\Videos::index', ['filter' => 'role:admin']);
$routes->get('/admin/video/create', 'Admin\Videos::create', ['filter' => 'role:admin']);
$routes->post('/admin/video/save', 'Admin\Videos::save', ['filter' => 'role:admin']);
$routes->get('/admin/video/edit/(:num)', 'Admin\Videos::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/video/update/(:num)', 'Admin\Videos::update/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/video/(:num)', 'Admin\Videos::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/video/(:num)', 'Admin\Videos::detail/$1', ['filter' => 'role:admin']);

$routes->get('/admin/requestvideos', 'Admin\RequestedVideos::index', ['filter' => 'role:admin']);
$routes->get('/admin/requestvideos/detail/(:num)', 'Admin\RequestedVideos::detail/$1', ['filter' => 'role:admin']);
$routes->post('/admin/requestvideos/approve/(:num)', 'Admin\RequestedVideos::approve/$1', ['filter' => 'role:admin']);

// Customer
$routes->get('/customer/videos', 'Customer\Customers::allVideos', ['filter' => 'role:customer']);
$routes->post('/customer/request/(:num)', 'Customer\Customers::makeRequest/$1', ['filter' => 'role:customer']);
$routes->get('/customer/myrequest', 'Customer\Customers::myRequestVideos', ['filter' => 'role:customer']);
$routes->get('/customer/myvideos', 'Customer\Customers::myVideos', ['filter' => 'role:customer']);
