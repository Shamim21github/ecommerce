<?php
if($page=="create-sitealbumdetail"){
	$found=include("views/pages/ui/sitealbumdetail/create_sitealbumdetail.php");
}elseif($page=="edit-sitealbumdetail"){
	$found=include("views/pages/ui/sitealbumdetail/edit_sitealbumdetail.php");
}elseif($page=="site_album_details"){
	$found=include("views/pages/ui/sitealbumdetail/manage_sitealbumdetail.php");
}elseif($page=="details-sitealbumdetail"){
	$found=include("views/pages/ui/sitealbumdetail/details_sitealbumdetail.php");
}elseif($page=="view-sitealbumdetail"){
	$found=include("views/pages/ui/sitealbumdetail/view_sitealbumdetail.php");
}
?>
