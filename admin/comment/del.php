<?php require_once '../../db/dbConnect.php'; ?>
<?php
$commentId = $_GET['id'];
$qr = "DELETE FROM `comment` WHERE `id_cmt` = $commentId";
$delete = mysqli_query($conn, $qr);
if ($delete) {
    header("LOCATION: index.php?msg= Xóa Thành Công");
} else {
    echo "Có Lỗi Khi Xóa";
}
?>
