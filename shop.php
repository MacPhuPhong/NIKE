<?php $page = 'PRODUCTS'; ?>
<?php require_once 'template/public/inc/header.php'?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="css-user/shop.css">
<style>
 .product-link   .thumbnail-image {
    position: absolute;
    top: 10px;
    left: 10px;
    width: 70px; /* Đặt kích thước phù hợp */
    height: 70px;
    z-index: 1; /* Đặt lớp z để hiển thị phía trên ảnh sản phẩm */
}
</style>
<?php
if (isset($_SESSION['user'])) {
    echo '<script src="js-user/shop.js"></script>';
}
?>
<section id="advertisement">
    <div class="container">
    </div>
</section>
<section class="section-tong">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `products`");
    $nume_row = mysqli_num_rows($sql);
    $nume_page = ceil($nume_row / 21);
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $offset = ($current_page - 1) * 21;

    // Check for sorting order
    $order = '';
    $key = '';

    if (isset($_GET['order']) && ($_GET['order'] == 'DESC' || $_GET['order'] == 'ASC')) {
    $order = $_GET['order'];
    }

    if (isset($_GET['key'])) {
    $key = $_GET['key'];
    }

    $sortLink = "shop.php?page=$current_page";
    if (isset($_GET['key'])) {
    $sortLink .= "&key=$_GET[key]";
    }

    $orderByClause = ($order != '') ? "ORDER BY price $order, id_sp DESC" : "ORDER BY id_sp DESC";
    // $orderByClause = ($order != '') ? "ORDER BY id_sp DESC " : "";
    // $orderByClause = "ORDER BY id_sp DESC";

    ?>
    <div class="container-sm">
        <div class="row">
            <?php require_once 'template/public/inc/left-sidebar.php' ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <div class="title-bar">
                        <h2 class="title text-left">ALL PRODUCTS</h2>
                        <div class="sort-dropdown">
                            <button class="dropdown-btn">Sort By <i class="bi bi-funnel"></i></button>
                            <ul class="dropdown-content">
                                <li><button id="sortAscBtn">Low to High</button></li>
                                <li><button id="sortDescBtn">High to Low</button></li>
                            </ul>
                        </div>
                    </div>

                    <?php
                    if (isset($_GET['key'])) {
                        $key = $_GET['key'];
                    } else {
                        $key = '';
                    }

                    // Modify this line to include sorting order only when present
                    $qr = mysqli_query($conn, "SELECT * FROM products WHERE name_product LIKE '%$key%' $orderByClause LIMIT $offset,21");

                    while ($row_pro = mysqli_fetch_assoc($qr)) {
                        $replaceName = utf8ToLatin($row_pro['name_product']);
                        $url = $replaceName . '-' . $row_pro['id_items'] . '-' . 'sp' . '-' . $row_pro['id_sp'] . '.html';
                        ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-left">
                                    <a href="<?php echo $url ?>" class="product-link">
                                    <?php
                        // Kiểm tra xem sản phẩm có thuộc hot_product là 2 và là một trong 3 sản phẩm cuối cùng không
                        if ($row_pro['hot_product'] == 2) {
                            ?>
                            <img class="thumbnail-image" src="template/img-index/new-product.png" alt="Thumbnail" />
                        <?php
                        }
                        ?>
                                        <img src="admin/upload/<?php echo $row_pro['image'] ?>" alt="" />
                                        <div class="product-details animate__animated animate__fadeInUp col-sm-12">
                                            <div class="col-sm-6">
                                                <h5><?php echo $row_pro['name_product'] ?></h5>
                                                <h5><?php echo number_format($row_pro['price']) . ' VND' ?></h5>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <h3 class="logo-image">NIKE</h3>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="cartxuly.php?id=<?php echo $row_pro['id_sp'] ?>" onclick="divFunction()"
                                        class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="col-sm-4 so-trang" style="text-align: right;">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                <div aria-label="...">
                    <ul class="pagination">
                        <?php
                        if ($current_page > 1) {
                            $previous = $current_page - 1;
                            ?>
                        <li class="page-item">
                            <a class="page-link" href="shop.php"><i class="bi bi-chevron-left"></i></a>
                        </li>
                        <?php } ?>
                        <?php
                        $part = 1;
                        $begin = $current_page - $part;
                        if ($begin < 1) {
                            $begin = 1;
                        }
                        $end = $current_page + $part;
                        if ($end > $nume_page) {
                            $end = $nume_page;
                        }
                        for ($i = $begin; $i <= $end; $i++) {
                            $active = '';
                            if ($i == $current_page) {
                                $active = 'active';
                            }
                            ?>
                        <li class="page-item <?php echo $active ?>">
                            <a class="page-link"
                                href="shop.php?page=<?php echo $i ?>&order=<?php echo $order ?>"><?php echo $i ?></a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($current_page < $nume_page) {
                            $next = $current_page + 1;
                            ?>
                        <li class="page-item">
                            <a class="page-link" href="shop.php?page=<?php echo $next ?>&order=<?php echo $order ?>"><i
                                    class="bi bi-chevron-right"></i></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    document.getElementById('sortAscBtn').addEventListener('click', function () {
        // Thay đổi nội dung của thẻ h2 thành giá sắp xếp tương ứng
        document.querySelector('.title.text-left').innerText = 'ALL PRODUCTS - Low to High';

        // Chuyển hướng đến trang với tham số sắp xếp
        window.location.href = 'shop.php?page=<?php echo $current_page ?>&order=ASC&key=<?php echo $key ?>';
    });

    document.getElementById('sortDescBtn').addEventListener('click', function () {
        // Thay đổi nội dung của thẻ h2 thành giá sắp xếp tương ứng
        document.querySelector('.title.text-left').innerText = 'ALL PRODUCTS - High to Low';

        // Chuyển hướng đến trang với tham số sắp xếp
        window.location.href = 'shop.php?page=<?php echo $current_page ?>&order=DESC&key=<?php echo $key ?>';
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Lưu lại trạng thái ban đầu của tiêu đề
        var originalTitle = document.querySelector('.title.text-left').innerText;

        // Khi trang web được tải, cập nhật tiêu đề nếu có tham số sắp xếp
        if (window.location.search.includes('order=ASC')) {
            document.querySelector('.title.text-left').innerText = 'ALL PRODUCTS - Low to High';
        } else if (window.location.search.includes('order=DESC')) {
            document.querySelector('.title.text-left').innerText = 'ALL PRODUCTS - High to Low';
        }

        // Khi quay lại trang không có tham số sắp xếp, khôi phục tiêu đề ban đầu
        window.addEventListener('popstate', function (event) {
            if (window.location.search.includes('order=ASC')) {
                document.querySelector('.title.text-left').innerText = 'ALL PRODUCTS - Low to High';
            } else if (window.location.search.includes('order=DESC')) {
                document.querySelector('.title.text-left').innerText = 'ALL PRODUCTS - High to Low';
            } else {
                document.querySelector('.title.text-left').innerText = originalTitle;
            }
        });
    });
</script>
<?php require_once 'template/public/inc/footer.php' ?>