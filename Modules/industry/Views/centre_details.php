<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.form-section {
    background: #fff;
    padding: 30px;
    margin-bottom: 30px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.form-section h4 {
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
    margin-bottom: 20px;
} 

.form-group {
    margin-bottom: 20px;
}

.form-control {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px 15px;
    font-size: 14px;
    transition: border-color 0.3s;
}

.form-control:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0,123,255,0.3);
}

.btn-primary {
    background: #007bff;
    border: none;
    padding: 12px 30px;
    border-radius: 5px;
    font-weight: 600;
    transition: background 0.3s;
}

.btn-primary:hover {
    background: #0056b3;
}

.btn-secondary {
    background: #6c757d;
    border: none;
    padding: 12px 30px;
    border-radius: 5px;
    font-weight: 600;
    margin-right: 10px;
}

.facility-tag {
    display: inline-block;
    background: #e9ecef;
    padding: 5px 10px;
    margin: 3px;
    border-radius: 15px;
    font-size: 12px;
}

.facility-tag .remove-facility {
    color: #dc3545;
    cursor: pointer;
    margin-left: 5px;
}

.image-preview {
    max-width: 150px;
    max-height: 150px;
    margin: 10px;
    border-radius: 5px;
    position: relative;
}

.image-preview .remove-image {
    position: absolute;
    top: 5px;
    right: 5px;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 12px;
}

#map-editor {
    height: 300px;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-top: 10px;
}

.coordinates-display {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
    margin-top: 10px;
    font-family: monospace;
}

.upload-area:hover {
    border-color: #007bff;
    background: #e3f2fd;
}

.upload-area.dragover {
    border-color: #28a745;
    background: #d4edda;
    transform: scale(1.02);
}

.image-preview:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.image-preview:hover .remove-image {
    opacity: 1;
}

.image-preview .remove-image:hover {
    background: #c82333;
    transform: scale(1.1);
}

.image-preview.new {
    border: 2px solid #28a745;
}

.image-preview.new .image-label {
    background: rgba(40,167,69,0.9);
}

.file-info {
    position: absolute;
    bottom: 8px;
    right: 8px;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 2px 6px;
    border-radius: 8px;
    font-size: 10px;
}

/* Toast container */
#toast-container {
  position: fixed;
  top: 20px;
  right: 20px;
  z-index: 9999;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

/* Toast style */
.toast {
  min-width: 250px;
  padding: 12px 18px;
  border-radius: 6px;
  color: #fff;
  font-size: 14px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
  opacity: 0;
  transform: translateX(100%);
  transition: all 0.4s ease;
}

