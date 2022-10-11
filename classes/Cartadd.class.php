<?php
session_start();
include_once 'Database.php';
class Cartadd extends Database
{
   public function addtocart($product_id, $id, $quantity)
   {
      $sql = "SELECT * FROM cart WHERE product_id='$product_id' AND user_id='$id'";
      $data = mysqli_query($this->conn, $sql);
      $result = mysqli_fetch_object($data);
      $res = mysqli_num_rows($data);

      if ($result) {
         $cart_id = $result->cart_id;
         $sql = "UPDATE `cart` SET `quantity`= quantity + 1 WHERE cart_id='$cart_id'";
         $data = mysqli_query($this->conn, $sql);
         if ($data) {
            echo "item already added to cart";
         } else {
            return false;
         }
      } else {
         $sql = "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`) VALUES ('$id','$product_id','$quantity')";
         $data = mysqli_query($this->conn, $sql);
         return $data;
      }
   }

   public function countcart()
   {
      $id = $_SESSION['user'];
      //echo $id;
      $sql = "SELECT count(*) FROM cart WHERE user_id='$id'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }


   public function get_cart_product($id)
   {
      $sql = "SELECT * FROM cart  WHERE user_id='$id'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }

   public function productdisplay($product_id)
   {
      $sql = "SELECT * FROM product WHERE product_id='$product_id'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }

   public function deletecartproduct($id)
   {
      $sql = "DELETE FROM cart WHERE cart_id='$id'";
      $data = mysqli_query($this->conn, $sql);
      if ($data) {
         return 200;
      } else {
         return 404;
      }
   }

   public function updatecart($product_id,$id,$quantity)
   {
      $sql="UPDATE cart SET quantity='$quantity' WHERE user_id='$id' AND product_id='$product_id'";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }
}

?>