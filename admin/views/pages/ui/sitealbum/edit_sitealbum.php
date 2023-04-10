<?php
if(isset($_POST["btnEdit"])){
	$sitealbum=SiteAlbum::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$sitealbum->id=$_POST["txtId"];
		$sitealbum->name=$_POST["txtName"];
		$sitealbum->created_at=$now;
		$sitealbum->description=$_POST["txtDescription"];
		if($_FILES["filePhoto"]["name"]!=""){
			$sitealbum->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		}else{
			$sitealbum->photo=SiteAlbum::find($_POST["txtId"])->photo;
		}

		$sitealbum->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_albums">Manage SiteAlbum</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-sitealbum' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$sitealbum->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$sitealbum->name"]);
	$html.=input_field(["label"=>"Description","type"=>"text","name"=>"txtDescription","value"=>"$sitealbum->description"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
