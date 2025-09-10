<?php

namespace Modules\school\Models;

use CodeIgniter\Model;

class school_location extends Model
{
    protected $table = 'school_location';
    protected $primaryKey = 'school_location_id';
    protected $allowedFields = ['school_location_name'];
    
    public function load_school_location(){
        $builder = $this->db->table('school_location');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}