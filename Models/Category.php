<?php

require_once 'Models/Common.php';

class Category extends Common
{
    public function addCategory($title, $description)
    {
        $ctitle = mysqli_real_escape_string($this->connection, $title);
        $cdescription = mysqli_real_escape_string($this->connection, $description);
        $sql = "INSERT INTO categories (title, description) VALUES ('$ctitle', '$cdescription')";
        return $this->connection->query($sql);
    }
    public function getActiveCategories($id)
    {
        // $sql = "SELECT * FROM categories WHERE status = 1";
        // return $this->connection->query($sql);

        $sql = " SELECT b.id, b.author_id, b.title, b.short_desc, b.description, b.image, b.date, b.status 
        FROM blogs b 
        INNER JOIN blog_categories bc ON b.id = bc.blog_id 
        WHERE bc.category_id = $id AND b.status = 1
    ";
        return $this->connection->query($sql);
    }
}
