<?php
include '../classes/api.php';
$loginobj = new users();
if(isset($_REQUEST['submit']))
{
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$loginobj->userlogin($email,$password);
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
					<input type="text" class="login__input" placeholder="Email" name="email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password" name="password">
				</div>
				<button class="button login__submit" type="submit" name="submit">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				<h3>log in via</h3>
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
