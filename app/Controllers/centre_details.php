<?php

namespace App\Controllers;
use App\Models\centre;
use App\Models\centre_subject_requirement;

class centre_details extends BaseController
{
    public function __construct()
    {
        $this->centreModel = new centre();
        $this->requiredSubjectModel = new centre_subject_requirement();
    }

    public function Detail($centre_id)
    {
        $data['schoolDetail'] = $this->centreModel->load_school_detail($centre_id); //load school detail
        $data['schoolImage'] = $this->centreModel->load_school_image($centre_id); //load school detail
        $data['schoolFacilities'] = $this->centreModel->load_school_facilities($centre_id); //load school facilities
        $data['schoolPracticumFor'] = $this->centreModel->load_school_practicum($centre_id); //load school practicum required
        $data['subjectsNeeded'] = $this->requiredSubjectModel->load_needed_subject($centre_id); //load school practicum required
        return view('centre_details', $data);
    }

    public function Detail2($centre_id2)
    {
        $data['companyDetail'] = $this->centreModel->load_company_detail($centre_id2); //load company detail
        $data['companyImage'] = $this->centreModel->load_company_image($centre_id2); //load company image
        $data['companyFacilities'] = $this->centreModel->load_company_facilities($centre_id2); //load company facilities
        return view('centre_details2', $data);
    }
}