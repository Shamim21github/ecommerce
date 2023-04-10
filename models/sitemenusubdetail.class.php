<?php
class SiteMenuSubDetail implements JsonSerializable{
	public $id;
	public $name;
	public $link;
	public $site_menu_sub_id;

	public function __construct(){
	}
	public function set($id,$name,$link,$site_menu_sub_id){
		$this->id=$id;
		$this->name=$name;
		$this->link=$link;
		$this->site_menu_sub_id=$site_menu_sub_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_menu_sub_details(name,link,site_menu_sub_id)values('$this->name','$this->link','$this->site_menu_sub_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_menu_sub_details set name='$this->name',link='$this->link',site_menu_sub_id='$this->site_menu_sub_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_menu_sub_details where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,link,site_menu_sub_id from {$tx}site_menu_sub_details");
		$data=[];
		while($sitemenusubdetail=$result->fetch_object()){
			$data[]=$sitemenusubdetail;
		}
			return $data;
	}

	public static function filter($sub_id){
		global $db,$tx;
		$result=$db->query("select id,name,link,site_menu_sub_id from {$tx}site_menu_sub_details where site_menu_sub_id='$sub_id'");
		$data=[];
		while($sitemenusubdetail=$result->fetch_object()){
			$data[]=$sitemenusubdetail;
		}
			return $data;
	}

	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,link,site_menu_sub_id from {$tx}site_menu_sub_details $criteria limit $top,$perpage");
		$data=[];
		while($sitemenusubdetail=$result->fetch_object()){
			$data[]=$sitemenusubdetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_menu_sub_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,link,site_menu_sub_id from {$tx}site_menu_sub_details where id='$id'");
		$sitemenusubdetail=$result->fetch_object();
			return $sitemenusubdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_menu_sub_details");
		$sitemenusubdetail =$result->fetch_object();
		return $sitemenusubdetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Link:$this->link<br> 
		Site Menu Sub Id:$this->site_menu_sub_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteMenuSubDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_menu_sub_details");
		while($sitemenusubdetail=$result->fetch_object()){
			$html.="<option value ='$sitemenusubdetail->id'>$sitemenusubdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_menu_sub_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,link,site_menu_sub_id from {$tx}site_menu_sub_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-sitemenusubdetail\">New SiteMenuSubDetail</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Link</th><th>Site Menu Sub Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Link</th><th>Site Menu Sub Id</th></tr>";
		}
		while($sitemenusubdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$sitemenusubdetail->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-sitemenusubdetail"]);
				$action_buttons.= action_button(["id"=>$sitemenusubdetail->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-sitemenusubdetail"]);
				$action_buttons.= action_button(["id"=>$sitemenusubdetail->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_menu_sub_details"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sitemenusubdetail->id</td><td>$sitemenusubdetail->name</td><td>$sitemenusubdetail->link</td><td>$sitemenusubdetail->site_menu_sub_id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,link,site_menu_sub_id from {$tx}site_menu_sub_details where id={$id}");
		$sitemenusubdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteMenuSubDetail Details</th></tr>";
		$html.="<tr><th>Id</th><td>$sitemenusubdetail->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitemenusubdetail->name</td></tr>";
		$html.="<tr><th>Link</th><td>$sitemenusubdetail->link</td></tr>";
		$html.="<tr><th>Site Menu Sub Id</th><td>$sitemenusubdetail->site_menu_sub_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
