<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');
$routes->add('/performance', 'performance::Index');
$routes->get('/performance/(:num)', 'performance::detail/$1');
$routes->get('/performance/(:num)', 'performance::edit/$1');
