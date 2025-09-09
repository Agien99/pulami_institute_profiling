<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="image/PLMSYSLOGO.ico">

    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Institute Profiling</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/linericon/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/owl-carousel/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/nice-select/css/nice-select.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/owl-carousel/owl.carousel.min.css'); ?>">
    <!-- main css -->
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/responsive.css'); ?>">
    <!-- Leaflet API -->
    <!-- Leaflet css and js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        footer {
            background: #333;
            text-align: center;
            padding: 30px 15px;
        }
    </style>
</head>
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="<?= base_url('/')?>"><img src="<?= base_url('image/PLMISYSL.png'); ?>" style=" height: 90px; max-width: 620px;" alt="Institute Profilling"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <?php $current = uri_string(); ?>
                    <li class="nav-item <?= ($current == '') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                    </li>
                    <li class="nav-item <?= ($current == 'more') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('/more') ?>">More Company</a>
                    </li>
                    <li class="nav-item <?= ($current == 'area') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('/area') ?>">Search By Area</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">School / Company Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<body>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $this->renderSection("content") ?>
    </div>

    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | Institute Profilling <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">PulamiSys</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?= base_url('/login')?>">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</body>