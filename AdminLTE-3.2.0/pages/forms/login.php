<?php
include('../../../classes/api.php');
$dataobj=new users();
if(isset($_POST['submit']))
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['pass'];
  $check=$dataobj->userlogin($email,$password);
	if($check==404){
		header('location:login.php');
	}
	else{
    if($_POST['remember_me']){
      setcookie('emailcookie',$email, time()+86400);
      setcookie('passwordcookie',$password, time()+86400);
    }
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
            <h1>Login Form</h1>
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
              <!-- form start -->
              <form method="post" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php if(isset($_COOKIE['emailcookie'])) { echo $_COOKIE['emailcookie']; } ?>"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php if(isset($_COOKIE['passwordcookie'])) { echo $_COOKIE['passwordcookie']; } ?>"  required>
                  </div>
                  
                  <div class="form-check">
                    <input type="checkbox" name="remember_me" class="form-check-input" id="exampleCheck1" <?php  if(in_array('emailcookie',$_COOKIE)) echo 'checked';?>>
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>
                
                <div>
                  <a href="forgot.html" class="text-primary btn-link"><b>Forgot password?</b></a>
                </div>
                <hr class="mb-4">
                <div>
                <a href="register.html" class="btn btn-outline-primary waves-effect waves-primary w-100 btn-md">Create anaccount</a>
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

</body>
</html>
