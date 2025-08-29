<?php

namespace App\Controllers;

use App\Models\UserMain;
use App\Models\StaffMain;
use App\Models\StudentMain;
use App\Models\UserGroupMain;

class AuthController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = service('session');
    }

    public function login()
{
    // Get username and password from the form
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Load the UserModel
    $userModel = new UserMain();

    // Check if the user exists
    $user = $userModel->where('username', $username)->first();

    if ($user) {
        // Fetch status_availability_id based on user_id
        $status_availability_id = $user['status_availability_id']; 

        // Check if the user is inactive
        if ($status_availability_id == 2) { // Assuming 2 means inactive
            // User is inactive, set flashdata error message
            $this->session->setFlashdata('error', 'User is inactive. Please contact admin for activation.');
            return redirect()->back();
        }
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Fetch the appropriate fullname based on user's role
            $fullname = '';
            switch ($user['user_group_id']) {

                case 1: // Administrator group
                    // Fetch Role
                    $RoleModel = new UserGroupMain();
                    $Role = $RoleModel->where('user_group_id', $user['user_group_id'])->first();
                    $UserRole = $Role['user_group_desc'] ?? '';
                    $UserRoleId = $Role['user_group_id'] ?? '';

                    // Fetch admin fullname
                    $StaffModel = new StaffMain();
                    $staff = $StaffModel->where('user_id', $user['user_id'])->first();
                    $fullname = $staff['staff_name'] ?? '';
                    $user_number = $staff['staff_id'] ?? '';
                    $id = $user['user_id'] ?? '';
                    break;
            }

            // Set session data
            $this->session->set([
                'user_id' => $id,
                'user_number' => $user_number,
                'username' => $user['username'],
                'role' => $UserRole,
                'role_id' => $UserRoleId,
                'fullname' => $fullname,

            ]);

            // Redirect to the appropriate landing page based on the user's role
            switch ($user['user_group_id']) {
                case 1:
                    return redirect()->to('/school');
                default:
                    // Invalid role, redirect to homepage or show error message
                    return redirect()->to('/');
            }
        } else {
            // Password is incorrect, set flashdata error message
            $this->session->setFlashdata('error', 'Incorrect password.');
            return redirect()->back();
        }
    } else {
        // User not found, set flashdata error message
        $this->session->setFlashdata('error', 'User not found. Please check your username and password.');
        return redirect()->back();
    }
}


    public function logout()
    {
        // Destroy session data
        $this->session->destroy();

        // Redirect to homepage
        return redirect()->to('/');
    }
}
