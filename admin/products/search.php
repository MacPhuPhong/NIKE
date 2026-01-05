<!-- admin/products/search.php -->
<?php $page = 'PRODUCTS' ?>
<?php
require_once '../inc/header.php';

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm);

    $query = "SELECT products.*, cat_items.name_item 
              FROM `products` 
              LEFT JOIN cat_items ON products.id_items = cat_items.id_items
              WHERE `name_product` LIKE '%$searchTerm%' OR cat_items.name_item LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $query);

    echo "<div class='search-results'>";
    echo "<h2>Tìm kiếm cho : $searchTerm</h2>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th></th><th>Sản Phẩm</th><th>Hình Ảnh</th><th>Tên Loại Danh Mục</th><th>Số Lượng</th><th>Giá Sản Phẩm</th><th></th></tr></thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id_sp']}</td>";
            echo "<td>{$row['name_product']}</td>";
            echo "<td><img src='http://localhost/eshopper/admin/upload/{$row['image']}' alt='' width='100px'></td>";

            // Display the category name
            $nameItem = isset($row['name_item']) ? $row['name_item'] : 'N/A';
            echo "<td>{$nameItem}</td>";

            echo "<td>{$row['quantity']}</td>";
            echo "<td>" . number_format($row['price']) . "</td>";

            // Add an Edit link with the product ID
            echo '<td>
                    <a href="admin/products/edit.php?id_capnhat=' . $row['id_sp'] . '">
                        <button class="btn btn-update">Cập Nhật</button>
                    </a>
                    <a href="admin/products/del.php?id_xoa=' . $row['id_sp'] . '">
                        <button class="btn btn-danger">Xóa</button>
                    </a>
                </td>';

            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Không tìm thấy sản phẩm</p>";
    }

    echo "</div>";
} else {
    echo "<p>Vui lòng nhập từ khóa tìm kiếm.</p>";
}

// Include the footer
require_once '../inc/footer.php';?>
<link rel="stylesheet" href="admin/products/products.css">
