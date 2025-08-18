<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function Homepage(): string
    {
        return view('testing/index');
    }
    public function Home(): string
    {
        return view('Home');
    }
    public function centredetails(): string
    {
        return view('centre_details');
    }
}
