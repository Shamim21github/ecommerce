<?php
class SiteMenu implements JsonSerializable{
	public $id;
	public $name;
	public $link;
	public $has_child;
	public $inactive;

	public function __construct(){
	}
	public function set($id,$name,$link,$has_child,$inactive){
		$this->id=$id;
		$this->name=$name;
		$this->link=$link;
		$this->has_child=$has_child;
		$this->inactive=$inactive;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_menus(name,link,has_child,inactive)values('$this->name','$this->link','$this->has_child','$this->inactive')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_menus set name='$this->name',link='$this->link',has_child='$this->has_child',inactive='$this->inactive' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_menus where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,link,has_child,inactive from {$tx}site_menus");
		$data=[];
		while($sitemenu=$result->fetch_object()){
			$data[]=$sitemenu;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,link,has_child,inactive from {$tx}site_menus $criteria limit $top,$perpage");
		$data=[];
		while($sitemenu=$result->fetch_object()){
			$data[]=$sitemenu;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_menus $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,link,has_child,inactive from {$tx}site_menus where id='$id'");
		$sitemenu=$result->fetch_object();
			return $sitemenu;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_menus");
		$sitemenu =$result->fetch_object();
		return $sitemenu->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Link:$this->link<br> 
		Has Child:$this->has_child<br> 
		Inactive:$this->inactive<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteMenu"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_menus");
		while($sitemenu=$result->fetch_object()){
			$html.="<option value ='$sitemenu->id'>$sitemenu->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_menus $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,link,has_child,inactive from {$tx}site_menus $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitemenu\">New SiteMenu</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Link</th><th>Has Child</th><th>Inactive</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Link</th><th>Has Child</th><th>Inactive</th></tr>";
		}
		while($sitemenu=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitemenu->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitemenu"]);
				$action_buttons.= action_button(["id"=>$sitemenu->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitemenu"]);
				$action_buttons.= action_button(["id"=>$sitemenu->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_menus"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitemenu->id</td><td>$sitemenu->name</td><td>$sitemenu->link</td><td>$sitemenu->has_child</td><td>$sitemenu->inactive</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,link,has_child,inactive from {$tx}site_menus where id={$id}");
		$sitemenu=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteMenu Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitemenu->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitemenu->name</td></tr>";
		$html.="<tr><th>Link</th><td>$sitemenu->link</td></tr>";
		$html.="<tr><th>Has Child</th><td>$sitemenu->has_child</td></tr>";
		$html.="<tr><th>Inactive</th><td>$sitemenu->inactive</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
