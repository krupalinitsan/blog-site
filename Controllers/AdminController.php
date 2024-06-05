<?php
require_once 'Models/Admin.php';

class AdminController
{
    private $adminModel;
    private $commonModel;
    public function __construct($connection)
    {
        $this->adminModel = new Admin($connection);
        $this->commonModel = new Common($connection);
    }

    public function editBlog()
    {
        if (isset($_GET['type']) && $_GET['type'] != '') {
            $type = $_GET['type'];
            if ($type == 'status') {
                $operation = $_GET['operation'];
                $id = $_GET['id'];
                if ($operation == 'active') {
                    $status = '1';
                } else {
                    $status = '0';
                }
                $this->commonModel->updateStatus($id, $status, 'blog');
            }

            if ($type == 'delete') {
                $id = $_GET['id'];
                $data = $this->commonModel->deleteRecord($id, 'blog');
                if ($data) {
                    $_SESSION['message'] = "Blog deleted successfully!";
                }
            }

            header("Location: manage_blog"); // Redirect to the users page
            exit();

        }
        $record = $this->adminModel;
        $result = $this->commonModel->collectData('blog');
        include_once 'Views/admin/manage_blog.php';
    }
    public function editCategory()
    {
        if (isset($_GET['type']) && $_GET['type'] != '') {
            $type = $_GET['type'];
            if ($type == 'status') {
                $operation = $_GET['operation'];
                $id = $_GET['id'];
                if ($operation == 'active') {
                    $status = '1';
                } else {
                    $status = '0';
                }
                $this->commonModel->updateStatus($id, $status, 'categories');
            }

            if ($type == 'delete') {
                $id = $_GET['id'];
                $data = $this->commonModel->deleteRecord($id, 'categories');
                if ($data) {
                    $_SESSION['message'] = " Blog category deleted successfully!";
                }
            }

            header("Location: manage_category"); // Redirect to the users page
            exit();

        }
        $record = $this->adminModel;
        $result = $this->commonModel->collectData('categories');
        include_once 'Views/admin/manage_category.php';
    }
}



