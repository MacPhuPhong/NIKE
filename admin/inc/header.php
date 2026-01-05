<?php
session_start();
require_once '../../db/dbConnect.php';
require_once '../../db/checkLogin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    <title>Admin NIKE</title>
    <base href="http://localhost/eshopper/">
    <!-- Fontfaces CSS-->
    <link href="template/admin/css/font-face.css" rel="stylesheet" media="all">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="lib/ckfinder/ckfinder.js"></script>
    <link href="template/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="template/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="template/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="template/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="template/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="template/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
        media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="template/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="template/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="template/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="template/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="template/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="icon"
        href="https://4.bp.blogspot.com/-BGYw9I05BVk/TiRdC7c0NzI/AAAAAAAAAiQ/1ebLElEEGCc/s1600/Nike_logo.jpg"
        type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Main CSS-->
    <link href="template/admin/css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="admin/inc/header.css">
</head>
<style>
    .treeview-menu {
        display: none;
    }

    .treeview.active>a {
        background-color: #f8f8f8;
    }

    .treeview.active>ul {
        display: block;
    }
    .sub-menu-item {
        padding-left: 30px; /* Khoảng cách từ trái để làm nổi bật thẻ con */
        background-color: #f2f2f2; /* Màu nền cho thẻ con */
        margin-top: 5px;
    }
</style>


<script>
    $(document).ready(function () {
        $('.treeview > a').click(function (e) {
            e.preventDefault();
            $(this).parent().toggleClass('active');
        });
    });
</script>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="https://purepng.com/public/uploads/large/purepng.com-nike-logologobrand-logoiconslogos-251519940082eoxxs.png"
                        alt="Cool Admin" />
                    <!-- <h1><i>NIKE</i></h1> -->
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <?php 
                 if($_SESSION['userAdmin']['level'] == 1) {

                 
                ?>
                    <ul class="list-unstyled navbar__list">
                        <li class="<?php if($page == 'DASHBOAD') {echo 'active';} ?>">
                            <a class="js-arrow" href="http://localhost/eshopper/admin/dashboad">
                                <i class="fas fa-tachometer-alt"></i>Trang chủ
                            </a>
                        </li>
                        <li class="<?php if($page == 'CAT') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/cat/">
                                <i class="fas fa-chart-bar"></i> Danh Mục Sản Phẩm
                            </a>
                        </li>
                        <li class="<?php if($page == 'PRODUCTS') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/products/">
                                <i class="fas fa-table"></i>Quản Lý Sản Phẩm
                            </a>
                        </li>
                        <li class="<?php if($page == 'ORDER') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/order/">
                                <i class="zmdi zmdi-shopping-cart"></i>Quản Lý Đơn Hàng
                            </a>
                        </li>
                        <li class="treeview <?php if($page == 'TKDT' || $page == 'TKSP') {echo 'active';} ?>">
                            <a href="#">
                                <i class="fas fa-chart-bar"></i>Thống Kê
                            </a>
                            <ul class="treeview-menu">
                                <li class="sub-menu-item">
                                    <a href="http://localhost/eshopper/admin/statistic/">
                                        <i class="bi bi-coin"></i>Thống Kê Doanh Thu
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="http://localhost/eshopper/admin/statistic/index2.php">
                                        <i class="bi bi-bar-chart-line-fill"></i>Thống Kê Sản Phẩm
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if($page == 'USER') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/user/">
                                <i class="fas fa-users"></i>Quản Lý Admin</a>
                        </li>
                        <li class="<?php if($page == 'BLOG') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/blog/">
                                <i class="fab fa-blogger"></i>Tin Tức
                            </a>
                        </li>
                        <li class=" treeview <?php if($page == 'CONTACT') {echo 'active';} ?>">
                            <a href="#">
                                <i class="zmdi zmdi-phone"></i>Phản hồi
                            </a>
                            <ul class="treeview-menu">
                                <li class="sub-menu-item">
                                    <a href="http://localhost/eshopper/admin/contact/">
                                        <i class="bi bi-chat-dots-fill"></i>Liên hệ
                                    </a>
                                </li>
                                <li class="sub-menu-item">
                                    <a href="http://localhost/eshopper/admin/comment/">
                                        <i class="bi bi-chat-left-text-fill"></i>Bình luận
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <?php 
                } else {
                ?>
                    <ul class="list-unstyled navbar__list">
                        <li class="<?php if($page == 'DASHBOAD') {echo 'active';} ?>">
                            <a class="js-arrow" href="http://localhost/eshopper/admin/dashboad">
                                <i class="fas fa-tachometer-alt"></i>Trang Admin
                            </a>
                        </li>
                        <li class="<?php if($page == 'CAT') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/cat/">
                                <i class="fas fa-chart-bar"></i> Danh Mục Sản Phẩm
                            </a>
                        </li>
                        <li class="<?php if($page == 'PRODUCTS') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/products/">
                                <i class="fas fa-table"></i>Quản Lý Sản Phẩm
                            </a>
                        </li>
                        <li class="<?php if($page == 'ORDER') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/order/">
                                <i class="zmdi zmdi-shopping-cart"></i>Quản Lý Đơn Hàng
                            </a>
                        </li>

                        <li class="<?php if($page == 'BLOG') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/blog/">
                                <i class="fab fa-blogger"></i>Tin Tức
                            </a>
                        </li>
                        <li class="<?php if($page == 'CONTACT') {echo 'active';} ?>">
                            <a href="http://localhost/eshopper/admin/contact/">
                                <i class="zmdi zmdi-phone"></i>Liên Hệ
                            </a>
                        </li>
                    </ul>
                    <?php }?>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">

                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <div class="account-item clearfix js-item-menu">
                                                <div class="image">
                                                    <img src="https://scontent-hkg4-1.xx.fbcdn.net/v/t1.15752-9/393695215_762167402413148_3133092473572560312_n.jpg?_nc_cat=110&cb=99be929b-8d691acd&ccb=1-7&_nc_sid=8cd0a2&_nc_ohc=ljDUF6FfN8UAX8q3_mH&_nc_ht=scontent-hkg4-1.xx&oh=03_AdTKkjHAVU-90vqnQhe3dT4XnzwFyBNpjQpirmYgMacJcQ&oe=65FEA7E3"
                                                        alt="Hoanglee" class="avartar" />
                                                </div>
                                                <div class="content">
                                                    <a class="js-acc-btn"
                                                        href="#"><?php echo $_SESSION['userAdmin']['fname'] ?>
                                                    </a>
                                                </div>
                                                <div class="account-dropdown js-dropdown">
                                                    <div class="info clearfix">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="https://scontent-hkg4-1.xx.fbcdn.net/v/t1.15752-9/393695215_762167402413148_3133092473572560312_n.jpg?_nc_cat=110&cb=99be929b-8d691acd&ccb=1-7&_nc_sid=8cd0a2&_nc_ohc=ljDUF6FfN8UAX8q3_mH&_nc_ht=scontent-hkg4-1.xx&oh=03_AdTKkjHAVU-90vqnQhe3dT4XnzwFyBNpjQpirmYgMacJcQ&oe=65FEA7E3"
                                                                    alt="Hoanglee" />
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <span
                                                                class="email"><?php echo $_SESSION['userAdmin']['email'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="account-dropdown__footer">
                                                        <a href="http://localhost/eshopper/admin/logout.php">
                                                            <i class="zmdi zmdi-power"></i>Logout
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->