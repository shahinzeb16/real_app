<?php
include '../classes/api.php';
$r='';
$customer = new customers();
//$search = $_REQUEST['search'];
if(isset($_REQUEST['submit'])){
    $search = $_REQUEST['search'];
    $res =  $customer->search($search);
    $count = mysqli_num_rows($res);
    if ($count > 0) {
        while ($row=mysqli_fetch_assoc($res)) {
            $image=$row['product_image'];
            $id=$row['product_id'];
            $title=$row['product_title'];
            $price=$row['product_price'];
            //print_r($row);
            $r .='
            <div class="row isotope-grid">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="'.$image.'" class="rounded mx-auto d-block" height="250" width="150" alt="IMG-PRODUCT">
                        </div>
                        <div>
                            <a href="view_product.php?product_id='.$id.'">
                                View
                            </a>
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <span class="stext-105 cl3">
                                    '.$title.'
                                </span>
                                <span class="stext-105 cl3">
                                    '.$price.'
                                </span>
                            </div>
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> ';
        }
    }else {
        echo "<div class='alert alert-danger'>
         There is no product matching your search.
        </div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    <?php 
        include 'header.php';
        include 'cart.php';
    ?>

    <!-- Product -->
    <!-- <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">

                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <?php 
						//foreach($get_category as $list){

					?>


                    <button id="product_category" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1"
                        data-filter="*">
                        <a href="shop.php?cat_id=<?php //echo $list['id']; ?>"><?php // echo $list['name'] ?></a>
                    </button>
                    <?php // } ?>

                </div>-->

    <!-- <div class="flex-w flex-c-m m-tb-10">
                    <div
                        class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div> -->

    <!-- Search product -->
    <!-- <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button type="button" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <form method="post" action="">
                            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search"
                                placeholder="Search..">
                            <button type="submit"></button>
                        </form>
                    </div>
                </div>
            </div> -->


    <?php echo $r ?>

    <!-- Load more -->
    <div class="flex-c-m flex-w w-full p-t-45">
        <a href="shop.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
            Load More
        </a>
    </div>
    </div>
    </div>


    <?php
        include 'footer.php';
    ?>



    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>


    <?php
		include 'script.php';

    ?>

    <script src="js/custom.js">

    </script>


</body>

</html>