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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <style>
        footer {
            background: #333;
            text-align: center;
            padding: 30px 15px;
        }
        .login-buttons {
            margin-top: 15px;
        }
        .login-buttons .btn {
            margin-right: 10px;
            margin-bottom: 5px;
        }
        .username-status {
            margin-top: 10px;
            font-size: 12px;
            min-height: 20px;
        }
        .username-status .text-success {
            color: #28a745 !important;
        }
        .username-status .text-danger {
            color: #dc3545 !important;
        }
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
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
                    <?php if(session()->getFlashdata('login_error')): ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('login_error') ?>
                        </div>
                    <?php endif; ?>
                    <?php if(session()->getFlashdata('login_success')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('login_success') ?>
                        </div>
                    <?php endif; ?>

                    <form id="loginForm" method="post" action="<?= base_url('/login')?>">
                        <div id="loginMessage"></div> <!-- message will appear here -->
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                            <div id="usernameStatus" class="username-status"></div>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="login-buttons" id="loginButtons" style="display: none;">
                            <button type="submit" class="btn btn-primary" id="schoolLoginBtn" data-login-type="school" style="display: none;">School Login</button>
                            <button type="submit" class="btn btn-secondary" id="industryLoginBtn" data-login-type="industry" style="display: none;">Industry Login</button>
                        </div>
                        <div id="noAccessMessage" class="alert alert-warning" style="display: none; margin-top: 15px;">
                            This username is not registered for any practicum type.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
$(document).ready(function() {
    var loginType = 'school'; // default
    var usernameCheckTimeout;

    // Function to check username availability and practicum types
    function checkUsername(username) {
        if (username.length < 2) {
            resetLoginButtons();
            return;
        }

        $('#usernameStatus').html('<span class="spinner-border spinner-border-sm" role="status"></span> Checking username...');
        
        $.ajax({
            type: "POST",
            url: "<?= base_url('/checkUsername') ?>",
            data: { username: username },
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    var types = response.practicum_types;
                    
                    // Create numbered list of practicum types
                    var numberedTypes = types.map(function(type, index) {
                        return (index + 1) + '. ' + type;
                    });
                    
                    var statusText = '<span class="text-success">✓ Username found! <br> Available for:<br> ' + numberedTypes.join('<br>') + '</span>';
                    $('#usernameStatus').html(statusText);
                    
                    // Show appropriate buttons based on practicum types
                    showLoginButtons(types);
                } else {
                    $('#usernameStatus').html('<span class="text-danger">✗ Username not found</span>');
                    resetLoginButtons();
                }
            },
            error: function() {
                $('#usernameStatus').html('<span class="text-danger">✗ Error checking username</span>');
                resetLoginButtons();
            }
        });
    }

    // Function to show appropriate login buttons
    function showLoginButtons(types) {
        $('#loginButtons').show();
        $('#noAccessMessage').hide();
        $('#schoolLoginBtn').hide();
        $('#industryLoginBtn').hide();

        var hasSchoolAccess = types.includes('Perantis Guru') || types.includes('Latihan Mengajar');
        var hasIndustryAccess = types.includes('Latihan Industri');

        if (hasSchoolAccess) {
            $('#schoolLoginBtn').show();
        }

        if (hasIndustryAccess) {
            $('#industryLoginBtn').show();
        }

        if (!hasSchoolAccess && !hasIndustryAccess) {
            $('#loginButtons').hide();
            $('#noAccessMessage').show();
        }
    }

    // Function to reset login buttons
    function resetLoginButtons() {
        $('#loginButtons').hide();
        $('#noAccessMessage').hide();
        $('#schoolLoginBtn').hide();
        $('#industryLoginBtn').hide();
        $('#usernameStatus').html('');
    }

    // Username input event with debouncing
    $('#username').on('input', function() {
        var username = $(this).val().trim();
        
        // Clear previous timeout
        clearTimeout(usernameCheckTimeout);
        
        if (username.length === 0) {
            resetLoginButtons();
            return;
        }

        // Set new timeout for username checking (500ms delay)
        usernameCheckTimeout = setTimeout(function() {
            checkUsername(username);
        }, 500);
    });

    // Detect which button is clicked
    $('#loginForm button[type=submit]').click(function(e) {
        loginType = $(this).data('login-type');
    });

    $('#loginForm').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        $('#loginMessage').html('');

        // Check if username is valid before proceeding
        var username = $('#username').val().trim();
        if (username.length < 2) {
            $('#loginMessage').html('<div class="alert alert-danger">Please enter a valid username</div>');
            return;
        }

        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize() + '&login_type=' + loginType,
            dataType: "json",
            success: function(response) {
                if(response.status === 'success') {
                    $('#loginMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                    setTimeout(function() {
                        $('#loginModal').modal('hide');
                        window.location.href = response.redirect;
                    }, 1000);
                } else {
                    $('#loginMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    setTimeout(function() {
                        $('#loginMessage').html('');
                    }, 5000);
                }
            },
            error: function() {
                $('#loginMessage').html('<div class="alert alert-danger">Something went wrong.</div>');
            }
        });
    });

    // Reset form when modal is closed
    $('#loginModal').on('hidden.bs.modal', function() {
        $('#loginForm')[0].reset();
        resetLoginButtons();
        $('#loginMessage').html('');
    });
});
</script></document_content>