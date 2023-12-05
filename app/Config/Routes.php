<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'user::index');
$routes->get('/admin', 'Admin::index', ['filter' => 'role:Admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:Admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:Admin']);
$routes->add('/performance', 'performance::Index');
$routes->get('/performance/(:num)', 'performance::detail/$1');
$routes->get('/performance/(:num)', 'performance::edit/$1');
