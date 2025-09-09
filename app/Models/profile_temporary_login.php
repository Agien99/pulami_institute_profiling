<?php

namespace App\Models;

use CodeIgniter\Model;

class profile_temporary_login extends Model
{
    protected $table = 'profile_temporary_login';
    protected $primaryKey = 'profile_temporary_login_id';
    protected $allowedFields = ['centre_id', 'password', 'login_start_date', 'login_end_date'];
    
    public function load_tag(){
        $builder = $this->db->table('practicum_type');
        $builder->select('*');
        $builder->where('practicum_type_parentId', null);
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}