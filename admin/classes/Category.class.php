<?php
include 'Database.php';

class Category extends Database{
    public function addcategory( $name,$parent_id,$status) //addcategory
    {
        $insert_query = "INSERT INTO categories(name,parent_id,status) VALUES ('$name','$parent_id','$status')";
        $data = mysqli_query($this->conn,$insert_query);
        if($data){
            return 200;    
        }else{
            return 404;
        }
    }
    
    public function parentcategory() //addcategory
    {
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
    
    public function sub_cat_fetch($cat_id)
    {
        $sql="SELECT * FROM categories WHERE parent_id='".$cat_id."'";
        $data=mysqli_query($this->conn,$sql);
        return $data;
    }
    
}

?>