<?php
if(isset($_POST["btnEdit"])){
	$siteproduct=SiteProduct::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbSiteProductCategoryId"])){
		$errors["site_product_category_id"]="Invalid site_product_category_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhoto"])){
		$errors["photo"]="Invalid photo";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRegularPrice"])){
		$errors["regular_price"]="Invalid regular_price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOfferPrice"])){
		$errors["offer_price"]="Invalid offer_price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["chkInactive"])){
		$errors["inactive"]="Invalid inactive";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCurrentStock"])){
		$errors["current_stock"]="Invalid current_stock";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbSiteProductUomId"])){
		$errors["site_product_uom_id"]="Invalid site_product_uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSlug"])){
		$errors["slug"]="Invalid slug";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtIcon"])){
		$errors["icon"]="Invalid icon";
	}

*/
	if(count($errors)==0){
		$siteproduct=new SiteProduct();
		$siteproduct->id=$_POST["txtId"];
		$siteproduct->name=$_POST["txtName"];
		$siteproduct->site_product_category_id=$_POST["cmbSiteProductCategoryId"];
		$siteproduct->description=$_POST["txtDescription"];
		if($_FILES["filePhoto"]["name"]!=""){
			$siteproduct->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		}else{
			$siteproduct->photo=SiteProduct::find($_POST["txtId"])->photo;
		}
		$siteproduct->regular_price=$_POST["txtRegularPrice"];
		$siteproduct->offer_price=$_POST["txtOfferPrice"];
		$siteproduct->inactive=isset($_POST["chkInactive"])?1:0;
		$siteproduct->current_stock=$_POST["txtCurrentStock"];
		$siteproduct->site_product_uom_id=$_POST["cmbSiteProductUomId"];
		$siteproduct->slug=$_POST["txtSlug"];
		$siteproduct->icon=$_POST["txtIcon"];

		$siteproduct->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_products">Manage SiteProduct</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-siteproduct' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$siteproduct->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$siteproduct->name"]);
	$html.=select_field(["label"=>"Site Product Category","name"=>"cmbSiteProductCategoryId","table"=>"site_product_categories","value"=>"$siteproduct->site_product_category_id"]);
	$html.=input_field(["label"=>"Description","type"=>"text","name"=>"txtDescription","value"=>"$siteproduct->description"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=input_field(["label"=>"Regular Price","type"=>"text","name"=>"txtRegularPrice","value"=>"$siteproduct->regular_price"]);
	$html.=input_field(["label"=>"Offer Price","type"=>"text","name"=>"txtOfferPrice","value"=>"$siteproduct->offer_price"]);
	$html.=input_field(["label"=>"Inactive","type"=>"checkbox","name"=>"chkInactive","value"=>"$siteproduct->inactive","checked"=>$siteproduct->inactive?"checked":""]);
	$html.=input_field(["label"=>"Current Stock","type"=>"text","name"=>"txtCurrentStock","value"=>"$siteproduct->current_stock"]);
	$html.=select_field(["label"=>"Site Product Uom","name"=>"cmbSiteProductUomId","table"=>"site_product_uoms","value"=>"$siteproduct->site_product_uom_id"]);
	$html.=input_field(["label"=>"Slug","type"=>"text","name"=>"txtSlug","value"=>"$siteproduct->slug"]);
	$html.=input_field(["label"=>"Icon","type"=>"text","name"=>"txtIcon","value"=>"$siteproduct->icon"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
