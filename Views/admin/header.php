<?php
if ($_SESSION['IS_LOGIN'] !== 'yes') {
    header('location:login');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- Custom fonts for this template-->
    <link href="./public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="./public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="./public/css/sb-admin.css" rel="stylesheet">
</head>

<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark static-top" style="background-color:#c43b68">
        <b><a class="navbar-brand mr-1 font-weight-bold" href="#">Blog-Site</a></b>
        <div class="d-none d-md-inline-block ml-auto"></div>
        <!-- Navbar -->
    </nav>
    <div id="wrapper" class="bg-white">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav" style="background-color:rgb(196 59 104 / 90%)">
            <li class="nav-item">
                <a class="nav-link" href="manage_blog">
                    <i class="fa fa-fw fa-columns bg-dark"></i>
                    <span>Manage Blog</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_category">
                    <i class="fa fa-fw fa-user bg-dark"></i>
                    <span>Manage Catogories</span></a>
            </li>


        </ul>
        <div id="content-wrapper">