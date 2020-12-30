<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RBW Business</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/hus/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <!-- <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Custom CSS -->
	<!-- <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css"> -->
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/front.js"></script>
	 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/multiselect/multiselect.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/register/css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();  ?>assets/register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/register/css/style.css"/>
	<!--alerts CSS -->
	<link href="<?php echo base_url(); ?>assets/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
	<!--<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>-->
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>
    <script>
		var admin_loc='<?php echo base_url().'admin_ajax/'; ?>';
		var base_loc='<?php echo base_url().'admin/'; ?>';
    </script>

    <style>
    .header-area .social_wrap .login_textt a {
    color: #fff;
    font-size: 16px;
    font-weight: 400;
    font-family: "Roboto", sans-serif;
    margin-right: 10px;
}
    </style>
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="<?php echo site_url('welcome'); ?>">
                                <h3 style="color:#ffffff">RBW Business</h3>
                                    <!-- <img class="logo_img" src="<?php echo base_url();  ?>assets/hus/img/logo.jpeg" alt="" style=""> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="<?php echo site_url('welcome'); ?>">home</a></li>
                                        <li><a href="<?php echo site_url('welcome/about'); ?>">About</a></li>
                                     
                                      
                                        <li><a href="<?php echo site_url('welcome/contact'); ?>">Contact</a></li>
                                        <li><a href="<?php echo site_url('/franchise'); ?>">Franchise Login</a></li>
                                    
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 d-block d-lg-block">
                            <div class="social_wrap d-flex align-items-center justify-content-end">
                                <div class="login_textt" >
                                <a  href="<?php echo site_url('registration'); ?>">Register</a>
                                </div>
                                <div class="login_text">
                                <a  href="<?php echo site_url('admin'); ?>">Login</a>
                                </div>

                               
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>