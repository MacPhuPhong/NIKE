<?php
session_start();
require_once 'db/dbConnect.php';

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['user'])) {
    header("Location: index.php"); // Chuyển hướng đến trang chủ nếu đã đăng nhập
    exit();
}

// Xử lý đăng nhập
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Cập nhật truy vấn để kiểm tra cả bảng customers và admins
    $query = "SELECT * FROM customers WHERE email = '$email' UNION SELECT * FROM admins WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Store the entire user object in the session
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        // Check password
        if (md5($password) == $user['password']) {
            $_SESSION['user'] = $user; // Store the full user object in the session
            header("Location: index.php"); // Redirect to the homepage after successful login
            exit();
        } else {
            $error = 'Sai mật khẩu!';
        }
    } else {
        $error = 'Tài khoản không tồn tại!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css-user/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Please login to your account</p>
        </div>
        <?php if ($error): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="POST" class="login-form">
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        <div class="login-footer">
            <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
            <p><a href="forgotpassword.php">Forgot your password?</a></p>
        </div>
    </div>
</body>
</html>