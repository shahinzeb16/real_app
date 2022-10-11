<?php
error_reporting(0);
include "../../autoload/autoload.php";
$userobj=new Users();
if (isset($_REQUEST['edit'])) {
    $id=$_REQUEST['edit'];
    $editdisplay=$userobj->edituser($id);
    $result=mysqli_fetch_assoc($editdisplay);
    $oldpic=$result['image'];
}

if (isset($_REQUEST['submit'])) {
    $fullname=$_REQUEST['fname'];
    $username=$_REQUEST['uname'];
    $email=$_REQUEST['email'];
    $filename=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $folder='../../../uploads/profile/'.$filename;
    move_uploaded_file($tempname, $folder);
    $role=$_REQUEST['role'];

    $check = $userobj->usersedit($fullname, $username, $email, $id, $folder, $oldpic, $role, $filename);
    if ($check==200) {
        header('location:../tables/admindisplay.php');
    } else {
        header('location:edit.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Update Account</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>
                                <!-- /.card-header -->

                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <div class="form-group ">
                                            <label>Fullname</label>
                                            <input type="text" class="form-control " placeholder="Fullname" name="fname"
                                                value="<?php echo $result['fullname'];?>">
                                        </div>
                                        <div class="form-group ">
                                            <label>Username</label>
                                            <input type="text" class="form-control " placeholder="Username" name="uname"
                                                value="<?php echo $result['username'];?>">
                                        </div>
                                        <div class="form-group ">
                                            <label>Email Id</label>
                                            <input type="text" class="form-control " name="email"
                                                placeholder="john.doe@domain.com"
                                                value="<?php echo $result['email'];?>">
                                        </div>
                                        <div class="form-group ">
                                            <label>Upload Image</label>
                                            <input type="file" class="form-control " name="image"><img
                                                src="<?php echo $result['image'];?>" height="50" width="50">
                                        </div>
                                        <div>
                                            <label>Change Role</label>
                                            <input type="radio" name="role" value="0" <?php
                            if ($result['role']=="0") {
                                echo "checked";
                            }
?>>User
                                            <input type="radio" name="role" value="1" <?php
  if ($result['role']=="1") {
      echo "checked";
  }
?>>Admin
                                        </div>

                                        <div class="button-flex">
                                            <button type="submit" name="submit" class="btn btn-primary ">Update</button>
                                            <button class="btn btn-secondary" type="button" onclick="category_cancel()"
                                                name="product_Cancel">Cancel</button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="passwordchange.php?uid=<?php echo $id;?>">Change password</a>
                                            <a href="../../../user_visit/user_login.php"
                                                class="btn btn-outline-primary waves-effect waves-primary">Login</a>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    </div>
    <script>
    function category_cancel() {
        window.location.href = "../tables/admindisplay.php";
    }
    </script>
</body>

</html>