/* Colors */
.toast.success { background: #28a745; }
.toast.error   { background: #dc3545; }
.toast.info    { background: #17a2b8; }

/* When visible */
.toast.show {
  opacity: 1;
  transform: translateX(0);
}
</style>

<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area blog_banner_two">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle f_48">Edit Centre Information</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="centre-list.html">Centres</a></li>
                <li class="active">Edit Centre</li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================Editor Area =================-->
<section class="blog_area">
    <div class="container">
        <form id="centreForm">
            <input type="hidden" name="centre_id" value="<?= esc($schoolDetail[0]['centre_id'] ?? '') ?>">
            
            <div class="row">
                <div class="col-lg-8">
                    <!-- Basic Information -->
                    <div class="form-section">
                        <h4><i class="fa fa-info-circle"></i> Basic Information</h4>
                        
                        <div class="form-group">
                            <label for="centre_name">Centre Name *</label>
                            <input type="hidden" class="form-control" id="centre_id" name="centre_id" value="<?= esc($schoolDetail[0]['centre_id'] ?? '') ?>" >
                            <input type="hidden" class="form-control" id="centre_code" name="centre_code" value="<?= esc($schoolDetail[0]['centre_code'] ?? '') ?>" >
                            <input type="text" class="form-control" id="centre_name" name="centre_name" 
                                   value="<?= esc($schoolDetail[0]['centre_name'] ?? '') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="centre_address">Address *</label>
                            <textarea class="form-control" id="centre_address" name="centre_address" 
                                      rows="3" required><?= esc($schoolDetail[0]['centre_address'] ?? '') ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="centre_postcode">Postcode *</label>
                                    <input type="text" class="form-control" id="centre_postcode" name="centre_postcode" 
                                           value="<?= esc($schoolDetail[0]['centre_postcode'] ?? '') ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city_id">City *</label>
                                    <select class="form-control" id="city_id" name="city_id" required>
                                        <option value="">Select City</option>
                                        <?php if (!empty($cities)) : ?>
                                            <?php foreach ($cities as $city) : ?>
                                                <option value="<?= $city['city_id'] ?>" 
                                                    <?= (isset($schoolDetail[0]['city_id']) && $schoolDetail[0]['city_id'] == $city['city_id']) ? 'selected' : '' ?>>
                                                    <?= esc($city['city_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state_id">State *</label>
                                    <select class="form-control" id="state_id" name="state_id" required>
                                        <option value="">Select State</option>
                                        <?php if (!empty($states)) : ?>
                                            <?php foreach ($states as $state) : ?>
                                                <option value="<?= $state['state_id'] ?>" 
                                                    <?= (isset($schoolDetail[0]['state_id']) && $schoolDetail[0]['state_id'] == $state['state_id']) ? 'selected' : '' ?>>
                                                    <?= esc($state['state_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="centre_phone">Telephone Number</label>
                                    <input type="text" class="form-control" id="centre_phone" name="centre_phone" 
                                           value="<?= esc($schoolDetail[0]['centre_phone'] ?? '') ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="centre_email">Email Address</label>
                                    <input type="email" class="form-control" id="centre_email" name="centre_email" 
                                           value="<?= esc($schoolDetail[0]['centre_email'] ?? '') ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location & Map -->
                    <div class="form-section">
                        <h4><i class="fa fa-map-marker"></i> Location & Map</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="number" step="any" class="form-control" id="latitude" name="latitude" 
                                           value="<?= esc($schoolDetail[0]['latitude'] ?? '') ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="number" step="any" class="form-control" id="longitude" name="longitude" 
                                           value="<?= esc($schoolDetail[0]['longitude'] ?? '') ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Click on the map to set location or enter coordinates manually</label>
                            <div id="map-editor"></div>
                            <div class="coordinates-display">
                                Current Location: <span id="current-coords">
                                    <?= esc($schoolDetail[0]['latitude'] ?? '0') ?>, <?= esc($schoolDetail[0]['longitude'] ?? '0') ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Management -->
                    <div class="form-section">
                        <h4><i class="fa fa-image"></i> Gallery Management</h4>
                        
                        <!-- Enhanced Upload Area -->
                        <div class="form-group">
                            <label for="gallery_images">Upload New Images</label>
                            <div class="upload-area" id="upload-area" style="border: 2px dashed #dee2e6; border-radius: 10px; padding: 40px 20px; text-align: center; background: #f8f9fa; cursor: pointer; transition: all 0.3s;">
                                <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" 
                                    multiple accept="image/*" style="display: none;">
                                <div class="upload-prompt text-center">
                                    <i class="fa fa-cloud-upload fa-3x text-muted mb-3"></i>
                                    <p class="mb-2"><strong>Drag & Drop images here</strong></p>
                                    <p class="text-muted">or</p>
                                    <button type="button" class="btn btn-primary" id="select-images">
                                        <i class="fa fa-plus"></i> Select Images
                                    </button>
                                    <p class="text-muted mt-2 mb-0">
                                        <small>Supports: JPG, PNG, GIF (Max 5MB each)</small>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- New Images Preview Section (Initially Hidden) -->
                        <div id="new-images-section" style="display: none;">
                            <label>New Images to Upload:</label>
                            <small class="text-success d-block mb-2">
                                These are your new images. Click × to remove before saving.
                            </small>
                            <div class="row" id="new-images-preview">
                                <!-- New image previews will be added here dynamically -->
                            </div>
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn-outline-danger btn-sm" id="clear-all-new">
                                    <i class="fa fa-trash"></i> Clear All New Images
                                </button>
                            </div>
                            <hr>
                        </div>

                        <!-- Existing Images Section -->
                        <div class="current-images">
                            <label>Current Images:</label>
                            <small class="text-info d-block mb-2">
                                These are saved in your gallery. Hover to see remove button (×)
                            </small>
                            <div class="row" id="existing-images">
                                <?php if (!empty($schoolImage)) : ?>
                                    <?php foreach ($schoolImage as $index => $image) : ?>
                                        <div class="col-md-3 mb-3 existing-image" data-image-id="<?= $image['centre_image_id'] ?>">
                                            <div class="image-preview existing" style="position: relative; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s; border: 2px solid #6c757d;">
                                                <img src="image/schooldetail/<?= esc($schoolDetail[0]['centre_code'] ?? '0') ?>/<?= esc($image['centre_image_attachment']) ?>" 
                                                    class="img-fluid" alt="Gallery Image" style="width: 100%; height: 180px; object-fit: cover;">
                                                <div class="remove-image" data-image-id="<?= $image['centre_image_id'] ?>" 
                                                    title="Click to remove this image"
                                                    style="position: absolute; top: 8px; right: 8px; background: #dc3545; color: white; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 14px; opacity: 10; transition: all 0.3s; box-shadow: 0 2px 5px rgba(0,0,0,0.3);">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                                <div class="image-label" style="position: absolute; bottom: 8px; left: 8px; background: rgba(0,0,0,0.7); color: white; padding: 4px 8px; border-radius: 12px; font-size: 11px; font-weight: 600;">Saved</div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="col-12 text-center" id="no-images-message">
                                        <div class="empty-state" style="text-align: center; padding: 30px; border: 2px dashed #dee2e6; border-radius: 10px; background: #f8f9fa;">
                                            <i class="fa fa-image fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">No images in gallery yet</p>
                                            <p class="text-info">Use the upload area above to add your first images!</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Facilities Management -->
                    <div class="form-section">
                        <h4><i class="fa fa-cogs"></i> Facilities Management</h4>
                        
                        <div class="form-group">
                            <label for="new_facility">Add New Facility</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="new_facility" placeholder="Enter facility name">
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-secondary" id="add_facility">
                                        <i class="fa fa-plus"></i> Add Facility
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="current-facilities">
                            <label>Current Facilities:</label>
                            <div class="facilities-list">
                                <?php if (!empty($schoolFacilities)) : ?>
                                    <?php foreach ($schoolFacilities as $facility) : ?>
                                        <span class="facility-tag">
                                            <?= esc($facility['facilities_name']) ?>
                                            <span class="remove-facility" data-facility-id="<?= $facility['facilities_by_centre_id'] ?>">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </span>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-muted">No facilities added yet</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <input type="hidden" id="facilities_to_remove" name="facilities_to_remove">
                        <input type="hidden" id="facilities_to_add" name="facilities_to_add">
                    </div>
                </div>

                <!-- School/Industry Info -->
                <div class="col-lg-4">
                    <div class="form-section">
                        <h4><i class="fa fa-school"></i> Industry Information</h4>
                        
                        <div class="form-group">
                            <label for="school_type_id">Industry Type</label>
                            <select class="form-control" id="school_type_id" name="school_type_id">
                                <option value="">Select Industry Type</option>
                                <?php if (!empty($schoolTypes)) : ?>
                                    <?php foreach ($schoolTypes as $type) : ?>
                                        <option value="<?= $type['school_type_id'] ?>" 
                                            <?= (isset($schoolDetail[0]['school_type_id']) && $schoolDetail[0]['school_type_id'] == $type['school_type_id']) ? 'selected' : '' ?>>
                                            <?= esc($type['school_type_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="school_location_id">Industry Location</label>
                            <select class="form-control" id="school_location_id" name="school_location_id">
                                <option value="">Select Industry Location</option>
                                <?php if (!empty($schoolLocations)) : ?>
                                    <?php foreach ($schoolLocations as $location) : ?>
                                        <option value="<?= $location['school_location_id'] ?>" 
                                            <?= (isset($schoolDetail[0]['school_location_id']) && $schoolDetail[0]['school_location_id'] == $location['school_location_id']) ? 'selected' : '' ?>>
                                            <?= esc($location['school_location_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Industry Information Section --> 
                    <div class="form-section">
                        <h4><i class="fa fa-industry"></i> Industry Information</h4>
                        
                        <div class="form-group">
                            <label for="sector_id">Industry Sector</label>
                            <select class="form-control" id="sector_id" name="sector_id">
                                <option value="">Select Sector</option>
                                <?php if (!empty($sectors)) : ?>
                                    <?php foreach ($sectors as $sector) : ?>
                                        <option value="<?= $sector['li_sector_id'] ?>" 
                                            <?= (isset($schoolDetail[0]['li_sector_id']) && $schoolDetail[0]['li_sector_id'] == $sector['li_sector_id']) ? 'selected' : '' ?>>
                                            <?= esc($sector['sector_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="industry_type_id">Industry Type</label>
                            <select class="form-control" id="industry_type_id" name="industry_type_id">
                                <option value="">Select Industry Type</option>
                                <?php if (!empty($industryTypes)) : ?>
                                    <?php foreach ($industryTypes as $type) : ?>
                                        <option value="<?= $type['industry_li_id'] ?>" 
                                            <?= (isset($schoolDetail[0]['industry_li_id']) && $schoolDetail[0]['industry_li_id'] == $type['industry_li_id']) ? 'selected' : '' ?>>
                                            <?= esc($type['industry_type_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Quota Management Section --> 
                    <div class="form-section">
                        <h4><i class="fa fa-clipboard-list"></i> Subject Quota Request</h4>
                        
                        <!-- JPN Allocated Quota (Read-only) -->
                        <div class="alert alert-info">
                            <strong><i class="fa fa-info-circle"></i> JPN Allocated Quota: </strong>
                            <span class="badge badge-primary badge-lg"><?= isset($schoolDetail[0]['quota_limit']) ? esc($schoolDetail[0]['quota_limit']) : '0' ?></span> students
                        </div>

                        <!-- Subject Quota Selection -->
                        <div class="mt-3">
                            <h5><i class="fa fa-book"></i> Select Subjects & Student Numbers</h5>
                            
                            <div id="subject-quota-container">
                                <?php if (!empty($subjectsNeeded)) : ?>
                                    <?php foreach ($subjectsNeeded as $index => $subject) : ?>
                                        <div class="subject-quota-row mb-3 p-3 border rounded">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="subject_<?= $index ?>">Subject</label>
                                                    <select class="form-control" name="subjects[<?= $index ?>][teach_subject_id]" id="subject_<?= $index ?>" required>
                                                        <option value="">Select Subject</option>
                                                        <?php if (!empty($availableSubjects)) : ?>
                                                            <?php foreach ($availableSubjects as $availableSubject) : ?>
                                                                <option value="<?= $availableSubject['teach_subject_id'] ?>" 
                                                                    <?= (isset($subject['teach_subject_id']) && $subject['teach_subject_id'] == $availableSubject['teach_subject_id']) ? 'selected' : '' ?>>
                                                                    <?= esc($availableSubject['teach_subject_name']) ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="quota_<?= $index ?>">Students Needed</label>
                                                    <input type="number" 
                                                        class="form-control quota-input" 
                                                        name="subjects[<?= $index ?>][needed_quota]" 
                                                        id="quota_<?= $index ?>" 
                                                        value="<?= isset($subject['needed_quota']) ? esc($subject['needed_quota']) : '' ?>" 
                                                        min="1" 
                                                        required>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-end">
                                                    <button type="button" class="btn btn-danger btn-sm remove-subject">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            
                            <button type="button" class="btn btn-success btn-sm" id="add-subject">
                                <i class="fa fa-plus"></i> Add Another Subject
                            </button>
                        </div>

                        <!-- Quota Validation Warning -->
                        <div id="quota-warning" class="alert alert-warning mt-3" style="display: none;">
                            <strong>Notice:</strong> You have reached the JPN allocated quota limit. You cannot add more subjects or increase student numbers beyond this limit.
                        </div>
                    </div>

                    <!-- Practicum Types Section -->     
                    <div class="form-section">
                        <h4><i class="fa fa-users"></i> Practicum Types</h4>
                        
                        <div class="form-group">
                            <label>Available For:</label>
                            <?php if (!empty($allPracticumTypes)) : ?>
                                <?php foreach ($allPracticumTypes as $practicum) : ?>
                                    <?php 
                                    $isChecked = false;
                                    if (!empty($schoolPracticumFor)) {
                                        foreach ($schoolPracticumFor as $assigned) {
                                            if ($assigned['practicum_type_id'] == $practicum['practicum_type_id']) {
                                                $isChecked = true;
                                                break; 
                                            }
                                        }
                                    }
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                               name="practicum_types[]" value="<?= $practicum['practicum_type_id'] ?>"
                                               id="practicum_<?= $practicum['practicum_type_id'] ?>"
                                               <?= $isChecked ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="practicum_<?= $practicum['practicum_type_id'] ?>">
                                            <?= esc($practicum['practicum_type_code']) ?> - <?= esc($practicum['practicum_type_desc']) ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-section text-center">
                        <button type="button" class="btn btn-secondary" onclick="history.back()">
                            <i class="fa fa-arrow-left"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================Editor Area =================-->

<script>
// Initialize map
var mapEditor = L.map('map-editor').setView([<?= esc($schoolDetail[0]['latitude'] ?? '3.139') ?>, <?= esc($schoolDetail[0]['longitude'] ?? '101.6869') ?>], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(mapEditor);

var marker = L.marker([<?= esc($schoolDetail[0]['latitude'] ?? '3.139') ?>, <?= esc($schoolDetail[0]['longitude'] ?? '101.6869') ?>]).addTo(mapEditor);

// Map click event
mapEditor.on('click', function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    
    // Update marker position
    marker.setLatLng(e.latlng);
    
    // Update form fields
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
    document.getElementById('current-coords').textContent = lat + ', ' + lng;
});

// Update map when coordinates are manually entered
document.getElementById('latitude').addEventListener('change', updateMapFromCoords);
document.getElementById('longitude').addEventListener('change', updateMapFromCoords);

function updateMapFromCoords() {
    var lat = parseFloat(document.getElementById('latitude').value);
    var lng = parseFloat(document.getElementById('longitude').value);
    
    if (!isNaN(lat) && !isNaN(lng)) {
        mapEditor.setView([lat, lng], 15);
        marker.setLatLng([lat, lng]);
        document.getElementById('current-coords').textContent = lat + ', ' + lng;
    }
}

// Facility management
var facilitiesToRemove = [];
var facilitiesToAdd = [];

document.getElementById('add_facility').addEventListener('click', function() {
    var facilityName = document.getElementById('new_facility').value.trim();

    if (!facilityName) return;

    // ✅ Prevent duplicates (case-insensitive)
    var exists = facilitiesToAdd.some(f => f.toLowerCase() === facilityName.toLowerCase());
    if (exists) {
        alert(`"${facilityName}" is already added!`);
        return;
    }

    facilitiesToAdd.push(facilityName);

    var facilityTag = document.createElement('span');
    facilityTag.className = 'facility-tag';
    facilityTag.dataset.facilityName = facilityName; // ✅ store name safely
    facilityTag.innerHTML = `
        ${facilityName}
        <span class="remove-facility new-facility"><i class="fa fa-times"></i></span>
    `;

    document.querySelector('.facilities-list').appendChild(facilityTag);
    document.getElementById('new_facility').value = '';

    updateFacilitiesInput();
});

// Remove facility event delegation
document.addEventListener('click', function(e) {
    if (e.target.closest('.remove-facility')) {
        var facilityElement = e.target.closest('.facility-tag');
        var facilityId = e.target.closest('.remove-facility').dataset.facilityId;
        var facilityName = facilityElement.dataset.facilityName; // ✅ safe lookup

        if (facilityId) {
            facilitiesToRemove.push(facilityId);
        } else if (facilityName) {
            // Remove from facilitiesToAdd array
            facilitiesToAdd = facilitiesToAdd.filter(f => f !== facilityName);
        }

        facilityElement.remove();
        updateFacilitiesInput();
    }
});

// Remove image event delegation
document.addEventListener('click', function(e) {
    if (e.target.closest('.remove-image')) {
        var imageElement = e.target.closest('.col-md-3');
        var imageId = e.target.closest('.remove-image').dataset.imageId;
        
        if (confirm('Are you sure you want to remove this image?')) {
            // Add to removal list
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'images_to_remove[]';
            input.value = imageId;
            document.getElementById('centreForm').appendChild(input);
            
            imageElement.remove();
        }
    }
});

function updateFacilitiesInput() {
    document.getElementById('facilities_to_remove').value = JSON.stringify(facilitiesToRemove);
    document.getElementById('facilities_to_add').value = JSON.stringify(facilitiesToAdd);
}

// Enhanced Gallery Management with Live Preview
var newImages = []; // Store new images before upload

// Upload area interactions
const uploadArea = document.getElementById('upload-area');
const fileInput = document.getElementById('gallery_images');
const selectBtn = document.getElementById('select-images');

selectBtn.addEventListener('click', () => fileInput.click());

// Drag and drop functionality
uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('dragover');
});

uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('dragover');
});

uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('dragover');
    const files = Array.from(e.dataTransfer.files).filter(file => file.type.startsWith('image/'));
    handleNewImages(files);
});

uploadArea.addEventListener('click', (e) => {
    // ✅ Ignore if the select button itself is clicked
    if (e.target.closest('#select-images')) return;

    if (e.target === uploadArea || e.target.closest('.upload-prompt')) {
        fileInput.click();
    }
});

// File input change event
fileInput.addEventListener('change', (e) => {
    const files = Array.from(e.target.files);
    handleNewImages(files);
});

function handleNewImages(files) {
    if (files.length === 0) return;
    
    // Validate files
    const validFiles = [];
    const errors = [];
    
    files.forEach(file => {
        if (!file.type.startsWith('image/')) {
            errors.push(`${file.name}: Not an image file`);
            return;
        }
        if (file.size > 5 * 1024 * 1024) { // 5MB limit
            errors.push(`${file.name}: File too large (max 5MB)`);
            return;
        }
        validFiles.push(file);
    });
    
    if (errors.length > 0) {
        alert('Some files were skipped:\n' + errors.join('\n'));
    }
    
    // Add valid files to preview
    validFiles.forEach(file => {
        const fileId = 'new_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        newImages.push({ id: fileId, file: file });
        addImagePreview(file, fileId, true);
    });
    
    updateNewImagesSection();
    updateFileInput();
    alert(`${validFiles.length} image(s) added for upload!`);
}

function addImagePreview(file, fileId, isNew = false) {
    const reader = new FileReader();
    reader.onload = function(e) {
        const col = document.createElement('div');
        col.className = 'col-md-3 mb-3';
        col.dataset.fileId = fileId;
        
        const preview = document.createElement('div');
        preview.className = `image-preview ${isNew ? 'new' : 'existing'}`;
        preview.style.cssText = 'position: relative; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s; border: 2px solid ' + (isNew ? '#28a745' : '#6c757d') + ';';
        
        preview.innerHTML = `
            <img src="${e.target.result}" class="img-fluid" alt="Preview" style="width: 100%; height: 180px; object-fit: cover;">
            <div class="remove-image" data-file-id="${fileId}" title="Remove this image" style="position: absolute; top: 8px; right: 8px; background: #dc3545; color: white; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 14px; opacity: 0; transition: all 0.3s; box-shadow: 0 2px 5px rgba(0,0,0,0.3);">
                <i class="fa fa-times"></i>
            </div>
            <div class="image-label" style="position: absolute; bottom: 8px; left: 8px; background: ${isNew ? 'rgba(40,167,69,0.9)' : 'rgba(0,0,0,0.7)'}; color: white; padding: 4px 8px; border-radius: 12px; font-size: 11px; font-weight: 600;">${isNew ? 'New' : 'Saved'}</div>
            ${isNew ? `<div class="file-info" style="position: absolute; bottom: 8px; right: 8px; background: rgba(0,0,0,0.7); color: white; padding: 2px 6px; border-radius: 8px; font-size: 10px;">${formatFileSize(file.size)}</div>` : ''}
        `;
        
        col.appendChild(preview);
        
        if (isNew) {
            document.getElementById('new-images-preview').appendChild(col);
        }
    };
    reader.readAsDataURL(file);
}

function updateNewImagesSection() {
    const section = document.getElementById('new-images-section');
    const hasNewImages = newImages.length > 0;
    section.style.display = hasNewImages ? 'block' : 'none';
}

function updateFileInput() {
    // Create a new FileList with remaining files
    const dt = new DataTransfer();
    newImages.forEach(img => dt.items.add(img.file));
    fileInput.files = dt.files;
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
}

// Enhanced image removal for both new and existing images
document.addEventListener('click', function(e) {
    const removeBtn = e.target.closest('.remove-image');
    if (!removeBtn) return;
    
    const imageElement = removeBtn.closest('.col-md-3') || removeBtn.closest('.existing-image');
    const fileId = removeBtn.dataset.fileId;
    const imageId = removeBtn.dataset.imageId;
    
    if (fileId && fileId.startsWith('new_')) {
        // Remove new image
        const fileName = newImages.find(img => img.id === fileId)?.file.name || 'this image';
        if (confirm(`Remove "${fileName}" from upload queue?\n\nThis image won't be uploaded.`)) {
            // Remove from newImages array
            newImages = newImages.filter(img => img.id !== fileId);
            updateFileInput();
            
            // Remove preview element
            imageElement.style.transition = 'all 0.3s';
            imageElement.style.opacity = '0';
            imageElement.style.transform = 'scale(0.8)';
            
            setTimeout(() => {
                imageElement.remove();
                updateNewImagesSection();
            }, 300);
        }
    } else if (imageId) {
        // Remove existing image (your existing logic)
        const imageSrc = imageElement.querySelector('img').src.split('/').pop();
        if (confirm(`Remove this image from gallery?\n\nFile: ${imageSrc}\n\nThis action cannot be undone.`)) {
            // Add to removal list
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'images_to_remove[]';
            input.value = imageId;
            document.getElementById('centreForm').appendChild(input);
            
            // Visual removal
            imageElement.style.transition = 'all 0.3s';
            imageElement.style.opacity = '0';
            imageElement.style.transform = 'scale(0.8)';
            
            setTimeout(() => {
                imageElement.remove();
                checkIfNoImages();
            }, 300);
        }
    }
});

// Clear all new images
document.getElementById('clear-all-new').addEventListener('click', function() {
    if (newImages.length === 0) return;
    
    if (confirm(`Clear all ${newImages.length} new image(s)?\n\nThis will remove them from the upload queue.`)) {
        newImages = [];
        updateFileInput();
        document.getElementById('new-images-preview').innerHTML = '';
        updateNewImagesSection();
    }
});

function checkIfNoImages() {
    const existingImages = document.querySelectorAll('#existing-images .existing-image:not([style*="opacity: 0"])');
    if (existingImages.length === 0) {
        document.getElementById('existing-images').innerHTML = `
            <div class="col-12 text-center" id="no-images-message">
                <div class="empty-state" style="text-align: center; padding: 30px; border: 2px dashed #dee2e6; border-radius: 10px; background: #f8f9fa;">
                    <i class="fa fa-image fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No images in gallery</p>
                    <p class="text-info">Use the upload area above to add images!</p>
                </div>
            </div>
        `;
    }
}

// Form validation
document.getElementById('centreForm').addEventListener('submit', function(e) {
    var requiredFields = ['centre_name', 'centre_address', 'centre_postcode', 'city_id', 'state_id'];
    var isValid = true;
    
    requiredFields.forEach(function(fieldName) {
        var field = document.getElementById(fieldName);
        if (!field.value.trim()) {
            field.style.borderColor = '#dc3545';
            isValid = false;
        } else {
            field.style.borderColor = '#ddd';
        }
    });
    
    if (!isValid) {
        e.preventDefault();
        alert('Please fill in all required fields marked with *');
    }
});

// Form Submission
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('centreForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('/industry/update', {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showToast(data.message.replace(/\n/g, '<br>'), 'success');
                setTimeout(() => location.reload(), 1500);
            } else {
                showToast(data.message || 'An error occurred', 'error');
            }
        })
        .catch(error => {
            showToast('Network error occurred. Please try again.', 'error');
        });
    });
});

// Alert Toast
function showToast(message, type = 'info') {
    let container = document.getElementById('toast-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        container.style.position = 'fixed';
        container.style.top = '20px';
        container.style.right = '20px';
        container.style.zIndex = '1055';
        document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.style.minWidth = '250px';
    toast.style.marginBottom = '10px';
    toast.style.padding = '15px 20px';
    toast.style.borderRadius = '8px';
    toast.style.color = '#fff';
    toast.style.fontSize = '14px';
    toast.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(100%)';
    toast.style.transition = 'all 0.4s ease';

    // Use innerHTML to support <br>
    toast.innerHTML = message;

    if (type === 'success') toast.style.background = '#28a745';
    if (type === 'error')   toast.style.background = '#dc3545';
    if (type === 'info')    toast.style.background = '#17a2b8';

    container.appendChild(toast);

    // Trigger animation
    setTimeout(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateX(0)';
    }, 100);

    // Auto remove after 3s
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => toast.remove(), 400);
    }, 5000);
}

