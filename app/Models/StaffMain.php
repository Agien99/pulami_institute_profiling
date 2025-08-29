<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffMain extends Model
{
    protected $table            = 'staff';
    protected $primaryKey       = 'staff_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'staff_id', 
        'staff_number', 
        'staff_name', 
        'staff_contact', 
        'staff_email',
        'faculty_id', 
        'semester_id', 
        'programme_id',  
        'user_id',
        'status_availability_id', 
        'staff_created_at', 
        'staff_updated_at', 
        'staff_deleted_at',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'staff_created_at';
    protected $updatedField  = 'staff_updated_at';
    protected $deletedField  = 'staff_deleted_at';

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
