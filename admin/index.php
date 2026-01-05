<?php session_start();
require_once '../db/dbConnect.php';
?>
<link rel="stylesheet" href="index.css">
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Login</title>
  <base href="http://localhost/eshopper/">
  <!-- Fontfaces CSS-->
  <link href="template/admin/css/font-face.css" rel="stylesheet" media="all">
  <link href="template/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="template/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="template/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="template/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="template/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="template/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet"
    media="all">
  <link href="template/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="template/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="template/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="template/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="template/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
  <link rel="icon" href="https://4.bp.blogspot.com/-BGYw9I05BVk/TiRdC7c0NzI/AAAAAAAAAiQ/1ebLElEEGCc/s1600/Nike_logo.jpg"
    type="image/x-icon">
  <!-- Main CSS-->
  <link href="template/admin/css/theme.css" rel="stylesheet" media="all">
  <link rel="stylesheet" href="css-user/login.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  
</head>

<body class="animsition">
  <section>
    <?php 
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn,$query);
            $infoUser = mysqli_fetch_assoc($result);
            if($infoUser){
                $_SESSION['userAdmin'] = $infoUser; 
                // header("LOCATION: dashboad/");
                echo '<script>
            Swal.fire({
                icon: "success",
                text: "Đăng Nhập Thành Công",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
              window.location.href = "http://localhost/eshopper/admin/dashboad/";
            });
        </script>';
            }else{
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        text: 'Tài Khoản Hoặc Mật Khẩu Sai!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            }
        }
        ?>
    <form action="" method="post">
      <h3>Welcome to Admin NIKE</h3>
      <label for="">Email</label><br>
      <input class="text input-login-username" type="text" name="email" required placeholder="Email"> <br>
      <label for="">Password</label><br>
      <input class="text input-login-password" type="password" name="password" required placeholder="Password"><br>
      <button class="btnsignin login__signInButton" type="submit" name="submit">Đăng Nhập</button>
    </form>
  </section>
  <!-- Jquery JS-->
  <script src="template/admin/vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="template/admin/vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="template/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS -->
  <script src="template/admin/vendor/slick/slick.min.js"></script>
  <script src="template/admin/vendor/wow/wow.min.js"></script>
  <script src="template/admin/vendor/animsition/animsition.min.js"></script>
  <script src="template/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <script src="template/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="template/admin/vendor/counter-up/jquery.counterup.min.js"></script>
  <script src="template/admin/vendor/circle-progress/circle-progress.min.js"></script>
  <script src="template/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="template/admin/vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="template/admin/vendor/select2/select2.min.js"></script>
  <!-- Main JS-->
  <script src="template/admin/js/main.js"></script>
</body>

</html>
<!-- end document-->