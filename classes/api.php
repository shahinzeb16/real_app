<?php
include 'database.php';
session_start();

class users extends DB
{

public function userlogin($email,$password)
   {
      $sql="SELECT * FROM users WHERE email='".$email."' AND password='".$password."'AND access=1";
      $data=mysqli_query($this->conn,$sql);
      $result=mysqli_fetch_assoc($data);
      $role=$result['role'];
      $res=mysqli_num_rows($data);
      if($res == 1)
      {  
         if($role == 1)
         {
            // echo "login success";
            $_SESSION['admin']=$result['admin_id'];
            header("location:../AdminLTE-3.2.0/pages/tables/product.php");
         }else{
            // echo "login success";
            $_SESSION['user']=$result['admin_id'];
            header("location:../user_visit/shop.php");

         }
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

public function updateproduct($filename,$old_image,$product_title, $product_price, $product_description, $product_category , $product_quantity, $product_image, $product_size, $product_color, $product_discount, $product_status, $product_id)
   {
   if($filename==""){
      $update_query = "UPDATE product SET product_title='$product_title',product_price = '$product_price',product_description = '$product_description',product_category = '$product_category',
      product_quantity = '$product_quantity',product_image = '$old_image',product_size='$product_size',product_color = '$product_color',
      product_discount='$product_discount',product_status='$product_status' WHERE product_id='$product_id' ";
      $data = mysqli_query($this->conn, $update_query);
   if($data){
      return 200;

   }else{
      return 404;
   }
   }else{
      $update_query = "UPDATE product SET product_title='$product_title',product_price = '$product_price',product_description = '$product_description',product_category = '$product_category',
      product_quantity = '$product_quantity',product_image = '$product_image',product_size='$product_size',product_color = '$product_color',
      product_discount='$product_discount',product_status='$product_status' WHERE product_id='$product_id' ";
      $data = mysqli_query($this->conn, $update_query);
   if($data){
      return 200;

   }else{
      return 404;
   }
   }

   }

 public function productDisplay()
   {
      $sql="SELECT * FROM product";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }

 public function productfetch($product_id)
   {
      $sql="SELECT * FROM product WHERE product_id='$product_id'";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }

 public function usersregister($fullname,$username,$email,$confirmpassword,$folder)
   {
      $sql="INSERT INTO `users`(`fullname`, `username`, `email`, `password`,`image`) VALUES ('$fullname','$username','$email','$confirmpassword','$folder')";
      $data=mysqli_query($this->conn,$sql);
      if($data)
      {
         return true;
      }
      else
      {
         return false;
      }
   }

 public function displayadmin()
   {
      $sql="SELECT * FROM users";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }

   public function edituser($id)
   {
      $sql="SELECT * FROM users where admin_id='".$id."'";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }

   public function usersedit($fullname,$username,$email,$id,$folder,$oldpic,$role,$filename)
   {
      if($filename=="")
      {
         $sql="UPDATE `users` SET `fullname`='$fullname',`username`='$username',`email`='$email',`image`='$oldpic',`role`='$role' WHERE admin_id='".$id."'";
         $data=mysqli_query($this->conn,$sql);
         if($data){
            return 200;
      
         }else{
            return 404;
         }
      }
      else
      {
         $sql="UPDATE `users` SET `fullname`='$fullname',`username`='$username',`email`='$email',`image`='$folder',`role`='$role' WHERE admin_id='".$id."'";
         $data=mysqli_query($this->conn,$sql);
         if($data){
            return 200;
      
         }else{
            return 404;
         }
      }
   }

 public function passwordchange($oldp,$newp,$confirmp,$id)
   {
      $sql1="SELECT * FROM `users` WHERE password='$oldp'";
      $data1=mysqli_query($this->conn,$sql1);
      $res= mysqli_num_rows($data1);
   if ($res==0) 
   {
      echo "Old password and previous password are not same";
   }
   else
   {

   if ($oldp!=$newp) 
   {
      if ($newp==$confirmp) 
      {
         $sql="UPDATE `users` SET `password`='$confirmp' WHERE admin_id='$id'";
         $data=mysqli_query($this->conn,$sql);
         if ($data) 
         {
            echo "Password Updated";
         }
         else
         {
            echo "password not updated";
         }
      }
      else
      {
         echo "New and confirm passwords are not same";
      }
   }
   else
   {
      echo "Old and new passwords are same";
   }
   }
   }

 public function userdelete($del_id)
   {
      $sql="DELETE FROM users WHERE admin_id='".$del_id."'";
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

   public function updatecategory($name,$parent_id,$status,$id)
   {

      $update_query = "UPDATE categories set name='$name', parent_id='$parent_id', status='$status' WHERE id='$id'";
      $data = mysqli_query($this->conn, $update_query);
      if($data){
         return 200;

      }else{
         return 404;
      }
   }

   public function deletecategory($id)
   {
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

function sub_cat_fetch($cat_id)
   {
      $sql="SELECT * FROM categories WHERE parent_id='".$cat_id."'";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }


}


class castomer extends DB{

   public function prx($arr){
      echo '<pre>';
      print_r($arr);
      die();
   }

   public function get_product($category_id=""){
      $condition = "";
      if($category_id!=""){ 
         $condition = " WHERE product_category = $category_id ";
      }
      $sql="SELECT * FROM product".$condition;
      $res=mysqli_query($this->conn,$sql);
      $data=array();
      while($row=mysqli_fetch_assoc($res)){
         $data[]=$row;
      }
      return $data;
   }


   public function get_category(){
      $sql="SELECT * FROM categories WHERE parent_id=0";
      $res=mysqli_query($this->conn,$sql);
      $data=array();
      while($row=mysqli_fetch_assoc($res)){
         $data[]=$row;
      }
      return $data;
   }
}


class cartadd extends DB
{
   public function addtocart($product_id,$id,$quantity)
   {
      $sql="SELECT * FROM cart WHERE product_id='$product_id' AND user_id='$id'";
      $data=mysqli_query($this->conn,$sql);
      $result=mysqli_fetch_object($data);
      $res=mysqli_num_rows($data);
      // $_SESSION['cart'] = $result['cart_id'];
      
      if($result)
      {
         $cart_id=$result->cart_id;
         $sql="UPDATE `cart` SET `quantity`= quantity + 1 WHERE cart_id='$cart_id'";
         $data=mysqli_query($this->conn,$sql);
         if($data)
         {
            echo "item already added to cart";
         }
         else
         {
            return false;
         }
      }
      else
      {
         $sql="INSERT INTO `cart`(`user_id`, `product_id`, `quantity`) VALUES ('$id','$product_id','$quantity')";
         $data=mysqli_query($this->conn,$sql);
         return $data;
      }
   }

   public function wishlistadd($product_id,$id)
   {
      $sql="SELECT * FROM wishlist WHERE product_id='$product_id' AND user_id='$id'";
      $data=mysqli_query($this->conn,$sql);
      $result=mysqli_fetch_assoc($data);
      if($result)
      {
         echo "item already added to wishlist";
      }
      else
      {
         $sql="INSERT INTO `wishlist`(`user_id`, `product_id`) VALUES ('$id','$product_id')";
         $data=mysqli_query($this->conn,$sql);
         return $data;
      }
   }


   public function countcart()
   {
      $id=$_SESSION['user'];
      //echo $id;
      $sql="SELECT count(*) FROM cart WHERE user_id='$id'";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }

   public function countwish()
   {
      $id=$_SESSION['user'];
         //echo $id;
      $sql="SELECT count(*) FROM wishlist WHERE user_id='$id'";
      $data=mysqli_query($this->conn,$sql);
      return $data;      
   }

   public function updatecart($product_id,$id,$quantity)
   {
      $sql="UPDATE cart SET quantity='$quantity' WHERE user_id='$id' AND product_id='$product_id'";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }

   public function get_cart_product($id){
      $sql="SELECT * FROM cart  WHERE user_id='$id'";
      $data=mysqli_query($this->conn,$sql);
      return $data;

   }

   public function productdisplay($product_id)
   {
      $sql="SELECT * FROM product WHERE product_id='$product_id'";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }

   public function deletecartproduct($id)
   {
      $sql = "DELETE FROM cart WHERE cart_id='$id'";
      $data = mysqli_query($this->conn, $sql);
      if($data){
         return 200;

      }
      else{
         return 404;
      }
   }

   public function prx($arr){
      echo '<pre>';
      print_r($arr);
      die();
   }
}


class orders extends DB{
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



class users_address extends DB{
   public function add_address($user_id,$address,$pincode,$state,$city,$landmark){
      $insert_query="INSERT INTO user_address(user_id,address,pincode,state,city,landmark) VALUES ('$user_id','$address','$pincode','$state','$city','$landmark')";
      $data=mysqli_query($this->conn,$insert_query);
      return $data;

   }
}
   
class customers extends DB{
   public function search($search){   
      $sql = "SELECT * FROM product WHERE product_title LIKE '%$search%' OR product_description LIKE '%$search%'";   
      $data=mysqli_query($this->conn,$sql);   
      return $data;  
   }
}
class contact extends DB{
   public function contact_us($name,$email,$phone,$message){
      $sql = "INSERT INTO contact_us(name,email,phone,message) VALUES('$name','$email','$phone','$message')";
      $data = mysqli_query($this->conn,$sql);
      return $data;
   }
   public function contactDisplay()
   {
      $sql="SELECT * FROM contact_us";
      $data=mysqli_query($this->conn,$sql);
      return $data;
   }
}
?>

