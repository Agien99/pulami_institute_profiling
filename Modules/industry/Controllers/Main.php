<?php

namespace Modules\industry\Controllers;
use App\Controllers\BaseController;
use Modules\industry\Models\centre;
use Modules\industry\Models\state;
use Modules\industry\Models\city;
use Modules\industry\Models\li_sector;
use Modules\industry\Models\li_industry;
use Modules\industry\Models\practicum_type;
use Modules\industry\Models\centre_subject_requirement;
use Modules\industry\Models\centre_programme_requirement;
use Modules\industry\Models\teach_subject;
use Modules\industry\Models\programme_practicum_type;

 class Main extends BaseController
 {
    public function __construct()
    {
        $this->session = service('session');

        //Load Models
        $this->centreModel = new centre();
        $this->stateModel = new state();
        $this->cityModel = new city();
        $this->sectorModel = new li_sector();
        $this->industryTypeModel = new li_industry();
        $this->practicumTypeModel = new practicum_type();
        $this->centreSubjectRequirementModel = new centre_subject_requirement();
        $this->centreProgrammeRequirementModel = new centre_programme_requirement();
        $this->teachSubjectModel = new teach_subject();
        $this->programmePracticumTypeModel = new programme_practicum_type();
    }

    
    public function main() 
    {
        // Get centre_id from session
        $centre_id = $this->session->get('centre_id');

        // Safety check in case session is missing
        if (!$centre_id) {
            return redirect()->to('/login')->with('error', 'Session expired. Please log in again.');
        }

        $data['industryDetail']         = $this->centreModel->load_industry_detail($centre_id);
        $data['industryImage']          = $this->centreModel->load_industry_image($centre_id);
        $data['industryFacilities']     = $this->centreModel->load_industry_facilities($centre_id);
        $data['industryPracticumFor']   = $this->centreModel->load_industry_practicum($centre_id);
        $data['states']                 = $this->stateModel->load_state_list();
        $data['cities']                 = $this->cityModel->load_city_list();
        $data['sectors']                = $this->sectorModel->load_sector_list();
        $data['industryTypes']          = $this->industryTypeModel->load_industry_type();
        $data['allPracticumTypes']      = $this->practicumTypeModel->load_all_practicum();
        $data['programmesNeeded']       = $this->centreProgrammeRequirementModel->load_needed_programme($centre_id);
        $data['availableSubjects']      = $this->teachSubjectModel->load_all_subjects();
        $data['availableProgrammes']    = $this->programmePracticumTypeModel->load_programme_for_li();

        // return view('centre_details', $data);
        $this->industry('centre_details',$data);
    }

 }