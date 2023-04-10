<?php
class SitePostDetail implements JsonSerializable{
	public $id;
	public $site_post_id;
	public $description;
	public $photo;
	public $name;

	public function __construct(){
	}
	public function set($id,$site_post_id,$description,$photo,$name){
		$this->id=$id;
		$this->site_post_id=$site_post_id;
		$this->description=$description;
		$this->photo=$photo;
		$this->name=$name;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_post_details(site_post_id,description,photo,name)values('$this->site_post_id','$this->description','$this->photo','$this->name')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_post_details set site_post_id='$this->site_post_id',description='$this->description',photo='$this->photo',name='$this->name' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_post_details where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,site_post_id,description,photo,name from {$tx}site_post_details");
		$data=[];
		while($sitepostdetail=$result->fetch_object()){
			$data[]=$sitepostdetail;
		}
			return $data;
	}

	public static function filter($site_post_id){
		global $db,$tx;
		$result=$db->query("select id,site_post_id,description,photo,name from {$tx}site_post_details where site_post_id='$site_post_id'");
		$data=[];
		while($sitepostdetail=$result->fetch_object()){
			$data[]=$sitepostdetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,site_post_id,description,photo,name from {$tx}site_post_details $criteria limit $top,$perpage");
		$data=[];
		while($sitepostdetail=$result->fetch_object()){
			$data[]=$sitepostdetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_post_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,site_post_id,description,photo,name from {$tx}site_post_details where id='$id'");
		$sitepostdetail=$result->fetch_object();
			return $sitepostdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_post_details");
		$sitepostdetail =$result->fetch_object();
		return $sitepostdetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Site Post Id:$this->site_post_id<br> 
		Description:$this->description<br> 
		Photo:$this->photo<br> 
		Name:$this->name<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSitePostDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_post_details");
		while($sitepostdetail=$result->fetch_object()){
			$html.="<option value ='$sitepostdetail->id'>$sitepostdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_post_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,site_post_id,description,photo,name from {$tx}site_post_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitepostdetail\">New SitePostDetail</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Site Post Id</th><th>Description</th><th>Photo</th><th>Name</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Site Post Id</th><th>Description</th><th>Photo</th><th>Name</th></tr>";
		}
		while($sitepostdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitepostdetail->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitepostdetail"]);
				$action_buttons.= action_button(["id"=>$sitepostdetail->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitepostdetail"]);
				$action_buttons.= action_button(["id"=>$sitepostdetail->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_post_details"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitepostdetail->id</td><td>$sitepostdetail->site_post_id</td><td>$sitepostdetail->description</td><td><img src=\"img/$sitepostdetail->photo\" width=\"100\" /></td><td>$sitepostdetail->name</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,site_post_id,description,photo,name from {$tx}site_post_details where id={$id}");
		$sitepostdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SitePostDetail Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitepostdetail->id</td></tr>";
		$html.="<tr><th>Site Post Id</th><td>$sitepostdetail->site_post_id</td></tr>";
		$html.="<tr><th>Description</th><td>$sitepostdetail->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$sitepostdetail->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Name</th><td>$sitepostdetail->name</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
