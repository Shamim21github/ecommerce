<?php
class ProductSection implements JsonSerializable{
	public $id;
	public $name;
	public $unit_id;
	public $photo;
	public $icon;

	public function __construct(){
	}
	public function set($id,$name,$unit_id,$photo,$icon){
		$this->id=$id;
		$this->name=$name;
		$this->unit_id=$unit_id;
		$this->photo=$photo;
		$this->icon=$icon;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}product_sections(name,unit_id,photo,icon)values('$this->name','$this->unit_id','$this->photo','$this->icon')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}product_sections set name='$this->name',unit_id='$this->unit_id',photo='$this->photo',icon='$this->icon' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}product_sections where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,unit_id,photo,icon from {$tx}product_sections");
		$data=[];
		while($productsection=$result->fetch_object()){
			$data[]=$productsection;
		}
			return $data;
	}

	public static function filter($unit_id){
		global $db,$tx;
		$result=$db->query("select id,name,unit_id,photo,icon from {$tx}product_sections where unit_id='$unit_id'");
		$data=[];
		while($productsection=$result->fetch_object()){
			$data[]=$productsection;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,unit_id,photo,icon from {$tx}product_sections $criteria limit $top,$perpage");
		$data=[];
		while($productsection=$result->fetch_object()){
			$data[]=$productsection;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}product_sections $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}

	

	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,unit_id,photo,icon from {$tx}product_sections where id='$id'");
		$productsection=$result->fetch_object();
			return $productsection;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}product_sections");
		$productsection =$result->fetch_object();
		return $productsection->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Unit Id:$this->unit_id<br> 
		Photo:$this->photo<br> 
		Icon:$this->icon<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProductSection"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}product_sections");
		while($productsection=$result->fetch_object()){
			$html.="<option value ='$productsection->id'>$productsection->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}product_sections $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,unit_id,photo,icon from {$tx}product_sections $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-productsection\">New ProductSection</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Unit Id</th><th>Photo</th><th>Icon</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Unit Id</th><th>Photo</th><th>Icon</th></tr>";
		}
		while($productsection=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$productsection->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-productsection"]);
				$action_buttons.= action_button(["id"=>$productsection->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-productsection"]);
				$action_buttons.= action_button(["id"=>$productsection->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"product_sections"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$productsection->id</td><td>$productsection->name</td><td>$productsection->unit_id</td><td><img src=\"img/$productsection->photo\" width=\"100\" /></td><td>$productsection->icon</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,unit_id,photo,icon from {$tx}product_sections where id={$id}");
		$productsection=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ProductSection Details</th></tr>";
		$html.="<tr><th>Id</th><td>$productsection->id</td></tr>";
		$html.="<tr><th>Name</th><td>$productsection->name</td></tr>";
		$html.="<tr><th>Unit Id</th><td>$productsection->unit_id</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$productsection->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Icon</th><td>$productsection->icon</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
