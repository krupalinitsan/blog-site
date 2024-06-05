<?php
require_once 'Models/Category.php';

class CategoryController
{
    private $categoryModel;
    public function __construct($connection)
    {
        $this->categoryModel = new Category($connection);
    }

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

    public function getActiveCategories()
    {
        $result = $this->categoryModel;
        include_once 'Views/userpage.php';
    }
}