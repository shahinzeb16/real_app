<?php
error_reporting(0);
include "../../autoload/autoload.php";
$userobj = new Users();
if (isset($_REQUEST['submit'])) {
    $fullname=$_REQUEST['fname'];
    $username=$_REQUEST['uname'];
    $filename=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $folder="../../../uploads/profile/".$filename;
    move_uploaded_file($tempname, $folder);
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
    $confirmpassword=$_REQUEST['cnpassword'];

    if ($password!=$confirmpassword) {
        echo "password and confirm password are Not same";
    }
    $check=$_REQUEST['accept'];
    if ($check=="") {
        echo "Please Accept Term and Condition";
    } else {
        $register=$userobj->usersregister($fullname, $username, $email, $confirmpassword, $folder);
        if ($register) {
            // echo "Successfully registered";
            header("location:../../../user_login.php");
        } else {
            echo "Error While registering";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register page</title>

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
                            <h1>Create Account</h1>
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
                                            <input type="text" class="form-control " placeholder="Username" name="fname"
                                                required>
                                        </div>
                                        <div class="form-group ">
                                            <label>Username</label>
                                            <input type="text" class="form-control " placeholder="Username" name="uname"
                                                required>
                                        </div>
                                        <div class="form-group ">
                                            <label>Email Id</label>
                                            <input type="text" class="form-control " name="email"
                                                placeholder="john.doe@domain.com" required>
                                        </div>
                                        <div class="form-group ">
                                            <label>Password</label>
                                            <input type="password" class="form-control " placeholder="Password"
                                                aria-label="Password" name="password" required>
                                        </div>
                                        <div class="form-group ">
                                            <label>Confirm Password</label>
                                            <input type="text" class="form-control " placeholder="Confirm Password"
                                                aria-label="Password" name="cnpassword" required>
                                        </div>
                                        <div class="form-group ">
                                            <label>Upload Picture</label>
                                            <input type="file" class="form-control " name="image" required>
                                        </div>
                                        <div class="form-group checkbox">
                                            <input type="checkbox" name="accept" value="check" id="check1">
                                            <label for="check1">I accept the terms & conditions.</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="../../../user_login.php"
                                                class="btn btn-outline-primary waves-effect waves-primary">Login</a>
                                            <button type="submit" name="submit"
                                                class="btn btn-primary waves-effect waves-primary w-50">Register</button>
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
            </section>
        </div><!-- /.container-fluid -->
        <!-- /.content -->
    </div>
    </div>
</body>

</html>