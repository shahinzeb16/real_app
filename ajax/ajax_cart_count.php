<?php
include '../classes/api.php';
$countobj=new cartadd();
$cart=$countobj->countcart();
$cartcount=mysqli_fetch_assoc($cart);
//print_r($cartcount);
echo implode("",$cartcount);
	// return true;
//echo $cart;

?>