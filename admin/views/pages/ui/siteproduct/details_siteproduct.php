<?php
if(isset($_POST["btnDetails"])){
	$siteproduct=SiteProduct::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="site_products">Manage SiteProduct</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>SiteProduct Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$siteproduct->id</td></tr>";
		$html.="<tr><th>Name</th><td>$siteproduct->name</td></tr>";
		$html.="<tr><th>Site Product Category Id</th><td>$siteproduct->site_product_category_id</td></tr>";
		$html.="<tr><th>Description</th><td>$siteproduct->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$siteproduct->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Regular Price</th><td>$siteproduct->regular_price</td></tr>";
		$html.="<tr><th>Offer Price</th><td>$siteproduct->offer_price</td></tr>";
		$html.="<tr><th>Inactive</th><td>$siteproduct->inactive</td></tr>";
		$html.="<tr><th>Current Stock</th><td>$siteproduct->current_stock</td></tr>";
		$html.="<tr><th>Site Product Uom Id</th><td>$siteproduct->site_product_uom_id</td></tr>";
		$html.="<tr><th>Slug</th><td>$siteproduct->slug</td></tr>";
		$html.="<tr><th>Icon</th><td>$siteproduct->icon</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
