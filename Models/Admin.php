<?php
require_once 'Models/Common.php';
class Admin extends Common
{
    public function getAuthor($id)
    {
        $sql = "SELECT * FROM users WHERE id=$id";
        return $this->connection->query($sql)->fetch_assoc();
    }

}