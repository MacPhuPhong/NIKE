<?php require_once '../../db/dbConnect.php'; ?>
<?php
$id = $_GET['id_xoa'];
$qr = "DELETE FROM cat_items WHERE id_items = {$id}";
$delete = mysqli_query($conn, $qr);
if ($delete) {
    header("LOCATION: index.php?msg= Xóa Thành Công");
} else {
    echo "Có Lỗi Khi Xóa";
}
?>