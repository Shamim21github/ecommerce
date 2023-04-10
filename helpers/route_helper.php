<?php

function get_page($name){
  $page=SiteRoute::find_by_name($name);
  return $page;
}