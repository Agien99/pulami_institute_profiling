<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::Home');
// $routes->get('Homepage', 'Home::Homepage');
$routes->get('home', 'Home::Home');
$routes->get('centre_details2', 'centre_details2::Detail2');
$routes->get('more', 'More_Company::More');
$routes->get('area', 'AreaSearch::Area');
$routes->get('detail', 'centre_details::Detail');
$routes->get('login', 'login::login');
