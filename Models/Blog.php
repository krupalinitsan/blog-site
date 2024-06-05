<?php
require_once 'Models/Common.php';
class Blog extends Common
{

    public function insertBlog($id, $title, $short_desc, $description, $image, $date,$tags)
    {
        $sql = "INSERT INTO blog (author_id,title, short_desc, description, image, date,tags) VALUES ('$id','$title', '$short_desc', '$description', '$image', '$date','$tags')";
        if ($this->connection->query($sql) === TRUE) {
            return $this->connection->insert_id;
        } else {
            return false;
        }
    }

    public function insertBlogCategory($blog_id, $category_id)
    {
        $sql = "INSERT INTO blog_categories (blog_id, category_id) VALUES ($blog_id, $category_id)";
        return $this->connection->query($sql);
    }

    public function close()
    {
        $this->connection->close();
    }
}

?>