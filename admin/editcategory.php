<?php 
include('../classes/api.php');
$categoryobj=new category();
$parentfetch=$categoryobj->parentcategory();
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $display = $categoryobj->categoryfetch($id);
    $result = mysqli_fetch_assoc($display);

}

if(isset($_POST['category_update'])){
    $id =$result['id'];
    $name = $_POST['name'];
    $parent_id = $_POST['parent_id'];
    $status = $_POST['status'];

    $check = $categoryobj->updatecategory($name,$parent_id,$status,$id);
    if($check==200){
        
        header('location:category.php');
    }else{
        header('location:editcategory.php');

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

    <!-- <title>Addproduct</title> -->
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
      <form action="" method="post" >
        <br><br>
        <input type="text" name="name" value="<?php echo $result['name'] ; ?>" placeholder="Name"><br><br>
        
        <select name="parent_id">
          <option value=""><?php echo $result['parent_id'] ;  ?></option>
          <?php while($row=mysqli_fetch_assoc($parentfetch)){ ?>
            <option value="<?php  echo $row['id'] ?> "><?php  echo $row['parent_id'] ?> </option>
         <?php }?>
        </select><br><br>
    
        <select name="status">
          <option selected>Status</option>
          <option value="1"<?php
           if ($result['status'] == '1') {
                echo "selected";
            } ?>>In Stock</option>
          <option value="2" <?php
           if ($result['status'] == '2') {
            echo "selected";
           }?>>Pending</option>
          <option value="3" <?php 
           if ($result['status'] == '3') {
                echo "selected";
            } ?>>Disabled</option>
        </select><br><br>
        <div class="button-flex">
          <button class="success" type="submit" name="category_update">Update</button>
          <button class="danger" type="button" onclick="category_cancel()" name="product_Cancel">Cancel</button>
        </div>
      </form>
    </div>
    </div>
    </section>
    <script>
        function category_cancel(){
           window.location.href = "category.php";
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
    <script src="assets/scripts/custom.js"></script>
  
  </body>
</html>
