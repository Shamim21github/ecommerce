<?php
	echo main_sidebar_dropdown([
		"name"=>"SiteAlbum",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-sitealbum","text"=>"Create SiteAlbum","icon"=>"far fa-circle nav-icon"],
			["route"=>"site_albums","text"=>"Manage SiteAlbum","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
