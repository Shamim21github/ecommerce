<?php
   
   $m=[
		"name"=>"HR",
		"icon"=>"nav-icon fa fa-id-card-o",
		"links"=>[
			["route"=>"departments","text"=>"Manage Department","icon"=>"far fa-circle nav-icon"],
			["route"=>"positions","text"=>"Manage Position","icon"=>"far fa-circle nav-icon"],
			["route"=>"persons","text"=>"Manage Person","icon"=>"far fa-circle nav-icon"]
		]
	];

	echo main_sidebar_dropdown($m);



?>
