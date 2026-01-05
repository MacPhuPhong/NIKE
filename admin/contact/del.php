<?php require_once '../../db/dbConnect.php'; ?>
<?php
$id = $_GET['id'];
$qr = "DELETE FROM contacts WHERE id_contact = {$id}";
$delete = mysqli_query($conn, $qr);
if ($delete) {
    header("LOCATION: index.php?msg= Xóa Thành Công");
} else {
    echo "Có Lỗi Khi Xóa";
}
?>