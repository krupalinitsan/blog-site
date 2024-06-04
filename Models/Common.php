<?php

class Common
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function collectData($tablename)
    {
        $sql = "SELECT * FROM $tablename";
        return $this->connection->query($sql);

    }
    public function updateStatus($id, $status, $tableName)
    {
        $sql = "UPDATE $tableName SET status = '$status' WHERE id = '$id'";
        return $this->connection->query($sql);
    }

    public function deleteRecord($id, $tableName)
    {

        $sql = "DELETE FROM " . $tableName . " WHERE id = '$id'";
        return $this->connection->query($sql);
    }

}