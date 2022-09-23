<?php
include '../classes/api.php';
$productobj=new users();
$display=$productobj->productDisplay();
if(isset($_GET['delete'])){
    $product_id = $_GET['delete'];
    $delete = $productobj->deleteproduct($product_id);
    header('location:elements.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content='IE=edge' http-equiv=X-UA-Compatible>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MS Admin Panel</title>
    <link rel="shortcut icon" type="image/png" href="#">

    <!-- Core Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-slider.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="overlay-background"></div>
    <!-- ########## START: Setting Box ########## -->
    <div class="theme-setting-wrapper">
        <button type="button" id="settings-trigger" class="btn btn-primary waves-effect waves-primary">
			<i class="la la-cog"></i>
		</button>
        <div class="theme-setting-sidebar">
            <div class="h-100">
                <div class="mt-4 d-flex align-items-center flex-wrap px-4">
                    <h4 class="font-weight-bold">THEME CUSTOMIZER</h4>
                    <small>Customize &amp; Preview in Real Time</small>
                </div>
                <hr>
                <div class="theme-setting-sidebar-scroll">
                    <div class="px-4">
                        <div>
                            <h5 class="mb-2">Dark Mode</h5>
                            <div class="d-flex align-items-center">
                                <div class="radio theme-radio mr-4">
                                    <input type="radio" id="light" name="light" value="theme-light">
                                    <label for="light">Light</label>
                                </div>
                                <div class="radio theme-radio mr-4">
                                    <input type="radio" id="dark" name="light" value="theme-dark">
                                    <label for="dark">Dark</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <!-- ########## END: Setting Box ########## -->

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-sideleft">
        <a id="remove-menu" class="la la-close d-xl-none"></a>
        <div class="br-logo d-flex justify-content-center align-items-center">
            <a href="index.php"><img src="assets/image/logo.png" alt="MS Admin Panel" width="80" /></a>
        </div>
        <ul class="custom-scroll">
            <li><a href="index.php" class="waves-effect waves-primary"><i
                            class="la la-dashboard"></i>Dashboard</a></li>
            <li class="active"><a href="elements.php" class="waves-effect waves-primary"><i class="la la-clone"></i>Products</a></li>
            <li class="active"><a href="category.php" class="waves-effect waves-primary"><i class="la la-clone"></i>Categories</a></li>

            <!-- <li><a href="javascript:;" class="waves-effect waves-primary"><i
                            class="la la-bullhorn"></i>Campaign</a></li> -->
            <li class="dropdown-sub-menu">
                <a href="javascript:;" class="waves-effect waves-primary"><i
                                class="la la-users"></i>Customers</a>
                <!-- <ul class="sub-menu">
                            <li><a href="javascript:;"><i class="la la-users"></i>New Customers</a></li>
                            <li><a href="javascript:;"><i class="la la-users"></i>Old Customers</a></li>
                        </ul> -->
            </li>
            <li><a href="javascript:;" class="waves-effect waves-primary"><i
                                class="la la-cart-arrow-down"></i>Orders</a></li>
            <li><a href="javascript:;" class="waves-effect waves-primary"><i
                                class="la la-wechat"></i>Messages</a></li>
            <li><a href="javascript:;" class="waves-effect waves-primary"><i class="la la-bank"></i>Payments</a>
            </li>
            <li><a href="javascript:;" class="waves-effect waves-primary"><i class="la la-image"></i>Media
                            Manager</a></li>
            <li><a href="javascript:;" class="waves-effect waves-primary"><i class="la la-cog"></i>Settings</a>
            </li>
        </ul>
    </div>
    <!-- ########## END: LEFT PANEL ########## -->

 <?php
    include 'header.php';
 ?>
    <!-- ########## START: MAIN PANEL ########## -->
    <section class="mainpanel">
      <div class="pagebody">
           <br><br>
           <button type="button" onclick="add_product()" class="btn btn-success waves-effect waves-green">Add Product</button>
           <br><br>
            <div class="card  border-0">
                <div class="card-header py-4">
                    <h5 class="text-secondary font-weight-bold mb-0">Products Details</h5>
                </div>
                <div class="card-body">
                    <table id="datatable1" class="table table-striped table-borderless w-100">
                        <thead class="table-theme-bg">
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Units</th>
                                <th>Price(in ₹)</th>
                                <th>Status</th>
                                <th class="text-center no-sorting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($result=mysqli_fetch_assoc($display))
                            {
                            ?>
                            <tr>
                                <td><?php echo $result['product_title'];?></td>
                                <td><?php echo $result['product_category'];?></td>
                                <td><?php echo $result['product_quantity'];?></td>
                                <td><?php echo $result['product_price'];?></td>
                                <td>
                                <?php

                                    $status=$result['product_status'];
                                    if($status==0)
                                    {
                                        echo "Out of stock";
                                    }
                                    else if($status==1)
                                    {
                                        echo "In Stock";
                                    }
                                    else if($status==2){
                                    echo "Pending";
                                    }
                                    else{
                                    echo "Disabled";
                                    }

                                  ?></td>
                                <td class="td_action" align="center">
                                <a href="../user_visit/view_admin_product.php?product_id=<?php  echo $result['product_id']  ?> "><i data-title="View" id="viewdetails" class="la la-eye"></i></a>
                                  <!-- <a href="viewproduct.php?product_id=<?php  echo $result['product_id']  ?> "><i data-title="View" id="viewdetails" class="la la-eye"></i></a> -->

                                  <a href="editproduct.php?edit=<?php echo $result['product_id']  ?> "><i data-title="Edit" id="editdetails" class="la la-edit"></i></a>

                                  <a href="elements.php?delete=<?php echo $result['product_id'];  ?>"><i data-title="Delete"  id="deleteproduct" class="la la-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                              }
                            ?>
                          
                        </tbody>
                    </table>
                </div>
            </div>

      </div>
    </section>
    <!-- ########## END: MAIN PANEL ########## -->

</body>
<script>
    function add_product(){
        window.location.href = "addproduct.php";
    }
</script>
<script src="assets/scripts/jquery.min.js"></script>
<script src="assets/scripts/popper.min.js"></script>
<script src="assets/scripts/bootstrap-slider.min.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>
<script src="assets/scripts/bootstrap.bundle.min.js"></script>
<script src="assets/scripts/bootstrap-select.min.js"></script>
<script src="assets/scripts/bootstrap-tooltip-custom-class.js"></script>
<script src="assets/scripts/jquery.mCustomScrollbar.js"></script>
<script src="assets/scripts/datatables.min.js"></script>
<script src="assets/scripts/ripple.min.js"></script>
<script src="assets/scripts/custome.js"></script>

</html>
