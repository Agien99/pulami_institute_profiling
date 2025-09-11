<?php

namespace Modules\school\Models;

use CodeIgniter\Model;

class teach_subject extends Model
{
    protected $table = 'teach_subject';
    protected $primaryKey = 'teach_subject_id';
    protected $allowedFields = ['teach_subject_id', 'teach_subject_name'];
    
    public function load_all_subjects(){
        $builder = $this->db->table('teach_subject');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}