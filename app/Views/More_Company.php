<?= $this->extend("layout") ?>
<?= $this->section("content") ?>
<style>
  

    *::selection {
        background-color: transparent;
    }

    * {
        cursor: default;
        box-sizing: border-box;
    }
    .contain {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .search {
       
        border: 0;
        border-radius: 30px 0 0 30px;
        padding: 0 10px 0 10px;
        text-align: center;
        color: black;
        height: 50px;
        width: 500px;
        font-size: 25px;
        font-weight: 1000;
    }

    .search::selection {
        background-color: red;
        color: white;
    }

    .search:focus {
        border: 0;
        outline: 0;
    }

    .search:hover {
        cursor: text;
    }
    .search-btn {
        transition: 0.2s ease-in-out;
        border: 0;
        border-radius: 0 30px 30px 0;
        padding: 0 10px 0 10px;
        text-align: center;
        color: black;
        position: relative;
        background-color: yellow;
        height: 50px;
        width: 100px;
        font-size: 25px;
        font-weight: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-btn:hover {
        transition: 0.2s ease-in-out;
        background-color: #FFBF00;
        font-size: 30px;
        font-weight: 800;
        cursor: pointer;
    }
</style>

<body>

    <!--================Breadcrumb Area =================-->
    <section class="breadcrumb_area">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="page-cover text-center">
                <h2 class="page-cover-tittle">More Company</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">More Company</li>
                </ol>
            </div>
        </div>
    </section>
    <!--================Breadcrumb Area =================-->
    <!--================Filter Area =================-->
    <br>
    <section class="hotel_booking_area">
        <div class="container">
            <div class="row hotel_booking_table">
                <div class="col-md-3">
                    <h2>Filter <br> Institute</h2>
                </div>
                <div class="col-md-9">
                    <div class="contain">

                        <input type="text" class="search" id="search-inp" placeholder="Search for company...">

                        <button class="search-btn" id="search-inp-btn">&#x027A4;</button>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Filter Area  =================-->
    <!--================ Accomodation Area  =================-->
    <section class="accomodation_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">More Company</h2>
                <p>This page is for the student who wants to find more company or view all the company in the website</p>
            </div>
            <div class="row accomodation_two">
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/LOGOSMKJPP.png" alt="">
                            <a href="detail" class="btn theme_btn button_hover">View Detail</a>
                        </div>
                        <a href="detail">
                            <h4 class="sec_h4">SMK Jalan Pasir Puteh</h4>
                        </a>
                        <h5>Ipoh, Perak</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/Longi.png" alt="">
                            <a href="centre_details2" class="btn theme_btn button_hover">View Detail</a>
                        </div>
                        <a href="centre_details2">
                            <h4 class="sec_h4">Longi Solar</h4>
                        </a>
                        <h5>Kuching Sawarak</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/upsi.png" alt="">
                            <a href="#" class="btn theme_btn button_hover">View Detail</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Institute Name</h4>
                        </a>
                        <h5>Code</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/upsi.png" alt="">
                            <a href="#" class="btn theme_btn button_hover">View Detail</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Institute Name</h4>
                        </a>
                        <h5>Code</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/upsi.png" alt="">
                            <a href="#" class="btn theme_btn button_hover">View Detail</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Institute Name</h4>
                        </a>
                        <h5>Code</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/upsi.png" alt="">
                            <a href="#" class="btn theme_btn button_hover">View Detail</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">INstitute Name</h4>
                        </a>
                        <h5>Code</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/upsi.png" alt="">
                            <a href="#" class="btn theme_btn button_hover">View Detail</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Institute Name</h4>
                        </a>
                        <h5>Code</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="hotel_img">
                            <img src="image/upsi.png" alt="">
                            <a href="#" class="btn theme_btn button_hover">View Detail</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Institute Name</h4>
                        </a>
                        <h5>Code</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Accomodation Area  =================-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="js/custom.js"></script>

    <script>document.querySelector(".search-btn").addEventListener("click", ()=>{document.querySelector(".search").value = ""}) </script>
</body>

</html>
<?= $this->endSection() ?>