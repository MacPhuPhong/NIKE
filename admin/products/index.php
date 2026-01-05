<?php $page = 'PRODUCTS' ?>
<?php require_once '../inc/header.php'; ?>
<link rel="stylesheet" href="admin/products/products.css">
<!-- MAIN CONTENT-->
<style>
    table img {
        border-radius: 20px;
        border: 1px solid black;
    }
</style>

<div class="main-content">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `products`");
    $nume_row = mysqli_num_rows($sql);
    $nume_page = ceil($nume_row / 15);

    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $offset = ($current_page - 1) * 15;

    // Check if 'sort' parameter is set in the URL
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
        switch ($sort) {
            case 'price_desc':
                $order = 'price DESC';
                break;
            case 'price_asc':
                $order = 'price ASC';
                break;
            // Add more cases for other sorting options if needed
            default:
                $order = 'id_sp DESC'; // Default sorting order
                break;
        }
    } else {
        $order = 'id_sp DESC'; // Default sorting order
    }

    $qr2 = mysqli_query($conn, "SELECT * FROM `img_products`");
    $img = mysqli_fetch_assoc($qr2);
    $stt = 0;
    $qr = mysqli_query($conn, "SELECT products.*, cat_items.name_item 
                               FROM products 
                               JOIN cat_items ON products.id_items = cat_items.id_items 
                               ORDER BY $order 
                               LIMIT $offset, 15");
    $isAdmin = ($_SESSION['userAdmin']['level'] == 1);
    ?>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row head-row">
                <div class="col-md-6" style="display: flex;">
                    <?php if ($isAdmin) : ?>
                    <a href="admin/products/add.php"><button class="btn btn-add">Thêm</button></a>
                    <?php endif; ?>
                    <div class="col-md-3" id="sortDropdown">
                        <div class="btn-group">
                            <button class="btn btn-sort dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Sắp xếp
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="admin/products/index.php?sort=price_asc&page=<?php echo $current_page ?>">Giá
                                    tăng
                                    dần</a>
                                <a class="dropdown-item"
                                    href="admin/products/index.php?sort=price_desc&page=<?php echo $current_page ?>">Giá
                                    giảm dần</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="admin/products/index.php?page=<?php echo $current_page ?>">Xóa sắp xếp</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="display: flex; align-items: center; justify-content: flex-end;">
                    <form id="searchForm" action="admin/products/search.php" method="GET" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" id="search"
                                placeholder="Nhập tên sản phẩm">
                        </div>
                        <button type="submit" class="btn btn-primary btn-search">Tìm kiếm</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Sản Phẩm</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Tên Loại Danh Mục</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Giá</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $qr2 = mysqli_query($conn, "SELECT * FROM `img_products`");
                            $img = mysqli_fetch_assoc($qr2);
                            $stt = 0;
                            $qr = mysqli_query($conn, "SELECT products.*, cat_items.name_item 
                               FROM products 
                               JOIN cat_items ON products.id_items = cat_items.id_items 
                               ORDER BY $order 
                               LIMIT $offset, 15");
                            while ($row_products = mysqli_fetch_assoc($qr)) {
                                $stt++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $stt ?></th>
                                <td><?php echo $row_products['name_product'] ?></td>
                                <td>
                                    <img src="http://localhost/eshopper/admin/upload/<?php echo $row_products['image'] ?>"
                                        alt="" width="100px">
                                </td>
                                <td><?php echo $row_products['name_item'] ?></td>
                                <td><?php echo $row_products['quantity'] ?></td>
                                <td><?php echo number_format($row_products['price']); ?></td>
                                <td>
                                    <?php if ($isAdmin) : ?>
                                    <a href="admin/products/edit.php?id_capnhat=<?php echo $row_products['id_sp'] ?>">
                                        <button class="btn btn-update">Cập Nhật</button>
                                    </a>
                                    <a href="javascript:void(0);" class="btn-delete"
                                        data-id_sp="<?php echo $row_products['id_sp']; ?>">
                                        <button class="btn btn-danger">Xóa</button>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <br>
            <div class="col-sm-6" style="text-align: right;">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <?php
                            if ($current_page > 1) {
                                $previous = $current_page - 1;
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="admin/products?page=<?php echo $previous ?>">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
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
                                <a class="page-link" href="admin/products?page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($current_page < $nume_page) {
                                $next = $current_page + 1;
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="admin/products?page=<?php echo $next ?>">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
<?php require_once '../inc/footer.php'; ?>
<script src="admin/js-admin/products.js"></script>
<!-- ... -->
