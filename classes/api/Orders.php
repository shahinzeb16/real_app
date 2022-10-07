<?php
class Orders extends Database
{
   public function orderDisplay()
   {
      $sql = "SELECT * FROM orders";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }



   public function get_order_product($id)
   {
      $sql = "SELECT * FROM orders  WHERE user_id='$id'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }




   public function add_order($order_id, $transaction_id, $user_id, $product_id, $total_price, $product_quantity)
   {

      $insert_query = "INSERT INTO orders(order_id,transaction_id,user_id,product_id,total_price,product_quantity) VALUES ('$order_id','$transaction_id','$user_id','$product_id','$total_price','$product_quantity')";
      $data = mysqli_query($this->conn, $insert_query);
      return $data;
   }

   public function cancel_order($order_id)
   {
      $sql = "DELETE FROM orders WHERE order_id='$order_id'";
      $data = mysqli_query($this->conn, $sql);
      if ($data) {
         return 200;
      } else {
         return 404;
      }
   }
}
?>