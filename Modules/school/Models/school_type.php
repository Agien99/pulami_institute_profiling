<?php

namespace Modules\school\Models;

use CodeIgniter\Model;

class school_type extends Model
{
    protected $table = 'school_type';
    protected $primaryKey = 'school_type_id';
    protected $allowedFields = ['school_type_id', 'school_type_code', 'school_type_name'];
    
    public function load_school_type(){
        $builder = $this->db->table('school_type');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}