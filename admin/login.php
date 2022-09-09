<?php
include('../classes/api.php'); 
$dataobj=new users();
if(isset($_POST['submit']))
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
    $dataobj->adminlogin($email,$password);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <h2>Login Page</h2><br>
    <div class="login">
        <form method="post" action="">

            <label><b>Email Id </b> </label><br>
            <input type="text" name="email" id="Uname" placeholder="Email"><br><br>
            <label><b>Password </b> </label>
            <input type="password" name="password" id="Pass" placeholder="Password"><br><br>
            <button type="submit" name="submit" id="log">Login</button> <br><br>
            <input type="checkbox" id="check" name="remember">
            <span>Remember me</span>
            <br><br>
            <a href="passwordchange.php">ForgotPassword</a>
        </form>
    </div>
</body>

</html>