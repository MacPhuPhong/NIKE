<?php $page = 'ORDER' ?>
<?php require_once '../inc/header.php'; ?>
<link rel="stylesheet" href="admin/order/order.css">

<!-- MAIN CONTENT -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_POST['status'])) {
    $status = $_POST['status'];

    // Cập nhật trạng thái đơn hàng
    mysqli_query($conn, "UPDATE `order` SET `status`= $status WHERE `id_order` = $id");

    // Nếu đơn hàng được xử lý (status = 1), cập nhật số lượng sản phẩm
    if ($status == 1) {
        // Truy xuất chi tiết đơn hàng
        $orderDetailsQuery = mysqli_query($conn, "SELECT * FROM `order_detail` WHERE `id_order` = $id");

        while ($orderDetail = mysqli_fetch_assoc($orderDetailsQuery)) {
            $productId = $orderDetail['id_sp'];
            $quantity = $orderDetail['qty'];

            // Cập nhật số lượng sản phẩm
            mysqli_query($conn, "UPDATE `products` SET `quantity` = `quantity` - $quantity WHERE `id_sp` = $productId");
        }
    }

    echo '<script>window.location="http://localhost/eshopper/admin/order/";</script>';
}

// Fetch customer information
$customer_query = mysqli_query($conn, "SELECT * FROM `order` JOIN `customers` ON `order`.`id_customer` = `customers`.`id_customer` WHERE `id_order` = $id");
$customer_info = mysqli_fetch_assoc($customer_query);
?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Display customer information -->
                    <h3>Thông tin khách hàng</h3>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Tên khách hàng</th>
                                <td><?php echo $customer_info['fname']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td><?php echo $customer_info['email']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Địa chỉ</th>
                                <td><?php echo $customer_info['address']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Số điện thoại</th>
                                <td><?php echo $customer_info['phone']; ?></td>
                            </tr>
                        </tbody>
                    </table> <br><br>

                    <!-- Display order details -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
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
                            $qr = mysqli_query($conn, "SELECT `order_detail`.*, `products`.`name_product` FROM `order_detail` JOIN `products` ON `order_detail`.`id_sp` = `products`.`id_sp` WHERE `id_order` = $id");
                            while ($row_order_detail = mysqli_fetch_assoc($qr)) {
                                $total += ($row_order_detail['price'] * $row_order_detail['qty']);
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row_order_detail['id_order'] ?></th>
                                <td><?php echo $row_order_detail['name_product'] ?></td>
                                <td><img src="admin/upload/<?php echo $row_order_detail['image']; ?>" alt=""
                                        width="100px"></td>
                                <td><?php echo number_format($row_order_detail['price']) ?></td>
                                <td><?php echo $row_order_detail['qty'] ?></td>
                                <td><?php echo $row_order_detail['size'] ?></td>
                                <td><?php echo number_format($row_order_detail['price'] * $row_order_detail['qty']) ?>
                                </td>
                                <td></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td style="background-color: aqua;">Tổng Tiền</td>
                                <?php
                                if (isset($_SESSION['discount'])) {
                                   
                                ?>
                                <td colspan="6"><?php echo number_format($total * 0.7); ?> VND</td>
                                <?php
                                } else {
                                ?>
                                <td colspan="6"><?php echo number_format($total); ?> VND</td>
                                <?php
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3>Trạng Thái Đơn Hàng</h3>
                                        <br>
                                        <?php
                                        // Check if the order status is not 2 (cancelled) to display the form
                                        if ($customer_info['status'] != 2) {
                                        ?>
                                        
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <select name="status" id="" class="form-control">
                                                    <option value="0">Chưa Xử Lý</option>
                                                    <option value="1">Đã Xử Lý</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-update" class="form-control"
                                                    value="Cập Nhật">
                                            </div>
                                        </form>
                                        <?php
                                        } else {
                                            echo '<p style="color: red;">Đơn hàng đã bị hủy.</p> <br>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
<!-- END PAGE CONTAINER -->

<?php require_once '../inc/footer.php'; ?>