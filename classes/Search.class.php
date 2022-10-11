<?php
include_once 'Database.php';

class Search extends Database{
    public function search($search){   
       $sql = "SELECT * FROM product WHERE product_title LIKE '%$search%' OR product_description LIKE '%$search%'";   
       $data=mysqli_query($this->conn,$sql);   
       return $data;  
    }
 }
?>