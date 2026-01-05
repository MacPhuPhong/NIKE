<?php
session_start();
require_once 'db/dbConnect.php';

if (!isset($_SESSION['user'])) {
    // Chưa đăng nhập, chuyển hướng đến trang login.php
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$action = isset($_GET['action']) ? $_GET['action'] : 'add';
$qty = isset($_GET['qty']) ? $_GET['qty'] : 1;
$size = isset($_GET['size']) && !empty($_GET['size']) ? $_GET['size'] : '37';

$sql = mysqli_query($conn, "SELECT * FROM products WHERE id_sp = $id");

if ($sql) {
    $product = mysqli_fetch_assoc($sql);

    if ($product && isset($product['price'])) {
        $price = $product['price'];
    } else {
        $price = 0;
    }

    $cartItem = [
        'id_customer' => isset($_SESSION['user']['id_customer']) ? $_SESSION['user']['id_customer'] : null,
        'id_sp' => isset($product['id_sp']) ? $product['id_sp'] : null,
        'name_product' => isset($product['name_product']) ? $product['name_product'] : null,
        'image' => isset($product['image']) ? $product['image'] : null,
        'price' => $price,
        'qty' => $qty,
        'size' => $size
    ];

    if ($action == 'add') {
        $remainingQuantity = $product['quantity'] - $qty;

        if ($remainingQuantity >= 0) {
            // Chèn hoặc cập nhật mục trong bảng cart
            $cartItemExistsQuery = mysqli_query($conn, "SELECT * FROM cart WHERE id_sp = $id AND id_customer = {$_SESSION['user']['id_customer']} AND size = '$size'");
            
            if(mysqli_num_rows($cartItemExistsQuery) > 0) {
                // Cập nhật mục đã có trong giỏ
                mysqli_query($conn, "UPDATE cart SET qty = qty + $qty WHERE id_sp = $id AND id_customer = {$_SESSION['user']['id_customer']} AND size = '$size'");
            } else {
                // Chèn mục mới vào giỏ
                mysqli_query($conn, "INSERT INTO cart (id_customer, id_sp, name_product, image, price, qty, size) VALUES ({$_SESSION['user']['id_customer']}, $id, '{$product['name_product']}', '{$product['image']}', $price, $qty, '$size')");
            }
        } else {
            echo "<script>alert('Số lượng không đủ trong kho. Số lượng tối đa có sẵn là $remainingQuantity.');</script>";
        }
    }


    
if ($action == 'delete') {
        mysqli_query($conn, "DELETE FROM cart WHERE id_cart = $id AND id_customer = {$_SESSION['user']['id_customer']}");
        header("Location: cart.php");
        exit(); 
    } else {
        sleep(1.5);
        header("location: shop.php");
    }
} else {
    echo "Không tìm thấy sản phẩm!";
}



if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $cartId = $_POST['id'];
    $newQuantity = $_POST['qty'];

    // Thực hiện truy vấn cập nhật giá trị qty trong cơ sở dữ liệu
    $updateQuery = mysqli_query($conn, "UPDATE cart SET qty = $newQuantity WHERE id_cart = $cartId");

    if ($updateQuery) {
        // Trả về thông báo thành công (nếu cần)
        echo 'Quantity updated successfully';
    } else {
        // Trả về thông báo lỗi (nếu cần)
        echo 'Error updating quantity';
    }
}


?>
