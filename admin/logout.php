<?php
session_start();
if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
    setcookie('emailcookie', $email, time()-86400);
    setcookie('passwordcookie', $password, time()-86400);
    header('location:login.php');
}

?>