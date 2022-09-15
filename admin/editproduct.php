<?php 
include('../classes/api.php');
$dataobj=new users();
$display = $dataobj->productDisplay();
$result=mysqli_fetch_assoc($display);

if(isset($_POST['product_update'])){
    $product_id = $result['product_id'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_category = $_POST['product_category'];
    $product_quantity = $_POST['product_quantity'];

    $filename = $_FILES['product_image']['name']; 
    $product_image="uploads/product".$filename;
    $tmpname = $_FILES['product_image']['tmp_name'];
    $a=move_uploaded_file($tmpname, $product_image);

    $product_size = $_POST['product_size'];
    $product_color = $_POST['product_color'];
    $product_discount = $_POST['product_discount'];
    $product_status = $_POST['product_status'];
    
    $updateproduct = $dataobj->updateproduct($product_title, $product_price,$product_description, $product_category, $product_quantity,$product_image, $product_size, $product_color, $product_discount, $product_status, $product_id);
    if($updateproduct == 200){
        header('location:elements.php');
    }else{
        header('location:editproduct.php');
    
    }

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="shortcut icon" type="image/png" href="#">
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-slider.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">
</head>

<body>
    <div class="overlay-background"></div>

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
                            <h5 class="mb-2">Modes</h5>
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



    <header class="header fixed-top d-flex align-items-center">
        <!-- ########## START: HEAD PANEL ########## -->
        <a href="index.php"><img src="assets/image/logo.png" alt="MS Admin Panel" width="80" /></a>
        <div class="br-header d-flex w-100">

            <div class="br-header-left">
                <a href="javascript:;" class="searchbar-toggle la la-search d-flex d-md-none"></a>
                <form class="searchbar d-flex align-items-center pl-3">
                    <i class="la la-search"></i>
                    <input class="form-control border-0 pl-2" type="search" placeholder="Search...">
                </form>

            </div>
            <!-- br-header-left -->
            <div class="br-header-right ml-auto">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link position-relative dropdown-toggle waves-effect waves-primary"
                            id="dropdownMSG" data-toggle="dropdown">
                            <i class="la la-envelope-o"></i>
                            <span class="badge badge-accent">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header py-0" aria-labelledby="dropdownMSG">
                            <div class="dropdown-menu-label">
                                <label class="mb-0">Messages</label>
                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-primary">View
                                    all</button>
                            </div>
                            <!-- d-flex -->
                            <div class="dropdown-divider my-0"></div>
                            <div class="media-list">
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <strong>Donna Seay</strong>
                                                <span>2 minutes ago</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of my entire soul,
                                                like these sweet mornings of spring.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <strong>Donna Seay</strong>
                                                <span>2 minutes ago</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of my entire soul,
                                                like these sweet mornings of spring.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <strong>Donna Seay</strong>
                                                <span>2 minutes ago</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of my entire soul,
                                                like these sweet mornings of spring.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                            </div>
                            <!-- media-list -->
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                    <!-- dropdown -->
                    <div class="dropdown">
                        <a href="" class="nav-link position-relative dropdown-toggle waves-effect waves-primary"
                            id="dropdownNOTY" data-toggle="dropdown">
                            <i class="la la-bell"></i>
                            <span class="badge badge-accent ">1</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header py-0" aria-labelledby="dropdownNOTY">
                            <div class="dropdown-menu-label">
                                <label class="mb-0">NOTIFICATIONS </label>
                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">View
                                    all</button>
                            </div>
                            <!-- d-flex -->
                            <div class="dropdown-divider my-0"></div>
                            <div class="media-list">
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <strong>Donna Seay</strong>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of </p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <strong>Jaymin Modi</strong>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession of my entire.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media d-flex align-items-center py-2 px-2">
                                        <img src="assets/image/img1.jpg" width="50" class="rounded-circle" alt="">
                                        <div class="media-body pl-3">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <strong>Zahir Patel</strong>
                                            </div>
                                            <!-- d-flex -->
                                            <p class="mb-0">A wonderful serenity has taken possession.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                            </div>
                            <!-- media-list -->
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                    <!-- dropdown -->
                    <div class="dropdown">
                        <a href="" class="nav-link-profile d-flex dropdown-toggle" data-toggle="dropdown"
                            id="dropdownprofile">
                            <img src="assets/image/img3.jpg" class="rounded" alt="" width="50">
                            <span class="logged-name px-3">Zahir Patel <br><small class="pt-3">Founder</small></span>
                            <i class="profile-dropdown la la-caret-square-o-down"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header dropdown-menu-user"
                            aria-labelledby="dropdownprofile">
                            <div class="text-center">
                                <a href=""><img src="assets/image/img3.jpg" width="80" class="rounded-circle"
                                        alt=""></a>
                                <h6 class="logged-fullname font-weight-bold mt-2">Zahir Patel</h6>
                                <p class="my-0">youremail@domain.com</p>
                            </div>
                            <hr>
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i class="la la-user"></i>
                                        Edit Profile</a></li>
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i class="la la-cog"></i>
                                        Settings</a></li>
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i
                                            class="la la-download"></i> Downloads</a></li>
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i
                                            class="la la-star-o"></i> Favorites</a></li>
                                <li><a href="javascript:;" class=" waves-effect waves-light"><i class="la la-file"></i>
                                        Collections</a></li>
                                <li><a href="logout.php" class=" waves-effect waves-light"><i
                                            class="la la-power-off"></i> Sign Out</a></li>
                            </ul>
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                    <!-- dropdown -->
                </nav>
            </div>
            <!-- br-header-right -->
        </div>
        <!-- br-header -->
        <!-- ########## END: HEAD PANEL ########## -->

    </header>
    <section style="padding-top:120px;" class="container">

        <div class="customcontainer">
            <div class="input-center">

                <form action="" method="post" enctype="multipart/form-data">
                    <br><br>
                    <input type="text" name="product_title" value="<?php echo $result['product_title'] ; ?>"
                        placeholder="Name"><br><br>
                    <input type="number" name="product_price" value="<?php echo $result['product_price'] ; ?>"
                        placeholder="Price"><br><br>
                    <textarea rows="3" name="product_description" value="<?php echo htmlspecialchars($result['product_description']) ; ?>"
                        placeholder="Description"></textarea><br><br>
                        
                    <select name="product_category">
                        <option selected>Category</option>
                        <option value="Electronics" <?php
                            if ($result['product_category'] == 'Electronics') {
                                echo "selected";
                            }
                            ?>>Electronics</option>
                        <option value="Clothing" <?php
                            if ($result['product_category'] == 'Clothing') {
                                echo "selected";
                            }
                        ?>>Clothing</option>
                        <option value="Appliances" <?php 
                            if ($result['product_category'] == 'Appliances') {
                                echo "selected";
                            }  
                        ?>>Appliances</option>
                    </select><br><br>
                    <select name="product_subcategory">
                        <option selected>SubCategory</option>
                        <option value="Smartphone" <?php
                            if ($result['product_subcategory'] == 'Smartphone') {
                                echo "selected";
                            }
                         ?>>Smartphone</option>
                        <option value="Tv" <?php
                            if ($result['product_subcategory'] == 'Tv') {
                                echo "selected";
                            }
                        ?>>Tv</option>
                        <option value="Refrigerator" <?php
                            if ($result['product_subcategory'] == 'Refrigerator') {
                                echo "selected";
                            }
                         ?>>Refrigerator</option>
                    </select><br><br>
                    <input type="text" name="product_quantity" value="<?php echo $result['product_quantity'] ; ?>"
                        placeholder="Unit"><br><br>
                    <input type="file" name="product_image" value="<?php echo $result['product_image']; ?>"><br><br>
                    <input type="text" name="product_size" value="<?php echo $result['product_size'] ; ?>"
                        placeholder="Size"><br><br>
                    <input type="text" name="product_color" value="<?php echo $result['product_color'] ; ?>"
                        placeholder="Colour"><br><br>
                    <input type="text" name="product_discount" value="<?php echo $result['product_discount'] ; ?>"
                        placeholder="Discount"><br><br>
                    <select name="product_status">
                        <option selected>Status</option>
                        <option value="1" <?php
                            if ($result['product_status'] == '1') {
                                echo "selected";
                            }
                        ?>>In Stock</option>
                        <option value="2" <?php 
                            if ($result['product_status'] == '2') {
                                echo "selected";
                            }
                        ?>>Pending</option>
                        <option value="3" <?php 
                            if ($result['product_status'] == '3') {
                                echo "selected";
                            }
                        ?>>Disabled</option>
                    </select><br><br>
                    <div class="button-flex">
                        <button class="success" type="submit" value="product_update"
                            name="product_update">update</button>
                        <button class="danger" type="button" onclick="product_cancel()"
                            name="product_Cancel">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <script>
    function product_cancel() {
        window.location.href = "elements.php";
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
    <script src="assets/scripts/custome.js"></script>
    <script src="assets/scripts/jquery.min.js"></script>

</body>

</html>