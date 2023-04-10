<?php
if(isset($_POST["btnDetails"])){
	$sitealbumdetail=SiteAlbumDetail::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_album_details">Manage SiteAlbumDetail</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>SiteAlbumDetail Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$sitealbumdetail->id</td></tr>";
		$html.="<tr><th>Site Album Id</th><td>$sitealbumdetail->site_album_id</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$sitealbumdetail->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Name</th><td>$sitealbumdetail->name</td></tr>";
		$html.="<tr><th>Description</th><td>$sitealbumdetail->description</td></tr>";
		$html.="<tr><th>Inactive</th><td>$sitealbumdetail->inactive</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
