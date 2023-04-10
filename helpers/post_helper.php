<?php

function get_title_post($site_post_id,$id=""){
    $post= SitePost::find($site_post_id);
    $html=<<<HTML
 <section class="post-content" style="background-color: #f7f7f7;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 v-animation" data-animation="fade-from-left" data-delay="300">
                        <img src="$post->photo" alt="" class="img-responsive">
                    </div>
                    <div class="col-sm-6 v-animation" data-animation="fade-from-right" data-delay="300">
                        <h1 class="post-header">
                            $post->name </h1>
                        <div class="description">
                            <p>$post->description</p>
                        </div>
                        <div class="quick-btn">
                            <a data-hash href='#contact-us' class="btn v-btn v-second-light" data-delay="250">GET
                                IT NOW!</a>
                            <a href="./software.html" class="btn v-btn v-second-light" data-delay="250">FIND
                                OUT MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
HTML;

return $html;
}


function get_post_left($site_post_id,$id=""){
   $post= SitePost::find($site_post_id);
   $html=<<<HTML
   <div class="v-parallax v-bg-stylish v-bg-stylish-v4 no-shadow" id="$id">
                  <div class="container">
                      <div class="row app-brief">
                          <div class="col-sm-6">
                            
  HTML;


   $html.=get_album($post->site_album_id);
                           

$html.=<<<HTML

</div> 

     <div class="col-sm-6 v-animation" data-ride="carousel" data-animation="fade-from-right"
         data-delay="250">
         <p class="v-smash-text-large-2x">
             <span>
              $post->name </span>
         </p>
         <div class="horizontal-break left"></div>
         <p>$post->description</p>
         <ul class="v-list-v2">

HTML;
$details=SitePostDetail::filter($site_post_id);

foreach($details as $detail){
$html.=<<<HTML
        <li class="v-animation" data-animation="fade-from-right" data-delay="150">
            <i class="fa fa-check"></i> 
            <span class="v-lead"> $detail->description </span>
        </li>
HTML; 
}

$html.=<<<HTML
    </ul>
            </div>
        </div>
    </div>
</div>
HTML;

   return $html;
}

function get_post_right($site_post_id,$id=""){
    $post= SitePost::find($site_post_id);
    $html=<<<HTML
    <div class="v-parallax v-bg-stylish v-bg-stylish-v4 no-shadow" id="$id">
                   <div class="container">
                       <div class="row app-brief"> 
      <div class="col-sm-6 v-animation" data-ride="carousel" data-animation="fade-from-right"
          data-delay="250">
          <p class="v-smash-text-large-2x">
              <span>
               $post->name </span>
          </p>
          <div class="horizontal-break left"></div>
          <p>$post->description</p>
          <ul class="v-list-v2">
 
 HTML;
 $details=SitePostDetail::filter($site_post_id);
 
 foreach($details as $detail){
 $html.=<<<HTML
         <li class="v-animation" data-animation="fade-from-right" data-delay="150">
             <i class="fa fa-check"></i> 
             <span class="v-lead"> $detail->description </span>
         </li>
 HTML; 
 }
 
 $html.=<<<HTML
     </ul>
             </div>
        
         <div class="col-sm-6">
           
HTML;
$html.=get_album($post->site_album_id);
$html.=<<<HTML
 </div>
      </div>
     </div>

 </div>
HTML;
 
    return $html;
 }


 function get_featured_post($site_post_id,$id=""){
    $post= SitePost::find($site_post_id);
    $html=<<<HTML
 <div class="container" id="features">
                <div class="row center">
                    <div class="col-sm-12">
                        <p class="v-smash-text-large-2x">
                            <span>$post->name</span>
                        </p>
                        <div class="horizontal-break"></div>
                        <div id="amazingP">
                            <p>$post->description</p>
                        </div>
                    </div>
                    <div class="v-spacer col-sm-12 v-height-standard"></div>
                </div>
                <div class="row features">
                    <div class="col-md-5 col-sm-5">
HTML;

$details=SitePostDetail::filter($site_post_id);
foreach($details as $detail){
$html.=<<<HTML
                        <div class="feature-box left-icon v-animation pull-top" data-animation="fade-from-left"
                            data-delay="300">
                            <div class="feature-box-icon small">
                                <i class="fa fa-laptop v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>
                                $detail->name </h3>
                                <div class="feature-box-text-inner">
                                    <p>$detail->description</p>
                                </div>
                            </div>
                        </div>
                        <div class="v-spacer col-sm-12 v-height-standard"></div>

HTML;
}


$html.=<<<HTML
</div>
                    <div class="col-md-7 col-sm-7">
                        <!-- start section carosel -->
                        <div id="carousel-10" class="carousel slide v-animation" data-ride="carousel"
                            data-animation="fade-from-right" data-delay="250" style="margin: 20px 0">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="$post->photo">
                                </div>
                            </div>

                        </div> <!-- end carosel -->

                    </div> <!-- end col-sm-6 -->
                </div>
            </div>
HTML;
return $html;
 }
?>

