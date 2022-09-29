<?php

include('../classes/api.php');
$dataobj=new users();
if(isset($_POST['submit']))
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['pass'];
    $check=$dataobj->userlogin($email,$password);
	if($check==404){
		header('location:user_login.php');
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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>user login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="post" action="">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<!-- <input type="text" class="login__input" placeholder="Email" name="email"> -->
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php if(isset($_COOKIE['emailcookie'])) { echo $_COOKIE['emailcookie']; } ?>"  required>

				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<!-- <input type="password" class="login__input" placeholder="Password" name="password"> -->
					<input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php if(isset($_COOKIE['passwordcookie'])) { echo $_COOKIE['passwordcookie']; } ?>"  required>

				</div>
				<div>
				<input type="checkbox" name="remember_me" class="form-check-input" id="exampleCheck1" <?php  if(in_array('emailcookie',$_COOKIE)) echo 'checked';?>>Remember me

				</div>
				<button class="button login__submit" type="submit" name="submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>	
				
			</form>

			<div class="social-login">
				<!-- <h3>log in via</h3> -->
				<a href="../AdminLTE-3.2.0/pages/examples/forgot-password.php" class="text-primary btn-link">Forgot password?</a>
				<a href="../AdminLTE-3.2.0/pages/forms/register.php" class=" btn-outline-primary waves-effect waves-primary w-100 btn-md">Create an account</a>


				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>
</html>
