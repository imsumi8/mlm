  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="<?php echo base_url();  ?>assets/assetstheme/img/slider/slider1.jpg" alt="" title="#slider-direction-1" />
        <img src="<?php echo base_url();  ?>assets/assetstheme/img/slider/slider2.jpg" alt="" title="#slider-direction-2" />
        <img src="<?php echo base_url();  ?>assets/assetstheme/img/slider/slider3.jpg" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best Business Solution</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">सबकी होगी चांदी</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Our Moto</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best Business Solution </h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Lead a Royal lifestyle with RMGM</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Our Moto</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">The Best business Solution</h2>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h1 class="title2">Luxury and growth start with our Silver package</h1>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Our Moto</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->
    <div id="package">
    <div class="container">
        <div class="row">
            <div class="row" style="margin-top:20px;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="section-headline text-center">
                    <h2 style="margin-top:20px;">Our Packages</h2>
                  </div>
                </div>
              </div>
            <div class="col-md-12">
                <div class="slider">
                   <?php if(!empty($packs)) { foreach($packs as $pk) { ?>
                        <div class="text-center">
                        	
                            		<img src="<?php echo base_url()."assets/uploads_assets/".$pk->PACKAGE_IMG; ?>" style="width:100%;max-height:300px;min-height:300px;" />
                            <a href="<?php echo base_url(); ?>welcome/product/<?php echo $pk->PACKAGE_ID; ?>"><h4 style="margin-top:10px;color:red;"><?php echo $pk->PACKAGE_NAME. " Rs . ".$pk->PACKAGE_PRICE ; ?></h4>
                            <h6>Read More..</h6>
                            	</a>
                        </div>
                     <?php } } ?>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .slick-prev, .slick-next{
            background: rgb(0, 0, 0) !important;
            color: black !important;
    }
    .slick-prev:hover, .slick-next:hover{
            background: rgb(0, 0, 0) !important;
            color: black !important;
    }
    .slick-slide{
        border: 1px solid black  !important;
         box-shadow: 0px 0px 5px 0px grey  !important;
         padding:5px !important;
         margin:20px !important;
    }
    @media only screen and (max-width: 768px) {
	.slick-prev, .slick-next{
           display:none !important;
    }
	}
    
</style>
<script>
    $('document').ready(function(){
       var width= $(document).width(); 
       if(width>768){
            $('.slider').slick({
                slidesToShow: 3,
                slidesToScroll: 3,
                dots: true,
                infinite: true,
                cssEase: 'linear'
            });
       }else{
           $('.slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                infinite: true,
                cssEase: 'linear'
            });
            
       }
    })
