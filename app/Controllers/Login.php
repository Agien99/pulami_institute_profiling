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
}
