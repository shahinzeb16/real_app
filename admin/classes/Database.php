<?php

class Database
{   
   protected $servername = "localhost";
   protected $username = "root";
   protected $password = "";
   protected $db = "realapp";

   protected $conn;

   public function __construct()
   {
      $this->conn= mysqli_connect($this->servername,$this->username,$this->password,$this->db);
        
      if($this->conn->connect_error)
      {
         die("Connection Failed");
      }
      else
      {
         // echo "Connection Successfully";
         //session_start();
      }
   }
}
?>