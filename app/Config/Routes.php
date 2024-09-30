<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'UsersControl::login');
$routes->post('/login', 'UsersControl::loginSubmit');

$routes->get('/singin', 'UsersControl::singin');
$routes->post('/singin', 'UsersControl::singinSubmit');