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
         header("location:dashboard.php");
      }
      else
      {
         echo "login Fail";
         $_SESSION['id']="";
         
      }
   }

   public function addproduct(Array $product_array)
   {
      $sqlstr=implode("','",$product_array);
      $insert_query = "INSERT INTO product(product_title, product_price, product_description, product_quantity, product_image, product_size, product_color, product_discount)
      VALUES ('$sqlstr')";

      $data = mysqli_query($this->conn,$insert_query);
      if($data){
         return 200;
      }
     else{
      return 404;
     }
   }
}

?>
