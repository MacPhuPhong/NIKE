<?php
$page = 'ORDERS';
require_once 'template/public/inc/header.php';
?>
<link rel="stylesheet" href="css-user/orders.css">
<style>
    .pagination .page-link {
        color: #000;
    }

    .pagination .page-item.active .page-link {
        background-color: #000;
        color: #fff;
    }

    .pagination .page-link:hover {
        background-color: #000;
        color: #fff;
    }

    .pagination {
        text-align: center;
        /* Canh giữa phân trang */
        margin-top: 20px;
        /* Khoảng cách từ phân trang đến bảng */
    }
</style>
<div class="container-sm ctn">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_SESSION['user'])) {
                // Số đơn đặt hàng hiển thị trên mỗi trang
                $ordersPerPage = 5;

                // Xác định trang hiện tại
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Tính offset
                $offset_orders = ($current_page - 1) * $ordersPerPage;

                // Truy vấn CSDL với phân trang
                $qr = mysqli_query($conn, "SELECT * FROM `order` JOIN `order_detail` ON `order`.`id_order` = `order_detail`.`id_order` WHERE id_customer = {$_SESSION['user']['id_customer']} AND `order`.`status` <> 2 GROUP BY `order_detail`.`id_order` ORDER BY `order`.`date` DESC LIMIT $offset_orders, $ordersPerPage");

                ?>
            <table class="table">
                <!-- Table header -->
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Customer name</th>
                        <th scope="col">Order date</th>
                        <th scope="col">Payment methods</th>
                        <th scope="col">Order status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                    <?php
                        $stt = 0;
                        $total = 0;
                        while ($row_invoice = mysqli_fetch_assoc($qr)) {
                            $stt++;
                            $total += ($row_invoice['price'] * $row_invoice['qty']);
                            $url = 'orderdetail' . '-' . $row_invoice['id_order'] . '.html1';
                            ?>
                    <tr>
                        <th scope="row"></th>
                        <td><?php echo $_SESSION['user']['fname'] ?></td>
                        <td><?php echo $row_invoice['date'] ?></td>
                        <?php if ($row_invoice['payment'] == 1) { ?>
                        <td>Direct payment (shipcod)</td>
                        <?php } else { ?>
                        <td>Pay by PayPal</td>
                        <?php } ?>
                        <?php if ($row_invoice['status'] == 0) { ?>
                        <td>Processing</td>
                        <?php } elseif ($row_invoice['status'] == 2) { ?>
                        <td>Canceled</td>
                        <?php } else { ?>
                        <td>Resolved</td>
                        <?php } ?>

                        <td><a href="<?php echo $url ?>" class="detail">Detail</a></td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Hiển thị phân trang -->
            <div class="pagination col-md-12">
                <ul class="pagination">
                    <?php
                        if ($current_page > 1) {
                            $previous = $current_page - 1;
                        ?>
                    <li class="page-item">
                        <a class="page-link" href="orders.php?page=<?php echo $previous ?>"><i
                                class="bi bi-chevron-left"></i></a>
                    </li>
                    <?php } ?>

                    <?php
                        $totalOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `order` JOIN `order_detail` ON `order`.`id_order` = `order_detail`.`id_order` WHERE id_customer = {$_SESSION['user']['id_customer']} GROUP BY `order_detail`.`id_order`"));
                        $totalPages = ceil($totalOrders / $ordersPerPage);

                        for ($i = 1; $i <= $totalPages; $i++) {
                            $active = ($i == $current_page) ? 'active' : '';
                        ?>
                    <li class="page-item <?php echo $active ?>">
                        <a class="page-link" href="orders.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                    </li>
                    <?php } ?>

                    <?php
                        if ($current_page < $totalPages) {
                            $next = $current_page + 1;
                        ?>
                    <li class="page-item">
                        <a class="page-link" href="orders.php?page=<?php echo $next ?>"><i
                                class="bi bi-chevron-right"></i></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>

            <?php } else { ?>
            <div class="div-no-login">
                <div class="div-anh col-sm-6">
                    <img src="template/img-index/Nike-checkout.jpg" alt="" class="anh-login">
                </div>
                <div class="div-login col-sm-6">
                    <div class="div-login-con">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <h1>Sorry but you still haven't signed in to your account.</h1>
                        <strong>Please Log-in to View Orders :</strong> <a href="login.php">Log-in</a> <br>
                        <strong>If you do not have an account - Register now :</strong> <a href="signup.php">Sign-up</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php require_once 'template/public/inc/footer.php' ?>