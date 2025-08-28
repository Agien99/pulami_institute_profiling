<?php

namespace App\Controllers;
use App\Models\state;
use App\Models\practicumType;

class Home extends BaseController
{

    protected $stateModel;
    protected $practicumTypeModel;

    public function __construct()
    {
        $this->stateModel = new state();
        $this->practicumTypeModel = new practicumType();
    }

    public function Home()
    {
        $data['state'] = $this->stateModel->load_state(); //load state
        $data['tag'] = $this->practicumTypeModel->load_tag();
        return view('Home', $data);
    }
    public function centredetails(): string
    {
        return view('centre_details');
    }
}
