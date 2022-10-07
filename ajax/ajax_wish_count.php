<?php
include '../classes/api/Index.php';
$wishobj=new Wishadd();
$wish=$wishobj->countwish();
$wishcount=mysqli_fetch_assoc($wish);
//print_r($cartcount);
echo implode("",$wishcount);
	// return true;
//echo $cart;

?>