<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentMain extends Model
{
    protected $table            = 'student';
    protected $primaryKey       = 'student_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'student_name', 
        'student_matric', 
        'student_IC', 
        'student_email', 
        'student_phone_number', 
        'minor_id', 
        'student_address', 
        'faculty_id', 
        'semester_id', 
        'level_of_study_id',
        'status_availability_id', 
        'programme_id', 
        'user_id', 
        'student_created_at', 
        'student_updated_at', 
        'student_deleted_at',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'student_created_at';
    protected $updatedField  = 'student_updated_at';
    protected $deletedField  = 'student_deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
