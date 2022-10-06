<?php
include 'database.php';
// session_start();

class users extends DB
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
            header("location:../AdminLTE-3.2.0/pages/tables/product.php");
         } else {
            // echo "login success";
            $_SESSION['user'] = $result['admin_id'];
            header("location:../user_visit/shop.php");
         }
      } else {
         return 404;
         $_SESSION['id'] = "";
      }
   }


   public function usersregister($fullname, $username, $email, $confirmpassword, $folder)
   {
      $sql = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`,`image`) VALUES ('$fullname','$username','$email','$confirmpassword','$folder')";
      $data = mysqli_query($this->conn, $sql);
      if ($data) {
         return true;
      } else {
         return false;
      }
   }

   public function displayadmin()
   {
      $sql = "SELECT * FROM users";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }

   public function edituser($id)
   {
      $sql = "SELECT * FROM users where admin_id='" . $id . "'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }

   public function usersedit($fullname, $username, $email, $id, $folder, $oldpic, $role, $filename)
   {
      if ($filename == "") {
         $sql = "UPDATE `users` SET `fullname`='$fullname',`username`='$username',`email`='$email',`image`='$oldpic',`role`='$role' WHERE admin_id='" . $id . "'";
         $data = mysqli_query($this->conn, $sql);
         if ($data) {
            return 200;
         } else {
            return 404;
         }
      } else {
         $sql = "UPDATE `users` SET `fullname`='$fullname',`username`='$username',`email`='$email',`image`='$folder',`role`='$role' WHERE admin_id='" . $id . "'";
         $data = mysqli_query($this->conn, $sql);
         if ($data) {
            return 200;
         } else {
            return 404;
         }
      }
   }

   public function passwordchange($oldp, $newp, $confirmp, $id)
   {
      $sql1 = "SELECT * FROM `users` WHERE password='$oldp'";
      $data1 = mysqli_query($this->conn, $sql1);
      $res = mysqli_num_rows($data1);
      if ($res == 0) {
         echo "Old password and previous password are not same";
      } else {
         if ($oldp != $newp) {
            if ($newp == $confirmp) {
               $sql = "UPDATE `users` SET `password`='$confirmp' WHERE admin_id='$id'";
               $data = mysqli_query($this->conn, $sql);
               if ($data) {
                  echo "Password Updated";
               } else {
                  echo "password not updated";
               }
            } else {
               echo "New and confirm passwords are not same";
            }
         } else {
            echo "Old and new passwords are same";
         }
      }
   }

   public function userdelete($del_id)
   {
      $sql = "DELETE FROM users WHERE admin_id='" . $del_id . "'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }
}
