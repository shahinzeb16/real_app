<?php
include '../classes/api.php';
$cartupdateobj=new cartadd();
$id=$_SESSION['user'];
$product_id=$_REQUEST['pro_id'];
$quantity=$_REQUEST['quantity'];
$cart=$cartupdateobj->updatecart($product_id,$id,$quantity);
?>