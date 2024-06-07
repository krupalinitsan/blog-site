<?php
require_once 'Models/Blog.php';
class BlogController
{

    private $blogModel;
    private $commonModel;
    public function __construct($connection)
    {
        $this->blogModel = new Blog($connection);
        $this->commonModel = new Common($connection);

    }

    // method for adding blog 
    public function addBlog()
    {
        $error = '';
        if (isset($_POST['addblog'])) {
            $title = $_POST['title'];
            $short_desc = $_POST['short_desc'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $date = $_POST['date'];
            $id = $_SESSION['ID'];
            $tagsArray = array_map('trim', explode(',', $_POST['tags']));
            $tagsString = implode(',', $tagsArray);
            // Handle file upload
            $target_dir = "public/uploads/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array($imageFileType, $allowed_types)) {
                $error = "Only JPG, JPEG, PNG & GIF files are allowed.";
                include 'Views/add_blog.php';
                return;
            }

            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $image = $target_file;
            } else {
                $error = "Sorry, there was an error uploading your file.";
                include 'Views/add_blog.php';
                return;
            }

            // Insert blog into `blog` table
            $blog_id = $this->blogModel->insertBlog($id, $title, $short_desc, $description, $image, $date, $tagsString);
            if ($blog_id) {
                // Insert into `blog_categories` table
                if ($this->blogModel->insertBlogCategory($blog_id, $category)) {

                    ?>
                    <script>
                        alert("blog added successfully!");
                        window.location.replace("userpage");
                    </script>

                    <?php
                    echo "Blog added successfully!";
                } else {
                    $error = "Error: Could not insert blog category.";
                    include 'Views/add_blog.php';
                    return;
                }
            } else {
                $error = "Error: Could not insert blog.";
                include 'Views/add_blog.php';
                return;
            }
        }

        $category = $this->commonModel;
        include_once 'Views/add_blog.php';
    }


    // read more implementation 
    public function viewBlogDetails()
    {
        if (isset($_GET['id'])) {
            $blogId = (int) $_GET['id'];

            $result = $this->commonModel->getTable($blogId, 'blog');
            // $result = $this->blogModel->getBlogDescription($blogId);

            if ($result->num_rows > 0) {
                $blog = $result->fetch_assoc();
                include 'Views/blog_details.php';
            }
        }
    }
}