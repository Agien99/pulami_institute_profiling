<?php

namespace Modules\industry\Models;

use CodeIgniter\Model;

class li_industry extends Model
{
    protected $table = 'li_industry';
    protected $primaryKey = 'li_industry_id';
    protected $allowedFields = ['li_industry_id', 'li_industry_name'];
    
    public function load_industry_type(){
        $builder = $this->db->table('li_industry');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}