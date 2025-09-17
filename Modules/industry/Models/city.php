<?php

namespace Modules\industry\Models;

use CodeIgniter\Model;

class city extends Model
{
    protected $table = 'city';
    protected $primaryKey = 'city_id';
    protected $allowedFields = ['city_id', 'state_id', 'city_name'];
    
    public function load_city_list(){
        $builder = $this->db->table('city');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}