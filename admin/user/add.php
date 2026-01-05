<?php
$page = 'USER';
require_once '../inc/header.php';
?>
<link rel="stylesheet" href="admin/user/user.css">

<!-- MAIN CONTENT-->
<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <?php
                    if (isset($_POST['submit'])) {
                        $fname = $_POST['fname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $role = $_POST['level'];
                        $sql = "SELECT * FROM admins WHERE fname = '$fname' OR email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            echo '<script>alert("Đã tồn tại Tên  và Email này !"); window.location="admin/user/add.php";</script>';
                            die();
                        } else {
                            // For simplicity, inserting plain text password. DO NOT USE IN PRODUCTION!
                            $sql = "INSERT INTO `admins`(`fname`, `email`, `password`, `level`) VALUES ('$fname','$email','$password','$role')";
                            if (mysqli_query($conn, $sql)) {
                                echo '<script>window.location="admin/user";</script>';
                            }
                        }
                    }
                    ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Họ Tên</label>
                            <input type="text" name="fname" class="form-control" placeholder="Nhập Họ Và Tên">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Nhập Địa Chỉ Email">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập Mật Khẩu">
                        </div>
                        <div class="form-group">
                            <label>Vai Trò</label>
                            <select name="level" id="" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Nhân viên</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-add" value="Thêm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>
<?php require_once '../inc/footer.php' ?>
