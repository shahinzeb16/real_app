<?php
include 'database.php';
class users extends DB
{
  public function adminlogin($email,$password)
   {
      $sql="SELECT * FROM admin_login WHERE email='".$email."' AND password='".$password."'AND access=1";
      $data=mysqli_query($this->conn,$sql);
      $result=mysqli_fetch_assoc($data);
      //$status=$result['access'];
      $res=mysqli_num_rows($data);
      if($res == 1)
      {
         // echo "login success";
      	$_SESSION['id']=$result['admin_id'];
         header("location:elements.php");
      }
      else
      {
         return 404;
         $_SESSION['id']="";

      }
   }

   public function addproduct( $product_array)
   {
      $sqlstr=implode("','",$product_array);
      $insert_query = "INSERT INTO product(product_title, product_price, product_description,product_category, product_quantity, product_image, product_size, product_color, product_discount,product_status)
      VALUES ('$sqlstr')";

      $data = mysqli_query($this->conn,$insert_query);
      if($data){
         return 200;
         // header('location:elements.php');

      }else{
         return 404;
      }
   }

   public function deleteproduct($product_id){
      $sql = "DELETE FROM product WHERE product_id='$product_id'";
      $data = mysqli_query($this->conn, $sql);
      if($data){
         return 200;

      }
     else{
      return 404;
     }
   }

   public function updateproduct($product_title, $product_price, $product_description, $product_category , $product_quantity, $product_image, $product_size, $product_color, $product_discount, $product_status, $product_id)
   {

      $update_query = "UPDATE product SET product_title='$product_title',product_price = '$product_price',product_description = '$product_description',product_category = '$product_category',
        product_quantity = '$product_quantity',product_image = '$product_image',product_size='$product_size',product_color = '$product_color',
        product_discount='$product_discount',product_status='$product_status', WHERE product_id='$product_id' ";
      $data = mysqli_query($this->conn, $update_query);
      if($data){
         return 200;

      }else{
         return 404;
      }
   }

   public function productDisplay()
   {
      $sql="SELECT * FROM product";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }
}



class category extends DB{
   public function addcategory( $name,$parent_id,$status)
   {
      $insert_query = "INSERT INTO categories(name,parent_id,status) VALUES ('$name','$parent_id','$status')";
      $data = mysqli_query($this->conn,$insert_query);
      if($data){
         return 200;

      }else{
         return 404;
      }
   }

   public function parentcategory(){
      $sql = "SELECT * FROM categories WHERE parent_id=0";
      $data = mysqli_query($this->conn,$sql);
      $count = mysqli_num_rows($data);
      if($count>0){
         return $data;
      }

   }

   public function categoryDisplay()
   {
      $sql="SELECT * FROM categories";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }

   public function categoryfetch($id)
   {
      $sql="SELECT * FROM categories WHERE id = '$id'";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }

   public function updatecategory($name,$status,$id)
   {

      $update_query = "UPDATE categories SET name='$name', status='$status' WHERE id=$id";
      $data = mysqli_query($this->conn, $update_query);
      if($data){
         return 200;

      }else{
         return 404;
      }
   }

   public function deletecategory($id){
      $sql = "DELETE FROM categories WHERE id='$id'";
      $data = mysqli_query($this->conn, $sql);
      if($data){
         return 200;

      }
     else{
      return 404;
     }
   }

   public function subcatdisplay($category)
   {
       $sql="SELECT * FROM categories WHERE parent_id='".$category."'";
       $data=mysqli_query($this->conn,$sql);
       return $data;
   }
}



?>
