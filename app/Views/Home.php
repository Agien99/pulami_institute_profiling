<?= $this->extend("layout") ?>
<?= $this->section("content") ?>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<html>
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
                                        <select class="wide" onchange="javascript:handleSelect(this)">
                                            <option data-display="State">State</option>
                                            <option value="area">Perak</option>
                                            <option value="2">State 2</option>
                                            <option value="3">State 3</option>
                                        </select>
                                    </div>
                                    <a class="book_now_btn button_hover" href="#">Search</a>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="book_tabel_item">
                                    <div class="input-group">
                                        <select class="wide">
                                            <option data-display="Tag">Tag</option>
                                            <option value="1">LI</option>
                                            <option value="2">LM</option>
                                            <option value="3">PPG</option>
                                        </select>
                                    </div>
                                    <a class="book_now_btn button_hover" href="#">Search</a>
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
        <div class="row mb_30">
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/LOGOSMKJPP.png" width="230" height="230" alt="">
                        <a href="detail" class="btn theme_btn button_hover">Learn more</a>
                    </div>
                    <a href="detail">
                        <h4 class="sec_h4">SMK Jalan Pasir Putih Ipoh</h4>
                    </a>
                    <h5>Ipoh, Perak</h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/upsi.png" alt="">
                        <a href="#" class="btn theme_btn button_hover">Learn more</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">School 2</h4>
                    </a>
                    <h5>School Code</h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/upsi.png" alt="">
                        <a href="#" class="btn theme_btn button_hover">Learn more</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">School 3</h4>
                    </a>
                    <h5>School Code</h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/upsi.png" alt="">
                        <a href="#" class="btn theme_btn button_hover">Learn more</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">School 4</h4>
                    </a>
                    <h5>School Code</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ LM Area  =================-->

<!--================ LI Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Latihan Industri</h2>
            <p>For ISMP student that are going for your teaching practice </p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/Longi.png" alt="">
                        <a href="centre_details2" class="btn theme_btn button_hover">Learn more</a>
                    </div>
                    <a href="centre_details2">
                        <h4 class="sec_h4">Longi</h4>
                    </a>
                    <h5>Kuching, Sarawak</h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/plmi.png" alt="">
                        <a href="#" class="btn theme_btn button_hover">Learn more</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">Institute 2</h4>
                    </a>
                    <h5>Address</h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/plmi.png" alt="">
                        <a href="#" class="btn theme_btn button_hover">Learn more</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">Institute 3</h4>
                    </a>
                    <h5>Address</h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="image/plmi.png" alt="">
                        <a href="#" class="btn theme_btn button_hover">Learn more</a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">Institute 4</h4>
                    </a>
                    <h5>Address</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ LI Area  =================-->


<!--================ More Institute Area Area  =================-->
<section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center">
                <div class="about_content ">
                    <h2 class="title title_color">More <br>Institute</h2>
                    <p></p>
                    <a href="more" class="button_hover theme_btn_two">View More</a>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="image/more.jpg" alt="img">
            </div>
        </div>
    </div>
</section>

</html>
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
  function handleSelect(elm)
  {
     window.location = elm.value;
  }
</script> 
</body>
<?= $this->endSection() ?>