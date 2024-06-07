<?php

require_once 'Models/Common.php';
class User extends Common
{

    public function registerUser($fname, $lname, $email, $password)
    {
        $pass = md5($password);
        $sql = "INSERT INTO users (firstname, lastname, email, password ) VALUES ('$fname','$lname','$email','$pass')";
        return $this->connection->query($sql);
    }
    // method for user login
    public function loginUser($email, $password)
    {
        $pass = trim(md5($password));

        $sql = "SELECT * FROM `users` WHERE email='$email' AND password='$pass'";
        return $this->connection->query($sql)->fetch_assoc();
    }
}
?>