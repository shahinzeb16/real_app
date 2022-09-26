<?php
error_reporting(0);
include '../../../classes/api.php';
$passobj=new users();
if(isset($_REQUEST['uid']))
{
    $id=$_REQUEST['uid'];
}

if(isset($_REQUEST['submit']))
{

	$oldp=$_REQUEST['oldp'];
	$newp=$_REQUEST['newp'];
	$confirmp=$_REQUEST['confirmp'];
    //echo $oldp,$newp,$confirmp;
   $passobj->passwordchange($oldp,$newp,$confirmp,$id);

}	

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Passwordchange  page</title>

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
            <h1>Password Change</h1>
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
                            <label>Old Password</label>
                            <input type="text" class="form-control " placeholder="Old Password" name="oldp">
                        </div>
                        <div class="form-group ">
                            <label>New Password</label>
                            <input type="text" class="form-control " placeholder="New Password" name="newp">
                        </div>
                        <div class="form-group ">
                            <label>Confirm Password</label>
                            <input type="text" class="form-control " name="confirmp" placeholder="Confirm Password">
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <a href="../../../user_visit/user_login.php" class="btn btn-outline-primary waves-effect waves-primary">Login</a>
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-primary w-50">Change Password</button>
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
</body>
</html>
