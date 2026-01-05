<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<?php
require_once 'template/public/inc/header.php';

// Kiểm tra nút submit đã được nhấn chưa
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['pass_1']);
    $newPass = md5($_POST['pass_2']);
    $confirmPass = md5($_POST['pass_confirm']);

    // Kiểm tra xem email và mật khẩu cũ có khớp không
    $sql = mysqli_query($conn, "SELECT * FROM `customers` WHERE email = '$email' AND password = '$pass'");
    $check = mysqli_num_rows($sql);

    if ($check) {
        // Kiểm tra xác nhận mật khẩu mới
        if ($newPass == $confirmPass) {
            // Thực hiện cập nhật mật khẩu trong cơ sở dữ liệu
            $update = mysqli_query($conn, "UPDATE `customers` SET `password`='$newPass' WHERE email = '$email'");

            if ($update) {
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Successful change!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location='index.php';
                        });
                      </script>";
            } else {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Change failed!',
                            text: 'Error updating password.',
                            confirmButtonColor: '#000000',
                            cancelButtonColor: '#000000',
                            customClass: {
                                confirmButton: 'white-text',
                                cancelButton: 'white-text'
                            }
                        });
                      </script>";
            }
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Change failed!',
                        text: 'New password and password confirmation mismatch!',
                        confirmButtonColor: '#000000',
                        cancelButtonColor: '#000000',
                        customClass: {
                            confirmButton: 'white-text',
                            cancelButton: 'white-text'
                        }
                    });
                  </script>";
        }
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Change failed!',
                    text: 'Incorrect email and old password!',
                    confirmButtonColor: '#000000',
                    cancelButtonColor: '#000000',
                    customClass: {
                        confirmButton: 'white-text',
                        cancelButton: 'white-text'
                    }
                });
              </script>";
    }
}
?>

<link rel="stylesheet" href="css-user/changePass.css">

<?php require_once 'template/public/inc/header.php'?>

<body style="background-color: black;">
    <section id="advertisement" style="background-color: black;">
        <div class="container">
        </div>
    </section>
    <div class="div-no-login">
        <div class="div-anh col-sm-6">
            <img src="template/img-index/Nike-checkout.jpg" alt="" class="anh-login">
        </div>
        <div class="div-login col-sm-6">
            <div class="div-login-con">
                <form method="POST">
                    <h1>Change your password</h1>
                    <input type="text" name="email" placeholder="Email" class="text input-signup-username" required> <br>
                    <input type="password" placeholder="Old Password" name="pass_1" class="text input-signup-password" required><br>
                    <input type="password" placeholder="New password" name="pass_2" class="text input-signup-confirm-password" required> <br>
                    <input type="password" placeholder="Confirm new password" name="pass_confirm" class="text input-signup-confirm-password" required> <br>
                    <input type="submit" name="submit" class="btnsignup signup__signInButton" value="Update">
                </form>
            </div>
        </div>
    </div>
</body>
