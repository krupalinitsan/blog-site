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

    // handling edit operations
    private function handleEditOperations( $table, $redirectPage, $message)
    {
        if (isset($_GET['type']) && $_GET['type'] != '') {
            $operationType = $_GET['type'];
            if ($operationType == 'status') {
                $operation = $_GET['operation'];
                $id = $_GET['id'];
                $status = ($operation == 'active') ? '1' : '0';
                $this->commonModel->updateStatus($id, $status, $table);
            }

            if ($operationType == 'delete') {
                $id = $_GET['id'];
                $data = $this->commonModel->deleteRecord($id, $table);
                if ($data) {
                    $_SESSION['message'] = $message;
                }
            }

            header("Location: $redirectPage");
            exit();
        }

        $record = $this->adminModel;
        $result = $this->commonModel->collectData($table);
        include_once "Views/admin/$redirectPage.php";
    }

    public function editBlog()
    {
        $this->handleEditOperations('blog', 'manage_blog', "Blog deleted successfully!");
    }

    public function editCategory()
    {
        $this->handleEditOperations('categories', 'manage_category', "Blog category deleted successfully!");
    }
}
