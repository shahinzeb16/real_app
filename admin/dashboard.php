<?php
include('../classes/api.php'); 

// session_start();
// if($_SESSION['id']=="")
// {
// 	header("location:login.php");
// }

// (product_title, product_price, product_description, product_category, product_subcategory  product_quantity, product_image, product_size, product_color, product_discount, product_status, product_location, )

// $product_array= array('test',200,'Hello world','fashion','kid',1,'flower1','32cm','red','60%',0,"jalpaiguri");
// $dataobj= new users();
// $dataobj->addproduct($product_array);


// $product_id = 1;
// $dataobj = new users();
// $dataobj->deleteproduct($product_id);

$product_title="TEST";
$product_price=400;
$product_description="Hello India";
$product_category="fashion";
$product_subcategory="Man";
$product_quantity=4;
$product_image="flower2";
$product_size="38cm";
$product_color="green";
$product_discount="50%";
$product_status=0;
$product_location="kolkata";
$product_id=3;
$dataobj= new users();
$dataobj->updateproduct($product_title, $product_price, $product_description, $product_category, $product_subcategory , $product_quantity, $product_image, $product_size, $product_color, $product_discount, $product_status, $product_location, $product_id);


?>
