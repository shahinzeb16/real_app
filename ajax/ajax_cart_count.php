<?php
include '../classes/api/Index.php';
$countobj=new Cartadd();
$cart=$countobj->countcart();
$cartcount=mysqli_fetch_assoc($cart);
//print_r($cartcount);
echo implode("",$cartcount);
	// return true;
//echo $cart;

?>