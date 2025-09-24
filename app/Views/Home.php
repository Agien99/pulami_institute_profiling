<?= $this->extend("layout") ?>
<?= $this->section("content") ?>
<style>
    html {
        scroll-behavior: smooth;
    }
    
    /* Pagination Styles */
    .pagination-wrapper {
        text-align: center;
        margin: 30px 0;
    }
    
    .pagination {
        display: inline-flex;
        list-style: none;
        padding: 0;
        margin: 0;
        border-radius: 5px;
    }
    
    .pagination li {
        margin: 0 2px;
    }
    
    .pagination a, .pagination span {
        display: block;
        padding: 10px 15px;
        text-decoration: none;
        border: 1px solid #ddd;
        color: #333;
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .pagination a:hover {
        background-color: #f5f5f5;
        border-color: #999;
    }
    
    .pagination .active span {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
    
    .pagination .disabled span {
        color: #999;
        cursor: not-allowed;
    }
    
    .results-info {
        text-align: center;
        margin: 20px 0;
        color: #666;
        font-size: 14px;
    }
    
    .school-item {
        display: none;
    }
    
    .school-item.show {
        display: block;
    }
    
    .no-results {
        display: none;
        text-align: center;
        padding: 40px 0;
        color: #999;
    }

    .nice-select .list {
        max-height: 200px;
        overflow-y: auto;
    }
</style>

<!--================Banner Area =================-->
<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>Universiti Pendidikan Sultan Idris</h6>
                <h2>Institute Profilling</h2>
                <p>A place for you to search for you Internship and Teaching Practice</p>
                <a href="#LM" class="btn theme_btn button_hover">Get Started</a>
            </div>
        </div>
    </div>
    <div class="hotel_booking_area position">
        <div class="container">
            <div class="hotel_booking_table">
                <div class="col-md-3">
                    <h2>Find<br> Your Institute</h2>
                </div>
                <div class="col-md-9">
                    <div class="boking_table">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="book_tabel_item">
                                    <div class="input-group">
                                        <select id="state-filter" name="state" class="form-control">
                                            <option value="">~All State~</option>
                                            <?php foreach ($state as $states): ?>
                                                <option value="<?= $states['state_id'] ?>"><?= $states['state_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="book_tabel_item">
                                    <div class="input-group">
                                        <select id="tag-filter" name="tag" class="form-control">
                                            <option value="">~All Practicum~</option>
                                            <?php foreach ($tag as $tags): ?>
                                                <option value="<?= $tags['practicum_type_id'] ?>"><?= $tags['practicum_type_code'] ?> - <?= $tags['practicum_type_desc'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--================Banner Area =================-->


<!--================ LM Area  =================-->
<section id="LM" class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Latihan Mengajar</h2>
            <p>For ISMP student that are going for your teaching practice </p>
        </div>
        
        <!-- Results Info -->
        <div class="results-info" id="results-info">
            <!-- Will be updated by JavaScript -->
        </div>
        
        <div class="row mb_30" id="school-container">
            <!-- Dynamic School List -->
            <?php if (!empty($schoolList)) : ?>
                <?php foreach ($schoolList as $index => $school) : ?>
                    <div class="col-lg-3 col-sm-6 school-item" 
                        data-state="<?= $school['state_id'] ?>" 
                        data-tag="<?= isset($school['practicum_type_id']) ? $school['practicum_type_id'] : '' ?>"
                        data-index="<?= $index ?>">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <?php 
                                    $images = !empty($school['centre_image_attachments']) 
                                        ? explode(',', $school['centre_image_attachments']) 
                                        : [];
                                    $firstImage = $images[0] ?? null;
                                ?>
                                <img 
                                    src="<?= $firstImage ? base_url('image/schooldetail/' . $school['centre_code'] . '/' . trim($firstImage)) : base_url('image/plmi.png') ?>" 
                                    class="img-fluid"
                                    style="width:230px; height:230px; object-fit:cover;" 
                                    alt="">
                                <a href="<?= base_url('detail2/' . $school['centre_id']) ?>" class="btn theme_btn button_hover">Learn more</a>
                            </div>
                            <a href="<?= base_url('detail/' . $school['centre_id']) ?>">
                                <h4 class="sec_h4"><?= esc($school['centre_name']) ?></h4>
                            </a>
                            <h5><?= esc($school['city_name']) ?>, <?= esc($school['state_name']) ?></h5>

                            <?php if (!empty($school['practicum_type_id'])): ?>
                                <?php 
                                    $ids   = explode(',', $school['practicum_type_id']);
                                    $descs = explode(',', $school['practicum_type_desc']);
                                ?>
                                <?php foreach ($ids as $i => $id): ?>
                                    <span class="badge text-white bg-success mt-2">
                                        <?= trim($descs[$i] ?? '') ?>
                                    </span>
                                    <br>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <!-- No Results Message -->
        <div class="no-results" id="no-results">
            <p>No schools found matching your criteria.</p>
        </div>
        
        <!-- Pagination -->
        <div class="pagination-wrapper" id="pagination-wrapper">
            <ul class="pagination" id="pagination">
                <!-- Pagination will be generated by JavaScript -->
            </ul>
        </div>
    </div>
</section>
<!--================ LM Area  =================-->

<!--================ LI Area  =================-->
<section id="LI" class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Latihan Industri</h2>
            <p>For ISM/ISM student that are going for your teaching practice </p>
        </div>
        <div class="row mb_30">
            <?php if (!empty($companyList)) : ?>
                <?php foreach ($companyList as $index => $company) : ?>
                    <div class="col-lg-3 col-sm-6 company-item" 
                        data-state="<?= $company['state_id'] ?>" 
                        data-tag="<?= isset($company['practicum_type_id']) ? $company['practicum_type_id'] : '' ?>"
                        data-index="<?= $index ?>">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <?php 
                                    $images = !empty($company['centre_image_attachments']) 
                                        ? explode(',', $company['centre_image_attachments']) 
                                        : [];
                                    $firstImage = $images[0] ?? null;
                                ?>
                                <img 
                                    src="<?= $firstImage ? base_url('image/industrydetail/' . $company['centre_code'] . '/' . trim($firstImage)) : base_url('image/plmi.png') ?>" 
                                    class="img-fluid"
                                    style="width:230px; height:230px; object-fit:cover;" 
                                    alt="">
                                <a href="<?= base_url('detail2/' . $company['centre_id']) ?>" class="btn theme_btn button_hover">Learn more</a>
                            </div>
                            <a href="<?= base_url('detail2/' . $company['centre_id']) ?>">
                                <h4 class="sec_h4"><?= esc($company['centre_name']) ?></h4>
                            </a>
                            <h5><?= esc($company['city_name']) ?>, <?= esc($company['state_name']) ?></h5>

                            <?php if (!empty($company['practicum_type_id'])): ?>
                                <?php 
                                    $ids   = explode(',', $company['practicum_type_id']);
                                    $descs = explode(',', $company['practicum_type_desc']);
                                ?>
                                <?php foreach ($ids as $i => $id): ?>
                                    <span class="badge text-white bg-success mt-2">
                                        <?= trim($descs[$i] ?? '') ?>
                                    </span>
                                    <br>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--================ LI Area  =================-->

<!--================ About History Area  =================-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">
// Pagination variables
let currentPage = 1;
let itemsPerPage = 8;
let filteredItems = [];
let totalItems = 0;

$(document).ready(function() {
    // Initialize nice select
    $('#state-filter').niceSelect();
    $('#tag-filter').niceSelect();

    // Initialize filters, pagination, and section visibility on page load
    filterCompanies();
    initializePagination();
    updateSectionVisibility();

    // Add change event listeners for filters
    $('#state-filter').on('change', function() {
        filterSchools();
        filterCompanies();
    });

    $('#tag-filter').on('change', function() {
        filterSchools();
        filterCompanies();
        updateSectionVisibility();
    });
});

function filterCompanies() {
    const stateFilter = $('#state-filter').val();
    const tagFilter = $('#tag-filter').val();

    $('.company-item').each(function() {
        const itemState = $(this).data('state').toString();
        const itemTags = $(this).data('tag').toString().split(',');

        let matchState = !stateFilter || stateFilter === '' || itemState === stateFilter;
        let matchTag = !tagFilter || tagFilter === '' || itemTags.includes(tagFilter);

        if (matchState && matchTag) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

function updateSectionVisibility() {
    const selectedOption = $('#tag-filter').find('option:selected');
    const selectedTagText = selectedOption.text();
    const lmSection = $('#LM');
    const liSection = $('#LI');

    if (selectedTagText.includes('LM') || selectedTagText.includes('PG')) {
        lmSection.show();
        liSection.hide();
    } else if (selectedTagText.includes('LI')) {
        lmSection.hide();
        liSection.show();
    } else {
        lmSection.show();
        liSection.show();
    }
}

function initializePagination() {
    // Get all school items
    filteredItems = $('.school-item').toArray();
    totalItems = filteredItems.length;
    
    // Show first page
    showPage(1);
    updatePagination();
    updateResultsInfo();
}

function filterSchools() {
    const stateFilter = $('#state-filter').val();
    const tagFilter = $('#tag-filter').val();
    
    // Filter items based on selected criteria
    filteredItems = $('.school-item').filter(function() {
        const itemState = $(this).data('state').toString();
        const itemTags = $(this).data('tag').toString().split(','); // split multiple tags
        
        let matchState = !stateFilter || stateFilter === '' || itemState === stateFilter;
        let matchTag = !tagFilter || tagFilter === '' || itemTags.includes(tagFilter); // check contains
        
        return matchState && matchTag;
    }).toArray();
    
    totalItems = filteredItems.length;
    currentPage = 1; // Reset to first page
    
    // Show filtered results
    showPage(1);
    updatePagination();
    updateResultsInfo();
    
    // Scroll to results
    $('html, body').animate({
        scrollTop: $('#LM').offset().top - 100
    }, 500);
}

function showPage(page) {
    currentPage = page;
    
    // Hide all items first
    $('.school-item').removeClass('show');
    
    // Calculate start and end indices
    const startIndex = (page - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    
    // Show items for current page
    for (let i = startIndex; i < endIndex && i < filteredItems.length; i++) {
        $(filteredItems[i]).addClass('show');
    }
    
    // Show/hide no results message
    if (filteredItems.length === 0) {
        $('#no-results').show();
        $('#pagination-wrapper').hide();
    } else {
        $('#no-results').hide();
        $('#pagination-wrapper').show();
    }
}

function updatePagination() {
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    
    if (totalPages <= 1) {
        $('#pagination-wrapper').hide();
        return;
    }
    
    $('#pagination-wrapper').show();
    let paginationHtml = '';
    
    // Previous button
    if (currentPage > 1) {
        paginationHtml += `<li><a onclick="goToPage(${currentPage - 1})">« Previous</a></li>`;
    } else {
        paginationHtml += '<li class="disabled"><span>« Previous</span></li>';
    }
    
    // Page numbers
    const startPage = Math.max(1, currentPage - 2);
    const endPage = Math.min(totalPages, currentPage + 2);
    
    // First page if not in range
    if (startPage > 1) {
        paginationHtml += '<li><a onclick="goToPage(1)">1</a></li>';
        if (startPage > 2) {
            paginationHtml += '<li class="disabled"><span>...</span></li>';
        }
    }
    
    // Page range
    for (let i = startPage; i <= endPage; i++) {
        if (i === currentPage) {
            paginationHtml += `<li class="active"><span>${i}</span></li>`;
        } else {
            paginationHtml += `<li><a onclick="goToPage(${i})">${i}</a></li>`;
        }
    }
    
    // Last page if not in range
    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            paginationHtml += '<li class="disabled"><span>...</span></li>';
        }
        paginationHtml += `<li><a onclick="goToPage(${totalPages})">${totalPages}</a></li>`;
    }
    
    // Next button
    if (currentPage < totalPages) {
        paginationHtml += `<li><a onclick="goToPage(${currentPage + 1})">Next »</a></li>`;
    } else {
        paginationHtml += '<li class="disabled"><span>Next »</span></li>';
    }
    
    $('#pagination').html(paginationHtml);
}

function updateResultsInfo() {
    if (totalItems === 0) {
        $('#results-info').text('No schools found');
        return;
    }
    
    const startRecord = ((currentPage - 1) * itemsPerPage) + 1;
    const endRecord = Math.min(currentPage * itemsPerPage, totalItems);
    
    $('#results-info').text(`Showing ${startRecord} - ${endRecord} of ${totalItems} schools`);
}

function goToPage(page) {
    showPage(page);
    updatePagination();
    updateResultsInfo();
    
    // Scroll to top of results
    $('html, body').animate({
        scrollTop: $('#LM').offset().top - 100
    }, 300);
}

function handleSelect(elm) {
    window.location = elm.value;
}
</script>
</body>
<?= $this->endSection() ?>