<?php
function get_site_menu(){
    $menus=SiteMenu::all();
        
    $html=<<<HTML
        <div class="hb-menu hb-menu-2 d-xl-block">
                <nav>
                    <ul>
    HTML;

    foreach($menus as $menu){ 

        if($menu->has_child==1){
            $html.=<<<HTML
                <li class="dropdown-holder uparrow" ><a href="$menu->link">$menu->name</a>        
                <ul class="hb-dropdown">
            HTML;  

            $html.=get_sub($menu->id);

            $html.=<<<HTML
            </ul>
            </li>  
            HTML;
        }else{

            $html.=<<<HTML
                <li class="dropdown-holder" ><a href="$menu->link">$menu->name</a></li> 
            HTML; 
    }//end else


    }//end foreach                                 

    $html.=<<<HTML
                </ul>
            </nav>
        </div>
    HTML;
   
return $html;   
}
 

 function get_sub($menu_id){
    $html="";
    $menus_subs=SiteMenuSub::filter($menu_id);
    foreach($menus_subs as $sub){
        $html.=<<<HTML
            <li class="sub-dropdown-holder">
                <a href="$sub->link">$sub->name</a>
                <ul class="hb-dropdown hb-sub-dropdown">
        HTML;     

    $html.=get_sub_details($sub->id);
    $html.=<<<HTML
        </ul>
        </li>
    HTML;    

    }//end foreach
return $html;
}

function get_sub_details($sub_id){
    $html="";
    $subs_details=SiteMenuSubDetail::filter($sub_id);
    foreach($subs_details as $sub_detail){
        $html.=<<<HTML
            <li><a href="$sub_detail->link">$sub_detail->name</a></li>
        HTML;
    }//end foreach

return $html;
}

function get_product_menu(){
    $units=ProductUnit::all();

    $html="";
    $html.=<<<HTML
    <ul>
    HTML;
    
    foreach($units as $unit){
        $count= ProductSection::count(" where unit_id='$unit->id'");          
        $class=$count>0?"right-menu":"";

        $html.=<<<HTML
            <li class="$class"><a href="#">$unit->name</a>
        HTML;

        $html.=get_product_sections($unit->id);          
        
        $html.=<<<HTML
            </li>     
        HTML;
    }

    $html.=<<<HTML
    </ul>
    HTML;
    

  return $html;

}

function get_product_sections($unit_id){
    $sections=ProductSection::filter($unit_id);
    $html="";
     
    $html.=<<<HTML
     <ul class="cat-mega-menu">
    HTML;

    foreach($sections as $section){
       $html.=<<<HTML
        <li class="right-menu cat-mega-title">
            <a href="#">$section->name</a>
        HTML;
        
        $html.=get_product_categories($section->id);

       $html.=<<<HTML
        </li>
       HTML;
    }

    $html.=<<<HTML
     </ul>
    HTML;

   return $html;
}


function get_product_categories($section_id){
   $categories=ProductCategory::filter($section_id);
   $html="";
   $html.=<<<HTML
     <ul>
   HTML;
   
   foreach($categories as $category){
     $html.=<<<HTML
      <li><a href="#">$category->name</a></li>
     HTML;     
   }


   $html.=<<<HTML
     </ul>
   HTML;

   return $html;

}



