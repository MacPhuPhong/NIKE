<?php $page = 'HOME'; ?>
<?php require_once 'template/public/inc/header-index.php'?>
<link rel="stylesheet" href="css-user/index.css">
<script src="js-user/index.js" defer></script>
<script src="https://unpkg.com/scrollreveal"></script>
<div class="article">
    <div class="trangchu">
      <video autoplay loop muted src="template/video/Quangcao.mp4" class="video-behind"></video>
      <div class="tongchu">
        <div class="Title-trangchu">
          <h1><i>NIKE</i></h1>
          <ul class="slogan">
            <li><b>YOUR <span class="shoes">SHOES</span></b></li>
            <li class="gach"><b>-</b></li>
            <li><b>YOUR <span class="shoes">STYLE</span></b></li>
          </ul>
          <span>Code with the homies</span>
          <div class="btn-trangchu"><a href="shop.php">SHOP NOW</a></div>
        </div>
      </div>
    </div>
    <div class="Noi-bat">
      <div class="Tieu-de-noi-bat">
        <span>Outstanding</span>
      </div>
      <div class="the">
        <div class="the1">
          <h2>Nike Go Flyease</h2> <br>
          <p>Ditch the laces and get outside. These kicks feature Nike's revolution FlyEase technology, making
            on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they're great for people
            with limited mobility-or anyone who wants a quicker way to get going.</p>
          <div class="btn-noibat"><a href="shop.php">Shop now</a></div>
        </div>
        <div class="thevideo">
          <video autoplay loop muted src="template/video/videonike.mp4 " class="video-noibat" loop>
          </video>
        </div>
        <div class="the2">
          <a href="http://localhost/eshopper/men-sn-1-1-sp-225.html"><img src="template/img-index/img-noibat.png" alt="" class="img-noibat"></a>
        </div>
      </div>
    </div>
    <div class="slider">
      <div class="Tieu-de-slider">
        <a href="shop.php"><span>Just from 50$</span></a>
      </div>
      <div class="wrapper">
        <!-- <i  class="fa-solid fa-angle-left"></i> -->
        <i class="bi bi-chevron-left" id="left"></i>
        <a href="shop.php">
          <div class="carousel">
            <img src="template/img-index/img-slide-1.jpg" alt="img" draggable="false">
            <img src="template/img-index/img-slide-2.jpg" alt="img" draggable="false">
            <img src="template/img-index/img-slide-3.jpg" alt="img" draggable="false">
            <img src="template/img-index/img-slide-4.jpg" alt="img" draggable="false">
            <img src="template/img-index/img-slide-5.jpg" alt="img" draggable="false">
            <img src="template/img-index/img-slide-6.jpg" alt="img" draggable="false">
            <img src="template/img-index/img-slide-7.jpg" alt="img" draggable="false">
            <img src="template/img-index/img-slide-8.jpg" alt="img" draggable="false">
            <img src="template/img-index/img-slide-9.jpg" alt="img" draggable="false">
            <img src="template/img-index/img-slide-10.jpg" alt="img" draggable="false">
          </div>
        </a>
        <i id="right" class="bi bi-chevron-right"></i>
      </div>
    </div>
    <div class="tonggioitinh">
      <div class="Tieu-de-gioi-tinh">
        <span>Accompa to you</span>
      </div>
      <div class="gioitinh">
        <div class="men">
          <a href="http://localhost/eshopper/sneakers-1-1.html">
            <img src="template/img-index/img-gioitinh-1.png" alt="" class="anhgioitinh">
            <h3 class="h3gioitinh">Men</h3>
          </a>
        </div>
        <div class="women">
          <a href="http://localhost/eshopper/sneakers-2-5.html">
            <img src="template/img-index/img-gioitinh-2.png" alt="" class="anhgioitinh">
            <h3 class="h3gioitinh">Women</h3>
          </a>
        </div>
        <div class="kid">
          <a href="http://localhost/eshopper/sneakers-3-10.html">
            <img src="template/img-index/img-gioitinh-3.png" alt="" class="anhgioitinh">
            <h3 class="h3gioitinh">Kids</h3>
          </a>
        </div>
      </div>
    </div>
    <div class="tongthethao">
      <div class="Tieu-de-the-thao">
        <a href="http://localhost/eshopper/football-1-2.html"><span>Shop by Sports</span></a>
      </div>
      <div class="thethao">
        <div class="bongda">
          <a href="http://localhost/eshopper/football-1-2.html">Football</a>
        </div>
        <div class="bongro">
          <a href="http://localhost/eshopper/basketball-1-3.html">Basketball</a>
        </div>
        <div class="training">
          <a href="http://localhost/eshopper/trainning-1-4.html">Training</a>
        </div>
      </div>
    </div>
    <div class="signup">
      <h1>BECOME A MEMBER & GET 20% OFF</h1>
      <div class="btnsignup"><a href="Signup.php">SIGN UP</a></div>
    </div>
  </div>
<script type="text/javascript">
    function divFunction() {
          alert('Thêm giỏ hàng thành công !');
	}  
</script>
<script>
    ScrollReveal({
      reset: false,
      distance: '60px',
      duration: 2500,
      delay: 400
    });
    ScrollReveal().reveal('.Title-trangchu ,.btnsignup,.img-noibat', {
      delay: 300
    });
    ScrollReveal().reveal('.social-links , .divsearch ,.btn-noibat,.the1 p', {
      delay: 300,
      origin: 'top'
    });
    ScrollReveal().reveal(
      '.men ,.women ,.kid , .bongda , .bongro , .training, .the , .wrapper,.signup h1', {
        delay: 300,
        origin: 'left'
      });
  </script>
<?php require_once 'template/public/inc/footer.php' ?>