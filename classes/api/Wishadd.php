<?php

class Wishadd extends Database
{
   public function wishlistadd($product_id, $id)
   {
      $sql = "SELECT * FROM wishlist WHERE product_id='$product_id' AND user_id='$id'";
      $data = mysqli_query($this->conn, $sql);
      $result = mysqli_fetch_assoc($data);
      if ($result) {
         echo "item already added to wishlist";
      } else {
         $sql = "INSERT INTO `wishlist`(`user_id`, `product_id`) VALUES ('$id','$product_id')";
         $data = mysqli_query($this->conn, $sql);
         return $data;
      }
   }

   public function countwish()
   {
      $id = $_SESSION['user'];
      //echo $id;
      $sql = "SELECT count(*) FROM wishlist WHERE user_id='$id'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }


}

?>