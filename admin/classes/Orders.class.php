<?php
include "Database.php";
class Orders extends Database{
   public function orderDisplay()
   {
      $sql="SELECT * FROM orders";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   } 
    
   public function add_order($transaction_id,$user_id,$product_id,$total_price,$product_quantity){
      $insert_query="INSERT INTO orders(transaction_id,user_id,product_id,total_price,product_quantity) VALUES ('$transaction_id','$user_id','$product_id','$total_price','$product_quantity')";
      $data=mysqli_query($this->conn,$insert_query);
      return $data;
 
   }
}
 

?>