<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./public/front_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/front_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./public/front_assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./public/front_assets/css/core.css">
    <link rel="stylesheet" href="./public/front_assets/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="./public/style.css">
    <link rel="stylesheet" href="./public/front_assets/css/responsive.css">
    <link rel="stylesheet" href="./public/front_assets/css/custom.css">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <style>
        .htc__shopping__cart a span.htc__wishlist {
            background: #c43b68;
            border-radius: 100%;
            color: #fff;
            font-size: 9px;
            height: 17px;
            line-height: 19px;
            position: absolute;
            right: 18px;
            text-align: center;
            top: -4px;
            width: 17px;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <header id="htc__header" class="htc__header__area header--one">
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo text-left">
                                    <b><a class="navbar-brand mr-1 font-weight-bold card-text-left"
                                            href="#">Blog-Site</a></b>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 col-sm-5 col-xs-3">
                            </div>
                            <div class="col-md-3 col-lg-4 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <ul class="navbar-nav ml-auto ml-md-0">
                                        <li class="nav-item dropdown no-arrow">
                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <!-- Increase the size of the Font Awesome icon -->
                                                <i class="fas fa-user-circle fa-lg"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="userDropdown">
                                                <!-- Style the dropdown items -->
                                                <b><a class="dropdown-item" href="profile">My Profile</a></b>
                                                <br>
                                                <a class="dropdown-item" href="add_blog">Add Blog</a>
                                                <br>
                                                <b><a class="dropdown-item" href="add_category">Add Blog
                                                        Category</a></b>
                                                <br>
                                                <a class="dropdown-item" href="logout">Logout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
        </header>
        <div class="body__overlay"></div>
        <div class="offset__wrapper">
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Search here..." type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>