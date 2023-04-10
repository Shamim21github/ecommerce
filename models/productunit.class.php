<?php
class ProductUnit implements JsonSerializable{
	public $id;
	public $name;
	public $photo;
	public $icon;

	public function __construct(){
	}
	public function set($id,$name,$photo,$icon){
		$this->id=$id;
		$this->name=$name;
		$this->photo=$photo;
		$this->icon=$icon;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}product_units(name,photo,icon)values('$this->name','$this->photo','$this->icon')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}product_units set name='$this->name',photo='$this->photo',icon='$this->icon' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}product_units where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,photo,icon from {$tx}product_units");
		$data=[];
		while($productunit=$result->fetch_object()){
			$data[]=$productunit;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,photo,icon from {$tx}product_units $criteria limit $top,$perpage");
		$data=[];
		while($productunit=$result->fetch_object()){
			$data[]=$productunit;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}product_units $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,photo,icon from {$tx}product_units where id='$id'");
		$productunit=$result->fetch_object();
			return $productunit;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}product_units");
		$productunit =$result->fetch_object();
		return $productunit->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Photo:$this->photo<br> 
		Icon:$this->icon<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProductUnit"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}product_units");
		while($productunit=$result->fetch_object()){
			$html.="<option value ='$productunit->id'>$productunit->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}product_units $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,photo,icon from {$tx}product_units $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-productunit\">New ProductUnit</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Photo</th><th>Icon</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Photo</th><th>Icon</th></tr>";
		}
		while($productunit=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$productunit->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-productunit"]);
				$action_buttons.= action_button(["id"=>$productunit->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-productunit"]);
				$action_buttons.= action_button(["id"=>$productunit->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"product_units"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$productunit->id</td><td>$productunit->name</td><td><img src=\"img/$productunit->photo\" width=\"100\" /></td><td>$productunit->icon</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,photo,icon from {$tx}product_units where id={$id}");
		$productunit=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ProductUnit Details</th></tr>";
		$html.="<tr><th>Id</th><td>$productunit->id</td></tr>";
		$html.="<tr><th>Name</th><td>$productunit->name</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$productunit->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Icon</th><td>$productunit->icon</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
