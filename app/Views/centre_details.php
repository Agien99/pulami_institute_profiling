
<?= $this->extend("layout") ?>
<?= $this->section("content") ?>
        
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>

        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area blog_banner_two">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle f_48">Centre Details</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="blog.html">Centre</a></li>
                        <li class="active">Centre Details</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-12">
                                <div class="feature-img">
                                    <img class="img-fluid" src="image/schooldetail/aea2043/1.jpg" alt="">
                                </div>									
                            </div>
                            <div class="col-lg-9 col-md-9 blog_details">
                                <h2><?= esc($schoolDetail[0]['centre_name']) ?></h2>
                                <p class="excert">
                                    <h4>Address</h4>
                                    <?= esc($schoolDetail[0]['centre_address']) ?>
                                </p>
                                
                            </div>
                            <div class="col-lg-12">
                                <div class="quotes">
                                <h2>Centre Details</h2>
                                <div class="col-lg-6  col-md-6">
                                    <ul class="blog_meta list_style">
                                        <li><h5>Postcode : <?= esc($schoolDetail[0]['centre_postcode']) ?></h5></li>
                                        <li><h5>City : <?= esc($schoolDetail[0]['city_name']) ?></h5></li>
                                        <li><h5>State : <?= esc($schoolDetail[0]['state_name']) ?></h5></li>
                                        <li><h5>Telephone No. : <?= esc($schoolDetail[0]['centre_phone']) ?></h5></li>
                                        <li><h5>Email : <?= esc($schoolDetail[0]['centre_email']) ?></h5></li>
                                    </ul>
                                </div>
                                <br>
                                <div id="map" style="height:300px; width:100%; max-width:700px;">
                                </div>
                                
                            </div>
                                <div class="quotes">
                                <h2>Gallery</h2>    
                                    <?php if (!empty($schoolImage)) : ?>
                                        <?php foreach ($schoolImage as $index => $schoolImages) : ?>
                                            <div class="col-6">
                                                <img class="img-fluid" style="height:180px ; width:450px; object-fit:cover; padding-bottom:10px" src="<?= base_url('image/schooldetail/') . esc($schoolImages['centre_code']) . '/' . esc($schoolImages['centre_image_attachment']) ?>" alt="">
                                            </div>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                            <div class="col-12 text-center py-4">
                                                <p class="text-muted mb-0">No Images have been uploaded yet</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        </div>
                        <div class="comments-area">
                            <h4>Feedbacks</h4>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="image/blog/c1.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Anastasia</a></h5>
                                            <p class="date">June 6, 2021 at 3:12 pm </p>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <p class="comment">
                                                Great school!  Teachers and Principal were great! Always help to teach me whenever I need it.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="comment-list left-padding">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="image/blog/c2.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Adrian</a></h5>
                                            <p class="date">June 4, 2021 at 12:04 pm </p>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <p class="comment">
                                                Para guru dan pelajar sporting
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="comment-list left-padding">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="image/blog/c3.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Anne </a></h5>
                                            <p class="date">June 4, 2021 at 11:12 am </p>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <p class="comment">
                                                Kelengkapan sekolah seperti asrama dan komputer lengkap. Para guru suka memberi tunjuk ajar kepada saya
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="image/blog/c4.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Maria</a></h5>
                                            <p class="date">May 27, 2021 at 4:51 pm </p>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <p class="comment">
                                                Sekolah yang terbaik untuk LM! Cikgu-cikgu suka memberi tunjuk ajar kepada pelajar yang sedang menjalani LM.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="image/blog/c5.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Stephen</a></h5>
                                            <p class="date">May 20, 2021 at 1:08 pm </p>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            
                                            <p class="comment">
                                                Rasa macam nak mengulang LM kat sekolah ni. Pelajar sporting, cikgu sporting. Kelengkapan memang lengkap. Komputer, asrama untuk pelajar LM, makmal sains, perpustakaan dan lain-lain.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>	                                             				
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">School Info</h4>
                                <ul class="list_style cat-list">
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>School Type :</p>
                                            <p><?= esc($schoolDetail[0]['school_type_name']) ?></p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>School Location</p>
                                            <p><?= esc($schoolDetail[0]['school_location_name']) ?></p>
                                        </a>
                                    </li>										
                                </ul>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Industry Info</h4>
                                <ul class="list_style cat-list">
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Industry Sector</p>
                                            <p><?= esc($schoolDetail[0]['sector_name']) ?></p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex justify-content-between">
                                            <p>Industry Type</p>
                                            <p><?= esc($schoolDetail[0]['industry_type_name']) ?></p>
                                        </a>
                                    </li>												
                                </ul>
                                <div class="br"></div>
                            </aside>

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Quota</h4>

                                <ul class="list_style cat-list">
                                    <!-- Total Quota -->
                                    <li class="d-flex justify-content-between">
                                        <span>Total Quota</span>
                                        <span><?= esc($schoolDetail[0]['quota_limit']) ?></span>
                                    </li>

                                    <!-- Subjects Needed -->
                                    <li class="mt-3">
                                        <h5>Subjects Needed</h5>
                                        <ul class="list_style cat-list">
                                            <?php if (!empty($subjectsNeeded)) : ?>
                                                <?php foreach ($subjectsNeeded as $subject) : ?>
                                                    <li class="d-flex justify-content-between">
                                                        <span><?= esc($subject['teach_subject_name']) ?></span>
                                                        <span><?= esc($subject['needed_quota']) ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <li class="text-muted">No subjects needed</li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="br"></div>
                            </aside>

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Overall Rating</h4>
                                <ul class="list_style cat-list">
                                    <li>
                                       <!-- Star icons -->
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>

                                    <!-- Placeholder for average rating -->
                                    <p>Average Rating: 4.0</p>
                                    </li>			
                                </ul>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Centre For</h4>
                                <ul class="list_style cat-list">
                                    <?php if (!empty($schoolPracticumFor)) : ?>
                                        <?php foreach ($schoolPracticumFor as $index => $practicumFor) : ?>
                                            <li><a href="#"><?= esc($practicumFor['practicum_type_desc']) ?></a></li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li>No practicum has been set yet</li>
                                    <?php endif; ?>
                                </ul>
                                <div class="br"></div>
                            </aside>
                            <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">Available Facilities</h4>
                                <ul class="list_style">
                                    <?php if (!empty($schoolFacilities)) : ?>
                                        <?php foreach ($schoolFacilities as $index => $schoolFacility) : ?>
                                            <li><a href="#"><?= esc($schoolFacility['facilities_name']) ?></a></li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li>No Facilities have been listed yet</li>
                                    <?php endif; ?>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        
        
        <script>
  var latitude = <?= esc($schoolDetail[0]['latitude']) ?>;
  var longitude = <?= esc($schoolDetail[0]['longitude']) ?>;

  var map = L.map('map').setView([latitude, longitude], 17);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  L.marker([latitude, longitude]).addTo(map);
  </script>

  
  <script>
    function calculateDistance(start, end) {
    var wazeUrl = "https://www.waze.com/ul?ll=";
    var apiUrl = "https://www.waze.com/row-RoutingManager/routingRequest?from=x:%s y:%s&to=x:%s y:%s&at=0&returnJSON=true&timeout=60000&nPaths=1&options=AVOID_TRAILS:t";
    
    // Make API request
    var requestUrl = apiUrl.format(start.x, start.y, end.x, end.y);
    
    fetch(requestUrl)
    .then(response => response.json())
    .then(data => {
        var distance = data.alternatives[0].response.results[0].length;
        console.log("Distance: " + distance + " meters");
        // Display distance on your website
        document.getElementById("distance").innerText = "Distance: " + distance + " meters";
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Example usage
var start = { x: 37.7749, y: -122.4194 }; // San Francisco
var end = { x: 34.0522, y: -118.2437 };   // Los Angeles

calculateDistance(start, end);
    </script>
       

<?= $this->endSection() ?>