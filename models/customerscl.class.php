<?php
class Customerscl implements JsonSerializable{

	public function __construct(){
	}
	public function set(){

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}customerscls()values()");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}customerscls set  where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}customerscls where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select  from {$tx}customerscls");
		$data=[];
		while($customerscl=$result->fetch_object()){
			$data[]=$customerscl;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select  from {$tx}customerscls $criteria limit $top,$perpage");
		$data=[];
		while($customerscl=$result->fetch_object()){
			$data[]=$customerscl;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}customerscls $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select  from {$tx}customerscls where id='$id'");
		$customerscl=$result->fetch_object();
			return $customerscl;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}customerscls");
		$customerscl =$result->fetch_object();
		return $customerscl->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "";
	}

	//-------------HTML----------//

	static function html_select($name="cmbCustomerscl"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}customerscls");
		while($customerscl=$result->fetch_object()){
			$html.="<option value ='$customerscl->id'>$customerscl->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}customerscls $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select  from {$tx}customerscls $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-customerscl\">New Customerscl</a></th></tr>";
		if($action){
			$html.="<tr><th>Action</th></tr>";
		}else{
			$html.="<tr></tr>";
		}
		while($customerscl=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$customerscl->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-customerscl"]);
				$action_buttons.= action_button(["id"=>$customerscl->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-customerscl"]);
				$action_buttons.= action_button(["id"=>$customerscl->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"customerscls"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select  from {$tx}customerscls where id={$id}");
		$customerscl=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Customerscl Details</th></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
