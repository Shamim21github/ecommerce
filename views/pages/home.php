<?php include("views/layouts/home/header_library.php") ?>
<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
    <?php 
       include("views/layouts/common/site_header.php");
    ?>
    <!-- Header Area End Here -->
    <!-- Begin Slider With Category Menu Area -->
    
      <?php include("views/layouts/home/slider_row.php") ?>
    
    <!-- Slider With Category Menu Area End Here -->

    <!-- Begin Li's Static Banner Area -->
    <div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
        <div class="container">
            <div class="row">
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner pb-xs-30">
                        <a href="#">
                            <img src="images/banner/1_3.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner pb-xs-30">
                        <a href="#">
                            <img src="images/banner/1_4.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner">
                        <a href="#">
                            <img src="images/banner/1_5.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
            </div>
        </div>
    </div>
    <!-- Li's Static Banner Area End Here -->
    <!-- Begin Li's Special Product Area -->
    <?php     
      $categories=ProductCategory::all("where inactive=0");

      foreach($categories as $category){
        echo get_erp_products($category->id);
      }
    ?>
   
    <div class="li-static-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Li's Static Home Image Area -->
                    <div class="li-static-home-image"></div>
                    <!-- Li's Static Home Image Area End Here -->
                    <!-- Begin Li's Static Home Content Area -->
                    <div class="li-static-home-content">
                        <p>Sale Offer<span>-20% Off</span>This Week</p>
                        <h2>Featured Product</h2>
                        <h2>Meito Accessories 2018</h2>
                        <p class="schedule">
                            Starting at
                            <span> $1209.00</span>
                        </p>
                        <div class="default-btn">
                            <a href="shop-left-sidebar.html" class="links">Shopping Now</a>
                        </div>
                    </div>
                    <!-- Li's Static Home Content Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Li's Static Home Area End Here -->
    <!-- Begin Li's Trending Product | Home V2 Area -->
 <?php
  include("views/layouts/common/site_footer.php"); 
 ?> 

<!-- Body Wrapper End Here -->
<?php
include("views/layouts/home/footer_library.php");
?>