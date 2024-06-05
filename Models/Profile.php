<?php

require_once 'Models/Common.php';
class Profile extends Common
{
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users  WHERE id = $id";
        return $this->connection->query($sql)->fetch_assoc();
    }

    public function updateUser($id, $fname, $lname, $email, $password, $image)
    {
        $sql = "UPDATE users SET firstname= '$fname' ,lastname='$lname',email='$email' , password= '$password' , image= '$image' WHERE id='$id'";
        return $this->connection->query($sql);
    }
}