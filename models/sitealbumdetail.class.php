<?php
class SiteAlbumDetail implements JsonSerializable{
	public $id;
	public $site_album_id;
	public $photo;
	public $name;
	public $description;
	public $inactive;

	public function __construct(){
	}
	public function set($id,$site_album_id,$photo,$name,$description,$inactive){
		$this->id=$id;
		$this->site_album_id=$site_album_id;
		$this->photo=$photo;
		$this->name=$name;
		$this->description=$description;
		$this->inactive=$inactive;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_album_details(site_album_id,photo,name,description,inactive)values('$this->site_album_id','$this->photo','$this->name','$this->description','$this->inactive')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_album_details set site_album_id='$this->site_album_id',photo='$this->photo',name='$this->name',description='$this->description',inactive='$this->inactive' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_album_details where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,site_album_id,photo,name,description,inactive from {$tx}site_album_details");
		$data=[];
		while($sitealbumdetail=$result->fetch_object()){
			$data[]=$sitealbumdetail;
		}
			return $data;
	}

	public static function filter($site_album_id){
		global $db,$tx;
		$result=$db->query("select id,site_album_id,photo,name,description,inactive from {$tx}site_album_details where site_album_id='$site_album_id'");
		$data=[];
		while($sitealbumdetail=$result->fetch_object()){
			$data[]=$sitealbumdetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,site_album_id,photo,name,description,inactive from {$tx}site_album_details $criteria limit $top,$perpage");
		$data=[];
		while($sitealbumdetail=$result->fetch_object()){
			$data[]=$sitealbumdetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_album_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,site_album_id,photo,name,description,inactive from {$tx}site_album_details where id='$id'");
		$sitealbumdetail=$result->fetch_object();
			return $sitealbumdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_album_details");
		$sitealbumdetail =$result->fetch_object();
		return $sitealbumdetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Site Album Id:$this->site_album_id<br> 
		Photo:$this->photo<br> 
		Name:$this->name<br> 
		Description:$this->description<br> 
		Inactive:$this->inactive<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteAlbumDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_album_details");
		while($sitealbumdetail=$result->fetch_object()){
			$html.="<option value ='$sitealbumdetail->id'>$sitealbumdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_album_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,site_album_id,photo,name,description,inactive from {$tx}site_album_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitealbumdetail\">New SiteAlbumDetail</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Site Album Id</th><th>Photo</th><th>Name</th><th>Description</th><th>Inactive</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Site Album Id</th><th>Photo</th><th>Name</th><th>Description</th><th>Inactive</th></tr>";
		}
		while($sitealbumdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitealbumdetail->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitealbumdetail"]);
				$action_buttons.= action_button(["id"=>$sitealbumdetail->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitealbumdetail"]);
				$action_buttons.= action_button(["id"=>$sitealbumdetail->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_album_details"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitealbumdetail->id</td><td>$sitealbumdetail->site_album_id</td><td><img src=\"./img/$sitealbumdetail->photo\" width=\"100\" /></td><td>$sitealbumdetail->name</td><td>$sitealbumdetail->description</td><td>$sitealbumdetail->inactive</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,site_album_id,photo,name,description,inactive from {$tx}site_album_details where id={$id}");
		$sitealbumdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteAlbumDetail Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitealbumdetail->id</td></tr>";
		$html.="<tr><th>Site Album Id</th><td>$sitealbumdetail->site_album_id</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"../img/$sitealbumdetail->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Name</th><td>$sitealbumdetail->name</td></tr>";
		$html.="<tr><th>Description</th><td>$sitealbumdetail->description</td></tr>";
		$html.="<tr><th>Inactive</th><td>$sitealbumdetail->inactive</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
