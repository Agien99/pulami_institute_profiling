<?php

namespace Modules\industry\Controllers;
use App\Controllers\BaseController;
use Modules\industry\Models\centre;
use Modules\industry\Models\state;
use Modules\industry\Models\city;
use Modules\industry\Models\school_type;
use Modules\industry\Models\school_location;
use Modules\industry\Models\li_sector;
use Modules\industry\Models\li_industry;
use Modules\industry\Models\practicum_type;
use Modules\industry\Models\centre_subject_requirement;
use Modules\industry\Models\centre_programme_requirement;

 class updateCentre extends BaseController
 {
    public function __construct()
    {
        $this->session = service('session');

        //Load Models
        $this->centreModel = new centre();
        $this->stateModel = new state();
        $this->cityModel = new city();
        $this->schoolTypeModel = new school_type();
        $this->schoolLocationModel = new school_location();
        $this->sectorModel = new li_sector();
        $this->industryTypeModel = new li_industry();
        $this->practicumTypeModel = new practicum_type();
        $this->centreSubjectRequirementModel = new centre_subject_requirement();
        $this->centreProgrammeRequirementModel = new centre_programme_requirement();
    }

    
    public function updateCentre() 
    {
        if ($this->request->isAJAX()) {

            //Basic Information
            $centreId           = $this->request->getPost('centre_id');
            $centreCode         = $this->request->getPost('centre_code');
            $centreName         = $this->request->getPost('centre_name');
            $centreAddress      = $this->request->getPost('centre_address');
            $centrePostcode     = $this->request->getPost('centre_postcode');
            $cityId             = $this->request->getPost('city_id');
            $stateId            = $this->request->getPost('state_id');
            $centrePhone        = $this->request->getPost('centre_phone');
            $centreEmail        = $this->request->getPost('centre_email');
            $centreLatitude     = $this->request->getPost('latitude');
            $centreLongitude    = $this->request->getPost('longitude');
            $programmes         = $this->request->getPost('programmes');

            //Industry Information
            $industrySector     = $this->request->getPost('sector_id');
            $industryType       = $this->request->getPost('industry_type_id');
            $allowance          = $this->request->getPost('allowance');

            // Update DB
            $db      = \Config\Database::connect();
            $builder = $db->table('centre');
            $update  = $builder->where('centre_id', $centreId)
                            ->update([
                                'centre_name' => $centreName,
                                'centre_address' => $centreAddress,
                                'centre_postcode' => $centrePostcode,
                                'city_id' => $cityId,
                                'state_id' => $stateId,
                                'centre_phone' => $centrePhone,
                                'centre_email' => $centreEmail,
                                'allowance' => $allowance,
                                'latitude' => $centreLatitude,
                                'longitude' => $centreLongitude,
                                'li_sector_id' => $industrySector,
                                'industry_li_id' => $industryType
                            ]);

            //Images Upload Part
            //Handle image removals
            $imagesToRemove = $this->request->getPost('images_to_remove');

            if (!empty($imagesToRemove)) {
                foreach ($imagesToRemove as $imgId) {
                    // Get filename from DB
                    $image = $db->table('centre_image')
                                ->select('centre_image_attachment')
                                ->where('centre_image_id', $imgId)
                                ->get()
                                ->getRowArray();

                    if ($image) {
                        $filePath = FCPATH . 'image/schooldetail/' . $centreCode . '/' . $image['centre_image_attachment'];

                        // Delete DB record first
                        $db->table('centre_image')->where('centre_image_id', $imgId)->delete();

                        // Remove file if it exists
                        if (is_file($filePath)) {
                            unlink($filePath);
                        }
                    }
                }
            }

            //Handle new uploads
            $files = $this->request->getFiles();
            if (isset($files['gallery_images'])) {
                foreach ($files['gallery_images'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move(FCPATH . 'image/industrydetail/' . $centreCode. '/', $newName);

                        // Insert into DB
                        $db->table('centre_image')->insert([
                            'centre_image_attachment' => $newName,
                            'centre_id'  => $centreId,
                            'created_at' => date('Y-m-d H:i:s')
                        ]);
                    }
                }
            }

            //Facility Update
            // Decode JSON arrays from hidden inputs
            $facilitiesToAdd = json_decode($this->request->getPost('facilities_to_add'), true) ?? [];
            $facilitiesToRemove = json_decode($this->request->getPost('facilities_to_remove'), true) ?? [];

            // 1️⃣ Remove selected facilities
            if (!empty($facilitiesToRemove)) {
                $db->table('facilities_by_centre')
                    ->where('centre_id', $centreId)
                    ->whereIn('facilities_by_centre_id', $facilitiesToRemove)
                    ->delete();
            }

            // 2️⃣ Add new facilities
            if (!empty($facilitiesToAdd)) {
                $insertData = [];
                foreach ($facilitiesToAdd as $facilityName) {
                    $insertData[] = [
                        'centre_id' => $centreId,
                        'facilities_name' => $facilityName,
                        'date_created' => date('Y-m-d H:i:s')
                    ];
                }

                if (!empty($insertData)) {
                    $db->table('facilities_by_centre')->insertBatch($insertData);
                }
            }

            // Quota Management
            if (!empty($programmes)) {

                // 1️⃣ Get existing programmes for this centre
                $existing = $this->centreProgrammeRequirementModel
                    ->where('centre_id', $centreId)
                    ->findAll();

                $existingMap = [];
                foreach ($existing as $row) {
                    $existingMap[$row['programme_id']] = $row;
                }

                $toInsert = [];
                $toUpdate = [];
                $keepIds  = [];

                foreach ($programmes as $row) {
                    $programmeId    = $row['programme_id'];
                    $neededQuota    = $row['quota_needed'];

                    if (isset($existingMap[$programmeId])) {
                        // already exists → update
                        $toUpdate[] = [
                            'centre_programme_requirement_id'   => $existingMap[$programmeId]['centre_programme_requirement_id'], // ✅ use correct PK
                            'quota_needed'   => $neededQuota,
                        ];
                        $keepIds[] = $existingMap[$programmeId]['centre_programme_requirement_id']; // ✅ use correct PK
                    } else {
                        // new programme → insert
                        $toInsert[] = [
                            'centre_id'         => $centreId,
                            'programme_id'      => $programmeId,
                            'quota_needed'      => $neededQuota
                        ];
                    }
                }

                // 2️⃣ Run updates
                if (!empty($toUpdate)) {
                    $this->centreProgrammeRequirementModel->updateBatch($toUpdate, 'centre_programme_requirement_id'); // ✅
                }

                // 3️⃣ Run inserts
                if (!empty($toInsert)) {
                    $this->centreProgrammeRequirementModel->insertBatch($toInsert);
                }

                // 4️⃣ Delete removed programmes
                if (!empty($existing)) {
                    $existingIds = array_column($existing, 'centre_programme_requirement_id'); // ✅
                    $toDelete    = array_diff($existingIds, $keepIds);
                    if (!empty($toDelete)) {
                        $this->centreProgrammeRequirementModel
                            ->whereIn('centre_programme_requirement_id', $toDelete) // ✅
                            ->delete();
                    }
                }
            }

            // Practicum Types
            $practicumTypeIds = $this->request->getPost('practicum_types');

            // Clear all for this centre
            $db->table('centre_practicum_type')->where('centre_id', $centreId)->delete();

            // Insert back whatever is ticked
            if (!empty($practicumTypeIds) && is_array($practicumTypeIds)) {
                $insertData = [];
                foreach ($practicumTypeIds as $typeId) {
                    $insertData[] = [
                        'centre_id'         => $centreId,
                        'practicum_type_id' => $typeId
                    ];
                }

                if (!empty($insertData)) {
                    $db->table('centre_practicum_type')->insertBatch($insertData);
                }
            }

            //Final Confirmation for Updating Centre Details
            if ($update) {
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => "Successfully Updated!\nCentre Code: $centreCode\nCentre Name: $centreName"
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to update password'
                ]);
            }
        }
    }

 }