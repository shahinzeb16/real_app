<?php
include "../classes/api.php";
// session_start();
// if($_SESSION['id']=="")
// {
// 	header("location:login.php");
// }
$product_id = 1;
$dataobj = new users() ;
$dataobj->deleteproduct($product_id);

?>