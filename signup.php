<link rel="stylesheet" href="css-user/signup.css">
<?php require_once 'template/public/inc/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<section id="advertisement" style="background-color: black;">
    <div class="container">
    </div>
</section>
<div class="div-no-login">
    <div class="div-anh col-sm-6">
        <img src="template/img-index/Nike-checkout.jpg"
            alt="" class="anh-login">
    </div>
    <div class="div-login col-sm-6">
        <div class="div-login-con">
            <form method="POST">
                <?php
        if(isset($_POST['submitDK'])) {
            $nameKH = $_POST['nameDK'];
            $emailKH = $_POST['emailDK'];
            $pass = md5($_POST['passDK']);
            $confirmPass = md5($_POST['confirmPassDK']);
            $phoneNumber = $_POST['phoneNumber'];

            // Check if the email already exists
            $checkEmailQuery = mysqli_query($conn, "SELECT * FROM `customers` WHERE `email`='$emailKH'");
            if(mysqli_num_rows($checkEmailQuery) > 0) {
                echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Signin failed',
                            text: 'Email already exists!',
                            confirmButtonColor: '#000000',
                            customClass: {
                                confirmButton: 'white-text'
                            },
                        });
                      </script>";
            } else {
                // Email is not registered, proceed with registration
                if($pass == $confirmPass) {
                    $sql = mysqli_query($conn, "INSERT INTO `customers`(`fname`, `email`, `phone_number`, `password`) VALUES ('$nameKH','$emailKH','$phoneNumber','$pass')");
                    if ($sql) {
                        echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Signed in successfully',
                                    showConfirmButton: false,
                                    timer: 1500,
                                }).then((result) => {
                                    if (result.isConfirmed || result.isDismissed) {
                                        setTimeout(() => {
                                            window.location.href = 'login.php'; // change the page after the modal is closed
                                        }, 0);
                                    }
                                });
                              </script>";
                    } else {
                        echo "<script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Signin failed',
                                    text: 'Database error. Please try again later.',
                                    confirmButtonColor: '#000000',
                                    customClass: {
                                        confirmButton: 'white-text',
                                    },
                                });
                              </script>";
                    }
                } else {
                    echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Signin failed',
                                text: 'Password incorrect!',
                                confirmButtonColor: '#000000',
                                customClass: {
                                    confirmButton: 'white-text',
                                },
                            });
                          </script>";
                }
            }
        }
        ?>
                <h1>Your account for US</h1>
                <input type="text" name="nameDK" class="text input-signup-username" placeholder="Your name" required />
                <input type="email" name="emailDK" placeholder="Email" class="text input-signup-username" required> <br>
                <input type="password" name="passDK" placeholder="Password" id="password"
                    class="text input-signup-password" required><br>
                <input type="password" name="confirmPassDK" placeholder="Confirm password" id="confirm_password"
                    class="text input-signup-confirm-password" required> <br>
                <input type="text" name="phoneNumber" placeholder="Your phone number" 
                    class="text input-signup-confirm-password" required> <br>
                <button type="submit" name="submitDK" class="btnsignup signup__signInButton">SIGN UP</button>
            </form>
        </div>
    </div>
</div>
<?php require_once 'template/public/inc/footer.php'; ?>
<script>
    ScrollReveal({
      reset: false,
      distance: '60px',
      duration: 2500,
      delay: 400
    });
    ScrollReveal().reveal('.social-links , .divsearch, form *', {
      delay: 300,
      origin: 'top'
    });
    ScrollReveal().reveal('.anh-login', {
      delay: 300,
      origin: 'left'
    });
  </script>