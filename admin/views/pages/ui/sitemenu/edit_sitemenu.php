<?php
if(isset($_POST["btnEdit"])){
	$sitemenu=SiteMenu::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLink"])){
		$errors["link"]="Invalid link";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtHasChild"])){
		$errors["has_child"]="Invalid has_child";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["chkInactive"])){
		$errors["inactive"]="Invalid inactive";
	}

*/
	if(count($errors)==0){
		$sitemenu=new SiteMenu();
		$sitemenu->id=$_POST["txtId"];
		$sitemenu->name=$_POST["txtName"];
		$sitemenu->link=$_POST["txtLink"];
		$sitemenu->has_child=$_POST["txtHasChild"];
		$sitemenu->inactive=isset($_POST["chkInactive"])?1:0;

		$sitemenu->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_menus">Manage SiteMenu</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-sitemenu' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$sitemenu->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$sitemenu->name"]);
	$html.=input_field(["label"=>"Link","type"=>"text","name"=>"txtLink","value"=>"$sitemenu->link"]);
	$html.=input_field(["label"=>"Has Child","type"=>"text","name"=>"txtHasChild","value"=>"$sitemenu->has_child"]);
	$html.=input_field(["label"=>"Inactive","type"=>"checkbox","name"=>"chkInactive","value"=>"$sitemenu->inactive","checked"=>$sitemenu->inactive?"checked":""]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
