<?php
include_once '../autoload/autoload.php';
$cartobj=new Cartadd();
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
		$quantity='1';
		$cart=$cartobj->addtocart($product_id,$id,$quantity);
		if($cart)
		{
			echo "Item Added to Cart";
		
		}
	}
}

?>