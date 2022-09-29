<?php
include '../classes/api.php';
$cartupdateobj=new cartadd();
$id=$_SESSION['user'];
$product_id=$_REQUEST['pro_id'];
$quantity=$_REQUEST['quantity'];
//echo $quantity,$product_id;
$cart=$cartupdateobj->updatecart($product_id,$id,$quantity);
?>