<?php
include('../classes/api.php'); 

// session_start();
// if($_SESSION['id']=="")
// {
// 	header("location:login.php");
// }

// (product_title, product_price, product_description, product_category, product_subcategory  product_quantity, product_image, product_size, product_color, product_discount, product_status, product_location, )

$product_array= array('test',200,'Hello world','fashion','kid',1,'flower1','32cm','red','60%',0,"jalpaiguri");
$dataobj= new users();
$dataobj->addproduct($product_array);
?>