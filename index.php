<?php
// index.php

require 'config/config.php';
require 'Controllers/LoginController.php';
require 'Controllers/BlogController.php';
require 'Controllers/AdminController.php';
require 'Controllers/CategoryController.php';
require 'Controllers/ProfileController.php';

session_start();
$id = $_SESSION['ID'] ?? null;

if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];

    match ($path) {
        //login case
        
        '/', '/login' => (new LoginController($connection))->login(),
        '/register' => (new LoginController($connection))->register(),
        '/userpage' => include ("Views/userpage.php"),
        '/dashboard' => include_once 'Views/admin/dashboard.php',
        '/logout' => include_once 'Views/logout.php',
        '/blog_details' => (new BlogController($connection))->viewBlogDetails(),
        '/add_blog' => (new BlogController($connection))->addBlog(),
        '/manage_blog' => (new AdminController($connection))->editBlog(),
        '/manage_category' => (new AdminController($connection))->editCategory(),
        '/add_category' => (new CategoryController($connection))->addCategory(),
        '/profile' => (new ProfileController($connection))->updateProfile(),

    };
}
?>