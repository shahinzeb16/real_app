<?php
include 'database.php';

class product extends DB
{
   public function addproduct($product_array)
   {
      $sqlstr = implode("','", $product_array);
      $insert_query = "INSERT INTO product(product_title, product_price, product_description,product_category, product_quantity, product_image, product_size, product_color, product_discount,product_status)
          VALUES ('$sqlstr')";

      $data = mysqli_query($this->conn, $insert_query);
      if ($data) {
         return 200;
      } else {
         return 404;
      }
   }

   public function deleteproduct($product_id)
   {
      $sql = "DELETE FROM product WHERE product_id='$product_id'";
      $data = mysqli_query($this->conn, $sql);
      if ($data) {
         return 200;
      } else {
         return 404;
      }
   }

   public function updateproduct($filename, $old_image, $product_title, $product_price, $product_description, $product_category, $product_quantity, $product_image, $product_size, $product_color, $product_discount, $product_status, $product_id)
   {
      if ($filename == "") {
         $update_query = "UPDATE product SET product_title='$product_title',product_price = '$product_price',product_description = '$product_description',product_category = '$product_category',
          product_quantity = '$product_quantity',product_image = '$old_image',product_size='$product_size',product_color = '$product_color',
          product_discount='$product_discount',product_status='$product_status' WHERE product_id='$product_id' ";
         $data = mysqli_query($this->conn, $update_query);
         if ($data) {
            return 200;
         } else {
            return 404;
         }
      } else {
         $update_query = "UPDATE product SET product_title='$product_title',product_price = '$product_price',product_description = '$product_description',product_category = '$product_category',
          product_quantity = '$product_quantity',product_image = '$product_image',product_size='$product_size',product_color = '$product_color',
          product_discount='$product_discount',product_status='$product_status' WHERE product_id='$product_id' ";
         $data = mysqli_query($this->conn, $update_query);
         if ($data) {
            return 200;
         } else {
            return 404;
         }
      }
   }

   public function productDisplay()
   {
      $sql = "SELECT * FROM product";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }

   public function productfetch($product_id)
   {
      $sql = "SELECT * FROM product WHERE product_id='$product_id'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }

   public function parentcategory()
   {
      $sql = "SELECT * FROM categories WHERE parent_id=0";
      $data = mysqli_query($this->conn, $sql);
      $count = mysqli_num_rows($data);
      if ($count > 0) {
         return $data;
      }
   }

   function sub_cat_fetch($cat_id)
   {
      $sql = "SELECT * FROM categories WHERE parent_id='" . $cat_id . "'";
      $data = mysqli_query($this->conn, $sql);
      return $data;
   }
}
