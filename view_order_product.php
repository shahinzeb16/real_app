<?php
include 'classes/api/Index.php';
$ordersodj = new Orders();
$productobj= new Product();
$addressobj = new Users_address();

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $display1 = $productobj->productfetch($product_id);
    $result = mysqli_fetch_assoc($display1);

}

if(isset($_GET['user_id'])){

	$user_id = $_GET['user_id'];
	$get_address = $addressobj->get_user_address($user_id);
	$address_result=mysqli_fetch_assoc($get_address);
	// $addressobj->prx($address_result);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
		<div class="container">
		   
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
									<div class="wrap-pic-w pos-relative">
										<img src="<?php  echo  $result['product_image']; ?>" height="400" alt="IMG-PRODUCT">
									</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								<?php echo $result['product_title'] ;  ?>
							</h4>

							<span class="mtext-106 cl2">
							    <?php  echo "₹".$result['product_price']; ?>
							</span>
                            
							<div class="stext-102 cl3 p-t-23">
								<p><span><b>Description:</b></span><?php  echo $result['product_description']; ?>
                            </div>

                            <div class="stext-102 cl3 p-t-23">
								<p><span><b>Size:</b></span><?php  echo $result['product_size']; ?></p>
                            </div>

							<div class="stext-102 cl3 p-t-23">
								<p><span><b>Quantity:</b></span><?php  echo $result['product_quantity']; ?></p>
                            </div>
                            
                            <div class="stext-102 cl3 p-t-23">
								<p><span><b>Colour:</b></span><?php  echo $result['product_color']; ?></p>
                            </div>

                            <div class="stext-102 cl3 p-t-23">
                            	<?php  echo $result['product_discount']."off"; ?>
                            </div>
									
						</div>
						<div class="p-r-50 p-t-5 p-lr-0-lg">
						
						    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
								User details
							</h4>  
							
							<div class="stext-102 cl3 p-t-23">
							    <p><span><b>Address:</b></span><?php  echo $address_result['address']; ?>
  							</div>

							<div class="stext-102 cl3 p-t-23">
							    <p><span><b>Pincode:</b></span><?php  echo $address_result['pincode']; ?>
							</div>

							<div class="stext-102 cl3 p-t-23">
								<p><span><b>State:</b></span><?php  echo $address_result['state']; ?>
     						</div>

							<div class="stext-102 cl3 p-t-23">
								<p><span><b>City:</b></span><?php  echo $address_result['city']; ?>
							</div>

							<div class="stext-102 cl3 p-t-23">
								<p><span><b>Landmark:</b></span><?php  echo $address_result['landmark']; ?>
							</div>
						</div>

					</div>
				</div>
			</div>
			
		</div>

	<?php
		include 'script.php';

    ?>
</body>
</html>