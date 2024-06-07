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
    public function getActiveCategories()
    {
        $sql = "SELECT * FROM categories WHERE status = 1";
        $result = $this->connection->query($sql);
        return $result;
    }
    // blogs by categories
    public function getBlogsByCategory($categoryId)
    {
        $sql = "SELECT b.id, b.author_id, b.title, b.short_desc, b.description, b.image, b.date, b.status, b.tags, bc.category_id 
        FROM blog b INNER JOIN blog_categories bc ON b.id = bc.blog_id WHERE bc.category_id = $categoryId AND b.status = 1";
        $result = $this->connection->query($sql);
        return $result;
    }
    //get user
    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = $this->connection->query($sql);
        return $result;

    }
    //latest blog by date
    public function getLatestBlogs($limit = 5)
    {
        $sql = "SELECT b.id, b.author_id, b.title, b.short_desc, b.description, b.image, b.date, b.status, b.tags 
                  FROM blog b 
                  WHERE b.status = 1 
                  ORDER BY b.date DESC
                  LIMIT $limit";
        $result = $this->connection->query($sql);
        return $result;
    }
    // search data
    public function getSerachData($search)
    {
        // $sql = "SELECT * FROM blog WHERE title LIKE '%$search%' OR tags LIKE '%$search%'LIMIT 0, 25";
        $sql = "SELECT blog.* ,users.firstname FROM blog JOIN users ON blog.author_id = users.id  WHERE title LIKE '%$search%' OR tags LIKE '%$search%' OR firstname LIKE '%$search%' LIMIT 0, 25  ";
        return $this->connection->query($sql);
    }

}
