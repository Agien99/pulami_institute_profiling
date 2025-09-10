<?php

namespace Modules\school\Models;
use CodeIgniter\Model;

class centre extends Model
{
    protected $table = 'centre';
    protected $primaryKey = 'centre_id';
    protected $allowedFields = [
        'centre_code',
        'centre_name', 
        'centre_address',
        'centre_postcode', 
        'city_id',
        'state_id',
        'country_id',
        'centre_phone',
        'centre_email',
        'centre_type_id',
        'li_sector_od',
        'industry_li_id',
        'status_availibility_id',
        'school_type_id',
        'school_location_id',
        'current_quota',
        'quota_limit',
        'allowance',
        'range',
        'longitude',
        'latitude',
        'created_at',
        'edited_at',
        'deleted_at',
        'centre_image_id',
        'practicum_type_id'
    ];
    
    public function load_school_list()
        {
            $builder = $this->db->table('centre_practicum_type cpt');
            $builder->select('
                c.centre_id,
                c.centre_code,
                c.centre_name,
                c.centre_address,
                c.centre_postcode,
                c.centre_phone,
                c.centre_email,
                c.current_quota,
                c.quota_limit,
                c.allowance,
                c.range,
                c.longitude,
                c.latitude,
                c.created_at,
                c.edited_at,
                c.deleted_at,
                ct.city_name,
                s.state_name,
                s.state_id,
                ci.centre_image_attachment,
                ci.centre_image_id
            ');
            $builder->join('centre c', 'c.centre_id = cpt.centre_id AND cpt.practicum_type_id = 7');
            $builder->join('city ct', 'ct.city_id = c.city_id');
            $builder->join('state s', 's.state_id = c.state_id');
            $builder->join('centre_image ci', 'ci.centre_id = c.centre_id', 'left');
            $builder->orderBy('s.state_id', 'ASC');
            $builder->orderBy('c.city_id', 'ASC');
            $query = $builder->get();
            return $query->getResultArray();
        }

    public function load_school_detail($centre_id)
        {
            $builder = $this->db->table('centre c');
            $builder->select('
                c.centre_id,
                c.centre_code,
                c.centre_name,
                c.centre_address,
                c.centre_postcode,
                c.centre_phone,
                c.centre_email,
                c.current_quota,
                c.quota_limit,
                c.school_type_id,
                c.school_location_id,
                c.li_sector_id,
                c.industry_li_id,
                c.allowance,
                c.range,
                c.longitude,
                c.latitude,
                c.created_at,
                c.edited_at,
                c.deleted_at,
                c.city_id,
                ct.city_name,
                s.state_name,
                s.state_id,
                st.school_type_name,
                sl.school_location_name,
                ls.sector_name,
                li.industry_type_name
            ');
            $builder->join('city ct', 'ct.city_id = c.city_id');
            $builder->join('state s', 's.state_id = c.state_id');
            $builder->join('school_type st', 'st.school_type_id = c.school_type_id');
            $builder->join('school_location sl', 'sl.school_location_id = c.school_location_id');
            $builder->join('li_sector ls', 'ls.li_sector_id = c.li_sector_id');
            $builder->join('li_industry li', 'li.industry_li_id = c.industry_li_id');
            $builder->orderBy('s.state_id', 'ASC');
            $builder->orderBy('c.city_id', 'ASC');
            $builder->where('c.centre_id', $centre_id);
            $query = $builder->get();
            return $query->getResultArray();
        }

    public function load_school_facilities($centre_id)
        {
            $builder = $this->db->table('facilities_by_centre fbc');
            $builder->select('
                fbc.facilities_by_centre_id, fbc.facilities_name, fbc.centre_id
            ');
            $builder->where('fbc.centre_id', $centre_id);
            $query = $builder->get();
            return $query->getResultArray();
        }

    public function load_school_image($centre_id)
        {
            $builder = $this->db->table('centre_image ci');
            $builder->select('
                ci.centre_image_id, ci.centre_image_attachment, ci.centre_id
            ');
            $builder->where('ci.centre_id', $centre_id);
            $query = $builder->get();
            return $query->getResultArray();
        }

    public function load_school_practicum($centre_id)
        {
            $builder = $this->db->table('centre_practicum_type cpt');
            $builder->select('
                cpt.centre_practicum_type_id, cpt.centre_id, cpt.practicum_type_id, pt.practicum_type_desc
            ');
            $builder->join('practicum_type pt', 'cpt.practicum_type_id = pt.practicum_type_id');
            $builder->where('cpt.centre_id', $centre_id);
            $query = $builder->get();
            return $query->getResultArray();
        }
}