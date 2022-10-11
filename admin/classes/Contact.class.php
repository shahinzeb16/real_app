<?php
include 'Database.php';

class Contact extends Database
{
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