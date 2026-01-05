<?php require_once '../../db/dbConnect.php'?>
<?php 
 $id_xoa = $_GET['id_xoa'];
 $qrDelete = mysqli_query($conn,"DELETE FROM admins WHERE id_admin = {$id_xoa}");
 if($qrDelete) {
     header("location: index.php");
 }
?>