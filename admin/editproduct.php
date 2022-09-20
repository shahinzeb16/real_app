<?php 
include('../classes/api.php');
$dataobj=new users();
$categoryobj=new category();
if(isset($_GET['edit'])){
    $product_id = $_GET['edit'];
    $display = $dataobj->productfetch($product_id);
    $result = mysqli_fetch_assoc($display);
    // $parentfetch=$categoryobj->parentcategory($result['product_category']);


}
$subcat=$categoryobj->sub_cat_fetch($id);

$parentfetch=$categoryobj->parentcategory();

if(isset($_POST['product_update'])){
    $product_id = $result['product_id'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_category = $_POST['productCategory'];
    $product_quantity = $_POST['product_quantity'];
    $old_image = $result['product_image'];


    $filename = $_FILES['product_image']['name']; 
    $product_image="uploads/product".$filename;
    $tmpname = $_FILES['product_image']['tmp_name'];
    $a=move_uploaded_file($tmpname, $product_image);

    $product_size = $_POST['product_size'];
    $product_color = $_POST['product_color'];
    $product_discount = $_POST['product_discount'];
    $product_status = $_POST['product_status'];
    
    $updateproduct = $dataobj->updateproduct($filename,$old_image,$product_title, $product_price,$product_description, $product_category, $product_quantity,$product_image, $product_size, $product_color, $product_discount, $product_status, $product_id);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    <?php
        include 'header.php';
    ?>
    <section style="padding-top:120px;" class="container">

        <div class="customcontainer">
            <div class="input-center">
            
                <form action="" method="post" enctype="multipart/form-data">
                    <br><br>
                    <input type="text" name="product_title" value="<?php echo $result['product_title'] ; ?>"
                        placeholder="Name"><br><br>
                    <input type="number" name="product_price" value="<?php echo $result['product_price'] ; ?>"
                        placeholder="Price"><br><br>
                    <textarea rows="3" name="product_description" placeholder="Description"><?php echo htmlspecialchars($result['product_description']) ; ?></textarea><br><br>
                        
                    <select id="product_category" name="productCategory"  >
                        <option value="Selected">Category</option>
                        <?php while($row=mysqli_fetch_assoc($parentfetch)){ ?>
                            <option value="<?php  echo $row['id']; ?> " <?php if ($result['product_category'] == "$row[id]") {
                                echo "selected";
                            }  ?>> <?php  echo $row['name']; ?></option>
                        <?php }?>
                    </select><br><br>

                    <select id="sub_category"  name="subcategory"  >
                    <?php
                       $subcat=$categoryobj->sub_cat_fetch($cat_id=$result['product_category']);
                       foreach($subcat as $sub)
                       {
                    ?>
                    <option value="<?php echo $sub['id'];?>" <?php if($sub['id']==$cat_id){ ?> selected<?php } ?>>
                    <?php echo $sub['name'];?></option>
                    <?php
                        }
                    ?> 
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

    $("#product_category").on('change',function(){
            var cat= this.value;
            // alert(cat);
            
            $.ajax({
                type:"post",
                url:"../ajax/ajax_sub_category.php",
                data:{category:cat}
            }).done(function(data){
              $("#sub_category").html(data);
              //console.log(data);
                 
           });
        });
    </script>

</body>

</html>