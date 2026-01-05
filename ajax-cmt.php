<?php
session_start();
require_once 'db/dbConnect.php';
if (isset($_POST['id_sp'])) {
    $id_sp = $_POST['id_sp'];
    $cmt = $_POST['cmt'];
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $sql = mysqli_query($conn, "INSERT INTO `comment`(`id_customer`, `comment`,`id_sp`) VALUES ('$user[id_customer]','$cmt','$id_sp')");
    }
}
$user = (isset($_SESSION['user']['id_customer']) ? $_SESSION['user']['id_customer'] : '');
$sql2 = mysqli_query($conn, "SELECT comment.*, customers.fname FROM comment JOIN customers ON comment.id_customer = customers.id_customer   ORDER BY id_cmt DESC");
if (mysqli_num_rows($sql2) > 0) {
    while ($row = mysqli_fetch_assoc($sql2)) {
?>
<div class="panel panel-default">
    <div class="panel-body">
        <p><i class="fa fa-user"></i> <?php echo $row['fname'] ?> - <?php echo $row['created_at'] ?></p>
        <p>- <?php echo $row['comment'] ?> </p>
    </div>
</div>
<?php
    }
}
?>