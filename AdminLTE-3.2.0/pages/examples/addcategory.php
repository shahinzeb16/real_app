<?php 
include('../../../classes/api.php');
$dataobj=new category();
$parentfetch=$dataobj->parentcategory();
if(isset($_POST['category_add'])){
    $name = $_POST['name'];
    $parent_id = $_POST['parent_id'];
    $status = $_POST['status'];

    $check = $dataobj->addcategory($name,$parent_id,$status);
    if($check==200){
        
        header('location:../tables/category.php');
    }else{
        header('location:addcategory.php');

    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Category</title>

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
                            <h1>Add Category </h1>
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
                                <h3 class="card-title">Add category</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" id="inputName" class="form-control"
                                            name="product_name" placeholder="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id" >Parent Id</label>
                                        <select id="inputStatus" name="parent_id" class="form-control custom-select">
                                            <option selected disabled>None</option>
                                            <?php while($row=mysqli_fetch_assoc($parentfetch)){ ?>
                                               <option value="<?php  echo $row['id'] ?> "><?php  echo $row['name'] ?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" name="status" class="form-control custom-select">
                                            <option selected>Status</option>
                                            <option value="1">In Stock</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Disabled</option>
                                        </select>
                                    </div>
                                    <div class="button-flex">
                                        <button class="btn btn-primary" type="submit" name="category_add">Add</button>
                                        <button class="btn btn-secondary" type="button" onclick="category_cancel()" name="product_Cancel">Cancel</button>
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
        
    </div>
    
    <script>
        function category_cancel(){
           window.location.href = "../tables/category.php";
        }
    </script>
</body>

</html>