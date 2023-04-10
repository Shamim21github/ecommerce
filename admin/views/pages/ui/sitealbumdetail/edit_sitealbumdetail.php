<?php
if(isset($_POST["btnEdit"])){
	$sitealbumdetail=SiteAlbumDetail::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$sitealbumdetail->id=$_POST["txtId"];
		$sitealbumdetail->site_album_id=$_POST["cmbSiteAlbumId"];
		if($_FILES["filePhoto"]["name"]!=""){
			$sitealbumdetail->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		}else{
			$sitealbumdetail->photo=SiteAlbumDetail::find($_POST["txtId"])->photo;
		}
		$sitealbumdetail->name=$_POST["txtName"];
		$sitealbumdetail->description=$_POST["txtDescription"];
		$sitealbumdetail->inactive=isset($_POST["chkInactive"])?1:0;

		$sitealbumdetail->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_album_details">Manage SiteAlbumDetail</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-sitealbumdetail' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$sitealbumdetail->id"]);
	$html.=select_field(["label"=>"Site Album","name"=>"cmbSiteAlbumId","table"=>"site_albums","value"=>"$sitealbumdetail->site_album_id"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$sitealbumdetail->name"]);
	$html.=input_field(["label"=>"Description","type"=>"text","name"=>"txtDescription","value"=>"$sitealbumdetail->description"]);
	$html.=input_field(["label"=>"Inactive","type"=>"checkbox","name"=>"chkInactive","value"=>"$sitealbumdetail->inactive","checked"=>$sitealbumdetail->inactive?"checked":""]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
