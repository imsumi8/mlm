<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RMGM</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme_new/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme_new/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme_new/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
   <!--  <div class="header-area">
        <div class="container">
            <div class="row"> -->

                <!-- <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Hindi</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> -->
           <!--  </div>
        </div>
    </div> --> 

    <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a class ="navbar-brand" href="index.html"><span><img style="height:70px;" src="<?php echo base_url(); ?>assets/theme_new/img/loo.jpeg" alt=""></span></a> </h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="<?php echo site_url('admin'); ?>"><i class="fa fa-user"></i> Login</a></div> &nbsp;<div class="shopping-item"> <a href="<?php echo site_url('registration'); ?>"><i class="fa fa-user"></i> Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Products</a></li>
                        <li><a href="single-product.html">Single product</a></li>
                        <!-- <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li> -->
                        <li><a href="#">About</a></li>
                        
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

 


                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                                <li data-target="#slide-list" data-slide-to="3"> </li>
 

                                 
                            </ol>                          
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are awesome</h2>
                                                <p>The art of medicine consists of amusing the patient while nature cures the disease </p>
                                                <p> We have now just enshrined, as soon as I sign this bill, the core principle that everybody should have some basic security when it comes to their healthcare.</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>The Best Business Solution</h2>
                                                <p>Luxary and Growth start and Lead a Royal lifestyle with RMGM!</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



<div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>The Best Business Solution</h2>
                                                <p>Luxary and Growth start and Lead a Royal lifestyle with RMGM!</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We Serve Best</h2>
                                                <p>Traditionally, remote monitoring is seen as a short-to-medium term adjunct to regular care to empower patients for self-management following hospitalization. </p> <p>Long-term use is not usually feasible due to cost. However, based on our findings, we speculate that increasing the duration of the program to enable patients to develop self-competency may improve outcomes</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo base_url(); ?>assets/theme_new/img/product-1.jpg" alt="">
                                    
                                </div>
                                
                                <h2><a href="single-product.html">blood pressure syrup</a></h2>
                                
                                 
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo base_url(); ?>assets/theme_new/img/product-2.jpg" alt="">
                                    

                                    </div>
                                
                                <h2><a href="single-product.html">&nbsp;&nbsp;kairali</a></h2>
                                
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo base_url(); ?>assets/theme_new/img/product-3.jpg" alt="">
                                    
                                </div>
                                
                                <h2><a href="single-product.html">Brahm vati</a></h2>

                                                                
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo base_url(); ?>assets/theme_new/img/product-4.jpg" alt="">
                                    
                                </div>
                                
                                <h2><a href="single-product.html">Ayush Products</a></h2>

                                                           
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo base_url(); ?>assets/theme_new/img/product-5.jpg" alt="">
                                    
                                </div>
                                
                                <h2><a href="single-product.html">Kalayna Gudam</a></h2>

                                                                 
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo base_url(); ?>assets/theme_new/img/product-6.jpg" alt="">
                                    
                                </div>
                                
                                <h2><a href="single-product.html">Organic Products</a></h2>

                                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Brands</h2>
                        <div class="brand-list">
                            <img src="<?php echo base_url(); ?>assets/theme_new/img/services_logo__1.jpg" alt="">
                            <img src="<?php echo base_url(); ?>assets/theme_new/img/services_logo__2.jpg" alt="">
                            <img src="<?php echo base_url(); ?>assets/theme_new/img/services_logo__3.jpg" alt="">
                            <img src="<?php echo base_url(); ?>assets/theme_new/img/services_logo__4.jpg" alt="">
                            <img src="<?php echo base_url(); ?>assets/theme_new/img/services_logo__1.jpg" alt="">
                            <img src="<?php echo base_url(); ?>assets/theme_new/img/services_logo__2.jpg" alt="">
                            <img src="<?php echo base_url(); ?>assets/theme_new/img/services_logo__3.jpg" alt="">
                            <img src="<?php echo base_url(); ?>assets/theme_new/img/services_logo__4.jpg" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <!-- <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               
            </div>
        </div>
    </div>  --> <!-- End product widget area -->
    
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span>RMGM</span></h2>
                        <p>Ayurveda were inspired by this ancient science of healing.

They understood its powers and sought to revive its fortunes with a desire to share their learning with the rest of the world. They created a beautiful collection of ayurvedic treatments, thus helping to preserve an effective form of wellness and the communities it supports
</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">Consultations</a></li>
                            <li><a href="#">Panchakarma</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Delivery and Returns</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Panchakarma</a></li>
                            <li><a href="#">AyurBaby</a></li>
                            <li><a href="#">Kshar Sutra</a></li>
                            <li><a href="#">Eye Treatment</a></li>
                            
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2020 RMGM. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://skywebsoft.com" target="_blank">SKY websoft</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="<?php echo base_url(); ?>assets/theme_new/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/theme_new/js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="<?php echo base_url(); ?>assets/theme_new/js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="<?php echo base_url(); ?>assets/theme_new/js/main.js"></script>
  </body>
</html>