<?php
	echo main_sidebar_dropdown([
		"name"=>"SiteProduct",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-siteproduct","text"=>"Create SiteProduct","icon"=>"far fa-circle nav-icon"],
			["route"=>"site_products","text"=>"Manage SiteProduct","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
