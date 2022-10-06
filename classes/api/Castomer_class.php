<?php

include 'database.php';

class castomer extends DB
{
    public function prx($arr)
    {
        echo '<pre>';
        print_r($arr);
        die();
    }

    public function get_product($category_id = "")
    {
        $condition = "";
        if ($category_id != "") {
            $condition = " WHERE product_category = $category_id ";
        }
        $sql = "SELECT * FROM product" . $condition;
        $res = mysqli_query($this->conn, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }


    public function get_category()
    {
        $sql = "SELECT * FROM categories WHERE parent_id=0";
        $res = mysqli_query($this->conn, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data[] = $row;
        }
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

    public function add_order($order_id, $transaction_id, $user_id, $product_id, $total_price, $product_quantity)
    {
 
       $insert_query = "INSERT INTO orders(order_id,transaction_id,user_id,product_id,total_price,product_quantity) VALUES ('$order_id','$transaction_id','$user_id','$product_id','$total_price','$product_quantity')";
       $data = mysqli_query($this->conn, $insert_query);
       return $data;
    }

    public function add_address($user_id, $address, $pincode, $state, $city, $landmark)
    {
       $insert_query = "INSERT INTO user_address(user_id,address,pincode,state,city,landmark) VALUES ('$user_id','$address','$pincode','$state','$city','$landmark')";
       $data = mysqli_query($this->conn, $insert_query);
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


}
