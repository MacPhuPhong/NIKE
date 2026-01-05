<?php $page = 'LOGIN'; ?>
<link rel="stylesheet" href="css-user/login.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<?php require_once 'template/public/inc/header.php'?>
<section id="advertisement" style="background-color: black;">
    <div class="container">
    </div>
</section>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/src/Exception.php';
require 'vendor/src/PHPMailer.php';
require 'vendor/src/SMTP.php';

// Function to generate a random 6-digit password
function generateRandomPassword() {
    return rand(100000, 999999);
}

// Function to update the password in the database with MD5 hash
function updatePassword($email, $newPassword) {
    // Assuming $conn is your database connection, replace it with your actual connection variable
    $conn = new mysqli("localhost", "root", "", "myshop");

    // Check connection
    $checkEmailQuery = "SELECT * FROM customers WHERE email = '$email'";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        // Hash the new password using MD5
        $hashedPassword = md5($newPassword);

        // Update password in the database
        $sql = "UPDATE customers SET password = '$hashedPassword' WHERE email = '$email'";
        $updateResult = $conn->query($sql);

        // Close the database connection
        $conn->close();

        return $updateResult;
    } else {
        // Close the database connection
        $conn->close();

        return false; // Email does not exist
    }
}


// Function to send email
function sendEmail($user, $newPassword) {
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nikevnjustdoit@gmail.com';
        $mail->Password   = 'pbvyfpipjcscuytx';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender and recipient configuration
        $mail->setFrom('nikevnjustdoit@gmail.com', 'NIKE VN - Just do it');
        $mail->addAddress($user['email'], $user['fname']);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'Your new password is: ' . $newPassword;

        // Send the email
        $mail->send();
        
        return true;
    } catch (\Exception $e) {
        return false;
    }
}


// ... (existing code)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    // Validate email and phone number
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>
                Swal.fire({
                  title: "Error",
                  text: "Invalid email format. Please enter a valid email address.",
                  icon: "error"
                });
              </script>';
    } elseif (!preg_match('/^[0-9]{10}$/', $phoneNumber)) {
        echo '<script>
                Swal.fire({
                  title: "Error",
                  text: "Invalid phone number format. Please enter a 10-digit phone number.",
                  icon: "error"
                });
              </script>';
    } else {
        // If email and phone number are valid, proceed with password reset logic

        $newPassword = generateRandomPassword();

        // Update the password in the database
        $updateResult = updatePassword($email, $newPassword);

        if ($updateResult) {
            // Send the new password to the user's email
            $sendEmailResult = sendEmail(['email' => $email, 'fname' => ''], $newPassword);

            if ($sendEmailResult) {
                echo '<script>
                Swal.fire({
                    title: "Password Reset Successful",
                    text: "Check your email for the new password.",
                    icon: "success"
                }).then(() => {
                    window.location.href = "login.php"; // Chuyển hướng đến trang login.php
                });
                </script>';

            } else {
                echo '<script>
                        Swal.fire({
                          title: "Error",
                          text: "Error sending email. Please try again later.",
                          icon: "error"
                        });
                      </script>';
            }
        } else {
            echo '<script>
                    Swal.fire({
                      title: "Error",
                      text: "Error updating password. Please try again later.",
                      icon: "error"
                    });
                  </script>';
        }
    }
}
?>




<div class="div-no-login">
    <div class="div-anh col-sm-6">
        <img src="template/img-index/Nike-checkout.jpg" alt="" class="anh-login">
    </div>
    <div class="div-login col-sm-6">
        <div class="div-login-con">
            <form method="POST">
                <h1>Forgot Password</h1>
                <input type="text" name="email" placeholder="Email" class="text input-login-username" required> <br>
                <input type="text" name="phoneNumber" placeholder="Your phone number"
                    class="text input-signup-confirm-password" required> <br>
                <a href="#" class="dieukhoan">You forgot the password</a> <br>
                <button class="btnsignin login__signInButton">SEND</button><br>
            </form>
        </div>
    </div>
</div>
<?php require_once 'template/public/inc/footer.php'?>