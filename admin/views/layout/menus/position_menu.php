<?php
	echo main_sidebar_dropdown([
		"name"=>"Position",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-position","text"=>"Create Position","icon"=>"far fa-circle nav-icon"],
			["route"=>"positions","text"=>"Manage Position","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
