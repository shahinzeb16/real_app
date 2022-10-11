<?php
//include "../../../classes/api.php";
//include "../../classes/Contact.class.php";
include "../../classes/Database.php";
include '../../autoload/autoload.php';
$contact = new contact();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
  $res = $contact->contact_us($name,$email,$phone,$message);
  if($res == 200){
    header('location:../../../index.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Project Add</title>

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
                            <h1>Contact us </h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-body row">
                        <div class="col-5 text-center d-flex align-items-center justify-content-center">
                            <div class="">
                                <h2>Admin<strong>LTE</strong></h2>
                                <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                                    Phone: +1 234 56789012
                                </p>
                            </div>
                        </div>
                        <div class="col-7">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="inputName" class="form-control"
                                        placeholder="Name" />
                                </div>
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="email" name="email" id="inputEmail" class="form-control"
                                        placeholder="Enter  email" />
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone number</label>
                                    <input type="number" name="phone" id="inputPhone" class="form-control"
                                        placeholder="Phone no" />
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="inputMessage" name="message" class="form-control" rows="4"
                                        placeholder="Enter message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Send message">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>