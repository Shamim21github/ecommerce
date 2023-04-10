<?php
	echo main_sidebar_dropdown([
		"name"=>"SiteMenu",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-sitemenu","text"=>"Create SiteMenu","icon"=>"far fa-circle nav-icon"],
			["route"=>"site_menus","text"=>"Manage SiteMenu","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
