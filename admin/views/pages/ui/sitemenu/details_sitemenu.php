<?php
if(isset($_POST["btnDetails"])){
	$sitemenu=SiteMenu::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_menus">Manage SiteMenu</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>SiteMenu Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$sitemenu->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitemenu->name</td></tr>";
		$html.="<tr><th>Link</th><td>$sitemenu->link</td></tr>";
		$html.="<tr><th>Has Child</th><td>$sitemenu->has_child</td></tr>";
		$html.="<tr><th>Inactive</th><td>$sitemenu->inactive</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
