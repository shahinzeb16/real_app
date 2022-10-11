<?php
include_once '../autoload/autoload.php';

$cartupdateobj=new Cartadd();
$id=$_SESSION['user'];
$product_id=$_REQUEST['pro_id'];
$quantity=$_REQUEST['quantity'];
$cart=$cartupdateobj->updatecart($product_id,$id,$quantity);
if($cart == true)
{
    echo 200;
}
else{
    echo 404;
}
?>