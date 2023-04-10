<?php
include("views/layouts/home/header.php");
include("views/layouts/home/facebook.php");
?>
<!--Header-->
<!--Set your own background color to the header-->
<?php include("views/layouts/common/site_menu.php") ?>
<!--End Header-->

<div id="masterslider" class="master-slider ms-skin-default mb-0">

    <?php echo get_main_slider(1); ?>

</div><!-- #masterslider end -->


<div class="page-content parallax parallax01">
    <div class="container">
        <div class="row services-negative-top">

            <?php
            echo get_products();
            ?>

        </div><!-- .row end -->

        <!-- <div class="row">
                <div class="col-md-12">
                    <a href="./software" class="btn btn-big btn-yellow btn-centered">
                        <span>
                            view details
                        </span>
                    </a> -->
        <!-- </div>.col-md-12 end -->
        <!-- </div>.row end -->

    </div><!-- .container end -->
</div><!-- .page-content end -->

<div class="page-content bg-light pt-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-heading02">
                    <h2>
                        OTHER SOFTWARES </h2>
                    <p>
                        SEVERAL SOFTWARES & SOLUTIONS FOR SMALL AND MEDIUM COMPANIES </p>
                </div><!-- .custom-heading02 end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->

        <div class="row mb-30 other-soft">

            <?php
            echo get_more_products();
            ?>
        </div><!-- .row.mb-30 end -->

    </div><!-- .container end -->
</div><!-- .page-content end -->


<div class="page-content pt-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-heading02">
                    <h2>
                        OUR SERVICES </h2>
                    <p>
                        WE ARE SERVICES FOR YOUR BETTER TECHNOLOGICAL LIFE </p>
                </div><!-- .custom-heading02 end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->

        <div class="row mb-30">

            <?php
            echo get_services();
            ?>

        </div><!-- .row.mb-30 end -->

    </div><!-- .container end -->
</div><!-- .page-content end -->


<div class="page-content custom-bkg bkg-dark-blue column-img-bkg dark mb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 custom-col-padding-both industrial-sector">
                <div class="custom-heading">
                    <h3>
                        Industry Sectors </h3>
                </div><!-- .custom-heading end -->
                <p>
                    We cover different industry sectors, from food and beverage, chemical, retail, durable goods and
                    more. Check the full list. </p>
                <ul class="service-list clearfix">

                    <div class="carousel-container">
                        <div id="sector-carousel" class="owl-carousel owl-carousel-navigation">

                            <?php
                            echo get_industrial_slider(2);
                            ?>

                        </div><!-- .owl-carousel.owl-carousel-navigation end -->
                    </div><!-- .carousel-container end -->

                </ul><!-- .service-list end -->
            </div><!-- .col-md-6 end -->

            <div class="col-sm-6">
            <?php
              echo get_album(3);
            ?>
               
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content.bkg-dark-blue end -->


