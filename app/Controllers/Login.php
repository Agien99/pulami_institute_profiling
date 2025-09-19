<?php

namespace App\Controllers;
use App\Models\profile_temporary_login;
use App\Models\centre;

class login extends BaseController
{
    public function __construct()
    {
        $this->centreModel = new centre();
        $this->temporaryLogin = new profile_temporary_login();
    }

    public function login()
    {
        $centre_code = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $loginType = $this->request->getPost('login_type');

        if($loginType === 'school') {
            $centre = $this->centreModel->where('centre_code', $centre_code)->first();
            if (!$centre) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid username or password.']);
            }

            $centre_id = $centre['centre_id'];
            $tempLogin = $this->temporaryLogin->where('centre_id', $centre_id)->first();

            if (!$tempLogin || !password_verify($password, $tempLogin['password'])) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid username or password.']);
            }

            // Check login period
            $now = date('Y-m-d H:i:s'); // current datetime
            if ($tempLogin['login_start_date'] && $now < $tempLogin['login_start_date']) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Login period has not started yet.']);
            }
            if ($tempLogin['login_end_date'] && $now > $tempLogin['login_end_date']) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Login period has ended.']);
            }

            session()->set('centre_id', $centre_id);
            session()->set('centre_code', $centre_code);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Logged In', 'redirect' => base_url('school')]);
        } else {
            $centre = $this->centreModel->where('centre_code', $centre_code)->first();
            if (!$centre) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid username or password.']);
            }

            $centre_id = $centre['centre_id'];
            $tempLogin = $this->temporaryLogin->where('centre_id', $centre_id)->first();

            if (!$tempLogin || !password_verify($password, $tempLogin['password'])) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid username or password.']);
            }

            // Check login period
            $now = date('Y-m-d H:i:s'); // current datetime
            if ($tempLogin['login_start_date'] && $now < $tempLogin['login_start_date']) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Login period has not started yet.']);
            }
            if ($tempLogin['login_end_date'] && $now > $tempLogin['login_end_date']) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Login period has ended.']);
            }

            session()->set('centre_id', $centre_id);
            session()->set('centre_code', $centre_code);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Logged In', 'redirect' => base_url('industry')]);
        }
    }

    public function checkUsername()
    {
        // Set response header for JSON
        $this->response->setContentType('application/json');
        
        $request = service('request');
        
        if (!$request->isAJAX()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request']);
        }
        
        $username = $request->getPost('username');
        
        if (empty($username)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Username is required']);
        }
        
        // Load database
        $db = \Config\Database::connect();
        
        try {
            // First, get centre_id from centre table using centre_code (username)
            $centreBuilder = $db->table('centre');
            $centreQuery = $centreBuilder->select('centre_id')
                                    ->where('centre_code', $username)
                                    ->get();
            
            $centreResult = $centreQuery->getRowArray();
            
            if (empty($centreResult)) {
                return $this->response->setJSON([
                    'status' => 'error', 
                    'message' => 'Username not found'
                ]);
            }
            
            $centreId = $centreResult['centre_id'];
            
            // Now get practicum types using the centre_id
            $builder = $db->table('centre_practicum_type cpt');
            $query = $builder->select('pt.practicum_type_desc')
                            ->distinct()
                            ->join('practicum_type pt', 'cpt.practicum_type_id = pt.practicum_type_id')
                            ->where('cpt.centre_id', $centreId)
                            ->where('pt.practicum_type_parentId', null)
                            ->get();
            
            $results = $query->getResultArray();
            
            if (empty($results)) {
                return $this->response->setJSON([
                    'status' => 'error', 
                    'message' => 'No practicum types found for this centre'
                ]);
            }
            
            // Extract practicum types
            $practicumTypes = array_column($results, 'practicum_type_desc');
            
            return $this->response->setJSON([
                'status' => 'success',
                'practicum_types' => $practicumTypes,
                'message' => 'Username found'
            ]);
            
        } catch (\Exception $e) {
            log_message('error', 'Username check error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error', 
                'message' => 'Database error: ' . $e->getMessage() // Temporary for debugging - remove in production
            ]);
        }
    }
}
