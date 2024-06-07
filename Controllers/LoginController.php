<?php

require_once 'Models/User.php';

class LoginController
{
    private $userModel;

    public function __construct($connection)
    {
        $this->userModel = new User($connection);
    }
    // register user method
    public function register()
    {
        $error = '';
        if (isset($_POST["regist"])) {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            if ($this->userModel->registerUser($fname, $lname, $email, $password)) {
                echo '<script>alert("Registration successful. You can now login."); 
                window.location.replace("login");</script>';
                exit();
            } else {
                $error = "please enter another email. it is already exists.";
            }
        }
        include_once 'Views/register.php';
    }
    //handle login method
    public function login()
    {
        $error = '';
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->loginUser($email, $password);

            if ($user) {
                session_start();
                $_SESSION['ID'] = $user['id'];
                $_SESSION['IS_LOGIN'] = 'yes';
                // defiened admin
                if ($user['email'] == "divya@nitsantech.com" && $user['password'] == "905be71dbaa36d071ea83d9a5d2a8c80") {
                    header("Location: dashboard");
                    exit();
                } else {
                    header("Location: userpage");
                    exit();
                }

            } else {
                $error = 'Please enter correct login details.';
            }
        }
        include_once ("Views/login.php");
    }

}