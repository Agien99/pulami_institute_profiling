<?php

namespace Modules\school\Models;

use CodeIgniter\Model;

class li_sector extends Model
{
    protected $table = 'li_sector';
    protected $primaryKey = 'li_sector_id';
    protected $allowedFields = ['li_sector_id', 'li_sector_name'];
    
    public function load_sector_list(){
        $builder = $this->db->table('li_sector');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}