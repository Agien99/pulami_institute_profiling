<?php

namespace App\Models;

use CodeIgniter\Model;

class centre_programme_requirement extends Model
{
    protected $table = 'centre_programme_requirement';
    protected $primaryKey = 'centre_programme_requirement_id';
    protected $allowedFields = ['programme_id', 'centre_id', 'needed_quota'];
    
    public function load_company_required_programme($centre_id){
        $builder = $this->db->table('centre_programme_requirement cpr');
        $builder->select('
        cpr.centre_programme_requirement_id,
        cpr.programme_id,
        cpr.centre_id,
        cpr.quota_needed,
        pr.programme_name
        ');
        $builder->join('programme pr', 'pr.programme_id = cpr.programme_id');
        $builder->where('cpr.centre_id', $centre_id);
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}