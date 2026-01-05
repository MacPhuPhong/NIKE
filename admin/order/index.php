<?php $page = 'ORDER' ?>
<?php require_once '../inc/header.php' ?>
<link rel="stylesheet" href="admin/order/order.css">
<!-- MAIN CONTENT-->
<style>
    table.table-striped tbody tr.cancelled-order {
    background-color: #ffeeba; /* Adjust the color as needed */
}
</style>
<div class="main-content">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `order`");
    $nume_row = mysqli_num_rows($sql);
    $nume_page = ceil($nume_row / 10);
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $offset = ($current_page - 1) * 10;
    ?>

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 20px;">
                <form action="admin/order/search.php" method="GET" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" id="search"
                            placeholder="Nhập tên sản phẩm">
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>
            </div>
            <div class="row">
                <div class="col-md-13">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Trạng thái</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            $qr = mysqli_query($conn, "SELECT * FROM `order` JOIN `customers` on `order`.`id_customer` = `customers`.`id_customer` ORDER BY `date` DESC LIMIT $offset,10");
                            while ($row = mysqli_fetch_assoc($qr)) {
                                $stt++;
                                $rowClass = ($row['status'] == 2) ? 'cancelled-order' : '';
                            ?>
                            <tr class="<?php echo $rowClass; ?>">
                                <th scope="row"><?php echo $stt; ?></th>
                                <td><?php echo $row['fname'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td>
                                <?php 
                                    if ($row['status'] == 0) {
                                        echo '<span>Chưa Xử Lý</span>';
                                    } elseif ($row['status'] == 1) {
                                        echo '<span>Đã Xử Lý <i class="bi bi-patch-check-fill"></i></span>';
                                    } elseif ($row['status'] == 2) {
                                        echo '<span>Đã Hủy <i class="bi bi-x-octagon-fill"></i></span>';
                                    }
                                ?>
                                </td>
                                <td>
                                    
                                    <a href="admin/order/detail.php?id=<?php echo $row['id_order'] ?>">
                                        <button class="btn btn-detail">Chi Tiết</button>
                                    </a>
                                    
                                    <?php if ($_SESSION['userAdmin']['level'] == 1) { ?>
                                    <a href="admin/order/del.php?id=<?php echo $row['id_order'] ?>">
                                        <button class="btn btn-danger">Xóa</button>
                                    </a>
                                    <?php } ?>

                                    <?php if ($row['status'] == 1) { ?>
                                    <!-- Chỉ hiển thị nút "In Bill" nếu đơn hàng đã xử lý -->
                                    <a href="admin/order/bill.php?id=<?php echo $row['id_order']; ?>">
                                        <button class="btn btn-bill">In bill <i class="bi bi-file-earmark-bar-graph"></i></button>
                                    </a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
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
                                <a class="page-link" href="admin/order?page=<?php echo $previous ?>">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                            <?php } ?>
                            <?php
                            for ($i = 1; $i <= $nume_page; $i++) {
                                $active = '';
                                if ($i == $current_page) {
                                    $active = 'active';
                                }
                            ?>
                            <li class="page-item <?php echo $active ?>">
                                <a class="page-link" href="admin/order?page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($current_page < $nume_page) {
                                $next = $current_page + 1;

                            ?>
                            <li class="page-item">
                                <a class="page-link" href="admin/order?page=<?php echo $next ?>">
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
<?php require_once '../inc/footer.php' ?>
<script src="admin/js-admin/order.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Function để hiển thị Swal cho nút sắp xếp
    function showSortAlert(sortType) {
        Swal.fire({
            // title: 'Đã sắp xếp!',
            // text: 'Đã sắp xếp theo ' + sortType,
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
        });
    }

    var sortButtons = document.querySelectorAll('form .btn-primary');
    sortButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var sortType = this.innerText.trim();
            showSortAlert(sortType);
        });
    });

});
</script>