<?php 
require_once '../../db/dbConnect.php';
?>
<?php 
   $id=$_GET['id_xoa'];
  $sql_delete = mysqli_query($conn,"DELETE FROM products WHERE id_sp = $id");
  if($sql_delete) {
    $sql = mysqli_query($conn,"DELETE FROM img_products WHERE id_sp = $id"); 
      header("LOCATION: index.php");
  } else {
      echo "Có Lỗi Khi Xóa !";
  }
?>