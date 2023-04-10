<header class="semi-transparent-header bg-white" data-bg-color="rgba(255,255,255)" data-font-color="#444"
        style="background-color:rgba(0,0,0,0)">
        
        <div class="container">
            <!--Site Logo-->
            <div class="logo" data-sticky-logo="./assets/vendor/img/logo.png"
                data-normal-logo="./assets/vendor/img/logo.png">
                <a href="index.html">
                    <img alt="Venue" src="./assets/vendor/img/logo.png" data-logo-height="35">
                </a>
            </div>
            <!--End Site Logo-->

            <div class="navbar-collapse nav-main-collapse collapse">

                <!--Header Search-->
                <div class="search" id="headerSearch">
                    <a href="#" id="headerSearchOpen"><i class="fa fa-search"></i></a>
                    <div class="search-input">
                        <form id="headerSearchForm" action="pages/search" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control search" name="s" id="q" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                        <span class="v-arrow-wrap"><span class="v-arrow-inner"></span></span>
                    </div>
                </div>
                <!--End Header Search-->          

                <!--Main Menu-->
                <nav class="nav-main mega-menu one-page-menu">
                    <ul class="nav nav-pills nav-main" id="mainMenu">
                        <?php  echo get_site_menu();?>                        
                    </ul>
                </nav>
                <!--End Main Menu-->
            </div>
            <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </header>