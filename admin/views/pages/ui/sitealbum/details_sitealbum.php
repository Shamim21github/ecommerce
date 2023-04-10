<?php
if(isset($_POST["btnDetails"])){
	$sitealbum=SiteAlbum::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_albums">Manage SiteAlbum</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>SiteAlbum Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$sitealbum->id</td></tr>";
		$html.="<tr><th>Name</th><td>$sitealbum->name</td></tr>";
		$html.="<tr><th>Created At</th><td>$sitealbum->created_at</td></tr>";
		$html.="<tr><th>Description</th><td>$sitealbum->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$sitealbum->photo\" width=\"100\" /></td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
