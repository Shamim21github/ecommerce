<?php
class SiteService implements JsonSerializable{
	public $id;
	public $name;
	public $category_id;
	public $description;
	public $regular_price;
	public $offer_price;
	public $icon;
	public $inactive;
	public $photo;

	public function __construct(){
	}
	public function set($id,$name,$category_id,$description,$regular_price,$offer_price,$icon,$inactive,$photo){
		$this->id=$id;
		$this->name=$name;
		$this->category_id=$category_id;
		$this->description=$description;
		$this->regular_price=$regular_price;
		$this->offer_price=$offer_price;
		$this->icon=$icon;
		$this->inactive=$inactive;
		$this->photo=$photo;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_services(name,category_id,description,regular_price,offer_price,icon,inactive,photo)values('$this->name','$this->category_id','$this->description','$this->regular_price','$this->offer_price','$this->icon','$this->inactive','$this->photo')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_services set name='$this->name',category_id='$this->category_id',description='$this->description',regular_price='$this->regular_price',offer_price='$this->offer_price',icon='$this->icon',inactive='$this->inactive',photo='$this->photo' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_services where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,category_id,description,regular_price,offer_price,icon,inactive,photo from {$tx}site_services");
		$data=[];
		while($siteservice=$result->fetch_object()){
			$data[]=$siteservice;
		}
			return $data;
	}

	public static function filter($category_id){
		global $db,$tx;
		$result=$db->query("select id,name,category_id,description,regular_price,offer_price,icon,inactive,photo from {$tx}site_services where category_id='$category_id'");
		$data=[];
		while($siteservice=$result->fetch_object()){
			$data[]=$siteservice;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,category_id,description,regular_price,offer_price,icon,inactive,photo from {$tx}site_services $criteria limit $top,$perpage");
		$data=[];
		while($siteservice=$result->fetch_object()){
			$data[]=$siteservice;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_services $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,category_id,description,regular_price,offer_price,icon,inactive,photo from {$tx}site_services where id='$id'");
		$siteservice=$result->fetch_object();
			return $siteservice;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_services");
		$siteservice =$result->fetch_object();
		return $siteservice->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Category Id:$this->category_id<br> 
		Description:$this->description<br> 
		Regular Price:$this->regular_price<br> 
		Offer Price:$this->offer_price<br> 
		Icon:$this->icon<br> 
		Inactive:$this->inactive<br> 
		Photo:$this->photo<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteService"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_services");
		while($siteservice=$result->fetch_object()){
			$html.="<option value ='$siteservice->id'>$siteservice->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_services $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,category_id,description,regular_price,offer_price,icon,inactive,photo from {$tx}site_services $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-siteservice\">New SiteService</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Category Id</th><th>Description</th><th>Regular Price</th><th>Offer Price</th><th>Icon</th><th>Inactive</th><th>Photo</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Category Id</th><th>Description</th><th>Regular Price</th><th>Offer Price</th><th>Icon</th><th>Inactive</th><th>Photo</th></tr>";
		}
		while($siteservice=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$siteservice->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-siteservice"]);
				$action_buttons.= action_button(["id"=>$siteservice->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-siteservice"]);
				$action_buttons.= action_button(["id"=>$siteservice->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_services"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$siteservice->id</td><td>$siteservice->name</td><td>$siteservice->category_id</td><td>$siteservice->description</td><td>$siteservice->regular_price</td><td>$siteservice->offer_price</td><td>$siteservice->icon</td><td>$siteservice->inactive</td><td>$siteservice->photo</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,category_id,description,regular_price,offer_price,icon,inactive,photo from {$tx}site_services where id={$id}");
		$siteservice=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteService Details</th></tr>";
		$html.="<tr><th>Id</th><td>$siteservice->id</td></tr>";
		$html.="<tr><th>Name</th><td>$siteservice->name</td></tr>";
		$html.="<tr><th>Category Id</th><td>$siteservice->category_id</td></tr>";
		$html.="<tr><th>Description</th><td>$siteservice->description</td></tr>";
		$html.="<tr><th>Regular Price</th><td>$siteservice->regular_price</td></tr>";
		$html.="<tr><th>Offer Price</th><td>$siteservice->offer_price</td></tr>";
		$html.="<tr><th>Icon</th><td>$siteservice->icon</td></tr>";
		$html.="<tr><th>Inactive</th><td>$siteservice->inactive</td></tr>";
		$html.="<tr><th>Photo</th><td>$siteservice->photo</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
