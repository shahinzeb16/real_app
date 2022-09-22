<?php
include '../classes/api.php';
$wishobj=new cartadd();
$wish=$wishobj->countwish();
$wishcount=mysqli_fetch_assoc($wish);
//print_r($cartcount);
echo implode("",$wishcount);
	// return true;
//echo $cart;

?>