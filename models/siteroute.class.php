<?php
class SiteRoute implements JsonSerializable{
	public $id;
	public $name;
	public $src;
	public $inactive;

	public function __construct(){
	}
	public function set($id,$name,$src,$inactive){
		$this->id=$id;
		$this->name=$name;
		$this->src=$src;
		$this->inactive=$inactive;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}site_routes(name,src,inactive)values('$this->name','$this->src','$this->inactive')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}site_routes set name='$this->name',src='$this->src',inactive='$this->inactive' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}site_routes where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,src,inactive from {$tx}site_routes");
		$data=[];
		while($siteroute=$result->fetch_object()){
			$data[]=$siteroute;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,src,inactive from {$tx}site_routes $criteria limit $top,$perpage");
		$data=[];
		while($siteroute=$result->fetch_object()){
			$data[]=$siteroute;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}site_routes $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,src,inactive from {$tx}site_routes where id='$id'");
		$siteroute=$result->fetch_object();
			return $siteroute;
	}

	public static function find_by_name($name){
		global $db,$tx;
		$result =$db->query("select id,name,src,inactive from {$tx}site_routes where name='$name'");
		$siteroute=$result->fetch_object();
			return $siteroute;
	}


	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}site_routes");
		$siteroute =$result->fetch_object();
		return $siteroute->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Src:$this->src<br> 
		Inactive:$this->inactive<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSiteRoute"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}site_routes");
		while($siteroute=$result->fetch_object()){
			$html.="<option value ='$siteroute->id'>$siteroute->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}site_routes $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,src,inactive from {$tx}site_routes $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-siteroute\">New SiteRoute</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Src</th><th>Inactive</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Src</th><th>Inactive</th></tr>";
		}
		while($siteroute=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$siteroute->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-siteroute"]);
				$action_buttons.= action_button(["id"=>$siteroute->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-siteroute"]);
				$action_buttons.= action_button(["id"=>$siteroute->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"site_routes"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$siteroute->id</td><td>$siteroute->name</td><td>$siteroute->src</td><td>$siteroute->inactive</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,src,inactive from {$tx}site_routes where id={$id}");
		$siteroute=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SiteRoute Details</th></tr>";
		$html.="<tr><th>Id</th><td>$siteroute->id</td></tr>";
		$html.="<tr><th>Name</th><td>$siteroute->name</td></tr>";
		$html.="<tr><th>Src</th><td>$siteroute->src</td></tr>";
		$html.="<tr><th>Inactive</th><td>$siteroute->inactive</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
