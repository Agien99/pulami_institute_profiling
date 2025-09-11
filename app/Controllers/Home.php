<?php

namespace App\Controllers;
use App\Models\state;
use App\Models\practicumType;
use App\Models\centre;

class Home extends BaseController
{

    protected $stateModel;
    protected $practicumTypeModel;

    public function __construct()
    {
        $this->stateModel = new state();
        $this->practicumTypeModel = new practicumType();
        $this->centreModel = new centre();
    }

    public function Home()
    {
        $data['state'] = $this->stateModel->load_state(); //load state
        $data['tag'] = $this->practicumTypeModel->load_tag(); //load tag
        $data['schoolList'] = $this->centreModel->load_school_list(); //load school list
        $data['schoolList1'] = $this->centreModel->load_school_list(); //load school list
        return view('Home', $data);
    }
    public function centredetails(): string
    {
        return view('centre_details');
    }
}
