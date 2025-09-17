<?php

$routes->group('industry',['namespace' => 'Modules\industry\Controllers'],function($routes){


    $routes->get('/','Main::main' );  // base_url/school/
    $routes->post('update','updateCentre::updateCentre' );  // update Centre Detail
 
});