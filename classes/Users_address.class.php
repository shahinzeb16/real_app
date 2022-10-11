<?php
include_once 'Database.php';

class users_address extends Database
{
   public function add_address($user_id, $address, $pincode, $state, $city, $landmark)
   {
      $insert_query = "INSERT INTO user_address(user_id,address,pincode,state,city,landmark) VALUES ('$user_id','$address','$pincode','$state','$city','$landmark')";
      $data = mysqli_query($this->conn, $insert_query);
      return $data;
   }

   public function get_user_address($user_id)
   {
      $sql = "SELECT * FROM user_address WHERE user_id='$user_id'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }

}

?>