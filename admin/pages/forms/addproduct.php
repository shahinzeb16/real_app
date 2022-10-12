<?php

include '../../autoload/autoload.php';
$dataobj = new Product();
$parentfetch = $dataobj->parentcategory();

if(isset($_POST['submit'])){
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_category = $_POST['subcategory'];
    $product_quantity = $_POST['product_quantity'];

    $filename = $_FILES['product_image']['name']; 
    $product_image="../../../uploads/product/".$filename;
    $imagepath = "uploads/product/".$filename;
    $tmpname = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($tmpname, $product_image); 

    $product_size = $_POST['product_size'];
    $product_color = $_POST['product_color'];
    $product_discount = $_POST['product_discount'];
    $product_status = $_POST['product_status'];

    $product_array = array($product_title,$product_price,$product_description,$product_category,$product_quantity,$imagepath,$product_size,$product_color,$product_discount,$product_status);
    $check = $dataobj->addproduct($product_array);
    if($check == 200){       
       header('location:../tables/product.php');
    }else{
       header('location:addproduct.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Add</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Product </h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Product</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="product_title">Product Name</label>
                                        <input type="text" name="product_title" id="inputName" class="form-control"
                                            placeholder="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_description">Product Description</label>
                                        <textarea id="inputDescription" class="form-control" rows="4"
                                            name="product_description" placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_price">Product Price</label>
                                        <input type="text" name="product_price" id="inputClientCompany"
                                            class="form-control" placeholder="Product_price">
                                    </div>
                                    <label for="product_category">Category</label>
                                    <select id="product_category" class="form-control custom-select">
                                        <option value="Selected">category</option>
                                        <?php while($row=mysqli_fetch_assoc($parentfetch)){ ?>
                                        <option value="<?php  echo $row['id']; ?> "><?php  echo $row['name']; ?>
                                        </option>
                                        <?php }?>
                                    </select><br><br>
                                    <label for="subcategory">Sub Category</label>
                                    <select id="sub_category" name="subcategory" class="form-control custom-select">
                                        <option>Subcategory</option>
                                    </select><br><br>

                                    <div class="form-group">
                                        <label for="product_quantity">product quantity</label>
                                        <input type="text" name="product_quantity" id="inputClientCompany"
                                            class="form-control" placeholder="product_quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image">product Image</label>
                                        <input type="file" name="product_image" id="inputProjectLeader"
                                            class="form-control" placeholder="product_image">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_size">product size</label>
                                        <input type="text" name="product_size" id="inputProjectLeader"
                                            class="form-control" placeholder="product_size">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_color">product color</label>
                                        <input type="text" name="product_color" id="inputProjectLeader"
                                            class="form-control" placeholder="product_color">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_discount">product discount</label>
                                        <input type="text" name="product_discount" id="inputProjectLeader"
                                            class="form-control" placeholder="product_discount">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_status">Status</label>
                                        <select id="inputStatus" name="product_status"
                                            class="form-control custom-select">
                                            <option selected>Select one</option>
                                            <option value="1">In Stock</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Disabled</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input class="btn btn-primary" type="submit" name="submit">
                                            <!-- <a href="#" class="btn btn-secondary">Cancel</a> -->
                                            <button class="btn btn-secondary" type="button" onclick="product_cancel()"
                                                name="product_Cancel">Cancel</button>
                                            <!-- <input type="submit" value="Create new Project" class="btn btn-success float-right"> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script>
    function product_cancel() {
        window.location.href = "../tables/product.php";
    }

    $("#product_category").on('change', function() {
        var cat = this.value;
        // alert(cat);

        $.ajax({
            type: "post",
            url: "../../ajax/ajax_sub_category.php",
            data: {
                category: cat
            }
        }).done(function(data) {
            $("#sub_category").html(data);
            //console.log(data);

        });
    });
    </script>
</body>

</html>