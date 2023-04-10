<?php

function get_site_products(){
    $products=SiteProduct::filter_by_category(1);
    $html="";
    foreach($products as $product){
     
        $html.=<<<HTML
        <div class="col-md-4 col-sm-4 ">
                    <div class="service-feature-box" title="ERP - POS">
                        <div class="service-media">
                            <img src="admin/img/$product->photo" alt="ERP - POS" />
                            <a href="./ERP-POS.html" class="read-more02">
                                <span> Read more <i class="fa fa-chevron-right"></i></span>
                            </a>
                        </div><!-- .service-media end -->

                        <div class="service-body">
                            <div class="custom-heading">
                                <h4> $product->name </h4>
                            </div><!-- .custom-heading end -->
                            <p>$product->description</p>
                        </div><!-- .service-body end -->
                    </div><!-- .service-feature-box-end -->
                </div><!-- .col-md-4 end -->
HTML;

}

 return $html;

}


function get_site_more_products(){
    $products=SiteProduct::filter_by_category(2);
    $html="";
    foreach($products as $product){
      $html.=<<<HTML
     <div class="col-lg-4 col-md-6 col-sm-6">
                      $product->photo
                    <h3>$product->name</h3>
                    <p>$product->description</p>                    
                </div><!-- .col-md-6 end -->
HTML;
    }

    return $html;
}

function get_erp_products($category_id){
    $category=ProductCategory::find($category_id);
    $products=Product::filter($category_id);

    

    $html="";
    $html.=<<<HTML
        <section class="product-area li-laptop-product Special-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>$category->name</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="special-product-active owl-carousel">
    HTML;                      
                        
                         foreach($products as $product){
                            //file_put_contents("debug.txt",$product->name.PHP_EOL,FILE_APPEND);
                        $html.=<<<HTML
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="admin/img/$product->photo" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name" href="single-product.html">$product->name</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$product->offer_price BDT</span>
                                            </div>
                                            
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active" data-id="$product->id"><a href="javascript:void(0)">Add to cart</a></li>
                                                <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                                                       
                         HTML;
                      }

    $html.=<<<HTML

                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    HTML;

    return $html;

}



?>