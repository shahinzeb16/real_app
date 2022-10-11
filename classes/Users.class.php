<?php
include_once 'Database.php';

class Users extends Database
{
   public function userlogin($email, $password)
   {
      $sql = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $password . "'AND access=1";
      $data = mysqli_query($this->conn, $sql);
      $result = mysqli_fetch_assoc($data);
      $role = $result['role'];
      $res = mysqli_num_rows($data);
      if ($res == 1) {
         if ($role == 1) {
            // echo "login success";
            $_SESSION['admin'] = $result['admin_id'];
            header("location:../admin/pages/tables/product.php");
         } else {
            // echo "login success";
            $_SESSION['user'] = $result['admin_id'];
            header("location:index.php");
         }
      } else {
         return 404;
         $_SESSION['id'] = "";
      }
   }


}
