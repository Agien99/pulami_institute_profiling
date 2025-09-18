<?php

namespace Modules\industry\Models;

use CodeIgniter\Model;

class programme_practicum_type extends Model
{
    protected $table = 'programme_practicum_type';
    protected $primaryKey = 'programme_practicum_type_id';
    protected $allowedFields = [
        'programme_practicum_type_id', 
        'practicum_type_id', 
        'programme_id'
    ];
    
    public function load_programme_for_li(){
        $builder = $this->db->table('programme_practicum_type pt');
        $builder->select([
            'pt.programme_id',
            'pt.practicum_type_id',
            'p.programme_name'
        ]);
        $builder->join('programme p', 'p.programme_id = pt.programme_id');
        $builder->where('pt.practicum_type_id', 12);
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}