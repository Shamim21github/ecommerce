<?php
class SitePost implements JsonSerializable{
	public $id;
	public $name;
	public $description;
	public $slug;
	public $site_album_id;
	public $inactive;
	public $post_category_id;
	public $post_page_id;
	public $photo;

	public function __construct(){
	}
	public function set($id,$name,$description,$slug,$site_album_id,$inactive,$post_category_id,$post_page_id,$photo){
		$this->id=$id;
		$this->name=$name;
		$this->description=$description;
		$this->slug=$slug;
		$this->site_album_id=$site_album_id;
		$this->inactive=$inactive;
		$this->post_category_id=$post_category_id;
		$this->post_page_id=$post_page_id;
		$this->photo=$photo;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_posts(name,description,slug,site_album_id,inactive,post_category_id,post_page_id,photo)values('$this->name','$this->description','$this->slug','$this->site_album_id','$this->inactive','$this->post_category_id','$this->post_page_id','$this->photo')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_posts set name='$this->name',description='$this->description',slug='$this->slug',site_album_id='$this->site_album_id',inactive='$this->inactive',post_category_id='$this->post_category_id',post_page_id='$this->post_page_id',photo='$this->photo' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_posts where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,description,slug,site_album_id,inactive,post_category_id,post_page_id,photo from {$tx}site_posts");
		$data=[];
		while($sitepost=$result->fetch_object()){
			$data[]=$sitepost;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,description,slug,site_album_id,inactive,post_category_id,post_page_id,photo from {$tx}site_posts $criteria limit $top,$perpage");
		$data=[];
		while($sitepost=$result->fetch_object()){
			$data[]=$sitepost;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_posts $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,description,slug,site_album_id,inactive,post_category_id,post_page_id,photo from {$tx}site_posts where id='$id'");
		$sitepost=$result->fetch_object();
			return $sitepost;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_posts");
		$sitepost =$result->fetch_object();
		return $sitepost->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Description:$this->description<br> 
		Slug:$this->slug<br> 
		Site Album Id:$this->site_album_id<br> 
		Inactive:$this->inactive<br> 
		Post Category Id:$this->post_category_id<br> 
		Post Page Id:$this->post_page_id<br> 
		Photo:$this->photo<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSitePost"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_posts");
		while($sitepost=$result->fetch_object()){
			$html.="<option value ='$sitepost->id'>$sitepost->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_posts $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,description,slug,site_album_id,inactive,post_category_id,post_page_id,photo from {$tx}site_posts $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitepost\">New SitePost</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Slug</th><th>Site Album Id</th><th>Inactive</th><th>Post Category Id</th><th>Post Page Id</th><th>Photo</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Slug</th><th>Site Album Id</th><th>Inactive</th><th>Post Category Id</th><th>Post Page Id</th><th>Photo</th></tr>";
		}
		while($sitepost=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitepost->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitepost"]);
				$action_buttons.= action_button(["id"=>$sitepost->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitepost"]);
				$action_buttons.= action_button(["id"=>$sitepost->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_posts"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitepost->id</td><td>$sitepost->name</td><td>$sitepost->description</td><td>$sitepost->slug</td><td>$sitepost->site_album_id</td><td>$sitepost->inactive</td><td>$sitepost->post_category_id</td><td>$sitepost->post_page_id</td><td><img src=\"img/$sitepost->photo\" width=\"100\" /></td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,description,slug,site_album_id,inactive,post_category_id,post_page_id,photo from {$tx}site_posts where id={$id}");
		$sitepost=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SitePost Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitepost->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitepost->name</td></tr>";
		$html.="<tr><th>Description</th><td>$sitepost->description</td></tr>";
		$html.="<tr><th>Slug</th><td>$sitepost->slug</td></tr>";
		$html.="<tr><th>Site Album Id</th><td>$sitepost->site_album_id</td></tr>";
		$html.="<tr><th>Inactive</th><td>$sitepost->inactive</td></tr>";
		$html.="<tr><th>Post Category Id</th><td>$sitepost->post_category_id</td></tr>";
		$html.="<tr><th>Post Page Id</th><td>$sitepost->post_page_id</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$sitepost->photo\" width=\"100\" /></td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
