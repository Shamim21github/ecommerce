<?php
class SiteClient implements JsonSerializable{
	public $id;
	public $name;
	public $photo;
	public $review;
	public $website;

	public function __construct(){
	}
	public function set($id,$name,$photo,$review,$website){
		$this->id=$id;
		$this->name=$name;
		$this->photo=$photo;
		$this->review=$review;
		$this->website=$website;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_clients(name,photo,review,website)values('$this->name','$this->photo','$this->review','$this->website')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_clients set name='$this->name',photo='$this->photo',review='$this->review',website='$this->website' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_clients where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,photo,review,website from {$tx}site_clients");
		$data=[];
		while($siteclient=$result->fetch_object()){
			$data[]=$siteclient;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,photo,review,website from {$tx}site_clients $criteria limit $top,$perpage");
		$data=[];
		while($siteclient=$result->fetch_object()){
			$data[]=$siteclient;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_clients $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,photo,review,website from {$tx}site_clients where id='$id'");
		$siteclient=$result->fetch_object();
			return $siteclient;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_clients");
		$siteclient =$result->fetch_object();
		return $siteclient->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Photo:$this->photo<br> 
		Review:$this->review<br> 
		Website:$this->website<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteClient"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_clients");
		while($siteclient=$result->fetch_object()){
			$html.="<option value ='$siteclient->id'>$siteclient->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_clients $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,photo,review,website from {$tx}site_clients $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-siteclient\">New SiteClient</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Photo</th><th>Review</th><th>Website</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Photo</th><th>Review</th><th>Website</th></tr>";
		}
		while($siteclient=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$siteclient->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-siteclient"]);
				$action_buttons.= action_button(["id"=>$siteclient->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-siteclient"]);
				$action_buttons.= action_button(["id"=>$siteclient->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_clients"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$siteclient->id</td><td>$siteclient->name</td><td><img src=\"img/$siteclient->photo\" width=\"100\" /></td><td>$siteclient->review</td><td>$siteclient->website</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,photo,review,website from {$tx}site_clients where id={$id}");
		$siteclient=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteClient Details</th></tr>";
		$html.="<tr><th>Id</th><td>$siteclient->id</td></tr>";
		$html.="<tr><th>Name</th><td>$siteclient->name</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$siteclient->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Review</th><td>$siteclient->review</td></tr>";
		$html.="<tr><th>Website</th><td>$siteclient->website</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
