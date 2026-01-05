<?php $page = 'ORDER' ?>
<?php
require_once '../inc/header.php';
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm);

    $query = "SELECT * FROM `order` JOIN `customers` ON `order`.`id_customer` = `customers`.`id_customer` 
              WHERE `fname` LIKE '%$searchTerm%' OR `email` LIKE '%$searchTerm%' OR `phone` LIKE '%$searchTerm%' 
              LIMIT 5";
    $result = mysqli_query($conn, $query);

    echo "<div class='search-results'>";
    echo "<h2>Tìm kiếm cho: $searchTerm</h2>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>Khách Hàng</th><th>Email</th><th>Địa Chỉ</th><th>Số Điện Thoại</th><th>Ngày Đặt</th><th>Trạng Thái</th><th></th></tr></thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['fname']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['address']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['date']}</td>";
        
            echo "<td>";
if ($row['status'] == 0) {
    echo "<span>Chưa Xử Lý</span>";
} elseif ($row['status'] == 1) {
    echo "<span style='margin-right: 10px;'>Đã Xử Lý <i class='bi bi-patch-check-fill'></i></span>";

    // Display the "In Bill" button only if the order has been processed
    echo "<a href='admin/order/bill.php?id={$row['id_order']}'>
            <button class='btn btn-primary' style='margin-right: 10px;'>In Bill</button>
        </a>";
}
echo "</td>";

        
            echo "<td>
                    <a href='admin/order/detail.php?id={$row['id_order']}'>
                        <button class='btn btn-detail' style='margin-right:5px;'>Chi Tiết</button>
                    </a>";
        
            // Kiểm tra quyền của người dùng (level == 1 là quản trị viên)
            if ($_SESSION['userAdmin']['level'] == 1) {
                echo "<a href='admin/order/del.php?id={$row['id_order']}'>
                        <button class='btn btn-danger'>Xóa</button>
                    </a>";
            }
            echo "</td>";
        
            echo "</tr>";
        }
        

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Không tìm thấy đơn đặt hàng</p>";
    }

    echo "</div>";
} else {
    echo "<p>Vui lòng nhập từ khóa tìm kiếm.</p>";
}

// Include the footer
require_once '../inc/footer.php';
?>

<link rel="stylesheet" href="admin/order/order.css">