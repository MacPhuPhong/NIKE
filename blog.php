<?php $page = 'BLOG'; ?>
<link rel="stylesheet" href="css-user/blog.css">
<script src="https://unpkg.com/scrollreveal"></script>
<?php $page = 'BLOG'; ?>
<?php require_once 'template/public/inc/header.php'?>
<style>
  body {
    overflow-x: hidden;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    background-color: black;
    color: white;
  }

  .btn.btn-primary {
    color: white;
    border: 2px solid white;
    border-radius: 20px;
    background: black;
    margin-top: 16px;
  }

  .btn.btn-primary:hover {
    background-color: white;
    color: black;
  }

  .trong {
    height: 70px;
    width: 100%;
    background-color: black;
  }

  .slogan h1 {
    font-size: 500%;
  }
</style>
<section>
  <div class="trong"></div>
  <div class="Noi-bat">
    <video autoplay loop muted src="template/video/NewVideo.mp4" class="video-behind"></video>
    <div class="slogan">
      <div>
        <h1 class="h1"><i>NIKE <br> WITH <br> YOU <br> TO <br> CONQUER <br> THE <br> PITCH! </i></h1>
      </div>
    </div>
  </div>
  <div class="bai1" id="bai1">
    <img src="template/public/images/blog/img-news-1.png" alt="" class="anh1">
    <?php
    $qr = mysqli_query($conn, "SELECT * FROM blog ORDER BY id_blog DESC LIMIT 1");
    while ($row_blog = mysqli_fetch_assoc($qr)) {
        $id = $row_blog['id_blog'];
        $name = $row_blog['title'];
        $replaceName = utf8ToLatin($name);
        $url = $replaceName . '-' . $id . '.html';
        ?>
    <div class="single-blog-post">
      <h3><?php echo $row_blog['title'] ?></h3>
      <div class="post-meta">
        <ul>
          <li><i class="fa fa-calendar"></i> <?php echo $row_blog['created_at'] ?></li>
        </ul>
      </div>
      <p>
        <?php 
    $preview_text = $row_blog['preview_text'];
    $maxLength = 100; // Số ký tự tối đa bạn muốn hiển thị
    if (strlen($preview_text) > $maxLength) {
        $preview_text = substr($preview_text, 0, $maxLength);
        $lastSpace = strrpos($preview_text, ' '); // Tìm vị trí của khoảng trắng cuối cùng
        $preview_text = substr($preview_text, 0, $lastSpace); // Cắt đến khoảng trắng cuối cùng
        $preview_text .= '...'; // Thêm dấu ba chấm để biểu thị đoạn văn bản đã cắt
    }
    echo $preview_text;
    ?>
      </p>
      <a class="btn btn-primary" href="<?php echo $url ?>">Details</a>
    </div>
    <?php
    }
    ?>
  </div>
  <div class="bai2">
    <img src="template/public/images/blog/img-news-2.png" alt="" class="anh2">
    <?php
    $qr = mysqli_query($conn, "SELECT * FROM blog ORDER BY id_blog DESC LIMIT 1 OFFSET 1");
    while ($row_blog = mysqli_fetch_assoc($qr)) {
        $id = $row_blog['id_blog'];
        $name = $row_blog['title'];
        $replaceName = utf8ToLatin($name);
        $url = $replaceName . '-' . $id . '.html';
        ?>
    <div class="single-blog-post">
      <h3><?php echo $row_blog['title'] ?></h3>
      <div class="post-meta">
        <ul>
          <li><i class="fa fa-calendar"></i><?php echo $row_blog['created_at'] ?></li>
        </ul>
      </div>
      <p>
        <?php 
    $preview_text = $row_blog['preview_text'];
    $maxLength = 100; // Số ký tự tối đa bạn muốn hiển thị
    if (strlen($preview_text) > $maxLength) {
        $preview_text = substr($preview_text, 0, $maxLength);
        $lastSpace = strrpos($preview_text, ' '); // Tìm vị trí của khoảng trắng cuối cùng
        $preview_text = substr($preview_text, 0, $lastSpace); // Cắt đến khoảng trắng cuối cùng
        $preview_text .= '...'; // Thêm dấu ba chấm để biểu thị đoạn văn bản đã cắt
    }
    echo $preview_text;
    ?>
      </p>

      <a class="btn btn-primary" href="<?php echo $url ?>">Details</a>
    </div>
    <?php
    }
    ?>
  </div>
  <div class="bai1">
    <img src="template/public/images/blog/img-news-3.png" alt="" class="anh3">
    <?php
    $qr = mysqli_query($conn, "SELECT * FROM blog ORDER BY id_blog DESC LIMIT 1 OFFSET 2");
    while ($row_blog = mysqli_fetch_assoc($qr)) {
        $id = $row_blog['id_blog'];
        $name = $row_blog['title'];
        $replaceName = utf8ToLatin($name);
        $url = $replaceName . '-' . $id . '.html';
        ?>
    <div class="single-blog-post">
      <h3><?php echo $row_blog['title'] ?></h3>
      <div class="post-meta">
        <ul>
          <li><i class="fa fa-calendar"></i><?php echo $row_blog['created_at'] ?></li>
        </ul>
      </div>
      <p>
        <?php 
    $preview_text = $row_blog['preview_text'];
    $maxLength = 100; // Số ký tự tối đa bạn muốn hiển thị
    if (strlen($preview_text) > $maxLength) {
        $preview_text = substr($preview_text, 0, $maxLength);
        $lastSpace = strrpos($preview_text, ' '); // Tìm vị trí của khoảng trắng cuối cùng
        $preview_text = substr($preview_text, 0, $lastSpace); // Cắt đến khoảng trắng cuối cùng
        $preview_text .= '...'; // Thêm dấu ba chấm để biểu thị đoạn văn bản đã cắt
    }
    echo $preview_text;
    ?>
      </p>

      <a class="btn btn-primary" href="<?php echo $url ?>">Details</a>
    </div>
    <?php
    }
    ?>
  </div>
  <div class="bai4">
    <img src="template/public/images/blog/img-news-4.png" alt="" class="anh4">
    <?php
    $qr = mysqli_query($conn, "SELECT * FROM blog ORDER BY id_blog DESC LIMIT 1 OFFSET 3");
    while ($row_blog = mysqli_fetch_assoc($qr)) {
        $id = $row_blog['id_blog'];
        $name = $row_blog['title'];
        $replaceName = utf8ToLatin($name);
        $url = $replaceName . '-' . $id . '.html';
        ?>
    <div class="single-blog-post">
      <h3><?php echo $row_blog['title'] ?></h3>
      <div class="post-meta">
        <ul>
          <li><i class="fa fa-calendar"></i><?php echo $row_blog['created_at'] ?></li>
        </ul>
      </div>
      <p>
        <?php 
    $preview_text = $row_blog['preview_text'];
    $maxLength = 100; // Số ký tự tối đa bạn muốn hiển thị
    if (strlen($preview_text) > $maxLength) {
        $preview_text = substr($preview_text, 0, $maxLength);
        $lastSpace = strrpos($preview_text, ' '); // Tìm vị trí của khoảng trắng cuối cùng
        $preview_text = substr($preview_text, 0, $lastSpace); // Cắt đến khoảng trắng cuối cùng
        $preview_text .= '...'; // Thêm dấu ba chấm để biểu thị đoạn văn bản đã cắt
    }
    echo $preview_text;
    ?>
      </p>
      <a class="btn btn-primary" href="<?php echo $url ?>">Details</a>
    </div>
    <?php
    }
    ?>
  </div>
</section>
<script>
  ScrollReveal({
    reset: false,
    distance: '60px',
    duration: 2500,
    delay: 400
  });
  ScrollReveal().reveal('.social-links , .divsearch, .bai2 , .bai4', {
    delay: 300,
    origin: 'top'
  });
  ScrollReveal().reveal('.slogan , .bai1', {
    delay: 300,
    origin: 'left'
  });
</script>
<?php require_once 'template/public/inc/footer.php'?>