<?php
error_reporting(0);
include '../classes/api.php';
$userobj=new users();
if(isset($_REQUEST['submit']))
{
	$fullname=$_REQUEST['fname'];
	$username=$_REQUEST['uname'];
    $filename=$_FILES['image']['name'];
    $tempname=$_FILES['image']['tmp_name'];
    $folder="upload/profile/".$filename;
    move_uploaded_file($tempname, $folder);
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$confirmpassword=$_REQUEST['cnpassword'];

	if($password!=$confirmpassword)
	{
		echo "password and confirm password are Not same";
	}
	$check=$_REQUEST['accept'];
	if($check=="")
	{
		echo "Please Accept Term and Condition";
	}
	else
	{
		$register=$userobj->usersregister($fullname,$username,$email,$confirmpassword,$folder);
		if($register)
		{
			// echo "Successfully registered";
            header("location:login.php");
		}
		else
		{
			echo "Error While registering";
		}
	}

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

    <title>MS Login Panel</title>
    <link rel="shortcut icon" type="image/png" href="#">

    <!-- Core Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Core Css -->
    
</head>

<body>
    <!-- ########## START: Login Form ########## -->
    <section class="login-wrapper d-flex align-content-center justify-content-center p-3 flex-wrap">
        <a href="index.html" class="w-100 text-center mb-3 mb-lg-3"><img src="assets/image/logo.png" alt="MS Admin Panel" width="150" /></a>
        <div class="login-form bg-white p-3 p-lg-5 rounded">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-lg-flex pr-lg-2">
                    
                    <img src="assets/image/login-mockup.svg" alt="" width="400">

                </div>
                <div class="col-12 col-lg-6 pl-lg-2">
                    <div class="pagetitle mb-4">
                        <h2>Create Account</h2>
                        <span>Fill the below form to create a new account.</span>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                    	<div class="form-group mb-4">
                            <label>Fullname</label>
                            <input type="text" class="form-control border-light input-h-42" placeholder="Username" name="fname" required>
                        </div>
                        <div class="form-group mb-4">
                            <label>Username</label>
                            <input type="text" class="form-control border-light input-h-42" placeholder="Username" name="uname" required>
                        </div>
                        <div class="form-group mb-4">
                            <label>Email Id</label>
                            <input type="text" class="form-control border-light input-h-42" name="email" placeholder="john.doe@domain.com" required>
                        </div>
                        <div class="form-group mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control border-light input-h-42" placeholder="Password" aria-label="Password" name="password" required>
                        </div>
                        <div class="form-group mb-4">
                            <label>Confirm Password</label>
                            <input type="text" class="form-control border-light input-h-42" placeholder="Confirm Password" aria-label="Password" name="cnpassword" required>
                        </div>
                        <div class="form-group mb-4">
                            <label>Upload Picture</label>
                            <input type="file" class="form-control border-light input-h-42" name="image"  required>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" name="accept" value="check" id="check1">
                            <label for="check1">I accept the terms & conditions.</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="login.php" class="btn btn-outline-primary waves-effect waves-primary">Login</a>
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-primary w-50">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ########## END: Login Form ########## -->

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

</body>
</html>