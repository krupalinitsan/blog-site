<?php

require_once 'Models/Common.php';
class Profile extends Common
{
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users  WHERE id = $id";
        return $this->connection->query($sql)->fetch_assoc();
    }
    public function updateUser($id, $fname, $lname, $email, $password, $image = null)
    {
        // Base SQL update statement
        $sql = "UPDATE users SET firstname='$fname', lastname='$lname', email='$email', password='$password'";
        
        // Append image update if provided
        if ($image !== null) {
            $sql .= ", image='$image'";
        }
        $sql .= " WHERE id='$id'";
        return $this->connection->query($sql);
    }
    
}