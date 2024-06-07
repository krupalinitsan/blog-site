<?php
require_once 'Models/Common.php';
class Blog extends Common
{

    public function insertBlog($id, $title, $short_desc, $description, $image, $date, $tagsString)
    {
        $btitle = mysqli_real_escape_string($this->connection, $title);
        $bshort_desc = mysqli_real_escape_string($this->connection, $short_desc);
        $bdescription = mysqli_real_escape_string($this->connection, $description);
        $btitle = mysqli_real_escape_string($this->connection, $title);

        $sql = "INSERT INTO blog (author_id,title, short_desc, description, image, date,tags) VALUES ('$id','$btitle', '$bshort_desc', '$bdescription', '$image', '$date','$tagsString')";
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