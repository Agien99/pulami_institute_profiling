<?php

namespace App\Controllers;
use App\Models\centre;

class centre_details extends BaseController
{
    public function __construct()
    {
        $this->centreModel = new centre();
    }

    public function Detail($centre_id)
    {
        $data['schoolDetail'] = $this->centreModel->load_school_detail($centre_id); //load school detail
        $data['schoolImage'] = $this->centreModel->load_school_image($centre_id); //load school detail
        $data['schoolFacilities'] = $this->centreModel->load_school_facilities($centre_id); //load school facilities
        $data['schoolPracticumFor'] = $this->centreModel->load_school_practicum($centre_id); //load school practicum required
        return view('centre_details', $data);
    }
}