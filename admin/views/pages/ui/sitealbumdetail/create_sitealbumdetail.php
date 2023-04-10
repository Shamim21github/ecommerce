<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbSiteAlbumId"])){
		$errors["site_album_id"]="Invalid site_album_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhoto"])){
		$errors["photo"]="Invalid photo";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["chkInactive"])){
		$errors["inactive"]="Invalid inactive";
	}

*/
	if(count($errors)==0){
		$sitealbumdetail=new SiteAlbumDetail();
		$sitealbumdetail->site_album_id=$_POST["cmbSiteAlbumId"];
		$sitealbumdetail->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		$sitealbumdetail->name=$_POST["txtName"];
		$sitealbumdetail->description=$_POST["txtDescription"];
		$sitealbumdetail->inactive=isset($_POST["chkInactive"])?1:0;

		$sitealbumdetail->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_album_details">Manage SiteAlbumDetail</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-sitealbumdetail' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Site Album","name"=>"cmbSiteAlbumId","table"=>"site_albums"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Description","type"=>"text","name"=>"txtDescription"]);
	$html.=input_field(["label"=>"Inactive","type"=>"checkbox","name"=>"chkInactive","value"=>"1"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
