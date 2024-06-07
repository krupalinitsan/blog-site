<?php

require_once 'Models/Profile.php';
class ProfileController
{

    private $profileModel;
    private $commonModel;
    public function __construct($connection)
    {
        $this->profileModel = new Profile($connection);
        $this->commonModel = new Common($connection);
    }

    public function updateProfile()
{
    $error = '';
    $id = $_SESSION['ID'];
    if (isset($_POST['update'])) {
        // Validate and sanitize user input
        $fname = isset($_POST['fname']) ? trim($_POST['fname']) : null;
        $lname = isset($_POST['lname']) ? trim($_POST['lname']) : null;
        $password = isset($_POST['password']) ? trim($_POST['password']) : null;
        $email = isset($_POST['email']) ? trim($_POST['email']) : null;
        $image = null;

        // Handle file upload
        if (!empty($_FILES["img"]["name"])) {
            $target_dir = "public/uploads/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array($imageFileType, $allowed_types)) {
                $error = "Only JPG, JPEG, PNG & GIF files are allowed.";
                include 'Views/profile.php';
                return;
            }

            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $image = $target_file;
            } else {
                $error = "Sorry, there was an error uploading your file.";
                include 'Views/profile.php';
                return;
            }
        }

        // Check if all required fields are provided
        if (!empty($fname) && !empty($lname) && !empty($password) && !empty($email)) {
            $updated = $this->profileModel->updateUser($id, $fname, $lname, $email, $password, $image);

            if ($updated) {
                echo '<script>alert("Profile updated successfully."); 
                window.location.replace("profile");</script>';
                exit();
            } else {
                $msg = "Failed to update profile. Please try again.";
            }
        } else {
            $msg = "Please fill in all fields.";
        }
    }

    // $user=$this->commonModel-> getDataById($id , 'users');
    $user = $this->profileModel->getUserById($id);
    include_once('Views/profile.php');
}

}
?>