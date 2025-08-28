<?php

namespace App\Models;

use CodeIgniter\Model;

class practicumType extends Model
{
    protected $table = 'practicum_type';
    protected $primaryKey = 'practicum_type_id';
    protected $allowedFields = ['practicum_type_code', 'practicum_type_desc', 'practicum_type_parentId', 'created_at'. 'updated_at'];
    
    public function load_tag(){
        $builder = $this->db->table('practicum_type');
        $builder->select('*');
        $builder->where('practicum_type_parentId', null);
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}