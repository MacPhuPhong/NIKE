<?php require_once '../../db/dbConnect.php'?>
<?php 
 $id_xoa = $_GET['id_xoa'];
 $sql_del = mysqli_query($conn," DELETE FROM `blog` WHERE id_blog = $id_xoa ");
 if($sql_del) {
     header("LOCATION: index.php");
 }
?>