//Quota Management Section
$(document).ready(function() {
    let subjectIndex = <?= !empty($subjectsNeeded) ? count($subjectsNeeded) : 0 ?>;
    const jpnQuota = <?= isset($schoolDetail[0]['quota_limit']) ? $schoolDetail[0]['quota_limit'] : 0 ?>;
    
    // Add new subject row
    $('#add-subject').click(function() {
        const subjectRow = `
            <div class="subject-quota-row mb-3 p-3 border rounded">
                <div class="row">
                    <div class="col-md-6">
                        <label for="subject_${subjectIndex}">Subject</label>
                        <select class="form-control" name="subjects[${subjectIndex}][teach_subject_id]" id="subject_${subjectIndex}" required>
                            <option value="">Select Subject</option>
                            <?php if (!empty($availableSubjects)) : ?>
                                <?php foreach ($availableSubjects as $availableSubject) : ?>
                                    <option value="<?= $availableSubject['teach_subject_id'] ?>">
                                        <?= esc($availableSubject['teach_subject_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="quota_${subjectIndex}">Students Needed</label>
                        <input type="number" 
                               class="form-control quota-input" 
                               name="subjects[${subjectIndex}][needed_quota]" 
                               id="quota_${subjectIndex}" 
                               min="1" 
                               required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-subject">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        $('#subject-quota-container').append(subjectRow);
        subjectIndex++;
        calculateTotal();
    });
    
    // Remove subject row
    $(document).on('click', '.remove-subject', function() {
        $(this).closest('.subject-quota-row').remove();
        calculateTotal();
    });
    
    // Calculate total when quota inputs change
    $(document).on('input', '.quota-input', function() {
        calculateTotal();
    });
    
    // Calculate total function
    function calculateTotal() {
        let total = 0;
        $('.quota-input').each(function() {
            const value = parseInt($(this).val()) || 0;
            total += value;
        });

        if (total >= jpnQuota) {
            $('#quota-warning').show();
            $('#add-subject').prop('disabled', true);

            // Disable increasing further
            $('.quota-input').each(function() {
                const currentVal = parseInt($(this).val()) || 0;
                const remaining = jpnQuota - (total - currentVal);
                $(this).attr('max', remaining); // set max so they cannot increase beyond limit
            });
        } else {
            $('#quota-warning').hide();
            $('#add-subject').prop('disabled', false);

            // Reset max so fields can adjust freely again
            $('.quota-input').removeAttr('max');
        }
    }
    
    // Initial calculation
    calculateTotal();
});
</script>
