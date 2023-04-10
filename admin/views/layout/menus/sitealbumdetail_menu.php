<?php
	echo main_sidebar_dropdown([
		"name"=>"SiteAlbumDetail",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-sitealbumdetail","text"=>"Create SiteAlbumDetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"site_album_details","text"=>"Manage SiteAlbumDetail","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
