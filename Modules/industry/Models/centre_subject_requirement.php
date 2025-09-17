<?php

namespace Modules\industry\Models;
use CodeIgniter\Model;

class centre_subject_requirement extends Model
{
    protected $table = 'centre_subject_requirement';
    protected $primaryKey = 'centre_subject_requirement_id';
    protected $allowedFields = ['centre_id', 'teach_subject_id', 'needed_quota'];
    
    public function load_needed_subject($centre_id){
        $builder = $this->db->table('centre_subject_requirement csr');
        $builder->select('
        csr.centre_subject_requirement_id,
        csr.centre_id,
        csr.teach_subject_id,
        csr.needed_quota
        ');
        $builder->join('teach_subject ts', 'ts.teach_subject_id = csr.teach_subject_id');
        $builder->where('csr.centre_id', $centre_id);
        $query = $builder->get();
        return $query->getResultArray();  
    }
    
}