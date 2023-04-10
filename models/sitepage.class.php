<?php
class SitePage implements JsonSerializable{
	public $id;
	public $name;
	public $link;
	public $inactive;
	public $slug;
	public $description;
	public $photo;

	public function __construct(){
	}
	public function set($id,$name,$link,$inactive,$slug,$description,$photo){
		$this->id=$id;
		$this->name=$name;
		$this->link=$link;
		$this->inactive=$inactive;
		$this->slug=$slug;
		$this->description=$description;
		$this->photo=$photo;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_pages(name,link,inactive,slug,description,photo)values('$this->name','$this->link','$this->inactive','$this->slug','$this->description','$this->photo')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_pages set name='$this->name',link='$this->link',inactive='$this->inactive',slug='$this->slug',description='$this->description',photo='$this->photo' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_pages where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,link,inactive,slug,description,photo from {$tx}site_pages");
		$data=[];
		while($sitepage=$result->fetch_object()){
			$data[]=$sitepage;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,link,inactive,slug,description,photo from {$tx}site_pages $criteria limit $top,$perpage");
		$data=[];
		while($sitepage=$result->fetch_object()){
			$data[]=$sitepage;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_pages $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,link,inactive,slug,description,photo from {$tx}site_pages where id='$id'");
		$sitepage=$result->fetch_object();
			return $sitepage;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_pages");
		$sitepage =$result->fetch_object();
		return $sitepage->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Link:$this->link<br> 
		Inactive:$this->inactive<br> 
		Slug:$this->slug<br> 
		Description:$this->description<br> 
		Photo:$this->photo<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSitePage"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_pages");
		while($sitepage=$result->fetch_object()){
			$html.="<option value ='$sitepage->id'>$sitepage->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_pages $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,link,inactive,slug,description,photo from {$tx}site_pages $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitepage\">New SitePage</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Link</th><th>Inactive</th><th>Slug</th><th>Description</th><th>Photo</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Link</th><th>Inactive</th><th>Slug</th><th>Description</th><th>Photo</th></tr>";
		}
		while($sitepage=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitepage->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitepage"]);
				$action_buttons.= action_button(["id"=>$sitepage->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitepage"]);
				$action_buttons.= action_button(["id"=>$sitepage->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_pages"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitepage->id</td><td>$sitepage->name</td><td>$sitepage->link</td><td>$sitepage->inactive</td><td>$sitepage->slug</td><td>$sitepage->description</td><td><img src=\"img/$sitepage->photo\" width=\"100\" /></td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,link,inactive,slug,description,photo from {$tx}site_pages where id={$id}");
		$sitepage=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SitePage Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitepage->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitepage->name</td></tr>";
		$html.="<tr><th>Link</th><td>$sitepage->link</td></tr>";
		$html.="<tr><th>Inactive</th><td>$sitepage->inactive</td></tr>";
		$html.="<tr><th>Slug</th><td>$sitepage->slug</td></tr>";
		$html.="<tr><th>Description</th><td>$sitepage->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$sitepage->photo\" width=\"100\" /></td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