</script>
  <!-- Start About area -->
  <div id="about" class="about-area area-padding" >
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>About Us</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
								  <img src="<?php echo base_url() ?>/assets/assetstheme/img/about/1.jpg" alt="">
								</a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
     
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">Our Working Strategy</h4>
              </a>
              <p>
                RMGM is a jewellery brand of MAXEN MEDIALABS PVT. LTD started in 2019 , which deals in direct selling of superlative silver jewellery. With an amazing and exclusive marketing plan the company is witnessing an exponential growth with every passing day. When you buy ornaments at our website, you are actually buying a fortune for yourself and your family. While designing this generic plan and introducing to the public we had only one goal in mind which is also our motto ‘ The company is progressively rising and is all set to become a powerful brand in silver jewellery. 92.5 is the purity level of our silver jewellery and this sterling silver looks exactly like “ white gold”. Add a pinch of style to your collection of silver jewellery by becoming a part of 7Silver . Secure your future and own a luxurious lifestyle , by becoming our network marketer . 7Silver is a brand where you don’t have to settle for less, except for the best !
              </p>
             
            </div>
          </div>
        </div>
       
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->

  <!-- Start Service area -->
  <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Our Moto</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="javascript:void(0);">
											<i class="fa fa-diamond"></i>
										</a>
                  <h4> Premium silver jewellery</h4>
                
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="javascript:void(0);">
											<i class="fa fa-camera-retro"></i>
										</a>
                  <h4>Affordable package to start.</h4>
                  
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="javascript:void(0);">
											<i class="fa fa-money"></i>
										</a>
                  <h4>Attractive rewards and cashbacks</h4>
                 
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="javascript:void(0);">
											<i class="fa fa-save"></i>
										</a>
                  <h4>Trustworthy source for lifetime earnings </h4>
                 
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="javascript:void(0);">
											<i class="fa fa-table"></i>
										</a>
                  <h4>Join ,construct your network,sit back and enjoy a luxurious life.</h4>
                 
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- End Service area -->

  <!-- our-skill-area start -->
  <div class="our-skill-area fix hidden-sm">
    <div class="test-overly"></div>
    <div class="skill-bg area-padding-2">
      <div class="container">
        <!-- section-heading end -->
        <div class="row">
          <div class="skill-text">
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="95" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="rgba(20, 33, 121, 0.88)" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Easier Package</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="85" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#FFF" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Life Time earnings</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="75" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">Easier Plan</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
            <!-- single-skill start -->
            <div class="col-xs-12 col-sm-3 col-md-3 text-center">
              <div class="single-skill">
                <div class="progress-circular">
                  <input type="text" class="knob" value="0" data-rel="65" data-linecap="round" data-width="175" data-bgcolor="#fff" data-fgcolor="#3EC1D5" data-thickness=".20" data-readonly="true" disabled>
                  <h3 class="progress-h4">MLM Best Plan</h3>
                </div>
              </div>
            </div>
            <!-- single-skill end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- our-skill-area end -->

 
  <!-- Start Wellcome Area -->
  <div class="wellcome-area">
    <div class="well-bg">
      <div class="test-overly"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="wellcome-text">
              <div class="well-text text-center">
                <h2>Welcome To Our eBusiness</h2>
                <p>
                  Our MLM PLAN WILL MAKE YOUR LIFE EASIER.
                </p>
                <div class="subs-feilds">
                  <div class="suscribe-input">
                    <input type="email" class="email form-control width-80" id="sus_email" placeholder="Email">
                    <button type="submit" id="sus_submit" class="add-btn width-20">Subscribe</button>
                    <div id="msg_Submit" class="h3 text-center hidden"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Wellcome Area -->
