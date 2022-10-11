<?php 
include_once 'Database.php';

class Product extends Database
{
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

    public function productdisplay($product_id)
    {
        $sql = "SELECT * FROM product WHERE product_id='$product_id'";
        $data = mysqli_query($this->conn, $sql);
        return $data;
    }

    public function productfetch($product_id)
    {
        $sql = "SELECT * FROM product WHERE product_id='$product_id'";
        $data = mysqli_query($this->conn, $sql);
        return $data;
    }

    public function subcatdisplay($category)
    {
       $sql = "SELECT * FROM categories WHERE parent_id='" . $category . "'";
       $data = mysqli_query($this->conn, $sql);
       return $data;
    }

}
?>