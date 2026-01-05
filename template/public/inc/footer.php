<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NIKE VN - Just do it</title>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="icon"
    href="https://substackcdn.com/image/fetch/f_auto,q_auto:good,fl_progressive:steep/https%3A%2F%2Fbucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com%2Fpublic%2Fimages%2F67979fc2-9bc6-4ef1-a91a-9f8129c57645_1500x1500.jpeg"
    type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="Trangchu.js" defer></script>
  <link rel="stylesheet" href="css-user/footer.css">

  <!-- <link rel="stylesheet" href="css-user/header.css"> -->
</head>
<?php
// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['user'])) {
    $isLoggedIn = true;
    $userId = $_SESSION['user']['id_customer'];
} else {
    $isLoggedIn = false;
}
?>
<footer class="footer">
  <!--Footer-->
  <hr>
  <div class="container">
    <div class="row">
      <div class="footer-col">
        <h4>Founder</h4>
        <ul>
          <li><a href="#">Le Van Hoang</a></li>
          <li><a href="#">0935182753</a></li>
          <li><a href="#">hoanglv.22da@vku.udn.vn</a></li>
          <li><a href="#">1030393903-vcb</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Policy and management</h4>
        <ul>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Product copyright</a></li>
          <li><a href="#">Customer information</a></li>
          <li><a href="#">Charity fund</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>About us</h4>
        <ul>
          <li><a href="orders.html">Purchase history</a></li>
          <li><a href="contact.html">Contact us</a></li>
          <?php if (!$isLoggedIn) { ?>
            <li><a href="signup.php">Sign up</a></li>
          <?php } ?>

        </ul>
      </div>
      <div class="footer-col">
        <h4>Social</h4>
        <div class="social-links">
          <a href="https://www.facebook.com/profile.php?id=100054672975757"><i class="fab fa-facebook-f"></i></a>
          <a href="https://www.instagram.com/vhoangf.10/"><i class="fab fa-instagram"></i></a>
          <a href="##" class="qr-logo"><i class="bi bi-qr-code"></i></a> <img
            src="template/public/images/Qr/qr-vcb.jpg" class="qr-code">
        </div>
        <div class="divsearch">
          <input type="search" class="txtseach" placeholder="Search..."> <a href="#"><i class="bi bi-search"></i></a>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="footerend"><span>NIKE</span>Basic project website - For learning purposes only.</div>

</footer>
<script>
    ScrollReveal({
      reset: false,
      distance: '60px',
      duration: 2500,
      delay: 400
    });
    ScrollReveal().reveal('.footer ul li,.footerend,.social-links a', {
      delay: 300,
      origin: 'left'
    });
    ScrollReveal().reveal('.social-links a', {
      delay: 300,
      origin: 'top'
    });
    ScrollReveal().reveal('.divsearch input', {
      delay: 300,
      origin: 'right'
    });
  </script>
<!--/Footer-->

<script src="template/public/js/jquery.js"></script>
<script src="template/public/js/bootstrap.min.js"></script>
<script src="template/public/js/jquery.scrollUp.min.js"></script>
<script src="template/public/js/price-range.js"></script>
<script src="template/public/js/jquery.prettyPhoto.js"></script>
<script src="template/public/js/main.js"></script>
</body>

</html>