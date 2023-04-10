<?php
function get_clients(){
    $clients=SiteClient::all();
    $html="";

    foreach($clients as $client){

        $html.=<<<HTML
        <div class="owl-item">
            <img src="./admin/img/$client->photo" alt="$client->name" />
        </div>
HTML;

    }

    return $html;
    
}

?>