<?php

$routes->group('school',['namespace' => 'Modules\school\Controllers'],function($routes){


    $routes->get('/','Main::main' );  // base_url/school/
 
});