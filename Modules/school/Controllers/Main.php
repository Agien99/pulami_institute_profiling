<?php

namespace Modules\school\Controllers;
use App\Controllers\BaseController;
use Modules\school\Models\centre;
use Modules\school\Models\state;
use Modules\school\Models\city;
use Modules\school\Models\school_type;
use Modules\school\Models\school_location;
use Modules\school\Models\li_sector;
use Modules\school\Models\li_industry;
use Modules\school\Models\practicum_type;
use Modules\school\Models\centre_subject_requirement;
use Modules\school\Models\teach_subject;

 class Main extends BaseController
 {
    public function __construct()
    {
        $this->session = service('session');

        //Load Models
        $this->centreModel = new centre();
        $this->stateModel = new state();
        $this->cityModel = new city();
        $this->schoolTypeModel = new school_type();
        $this->schoolLocationModel = new school_location();
        $this->sectorModel = new li_sector();
        $this->industryTypeModel = new li_industry();
        $this->practicumTypeModel = new practicum_type();
        $this->centreSubjectRequirementModel = new centre_subject_requirement();
        $this->teachSubjectModel = new teach_subject();
    }

    
    public function main() 
    {
        // Get centre_id from session
        $centre_id = $this->session->get('centre_id');

        // Safety check in case session is missing
        if (!$centre_id) {
            return redirect()->to('/login')->with('error', 'Session expired. Please log in again.');
        }

        $data['schoolDetail']       = $this->centreModel->load_school_detail($centre_id);
        $data['schoolImage']        = $this->centreModel->load_school_image($centre_id);
        $data['schoolFacilities']   = $this->centreModel->load_school_facilities($centre_id);
        $data['schoolPracticumFor'] = $this->centreModel->load_school_practicum($centre_id);
        $data['states']             = $this->stateModel->load_state_list();
        $data['cities']             = $this->cityModel->load_city_list();
        $data['schoolTypes']        = $this->schoolTypeModel->load_school_type();
        $data['schoolLocations']    = $this->schoolLocationModel->load_school_location();
        $data['sectors']            = $this->sectorModel->load_sector_list();
        $data['industryTypes']      = $this->industryTypeModel->load_industry_type();
        $data['allPracticumTypes']  = $this->practicumTypeModel->load_all_practicum();
        $data['subjectsNeeded']   = $this->centreSubjectRequirementModel->load_needed_subject($centre_id);
        $data['availableSubjects']  = $this->teachSubjectModel->load_all_subjects();

        // return view('centre_details', $data);
        $this->school('centre_details',$data);
    }

 }