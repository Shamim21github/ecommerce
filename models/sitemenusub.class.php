<?php
class SiteMenuSub implements JsonSerializable{
	public $id;
	public $site_menu_id;
	public $name;
	public $link;
	public $has_child;

	public function __construct(){
	}
	public function set($id,$site_menu_id,$name,$link,$has_child){
		$this->id=$id;
		$this->site_menu_id=$site_menu_id;
		$this->name=$name;
		$this->link=$link;
		$this->has_child=$has_child;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_menu_subs(site_menu_id,name,link,has_child)values('$this->site_menu_id','$this->name','$this->link','$this->has_child')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_menu_subs set site_menu_id='$this->site_menu_id',name='$this->name',link='$this->link',has_child='$this->has_child' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_menu_subs where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,site_menu_id,name,link,has_child from {$tx}site_menu_subs");
		$data=[];
		while($sitemenusub=$result->fetch_object()){
			$data[]=$sitemenusub;
		}
			return $data;
	}

	public static function filter($site_menu_id){
		global $db,$tx;
		$result=$db->query("select id,site_menu_id,name,link,has_child from {$tx}site_menu_subs where site_menu_id='$site_menu_id'");
		$data=[];
		while($sitemenusub=$result->fetch_object()){
			$data[]=$sitemenusub;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,site_menu_id,name,link,has_child from {$tx}site_menu_subs $criteria limit $top,$perpage");
		$data=[];
		while($sitemenusub=$result->fetch_object()){
			$data[]=$sitemenusub;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_menu_subs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,site_menu_id,name,link,has_child from {$tx}site_menu_subs where id='$id'");
		$sitemenusub=$result->fetch_object();
			return $sitemenusub;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_menu_subs");
		$sitemenusub =$result->fetch_object();
		return $sitemenusub->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Site Menu Id:$this->site_menu_id<br> 
		Name:$this->name<br> 
		Link:$this->link<br> 
		Has Child:$this->has_child<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteMenuSub"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_menu_subs");
		while($sitemenusub=$result->fetch_object()){
			$html.="<option value ='$sitemenusub->id'>$sitemenusub->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_menu_subs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,site_menu_id,name,link,has_child from {$tx}site_menu_subs $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitemenusub\">New SiteMenuSub</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Site Menu Id</th><th>Name</th><th>Link</th><th>Has Child</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Site Menu Id</th><th>Name</th><th>Link</th><th>Has Child</th></tr>";
		}
		while($sitemenusub=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitemenusub->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitemenusub"]);
				$action_buttons.= action_button(["id"=>$sitemenusub->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitemenusub"]);
				$action_buttons.= action_button(["id"=>$sitemenusub->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_menu_subs"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitemenusub->id</td><td>$sitemenusub->site_menu_id</td><td>$sitemenusub->name</td><td>$sitemenusub->link</td><td>$sitemenusub->has_child</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,site_menu_id,name,link,has_child from {$tx}site_menu_subs where id={$id}");
		$sitemenusub=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteMenuSub Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitemenusub->id</td></tr>";
		$html.="<tr><th>Site Menu Id</th><td>$sitemenusub->site_menu_id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitemenusub->name</td></tr>";
		$html.="<tr><th>Link</th><td>$sitemenusub->link</td></tr>";
		$html.="<tr><th>Has Child</th><td>$sitemenusub->has_child</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
