<?php 
require_once '../../db/dbConnect.php';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} 
$qr = mysqli_query($conn,"DELETE FROM `order` WHERE id_order = $id");
if($qr) {
    
    header('location: index.php');
}
?>