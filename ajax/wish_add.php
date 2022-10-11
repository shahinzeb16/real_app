<?php
include_once '../autoload/autoload.php';
$wishobj=new Wishadd();
$id=$_SESSION['user'];
if($id=="")
{
	echo "Please Login To Continue";
}
else
{
	if(isset($_REQUEST['pr_id']))
	{
		$product_id=$_REQUEST['pr_id'];
		// $quantity='1';
		$wishlist=$wishobj->wishlistadd($product_id,$id);
		if($wishlist)
		{
			echo "Item Wishlisted";
		}
	}
}

?>