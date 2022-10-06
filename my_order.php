<?php
    include '../classes/api.php';
	$orderobj=new orders();
    $id=$_SESSION['user'];
    $get_order_product=$orderobj->get_order_product($id);
    $cartobj = new cartadd();
    
	if(isset($_GET['cancel'])){
		$order_id=$_GET['cancel'];
		$orderobj->cancel_order($order_id);
        header('location:my_order.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>My orders</title>
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
<!--===============================================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body class="animsition">
	<?php
        include 'header.php';
    ?>
    <div class=" txt-center " >
		<h2 class=" txt-center">
			My Orders
		</h2>
    </div>	

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
									<th class="column-3">Order_id</th>

									<th class="column-4">Price</th>

									<th class="column-5">Quantity</th>
									<th class="column-6">Total</th>
									<th class="column-1">Action</th>



								</tr>
								<?php 
								    while($result=mysqli_fetch_assoc($get_order_product)){
										$product_id=$result['product_id'];
										$list=$cartobj->productdisplay($product_id);
									    $productdisplay = mysqli_fetch_assoc($list);
								 ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?php  echo $productdisplay['product_image'] ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $productdisplay['product_title'] ; ?></td>
									<td class="column-3"><?php echo $result['order_id'] ; ?></td>

									<td class="column-4"><?php echo $productdisplay['product_price'] ; ?></td>
                                    <td class="column-5"><?php echo $result['product_quantity'] ; ?></td>
									<td class="column-6"><?php  echo $productdisplay['product_price']*$result['product_quantity'] ;?></td>
									<td class="column-1">
										<a href="my_order.php?cancel=<?php echo $result['order_id'] ?>">cancel</a>
										<a href="view_admin_product.php?product_id=<?php  echo $result['product_id'] ; ?>&user_id=<?php  echo $result['user_id'] ; ?> "><i data-title="View" id="viewdetails" class="fas fa-eye"></i></a>
									</td>

								</tr>
								<?php  } ?>
							</table>
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