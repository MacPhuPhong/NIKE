<?php $page = 'DASHBOAD' ?>
<?php require_once '../inc/header.php' ?>
<style>
    /* Trong file CSS của bạn (ví dụ: styles.css) */
    .custom-background {
        background-image: url("https://media.istockphoto.com/id/1286354786/vector/dark-prism-textured-abstract-background.jpg?s=170667a&w=0&k=20&c=BjdLgLPbEZT_SAv11uan7CeFdIJVmliFQb6KEZz71aY=");
    }
</style>
<link rel="stylesheet" href="admin/dashboad/dashboad.css">
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-2">Tổng Quan</h2>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <?php if ($_SESSION['userAdmin']['level'] == 1) : ?>
                <div class="col-sm-6 col-lg-3">
                    <a href="http://localhost/eshopper/admin/user/">
                        <div class="overview-item overview-item--c1 custom-background">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <?php
                                        $qr1 = mysqli_query($conn, "SELECT * FROM admins");
                                        $row_1 = mysqli_num_rows($qr1);
                                        ?>
                                        <h2><?php echo $row_1 ?></h2>
                                        <span>User</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endif; ?>
                <div class="col-sm-6 col-lg-3">
                    <a href="http://localhost/eshopper/admin/products/">
                        <div class="overview-item overview-item--c2 custom-background">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-collection-item"></i>
                                    </div>
                                    <div class="text">
                                        <?php $qr2 = mysqli_query($conn, "SELECT * FROM products");
                                    $row_2 = mysqli_num_rows($qr2);
                                    ?>
                                        <h2><?php echo $row_2 ?></h2>
                                        <span>Sản Phẩm Có Sẵn</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="http://localhost/eshopper/admin/order/">
                        <div class="overview-item overview-item--c3 custom-background">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <?php
                                    $qr5 = mysqli_query($conn, "SELECT * FROM `order`");
                                    $row_5 = mysqli_num_rows($qr5);
                                    ?>
                                        <h2><?php echo $row_5; ?></h2>
                                        <span>Đơn Hàng Hiện Có</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="http://localhost/eshopper/admin/cat/">
                        <div class="overview-item overview-item--c4 custom-background">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-square-o"></i>
                                    </div>
                                    <div class="text">
                                        <?php
                                    $qr4 = mysqli_query($conn, "SELECT * FROM `cat_items`");
                                    $row_4 = mysqli_num_rows($qr4);
                                    ?>
                                        <h2><?php echo $row_4; ?></h2>
                                        <span>Danh Mục </span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart4"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- New div for displaying contact count -->
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item custom-background">
                        <a href="http://localhost/eshopper/admin/contact/">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-email"></i>
                                    </div>
                                    <div class="text">
                                        <?php
                                    $contactQuery = mysqli_query($conn, "SELECT COUNT(*) as totalContacts FROM contacts");
                                    $contactData = mysqli_fetch_assoc($contactQuery);
                                    $totalContacts = $contactData['totalContacts'];
                                    ?>
                                        <h2><?php echo $totalContacts; ?></h2>
                                        <span>Liên Hệ</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <!-- You can add a chart here if needed -->
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- End of new div for contact count -->
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item custom-background">
                        <a href="http://localhost/eshopper/admin/blog/">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-book"></i>
                                    </div>
                                    <div class="text">
                                        <?php
                                    $blogQuery = mysqli_query($conn, "SELECT COUNT(*) as totalBlogs FROM blog");
                                    $blogData = mysqli_fetch_assoc($blogQuery);
                                    $totalBlogs = $blogData['totalBlogs'];
                                    ?>
                                        <h2><?php echo $totalBlogs; ?></h2>
                                        <span>Tin Tức</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <!-- You can add a chart here if needed -->
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>
<?php require_once '../inc/footer.php' ?>