<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhoto"])){
		$errors["photo"]="Invalid photo";
	}

*/
	if(count($errors)==0){
		$sitealbum=new SiteAlbum();
		$sitealbum->name=$_POST["txtName"];
		$sitealbum->created_at=$now;
		$sitealbum->description=$_POST["txtDescription"];
		$sitealbum->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);

		$sitealbum->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_albums">Manage SiteAlbum</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-sitealbum' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Description","type"=>"text","name"=>"txtDescription"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
