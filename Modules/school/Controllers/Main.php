<?php

namespace Modules\school\Controllers;
use App\Controllers\BaseController;

 class Main extends BaseController
 {
    public function __construct()
    {
        $this->session = service('session');
    }

    
    public function main() {
        echo('Logged in');
    }

 }