<?php
    include '../classes/api.php';
	$carttobj = new cartadd();
	$id=$_SESSION['user'];
	$cartdisplay=$carttobj->get_cart_product($id);
	$addressobj = new users_address();
	if(isset($_POST['submit'])){
		$user_id=$_SESSION['user'];
		$address=$_POST['address'];
		$pincode=$_POST['pincode'];
		$state=$_POST['state'];
		$city=$_POST['landmark'];
	
	    $check = $addressobj->add_address($user_id,$address,$pincode,$state,$city,$landmark);
	   if($check==200){
		 header('location:shop.php');
	   }
	   else{
		 header('location:shoping-cart.php');
	   }
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete = $carttobj->deletecartproduct($id);
        header('location:view-cart.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--===============================================================================================-->
</head>
<body class="animsition">
	<?php
        include 'header.php';
		include 'cart.php';
    ?>
 

	<!-- Shoping Cart -->
	<form  method="post" action="" enctype="multipart/form-data" class="bg0 p-t-75 p-b-85">
	   <div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Price</th>
									<th class="column-6">Total</th>
                                    <th class="column-7">Action</th>

								</tr>
								<?php 
								    while($cart=mysqli_fetch_assoc($cartdisplay)){
										$product_id=$cart['product_id'];
										$list=$carttobj->productdisplay($product_id);
									    $productdisplay = mysqli_fetch_assoc($list);
								 ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?php  echo $productdisplay['product_image'] ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $productdisplay['product_title'] ; ?></td>
									<td class="column-3"><?php echo $productdisplay['product_price'] ; ?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" data-product-id="<?php echo $cart['cart_id'];?>"
											type="text"  
							
											value="<?php echo $cart['quantity'];?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td id="productprice"  class="column-5"><?php  echo $productdisplay['product_price'];?></td>
									<td id="producttotal"><?php echo $productdisplay['product_price']?></td>
                                    <td><a href="view-cart.php?delete=<?php echo $cart['cart_id'];  ?>"><i  class=" fas fa-trash"></i></a></td>

								</tr>

								<?php  
									$sum=0;
									$total= $productdisplay['product_price']*$cart['quantity'];
									$sum=$sum+$total; 

								?>
								<?php  } ?>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</form>
		
	
	<?php
        include 'footer.php';
    ?>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>