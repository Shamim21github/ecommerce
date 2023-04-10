<?php
class SiteProduct implements JsonSerializable{
	public $id;
	public $name;
	public $site_product_category_id;
	public $description;
	public $photo;
	public $regular_price;
	public $offer_price;
	public $inactive;
	public $current_stock;
	public $site_product_uom_id;
	public $slug;
	public $icon;

	public function __construct(){
	}
	public function set($id,$name,$site_product_category_id,$description,$photo,$regular_price,$offer_price,$inactive,$current_stock,$site_product_uom_id,$slug,$icon){
		$this->id=$id;
		$this->name=$name;
		$this->site_product_category_id=$site_product_category_id;
		$this->description=$description;
		$this->photo=$photo;
		$this->regular_price=$regular_price;
		$this->offer_price=$offer_price;
		$this->inactive=$inactive;
		$this->current_stock=$current_stock;
		$this->site_product_uom_id=$site_product_uom_id;
		$this->slug=$slug;
		$this->icon=$icon;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_products(name,site_product_category_id,description,photo,regular_price,offer_price,inactive,current_stock,site_product_uom_id,slug,icon)values('$this->name','$this->site_product_category_id','$this->description','$this->photo','$this->regular_price','$this->offer_price','$this->inactive','$this->current_stock','$this->site_product_uom_id','$this->slug','$this->icon')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_products set name='$this->name',site_product_category_id='$this->site_product_category_id',description='$this->description',photo='$this->photo',regular_price='$this->regular_price',offer_price='$this->offer_price',inactive='$this->inactive',current_stock='$this->current_stock',site_product_uom_id='$this->site_product_uom_id',slug='$this->slug',icon='$this->icon' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_products where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,site_product_category_id,description,photo,regular_price,offer_price,inactive,current_stock,site_product_uom_id,slug,icon from {$tx}site_products");
		$data=[];
		while($siteproduct=$result->fetch_object()){
			$data[]=$siteproduct;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,site_product_category_id,description,photo,regular_price,offer_price,inactive,current_stock,site_product_uom_id,slug,icon from {$tx}site_products $criteria limit $top,$perpage");
		$data=[];
		while($siteproduct=$result->fetch_object()){
			$data[]=$siteproduct;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_products $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,site_product_category_id,description,photo,regular_price,offer_price,inactive,current_stock,site_product_uom_id,slug,icon from {$tx}site_products where id='$id'");
		$siteproduct=$result->fetch_object();
			return $siteproduct;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_products");
		$siteproduct =$result->fetch_object();
		return $siteproduct->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Site Product Category Id:$this->site_product_category_id<br> 
		Description:$this->description<br> 
		Photo:$this->photo<br> 
		Regular Price:$this->regular_price<br> 
		Offer Price:$this->offer_price<br> 
		Inactive:$this->inactive<br> 
		Current Stock:$this->current_stock<br> 
		Site Product Uom Id:$this->site_product_uom_id<br> 
		Slug:$this->slug<br> 
		Icon:$this->icon<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteProduct"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_products");
		while($siteproduct=$result->fetch_object()){
			$html.="<option value ='$siteproduct->id'>$siteproduct->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_products $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,site_product_category_id,description,photo,regular_price,offer_price,inactive,current_stock,site_product_uom_id,slug,icon from {$tx}site_products $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-siteproduct\">New SiteProduct</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Site Product Category Id</th><th>Description</th><th>Photo</th><th>Regular Price</th><th>Offer Price</th><th>Inactive</th><th>Current Stock</th><th>Site Product Uom Id</th><th>Slug</th><th>Icon</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Site Product Category Id</th><th>Description</th><th>Photo</th><th>Regular Price</th><th>Offer Price</th><th>Inactive</th><th>Current Stock</th><th>Site Product Uom Id</th><th>Slug</th><th>Icon</th></tr>";
		}
		while($siteproduct=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$siteproduct->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-siteproduct"]);
				$action_buttons.= action_button(["id"=>$siteproduct->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-siteproduct"]);
				$action_buttons.= action_button(["id"=>$siteproduct->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_products"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$siteproduct->id</td><td>$siteproduct->name</td><td>$siteproduct->site_product_category_id</td><td>$siteproduct->description</td><td><img src=\"img/$siteproduct->photo\" width=\"100\" /></td><td>$siteproduct->regular_price</td><td>$siteproduct->offer_price</td><td>$siteproduct->inactive</td><td>$siteproduct->current_stock</td><td>$siteproduct->site_product_uom_id</td><td>$siteproduct->slug</td><td>$siteproduct->icon</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,site_product_category_id,description,photo,regular_price,offer_price,inactive,current_stock,site_product_uom_id,slug,icon from {$tx}site_products where id={$id}");
		$siteproduct=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteProduct Details</th></tr>";
		$html.="<tr><th>Id</th><td>$siteproduct->id</td></tr>";
		$html.="<tr><th>Name</th><td>$siteproduct->name</td></tr>";
		$html.="<tr><th>Site Product Category Id</th><td>$siteproduct->site_product_category_id</td></tr>";
		$html.="<tr><th>Description</th><td>$siteproduct->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$siteproduct->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Regular Price</th><td>$siteproduct->regular_price</td></tr>";
		$html.="<tr><th>Offer Price</th><td>$siteproduct->offer_price</td></tr>";
		$html.="<tr><th>Inactive</th><td>$siteproduct->inactive</td></tr>";
		$html.="<tr><th>Current Stock</th><td>$siteproduct->current_stock</td></tr>";
		$html.="<tr><th>Site Product Uom Id</th><td>$siteproduct->site_product_uom_id</td></tr>";
		$html.="<tr><th>Slug</th><td>$siteproduct->slug</td></tr>";
		$html.="<tr><th>Icon</th><td>$siteproduct->icon</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
