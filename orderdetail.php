<?php $page = 'ORDERS'; ?>
<?php require_once 'template/public/inc/header.php'; ?>
<?php
function getOrderStatus($status) {
    switch ($status) {
        case 1:
            return "Resolved";
        case 2:
                return "Canceled";
        default:
            return "Processing";
    }
}
?>
<link rel="stylesheet" href="css-user/orderdetail.css">
<div class="container-sm tong">
    <div class="row">
        <div class="col-md-12">
            <?php
            // Fetch customer information
            $customer_query = mysqli_query($conn, "SELECT `order`.*, `customers`.* FROM `order` JOIN `customers` ON `order`.`id_customer` = `customers`.`id_customer` WHERE `id_order` = {$_GET['id']}");
            $customer_info = mysqli_fetch_assoc($customer_query);
            ?>
            <h2>Order Details</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td><?php echo $customer_info['fname']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td><?php echo $customer_info['email']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td><?php echo $customer_info['address']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td><?php echo $customer_info['phone']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Product Status</th>
                        <td><?php echo getOrderStatus($customer_info['status']); ?></td>
                    </tr>
                    <tr>
                        <th>Payment methods</th>
                        <td>
                            <?php if ($customer_info['payment'] == 1) { ?>
                            Direct payment (shipcod)
                            <?php } else { ?>
                            Pay by PayPal
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <hr><br>
            <!-- Order details table -->

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Product</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Size</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $stt = 0;
                    $total = 0;
                    $query = mysqli_query($conn, "SELECT `order_detail`.*, `products`.`name_product`, `products`.`image` FROM `order_detail` JOIN `products` ON `order_detail`.`id_sp` = `products`.`id_sp` WHERE `id_order` = {$_GET['id']}");
                    while ($row_detail = mysqli_fetch_assoc($query)) {
                        $stt++;
                        $total += ($row_detail['price'] * $row_detail['qty']);
                    ?>
                    <tr>
                        <td><?php echo $stt ?></td>
                        <td><?php echo $row_detail['name_product'] ?></td>
                        <td><img src="<?php echo 'admin/upload/' . $row_detail['image']; ?>" alt="Product Image"
                                width="100px"></td>
                        <td><?php echo number_format($row_detail['price']) . ' VND'; ?></td>
                        <td><?php echo $row_detail['qty'] ?></td>
                        <td><?php echo $row_detail['size']; ?></td>
                        <td><?php echo number_format($row_detail['qty'] * $row_detail['price']) . ' VND'; ?></td>
                    </tr>
                    <?php 
                    }
                    ?>
                    <tr>
                        <td style="background-color: burlywood;" colspan="3">Total payment :</td>
                        <td></td>
                        <td colspan="6"><?php echo number_format($total) ?> VND</td>
                    </tr>
                </tbody>
            </table>

            <?php if ($customer_info['status'] == 0) {
            ?>
            <div class="col-md-12 offset-md-6 text-right">
                <form method="post" action="" id="cancelOrderForm">
                    <input type="hidden" name="cancel_order" value="1">
                    <button type="button" id="cancelOrderBtn" class="btn btn-danger">
                        Cancel Order
                    </button>
                </form>
            </div>
            <?php
             // Check if the Cancel Order button is clicked
            if (isset($_POST['cancel_order'])) {
                // Update the order status to 2 (Cancelled)
                $update_query = "UPDATE `order` SET `status` = 2 WHERE `id_order` = {$_GET['id']}";
                if (mysqli_query($conn, $update_query)) {
                    echo '<div class="alert alert-success" role="alert">Order has been cancelled successfully.</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error updating order status.</div>';
                }
            }
            } 
            if ($customer_info['status'] == 2) {
                echo '<div class="alert alert-danger" role="alert">This order has been canceled.</div>';
                
            }
            ?>
            <?php if ($customer_info['status'] == 2) { ?>
            <div class="col-md-12 offset-md-6 text-right">
                <form method="post" action="" id="reorderForm">
                    <input type="hidden" name="reorder_order" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn-success">
                        Reorder
                    </button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="js-user/orderdetail.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php require_once 'template/public/inc/footer.php'; ?>