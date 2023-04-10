<?php
class SiteAlbum implements JsonSerializable{
	public $id;
	public $name;
	public $created_at;
	public $description;
	public $photo;

	public function __construct(){
	}
	public function set($id,$name,$created_at,$description,$photo){
		$this->id=$id;
		$this->name=$name;
		$this->created_at=$created_at;
		$this->description=$description;
		$this->photo=$photo;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_albums(name,created_at,description,photo)values('$this->name','$this->created_at','$this->description','$this->photo')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_albums set name='$this->name',created_at='$this->created_at',description='$this->description',photo='$this->photo' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_albums where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,created_at,description,photo from {$tx}site_albums");
		$data=[];
		while($sitealbum=$result->fetch_object()){
			$data[]=$sitealbum;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,created_at,description,photo from {$tx}site_albums $criteria limit $top,$perpage");
		$data=[];
		while($sitealbum=$result->fetch_object()){
			$data[]=$sitealbum;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_albums $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,created_at,description,photo from {$tx}site_albums where id='$id'");
		$sitealbum=$result->fetch_object();
			return $sitealbum;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_albums");
		$sitealbum =$result->fetch_object();
		return $sitealbum->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Created At:$this->created_at<br> 
		Description:$this->description<br> 
		Photo:$this->photo<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteAlbum"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_albums");
		while($sitealbum=$result->fetch_object()){
			$html.="<option value ='$sitealbum->id'>$sitealbum->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_albums $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,created_at,description,photo from {$tx}site_albums $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitealbum\">New SiteAlbum</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Created At</th><th>Description</th><th>Photo</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Created At</th><th>Description</th><th>Photo</th></tr>";
		}
		while($sitealbum=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitealbum->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitealbum"]);
				$action_buttons.= action_button(["id"=>$sitealbum->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitealbum"]);
				$action_buttons.= action_button(["id"=>$sitealbum->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_albums"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitealbum->id</td><td>$sitealbum->name</td><td>$sitealbum->created_at</td><td>$sitealbum->description</td><td><img src=\"img/$sitealbum->photo\" width=\"100\" /></td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,created_at,description,photo from {$tx}site_albums where id={$id}");
		$sitealbum=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteAlbum Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitealbum->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitealbum->name</td></tr>";
		$html.="<tr><th>Created At</th><td>$sitealbum->created_at</td></tr>";
		$html.="<tr><th>Description</th><td>$sitealbum->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$sitealbum->photo\" width=\"100\" /></td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