<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="custom-heading">
                    <h3>
                        Our Blog </h3>
                </div><!-- .custom-heading end -->

                <ul class="pi-latest-posts clearfix">
                    <li>
                        <div class="post-media">
                            <img src="./uploads/posts/1548871381.jpg" alt="While now the fated Pequot had been so long afloat this" />
                        </div><!-- .post-media end -->

                        <div class="post-details">
                            <div class="post-date">
                                <p>
                                    <i class="fa fa-calendar"></i>
                                    January 31, 2019
                                </p>
                            </div>

                            <a href="./blog/35/While-now-the-fated-Pequot-had-been-so-long-afloat-this">
                                <h4>
                                    While now the fated Pequot had been so long afloat this </h4>
                            </a>

                            <a href="./blog/35/While-now-the-fated-Pequot-had-been-so-long-afloat-this" class="read-more">
                                <span>
                                    Read more
                                    <i class="fa fa-chevron-right"></i>
                                </span>
                            </a>
                        </div><!-- .post-details end -->
                    </li>

                    <li>
                        <div class="post-media">
                            <img src="./uploads/posts/1548871999.jpg" alt="Apple could slash iPhone prices in bid to boost falling sales" />
                        </div><!-- .post-media end -->

                        <div class="post-details">
                            <div class="post-date">
                                <p>
                                    <i class="fa fa-calendar"></i>
                                    January 31, 2019
                                </p>
                            </div>

                            <a href="./blog/20/Apple-could-slash-iPhone-prices-in-bid-to-boost-falling-sales">
                                <h4>
                                    Apple could slash iPhone prices in bid to boost falling sales </h4>
                            </a>

                            <a href="./blog/20/Apple-could-slash-iPhone-prices-in-bid-to-boost-falling-sales" class="read-more">
                                <span>
                                    Read more
                                    <i class="fa fa-chevron-right"></i>
                                </span>
                            </a>
                        </div><!-- .post-details end -->
                    </li>


                </ul><!-- .pi-latest-posts end -->
                <a href="./blog" class="read-more" style="float:left">
                    <span>
                        View all blogs
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </a>
            </div><!-- .col-md-4 end -->

            <div class="col-md-4 col-sm-6">
                <div class="custom-heading">
                    <h3>
                        What Clients Say </h3>
                </div><!-- .custom-heading end -->

                <div class="carousel-container">
                    <div id="testimonial-carousel" class="owl-carousel owl-carousel-navigation">
                        <div class="owl-item">
                            <div class="testimonial">
                                <p>With a blow from the top-maul Ahab knocked off the steel head of the lance, and
                                    then handing to the mate the long iron rod remaining, bade him hold it upright,
                                    without its touching off the steel head of the&#8230;
                                <div class="testimonial-author">
                                    <p>
                                        the top-maul Ahab knocked </p>
                                </div><!-- .testimonial-author end -->
                            </div><!-- .testimonial end -->
                        </div><!-- .owl-item end -->

                        <div class="owl-item">
                            <div class="testimonial">
                                <p>Best customer support and response time I have ever seen not to mention a kick
                                    ass theme! Great feeling from this purchase. Thank you Pixel Industry!</p>
                                <div class="testimonial-author">
                                    <p>
                                        TRAVIS COPLAND </p>
                                </div><!-- .testimonial-author end -->
                            </div><!-- .testimonial end -->
                        </div><!-- .owl-item end -->


                    </div><!-- #testimonial-carousel end -->
                </div><!-- .carousel-container end -->
            </div><!-- .col-md-4 end -->

            <div class="col-md-4 col-sm-12 clearfix">
                <div class="custom-heading">
                    <h3>
                        Our Locations </h3>
                </div><!-- .custom-heading end -->
                <img class="img-responsive" src="./uploads/posts/1548867648.png" alt="Our location" />

                <br />



                <br />

                <a href="https://goo.gl/maps/xFS4xFDnHMU2" class="read-more" target="_blank">
                    <span>
                        View our locations
                        <i class="fa fa-chevron-right"></i>
                    </span>
                </a>
            </div><!-- .col-md-4 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->


