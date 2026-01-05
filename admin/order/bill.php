<?php $page = 'ORDER' ?>
<?php require_once '../inc/header.php'; ?>
<link rel="stylesheet" href="admin/order/bill/bill.css">
<script src="admin/order/bill/bill.js"></script>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <?php
            // Kiểm tra nếu có tham số id được truyền vào
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Truy vấn thông tin đơn hàng
                $order_query = mysqli_query($conn, "SELECT * FROM `order` JOIN `customers` on `order`.`id_customer` = `customers`.`id_customer` WHERE `id_order` = $id");
                $order_info = mysqli_fetch_assoc($order_query);
            ?>
            <div id="print-only-div" class="print-only hide-print">
                <h1 class="text-center" style="font-size: 65px; color:black">
                    <i>
                        NIKE
                    </i>
                </h1>
            </div><br><br>
            <h2>Thông Tin Hóa Đơn</h2><br>
            <table class="table table-bordered">
                <tr>
                    <th>Mã Đơn Hàng :</th>
                    <td><?php echo $order_info['id_order']; ?></td>
                </tr>
                <tr>
                    <th>Khách Hàng :</th>
                    <td><?php echo $order_info['fname']; ?></td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td><?php echo $order_info['email']; ?></td>
                </tr>
                <tr>
                    <th>Địa Chỉ Giao Hàng</th>
                    <td><?php echo $order_info['address']; ?></td>
                </tr>
                <tr>
                    <th>Số Điện Thoại Nhận Hàng :</th>
                    <td><?php echo $order_info['phone']; ?></td>
                </tr>
                <tr>
                    <th>Ngày Đặt Hàng :</th>
                    <td><?php echo $order_info['date']; ?></td>
                </tr>
                <tr>
                    <th>Trạng Thái Đơn Hàng :</th>
                    <td><?php echo ($order_info['status'] == 0) ? 'Chưa Xử Lý' : 'Đã Xử Lý'; ?></td>
                </tr>
            </table>
            <br><br>

            <!-- Hiển thị chi tiết đơn hàng -->
            <h3>Chi Tiết Đơn Hàng</h3><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Size</th>
                        <th scope="col">Tổng Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total = 0;
                        // Truy vấn chi tiết đơn hàng
                        $order_detail_query = mysqli_query($conn, "SELECT `order_detail`.*, `products`.`name_product`, `products`.`image` FROM `order_detail` JOIN `products` ON `order_detail`.`id_sp` = `products`.`id_sp` WHERE `id_order` = $id");
                        while ($row_order_detail = mysqli_fetch_assoc($order_detail_query)) {
                            $total += ($row_order_detail['price'] * $row_order_detail['qty']);
                        ?>
                    <tr>
                        <td><?php echo $row_order_detail['name_product']; ?></td>
                        <td><img src="admin/upload/<?php echo $row_order_detail['image']; ?>" alt="" width="100px"></td>
                        <td><?php echo number_format($row_order_detail['price']); ?></td>
                        <td><?php echo $row_order_detail['qty']; ?></td>
                        <td><?php echo $row_order_detail['size']; ?></td>
                        <td><?php echo number_format($row_order_detail['price'] * $row_order_detail['qty']); ?> VND</td>
                    </tr>
                    <?php
                        }
                        ?>
                    <tr>
                        <td colspan="5" style="font-weight: bold;">Tổng Tiền</td>
                        <?php
                            if (isset($_SESSION['discount'])) {
                            ?>
                        <td><?php echo number_format($total * 0.7); ?> VND</td>
                        <?php
                            } else {
                            ?>
                        <td><?php echo number_format($total); ?> VND</td>
                        <?php
                            }
                            ?>
                    </tr>
                </tbody>
            </table>
            <!-- ... -->
            <button onclick="window.print();" class="button-in">
                <?php if ($order_info['status'] == 1) {
                    echo "In Bill";
                    } else {
                        echo "Không thể in Bill cho đơn hàng chưa xử lý";
                    } ?>
            </button>
            <div id="footer" class="print-only">
            </div> 

            <!-- ...
            <?php
            } else {
                // Nếu không có id được truyền vào, có thể xử lý thông báo lỗi hoặc chuyển hướng người dùng về trang khác
                echo '<p>Không có thông tin đơn hàng được cung cấp.</p>';
            }
            ?>
        </div>
    </div>
</div>
<?php
require_once '../inc/footer.php';
?>