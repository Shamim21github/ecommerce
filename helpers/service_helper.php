<?php

function get_services(){
    $services=SiteService::filter(1);
    $html="";
    foreach($services as $service){

$html.=<<<HTML
<div class="col-md-6 col-sm-6">
                <div class="service-icon-left-boxed">
                    <div class="icon-container animated triggerAnimation" data-animate="zoomIn">
                        <img src="$service->photo" alt="" />
                    </div>
                    <div class="service-details">
                        <h3>$service->name</h3>
                        <p>$service->description</p>
                    </div>
                </div>
            </div>
HTML;

    }

    return $html;
}
            
?>


