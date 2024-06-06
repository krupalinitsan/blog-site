<?php
require_once 'Models/Category.php';

class CategoryController
{
    private $categoryModel;
    public function __construct($connection)
    {
        $this->categoryModel = new Category($connection);
    }

    // add new blog category 
    public function addCategory()
    {
        $error = '';
        if (isset($_POST['addcategory'])) {
            $title = $_POST['title'];
            $category = $_POST['description'];
            $data = $this->categoryModel->addCategory($title, $category);
            if ($data) {
                ?>
                <script>
                    alert("New Blog Category Added Succesfully !");
                    window.location.replace("userpage");
                </script>

                <?php
            } else {
                $error = "Please Enter Correct Details";
            }
        }
        include_once 'Views/add_category.php';
    }

    // fetch catogories for front page 
    public function showCategories()
    {
        return $this->categoryModel->getActiveCategories();
    }
    // fetch blog taht have selected category
    public function filterBlogsByCategory($categoryId)
    {
        return $this->categoryModel->getBlogsByCategory($categoryId);
    }
    // get Auther name 
    public function getAuthor($id)
    {
        return $this->categoryModel->getUser($id);
    }
    //get latest 5 blocks by date 
    public function getLatestBlogs()
    {
        return $this->categoryModel->getLatestBlogs();
    }
    // get blog by search data 
    public function filterBlogsBySearch($search)
    {
        return $this->categoryModel->getSerachData($search);
    }

}