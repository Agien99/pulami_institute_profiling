<?php

namespace Modules\school\Models;

use CodeIgniter\Model;

class practicum_type extends Model
{
    protected $table = 'practicum_type';
    protected $primaryKey = 'practicum_type_id';
    protected $allowedFields = ['practicum_type_id', 'practicum_type_code', 'practicum_type_desc', 'practicum_type_parentId'];
    
    public function load_all_practicum(){
        $builder = $this->db->table('practicum_type');
        $builder->select('*');
        $builder->where('practicum_type_parentId', null);
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}