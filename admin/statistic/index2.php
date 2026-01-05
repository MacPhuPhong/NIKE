<?php
require_once '../inc/header.php';
require_once '../../db/dbConnect.php';
require_once '../../db/checkLogin.php';

// Check if the user has the required level (1) to access this page
if ($_SESSION['userAdmin']['level'] != 1) {
    // Redirect or show an error message
    echo '<script>window.location.href = "admin/index.php";</script>';
    exit();
}
?>
<style>
    .table {
    background-color: #ffffff;
}
    .image{
        border-radius: 20px;
        border: 1px solid black;
    }
</style>
<link rel="stylesheet" href="admin/statistic/statistic.css">
<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Thống kê sản phẩm theo lượt mua</h2> <br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Top</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col"></th>
                                <th scope="col">Số lượng bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            $result = $conn->query("SELECT products.name_product, products.image, SUM(order_detail.qty) as total_sold
                                                   FROM products
                                                   JOIN order_detail ON products.id_sp = order_detail.id_sp
                                                   GROUP BY products.id_sp
                                                   ORDER BY total_sold DESC");
                            
                            while ($row = $result->fetch_assoc()) {
                                $stt++;
                            ?>
                                <tr>
                                    <td><?php echo $stt; ?></td>
                                    <td><img src="http://localhost/eshopper/admin/upload/<?php echo $row['image'] ?>"
                                        alt="" width="100px" class="image"></td>
                                    <td><?php echo $row['name_product']; ?></td>
                                    <td><?php echo $row['total_sold']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../inc/footer.php' ?>
<script src="admin/js-admin/statistic.js"></script>
