<?php

function get_main_slider($site_album_id){
   $sliders=SiteAlbumDetail::filter($site_album_id);
  
   $html="";
   foreach($sliders as $slider){

   $html.=<<<HTML
<div class="ms-slide">       
        <img src="./assets/vendor/masterslider/blank.gif" data-src="admin/img/$slider->photo" alt="$slider->name" />        
        <h2 class="ms-layer pi-caption01" style="left: 0; top: 340px;" data-type="text" data-effect="left(short)" data-duration="300" data-hide-effect="fade" data-delay="300">$slider->name</h2>
        <img class="ms-layer" src="./assets/vendor/masterslider/blank.gif" data-src="./assets/vendor/img/slider/slider-line.jpg" alt="" style="left: 540px; top: 450px;" data-type="image" data-effect="bottom(short)" data-duration="300" data-hide-effect="fade" data-delay="300" />
        <p>$slider->description</p>
    </div>
HTML;

   }
    //debug($html);
   return $html;
}


function get_industrial_slider($site_album_id){
    $sliders=SiteAlbumDetail::filter($site_album_id);
  
    $html="";
    foreach($sliders as $slider){ 
    $html.=<<<HTML
       <div class="owl-item">
        <img class="img-responsive" src="$slider->photo" alt="$slider->name" />
         <p>$slider->name</p>
    </div>
HTML;
 
    }
     //debug($html);
    return $html;
}


function get_album($site_album_id){
    $sliders=SiteAlbumDetail::filter($site_album_id);
    $html="";
  
$html.=<<<HTML
   <div id="carousel-$site_album_id" class="carousel slide v-animation" data-ride="carousel" data-animation="fade-from-left" data-delay="250" style="margin: 20px 0">                   
      <div class="carousel-inner" role="listbox">
HTML;

$i=1;
foreach($sliders as $slider){
    if($i==1){
        $class="item active";
    }else{
        $class="item";
    }
    $i++;
    $html.=<<<HTML
   
    <div class="$class">
         <img src="$slider->photo" alt="$slider->name" title="$slider->description">
    </div>                    
HTML;
}

$html.=<<<HTML
   </div>
                  
                    <a href="#carousel-$site_album_id" class="left carousel-control" data-slide="prev">
                        <span class="icon-prev fa-stack fa-lg">
                            <i class="fa fa-angle-left fa-stack-1x"></i>
                        </span>
                    </a>
                    <a href="#carousel-$site_album_id" class="right carousel-control" data-slide="next">
                        <span class="icon-next fa-stack fa-lg">
                            <i class="fa fa-angle-right fa-stack-1x"></i>
                        </span>
                    </a>
                    
</div> 
HTML;
//debug($html);
return $html;
}