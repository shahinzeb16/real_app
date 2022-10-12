<?php
include_once 'autoload/autoload.php';
$customer = new Search();
$carttobj = new Cartadd();

if (isset($_REQUEST['submit'])) {
    $search = $_REQUEST['search'];
    $res =  $customer->search($search);
    // print_r($res);
    // die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--=========================0======================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
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
        <?php
        include 'header.php';
        include 'cart.php';
        ?>
    </div>
    <div class="container">
        <div class="row isotope-grid">

            <?php
            foreach ($res as $list) {
            ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="<?php echo  $list['product_image']; ?>" class="rounded mx-auto d-block" height="250" alt="IMG-PRODUCT">

                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">

                                <span class="stext-105 cl3">
                                    <?php echo $list['product_title']; ?>
                                </span>
                                <span class="stext-105 cl3">
                                    <?php echo "₹" . $list['product_price']; ?>
                                </span>
                            </div>
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" onClick="wishadd(<?php echo $list['product_id']; ?>)" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                            <div>
                                <a type="button" class="btn btn-primary" href="view_product.php?product_id=<?php echo $list['product_id']; ?>">
                                    View
                                </a>

                                <a type="button" class="btn btn-primary" onClick="cartadd(<?php echo $list['product_id']; ?>)">Add To Cart</a>
                            </div>



                        </div>
                        <p id="p1_<?php echo $list['product_id']; ?>"></p>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>


    <?php
    include 'footer.php';
    include 'script.php';

    ?>
    	<script type="text/javascript">
		function cartadd(product_id) {
			//alert(product_id);
			$.ajax({
				type: "post",
				url: "ajax/cart_add.php",
				data: {
					pr_id: product_id
				}
			}).done(function(data) {
				$("#p1_" + product_id).html(data).css("color", "orange");

			});

			setTimeout(function() {
				$("#p1_" + product_id).html('');
			}, 5000);

			cartcount();

		}



		function wishadd(product_id) {
			//alert(product_id);
			$.ajax({
				type: "post",
				url: "ajax/wish_add.php",
				data: {
					pr_id: product_id
				}
			}).done(function(data) {
				$("#p1_" + product_id).html(data).css("color", "red");

			});

			setTimeout(function() {
				$("#p1_" + product_id).html('');
			}, 8000);
			wishcount();
		}
	</script>



</body>

</html>