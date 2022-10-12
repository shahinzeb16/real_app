<?php

include_once 'Database.php';

class Search extends Database
{
   public function search($search)
   {
      $sql = "SELECT * FROM product WHERE product_title LIKE '%$search%' OR product_description LIKE '%$search%'";
      $data = mysqli_query($this->conn, $sql);
      $data1 = array();
      if ($count = mysqli_num_rows($data)) {
         while ($row = mysqli_fetch_assoc($data)) {
            $data1[] = $row;
         }
         return $data1;
      }else{
         
         echo "<div class='alert alert-danger' >There is no product matching your search</div>";
      }
   }
}