<div class="page-content custom-bkg bkg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-heading02">
                    <h2>Our Valuable Clients</h2>
                    <p>
                    </p>
                </div><!-- .custom-heading02 end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-container">
                    <div id="client-carousel" class="owl-carousel owl-carousel-navigation">

                        <?php
                        echo get_clients();
                        ?>
                        <div class="owl-item">
                            <img src="./uploads/posts/1548871243.png" alt="Asia Pacific Communication Ltd" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548871210.png" alt="Pride group" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548871189.png" alt="Kanz" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548871165.png" alt="Alkanteks" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548871127.png" alt="Doreen Developers Ltd" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548871087.png" alt="Karnaphuli" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548871038.png" alt="Madinabug" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548870995.png" alt="Chittagong University " />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548870956.png" alt="Babel for health care and comfort" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548870737.png" alt="UniRad" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548870781.png" alt="MSN Destribution" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548870810.png" alt="UNITY" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548870851.png" alt="SAFA PHERMACY" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548870876.png" alt="Modern wood" />
                        </div>


                        <div class="owl-item">
                            <img src="./uploads/posts/1548870902.png" alt="Modern Library" />
                        </div>


                    </div><!-- .owl-carousel.owl-carousel-navigation end -->
                </div><!-- .carousel-container end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<div id="footer-wrapper" class="footer-dark">
    <footer id="footer">
        <div class="container">
            <div class="row">
                <ul class="col-md-3 col-sm-6 footer-widget-container clearfix">
                    <!-- .widget.widget_text -->
                    <li class="widget widget_newsletterwidget">
                        <div class="title">
                            <h3>newsletter subscribe</h3>
                        </div>
                        <p>
                            Subscribe to our newsletter and we will
                            inform you about newest projects and promotions.
                        </p>

                        <br />

                        <form class="newsletter" id="subscrive">
                            <input type="hidden" id="site_url" value="./">
                            <input class="email" type="email" id="sub_email" placeholder="Your email...">
                            <input type="button" class="submit" onclick="subscribe_newsletter()" value="">
                        </form>
                        <div class="res_area" style="height: 70px;">
                            <div id="sub_response_brought"></div>
                        </div>
                        <div class="fb-like fb_iframe_widget" data-href="http://intels.co/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=245&amp;href=http%3A%2F%2Fintels.co%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false&amp;size=small">
                            <span style="vertical-align: bottom; width: 150px; height: 28px;"><iframe name="f9223c02ea304c" width="1000px" height="1000px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.2/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df233e09f47fc524%26domain%3Dintels.co%26is_canvas%3Dfalse%26origin%3Dhttp%253A%252F%252Fintels.co%252Ff2fd292d5abbb6%26relation%3Dparent.parent&amp;container_width=245&amp;href=http%3A%2F%2Fintels.co%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;share=true&amp;show_faces=false&amp;size=small" style="border: none; visibility: visible; width: 150px; height: 28px;" class=""></iframe></span>
                        </div>
                    </li><!-- .widget.widget_newsletterwidget end -->
                </ul><!-- .col-md-3.footer-widget-container end -->

                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <!-- .widget-pages start -->
                    <li class="widget widget_pages">
                        <div class="title">
                            <h3>quick links</h3>
                        </div>

                        <ul>
                            <li><a href="./partner-registration">Become Our Partner</a></li>
                            <li><a href="./about">About us</a></li>
                            <li><a href="./about">Company history</a></li>
                            <li><a href="./about">Company Events</a></li>
                            <li><a href="./about">Supply chain management</a></li>
                            <li><a href="./blog-page/blog">Company blogs</a></li>
                            <li><a href="https://www.facebook.com/intels.co" target="_blank">Online connect</a></li>
                        </ul>
                    </li><!-- .widget-pages end -->
                </ul><!-- .col-md-3.footer-widget-container end -->

                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <!-- .widget-pages start -->
                    <li class="widget widget_pages">
                        <div class="title">
                            <h3>Industry solutions</h3>
                        </div>
                        <ul>
                            <li><a href="#">Overland transportation</a></li>
                            <li><a href="#">Air freight</a></li>
                            <li><a href="#">Ocean freight</a></li>
                            <li><a href="#">Large projects</a></li>
                            <li><a href="#">Rail international shipping</a></li>
                            <li><a href="#">Contract logistics</a></li>
                            <li><a href="#">Packaging options</a></li>
                        </ul>
                    </li><!-- .widget-pages end -->
                </ul><!-- .col-md-3.footer-widget-container end -->

                <ul class="col-md-3 col-sm-6 footer-widget-container">
                    <li class="widget widget-text">
                        <div class="title">
                            <h3>contact us</h3>
                        </div>

                        <address>
                            Mohammad Towhidul Islam <br>
                            Building 12,Road 1, Banasree, <br>
                            Rampura, Dhaka - 1219
                        </address>

                        <span class="text-big">
                            +8801715785434
                        </span>
                        <br />

                        <a href="mailto:softslab@gmail.com">softslab@gmail.com</a>
                        <br />
                        <ul class="footer-social-icons">

                        </ul><!-- .footer-social-icons end -->
                    </li><!-- .widget.widget-text end -->
                </ul><!-- .col-md-3.footer-widget-container end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </footer><!-- #footer end -->

    <div class="copyright-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <p>Copyright &copy; 2022 Intellect Software Ltd.</p>
                </div><!-- .col-md-6 end -->

            </div><!-- .row end -->
        </div><!-- .container end -->
    </div><!-- .copyright-container end -->

    <a href="#" class="scroll-up">Scroll</a>
</div><!-- #footer-wrapper end -->



<?php
include("views/layouts/home/footer.php");
?>