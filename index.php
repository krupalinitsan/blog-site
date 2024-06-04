<?php
// index.php

require 'config/config.php';
require 'Controllers/LoginController.php';
require 'Controllers/BlogController.php';
require 'Controllers/AdminController.php';

session_start();
$id = $_SESSION['ID'] ?? null;

if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];

    match ($path) {
        //login case
        '/', '/login' => (new LoginController($connection))->login(),
        '/register' => (new LoginController($connection))->register(),
        '/userpage' => include ("Views/userpage.php"),
        // '/resetpassword' => (new LoginController($connection))->resetPassword(),
        '/dashboard' => include_once 'Views/admin/dashboard.php',
        // '/logout' => include_once 'Views/logout.php',
        // // routes for project crud operation
        // '/project' => (new ProjectController($connection))->handleRequest(),
        // '/add_blog' => (new ProjectController($connection))->addProject(),
        '/add_blog' => (new BlogController($connection))->addBlog(),
        '/manage_blog' => (new AdminController($connection))->editBlog(),
        // //routes for user crud operations
        // '/users' => (new UserController($connection))->handleUserRequest(),
        // '/add_user' => (new UserController($connection))->addUser(),
        // '/manage_user' => isset($_GET['id']) ? (new UserController($connection))->editUser($_GET['id']) : print "User ID is required.",
        // //routes for User dashboard activity
        // '/usertask' => (new TaskController($connection))->updateStatus(),
        // '/usercalander' => (new TaskController($connection))->calanderTask(),
        // //routes for task crud operation
        // '/task' => (new TaskController($connection))->handleTaskRequest(),
        // '/manage_task' => isset($_GET['id']) ? (new TaskController($connection))->editTask($_GET['id']) : null,
        // '/add_task' => (new TaskController($connection))->addTask(),
        // //route for profile o my Account
        //  '/profile' => (new ProfileController($connection))->handleProfile($id),
        '/profile' => include_once ("Views/profile.php"),
    // //routes for team crud operation
    // '/team' => (new TeamController($connection))->handleTeamRequest(),
    // '/manage_team' => isset($_GET['id']) ? (new TeamController($connection))->manageTeam() : null,
    // '/add_team' => (new TeamController($connection))->addTeam(),
    // '/admin_dashboard' => (new ProjectController($connection))->fetchProject(),

    };
}
?>