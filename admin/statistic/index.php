<?php $page = 'TKDT' ?>
<?php require_once '../inc/header.php' ?>
<?php
require_once '../../db/dbConnect.php';
require_once '../../db/checkLogin.php';

// Check if the user has the required level (1) to access this page
if ($_SESSION['userAdmin']['level'] != 1) {
    // Redirect or show an error message
    echo '<script>window.location.href = "admin/index.php";</script>';
    exit();
}
?>
<link rel="stylesheet" href="admin/statistic/statistic.css">
<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">


                    <?php
                    if (!isset($_POST['submit'])) {
                    ?>
                        <form action="" method="POST">
                            <label for="">Từ Ngày</label>
                            <input type="date" name="date1" class="form-control">
                            <label for="">Đến ngày</label>
                            <input type="date" name="date2" class="form-control">
                            <br>
                            <input type="submit" name="submit" value="Lọc" class="btn btn-info">
                        </form>
                    <?php
                    } else {
                        $date1 = $_POST['date1'];
                        $date2 = $_POST['date2'];
                        echo "Từ ngày {$date1} Đến {$date2}";

                    ?>
                        <a href="admin/statistic/">Trở Lại</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">

                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Ngày Đặt</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt1 = 0;
                            $total1 = 0;
                            if (isset($_POST['submit'])) {
                                $date1 = $_POST['date1'];
                                $date2 = $_POST['date2'];
                                $qr = mysqli_query($conn, "SELECT * FROM `order` JOIN `customers` on `order`.`id_customer` = `customers`.`id_customer` JOIN `order_detail` ON `order`.`id_order` = `order_detail`.`id_order` WHERE `order`.`date` BETWEEN '$date1' AND '$date2' OR `order`.`date` LIKE '%$date2%'");
                                while ($row_dt = mysqli_fetch_assoc($qr)) {
                                    $stt1++;
                                    $total1+= ($row_dt['qty']*$row_dt['price']);
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $stt1; ?></th>
                                        <td><?php echo $row_dt['fname'] ?></td>
                                        <td><?php echo $row_dt['email'] ?></td>
                                        <td><?php echo $row_dt['phone'] ?></td>
                                        <td><?php echo $row_dt['date'] ?></td>
                                        <td><?php echo $row_dt['qty'] ?></td>
                                        <td><?php echo $row_dt['qty'] * $row_dt['price'] ?></td>
                                    </tr>
                                <?php
                                }
                                
                            }
                            
                            else {
                                $stt = 0;
                                $total = 0;
                                $qr1 = mysqli_query($conn, "SELECT * FROM `order` JOIN `customers` on `order`.`id_customer` = `customers`.`id_customer` JOIN `order_detail` ON `order`.`id_order` = `order_detail`.`id_order`");
                                while ($row_dt2 = mysqli_fetch_assoc($qr1)) {
                                    $stt++;
                                    $total+= ($row_dt2['qty'] * $row_dt2['price']);
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $stt; ?></th>
                                        <td><?php echo $row_dt2['fname'] ?></td>
                                        <td><?php echo $row_dt2['email'] ?></td>
                                        <td><?php echo $row_dt2['phone'] ?></td>
                                        <td><?php echo $row_dt2['date'] ?></td>
                                        <td><?php echo $row_dt2['qty'] ?></td>
                                        <td><?php echo $row_dt2['qty'] * $row_dt2['price'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td style="background-color: burlywood; font-weight:bold;">Tổng doanh thu :</td>
                                <td colspan="6"><?php 
                                    if(isset($_POST['submit'])) {
                                      echo number_format($total1). ' VND';
                                    } else {
                                        echo number_format($total). ' VND';   
                                    }
                                ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../inc/footer.php' ?>
<script src="admin/js-admin/statistic.js"></script>