<!-- Start portfolio Area -->
  <div id="portfolio" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Our Projects & Rewards</h2>
            <h4>If you are not born with a silver spoon, here is one for you ! Be a part of RMGM’s network.  Earn everything you have ever  imagined . A package full of luxury rewards like international holiday trips. Buy our products combo worth 5,000INR, you get silver jewellery. Post that you receive cashbacks and rewards on referring the packages to other people. On referring to 2 people you get 25% direct cashbacks worth Rs 2500. If you complete a pool of 7 people, you get a reward of 5,000 and are eligible to enter next club. Likewise there are different clubs to rate your growth and rewards and cash prizes for the same are described in the Powerpoint embedded in upcoming section.</h4>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
        <div class="awesome-project-1 fix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="awesome-menu ">
              <ul class="project-menu">
                <li>
                  <a href="#" class="active" data-filter="*">All</a>
                </li>
               
              </ul>
            </div>
          </div>
        </div>
        <div class="awesome-project-content">
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/1.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/1.jpg">
                      <h4>Bangkopk Trip</h4>
                      <span>Auto Pool 1</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 photo">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/2.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/2.jpg">
                      <h4>Laptop</h4>
                      <span>Auto Pool 2</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/3.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/3.jpg">
                      <h4>Bullet Bike</h4>
                      <span>Auto Pool 3</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 photo development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/4.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/4.jpg">
                      <h4>CAR</h4>
                      <span>Auto Pool 4</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/5.jpg" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="<?php echo base_url(); ?>assets/assetstheme/img/portfolio/5.jpg">
                      <h4>Jeep Compass</h4>
                      <span>Auto Pool 5</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- single-awesome-project end -->
        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end -->
  <!-- start pricing area -->
   
  <!-------- end of pricing area---------->
   <!-- Start About area -->
  <div id="market_plan" class="about-area area-padding" >
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>eBusiness Plan</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <div class="col-md-4">
                <a href="#">
                <img style="height:100px; " src="<?php echo base_url(); ?>assets/assetstheme/img/blog/download.png">
               </a>
              </div>
              <div class="col-md-6">
               <ul>
                <h4><B>JOINING PACKAGE</B></h4>
                <li>
                  <i class="fa fa-check"></i> 5000  Many Combos
                </li>
                <li>
                  <i class="fa fa-check"></i> ID AND PASSWORD
                </li>
              </ul> 
              </div>
               
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <div class="col-md-4">
                <a href="#">
                <img style="height:100px; " src="<?php echo base_url(); ?>assets/assetstheme/img/blog/two.jpg">
               </a>
              </div>
              <div class="col-md-6">
               <ul>
                <h4><B>DIRECT REFFERAL INCOME</B></h4>
                <li>
                  <i class="fa fa-check"></i> 25 % for each pair
                </li>
                <li>
                  <i class="fa fa-check"></i> 2 Direct Referral bonus - Rs- 2500.
                </li>
               
              </ul> 
              </div>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <div class="col-md-4">
                <a href="#">
                <img style="height:100px; " src="<?php echo base_url(); ?>assets/assetstheme/img/blog/THREE.png">
               </a>
              </div>
              <div class="col-md-6">
               <ul>
                <h4><B>Level 2 Refferal Income</B></h4>
                <li> 
                  <i class="fa fa-check"></i> Rs = 2500 from each -Rs - 5000
                </li>
                <li>
                  <i class="fa fa-check"></i> 4 Ids
                </li>
             
              </ul> 
              </div>
               
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <div class="col-md-4">
                <a href="#">
                <img style="height:100px; " src="<?php echo base_url(); ?>assets/assetstheme/img/blog/FOUR.png">
               </a>
              </div>
              <div class="col-md-6">
               <ul>
                <h4><B>Pool Income</B></h4>
                <li>
                  <i class="fa fa-check"></i>5 AUTO POOLS 
                </li>
                <li>
                  <i class="fa fa-check"></i>  WITH HUGE AMOUNT <BR>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CONTINUES  = Rs 25000/-
                </li>
               
              </ul> 
              </div>
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
     
      
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <div class="col-md-4">
                <a href="#">
                <img style="height:100px; " src="<?php echo base_url(); ?>assets/assetstheme/img/blog/terms_and_condition.jpg">
               </a>
              </div>
              <div class="col-md-6">
               <ul>
                <h4><B>Plan Condition</B></h4>
                <li>
                  <i class="fa fa-check"></i> 2 direct refreals
                </li>
                <li>
                  <i class="fa fa-check"></i> In every new Pool 2 refferals are mandatory
                </li>
               
              </ul> 
              </div>
               
            </div>
          </div>
        </div>
       

          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
   <div id="pricing" class="pricing-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Auto Pool Matrix Income</h2>
          </div>
        </div>
      </div>
      <div class="row">
       <!--
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="pri_table_list">
            <h3>basic <br/> <span>$80 / month</span></h3>
            <ol>
              <li class="check">Online system</li>
              <li class="check cross">Full access</li>
              <li class="check">Free apps</li>
              <li class="check">Multiple slider</li>
              <li class="check cross">Free domin</li>
              <li class="check cross">Support unlimited</li>
              <li class="check">Payment online</li>
              <li class="check cross">Cash back</li>
            </ol>
            <button>sign up now</button>
          </div>
        </div>
      -->
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="pri_table_list active">
            <span class="saleon">Offer</span>
            <h3>Auto Pool <br/> <span>Downline Graph</span></h3>
            <table class="table table bootstrap">
              <thead>
                <tr><td>#</td><td>Members</td><td>Club Name</td><td>Income</td></tr>
              </thead>
              <tbody>
                <tr><td>1</td><td>15</td><td>Gold</td><td>25,000 </td></tr>
                <tr><td>2</td><td>31</td><td>Platinum</td><td>50,000 </td></tr>
                <tr><td>3</td><td>63</td><td>Diamond</td><td>1,00,000</td></tr>
                <tr><td>4</td><td>127</td><td>Double Diamond</td><td>2,00,000 </td></tr>
                <tr><td>5</td><td>255</td><td>Black Diamond</td><td>4,00,000</td></tr>
                <tr><td>6</td><td>512</td><td>Royal Diamond</td><td>8,00,000 </td></tr>
              </tbody>
            </table>
            
          </div>
        </div>
      <!--
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="pri_table_list">
            <h3>premium <br/> <span>$150 / month</span></h3>
            <ol>
              <li class="check">Online system</li>
              <li class="check">Full access</li>
              <li class="check">Free apps</li>
              <li class="check">Multiple slider</li>
              <li class="check">Free domin</li>
              <li class="check">Support unlimited</li>
              <li class="check">Payment online</li>
              <li class="check">Cash back</li>
            </ol>
            <button>sign up now</button>
          </div>
        </div>
      -->
      </div>
    </div>
  </div>
  <!-- Start About area -->
  <div id="market_plan" class="about-area area-padding" >
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Terms And Conditions</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="well-left">
            <div class="single-well">
             
              <div class="col-md-12">
               <ol>
                
              <li> The payouts will be distributed every week.</li>

 <li>The closing day of the week is Sunday and payouts will be sent post 10 days of the closing i.e. Tuesday of next week.</li>

 <li>We are readily collaborating with promoters but our packages can be sold through our website only. There is no other way to buy our packages.</li>

 <li>We are dealing with silver products, our trade is absolutely product based. We are not doing currency distribution or running any financial ponzi schemes like returning double cash back or multiplying your money.</li>

 <li>The products will be delivered to the consumer in 7-10 working days.</li>

 <li>The cash backs will be settled in 10 days.</li>

 <li>This is a cashback and referral based earning program. The company does not promise for any investment plan. </li>

 <li>The products are pure thailand based sterling silver jewellery. The purity level is 92.7 and are quality tested.</li>

 <li>There is no promise of regular income by the company. The consumer keeps earning cashbacks and rewards as long as they are referring our products to the people.</li>
              </ol> 
              </div>
               
            </div>
          </div>
        </div>
        <!-- single-well end-->
       
      </div>
   </div>
  </div>
      
  <!-- Start team Area -->
  <div id="team" class="our-team-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Our special Team</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="team-top">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="<?php echo base_url(); ?>assets/assetstheme/img/team/1.jpg" alt="">
									</a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
													<i class="fa fa-facebook"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-twitter"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-instagram"></i>
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>John Doe</h4>
                <p>MLM EXPERT</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="<?php echo base_url(); ?>assets/assetstheme/img/team/2.jpg" alt="">
									</a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
													<i class="fa fa-facebook"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-twitter"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-instagram"></i>
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Andrew Arnold</h4>
                <p>Team Expert</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="<?php echo base_url(); ?>assets/assetstheme/img/team/3.jpg" alt="">
									</a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
													<i class="fa fa-facebook"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-twitter"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-instagram"></i>
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Elina </h4>
                <p>MLM EXPERT</p>
              </div>
            </div>
          </div>
          <!-- End column -->
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="single-team-member">
              <div class="team-img">
                <a href="#">
										<img src="<?php echo base_url(); ?>assets/assetstheme/img/team/4.jpg" alt="">
									</a>
                <div class="team-social-icon text-center">
                  <ul>
                    <li>
                      <a href="#">
													<i class="fa fa-facebook"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-twitter"></i>
												</a>
                    </li>
                    <li>
                      <a href="#">
													<i class="fa fa-instagram"></i>
												</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="team-content text-center">
                <h4>Jhon Powel</h4>
                <p>Marketing Expert</p>
              </div>
            </div>
          </div>
          <!-- End column -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Team Area -->
  <!-- End About area -->
  <!-- End pricing table area -->
  <!-- Start Testimonials -->
  <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Start testimonials Start -->
            <div class="testimonial-content text-center">
              <a class="quate" href="#"><i class="fa fa-quote-right"></i></a>
              <!-- start testimonial carousel -->
              <div class="testimonial-carousel">
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                    </p>
                    <h6>Boby</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                    </p>
                    <h6>Jhon</h6>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar luctus est eget congue.<br>consectetur adipiscing elit. Sed pulvinar luctus est eget congue.
                    </p>
                    <h6>Fleming</h6>
                  </div>
                </div>
                <!-- End single item -->
              </div>
            </div>
            <!-- End testimonials end -->
          </div>
          <!-- End Right Feature -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials -->
  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>Welcome to our eBusiness company</h3>
            <a class="sus-btn" href="#">Get A quate</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contact us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Call: +91 9999999999<br>
                  <span>Monday-Friday (9am-5pm)</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: support@rmgm.in<br>
                  <span>Web: www.rmgm.in</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                 KIDWAI NAGAR<br>
                  <span>US 208011, KANPUR</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->
