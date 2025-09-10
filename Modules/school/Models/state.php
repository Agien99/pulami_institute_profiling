<?php

namespace Modules\school\Models;

use CodeIgniter\Model;

class state extends Model
{
    protected $table = 'state';
    protected $primaryKey = 'state_id';
    protected $allowedFields = ['country_id', 'country_id', 'state_code', 'state_name'];
    
    public function load_state_list(){
        $builder = $this->db->table('state');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}