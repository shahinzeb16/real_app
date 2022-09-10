<?php
include('../../classes/api.php'); 
$dataobj=new users();
if(isset($_POST['submit']))
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['pass'];
    $dataobj->adminlogin($email,$password);
    if(isset($_POST['remember_me'])){
								
        setcookie('emailcookie',$email, time()+86400);
        setcookie('passwordcookie',$password, time()+86400);
                
        header('location:elements.php');
    }
    else {
        header('location:elements.php');
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
</head>

<body>
    <!-- ########## START: Login Form ########## -->
    <section class="login-wrapper d-flex align-content-center justify-content-center p-3 flex-wrap">
        <a href="index.html" class="w-100 text-center mb-3 mb-lg-5"><img src="assets/image/logo.png"
                alt="MS Admin Panel" width="150" /></a>
        <div class="login-form bg-white p-3 p-lg-5 rounded">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-lg-flex pr-lg-2">
                    <img src="assets/image/login-mockup.svg" alt="">
                </div>
                <div class="col-12 col-lg-6 pl-lg-2">
                    <div class="pagetitle mb-4">
                        <h2>Component</h2>
                    </div>
                    <form method="post" action>
                        <div class="form-group mb-4">
                            <label>Email Id</label>
                            <input type="text" name="email" class="form-control border-light input-h-42"
                                placeholder="john.doe@domain.com" value="<?php if(isset($_COOKIE['emailcookie'])) { echo $_COOKIE['emailcookie']; } ?>"  required>
                        </div>
                        <div class="form-group mb-4">
                            <label>Password</label>
                            <div class="input-group border border-light">
                                <input  id="password-field" type="password" name="pass" class="form-control input-h-42"
                                    placeholder="Password" aria-label="Password" value="<?php if(isset($_COOKIE['passwordcookie'])) { echo $_COOKIE['passwordcookie']; } ?>"  required>
                                <div class="input-group-prepend">
                                    <span toggle="#password-field" class="input-group-text la la-eye" id="Password"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                        <input type="checkbox" name="remember_me" <?php if(isset($_COOKIE['emailcookie'])) {?> checked <?php } ?> >Remember Me<br><br>

                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="forgot.html" class="text-primary btn-link">Forgot password?</a>
                            <button type="submit" name="submit"
                                class="btn btn-primary waves-effect waves-primary btn-md w-50">Login</button>
                        </div>
                        <hr class="mb-4">
                        <a href="register.html"
                            class="btn btn-outline-primary waves-effect waves-primary w-100 btn-md">Create an
                            account</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ########## END: Login Form ########## -->
</body>

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