<?php
include 'Database.php';
session_start();
class Users extends Database
{
    public function usersregister($fullname, $username, $email, $confirmpassword, $folder)
    {
        $sql = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`,`image`) VALUES ('$fullname','$username','$email','$confirmpassword','$folder')";
        $data = mysqli_query($this->conn, $sql);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function displayadmin()
    {
        $sql = "SELECT * FROM users";
        $data = mysqli_query($this->conn, $sql);
        return $data;
    }


    public function edituser($id)
    {
        $sql = "SELECT * FROM users where admin_id='" . $id . "'";
        $data = mysqli_query($this->conn, $sql);
        return $data;
    }

    public function usersedit($fullname, $username, $email, $id, $folder, $oldpic, $role, $filename)
    {
        if ($filename == "") {
            $sql = "UPDATE `users` SET `fullname`='$fullname',`username`='$username',`email`='$email',`image`='$oldpic',`role`='$role' WHERE admin_id='" . $id . "'";
            $data = mysqli_query($this->conn, $sql);
            if ($data) {
                return 200;
            } else {
                return 404;
            }
        } else {
            $sql = "UPDATE `users` SET `fullname`='$fullname',`username`='$username',`email`='$email',`image`='$folder',`role`='$role' WHERE admin_id='" . $id . "'";
            $data = mysqli_query($this->conn, $sql);
            if ($data) {
                return 200;
            } else {
                return 404;
            }
        }
    }

    public function userdelete($del_id)
    {
        $sql = "DELETE FROM users WHERE admin_id='" . $del_id . "'";
        $data = mysqli_query($this->conn, $sql);
        return $data;
    }
}
?>