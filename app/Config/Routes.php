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
$routes->get('detail/(:num)', 'centre_details::Detail/$1');
$routes->get('detail2/(:num)', 'centre_details::Detail2/$1');
$routes->post('login', 'Login::login');
$routes->get('logout', 'AuthController::logout');

//routing for modules setup
foreach(glob(ROOTPATH.'/Modules/*/Config/Routes.php') as $file) {
    require $file;    
}