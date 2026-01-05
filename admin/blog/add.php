<?php $page = 'BLOG' ?>
<?php require_once '../inc/header.php'
?>
<?php
require_once '../../db/dbConnect.php';
require_once '../../db/checkLogin.php';

// Check if the user has the required level (1) to access this page
if ($_SESSION['userAdmin']['level'] != 1) {
    // Redirect or show an error message
    echo '<script>window.location.href = "admin/index.php";</script>';
    exit();
}
?>
<link rel="stylesheet" href="admin/blog/blog.css">

<!-- MAIN CONTENT-->
<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (isset($_POST['submit'])) {
                        $title = $_POST['title'];
                        $demo = $_POST['demo'];
                        $content = $_POST['content'];
                        $sql = mysqli_query($conn, "INSERT INTO blog (title,preview_text,content) VALUES ('$title','$demo','$content')");
                        if ($sql) {
                            echo '<script>window.location="admin/blog";</script>';
                        }
                    }
                    ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Tên Tiêu Đề</label>
                            <input type="text" class="form-control" name="title" placeholder="Tên Tiêu Đề" required>
                        </div>
                        <div class="form-group">
                            <label>Tóm Tắt</label>
                            <textarea name="demo" class="ckeditor form-control" cols="4" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea name="content" id="editor1" class="ckeditor form-control" cols="4"
                                rows="10"></textarea>
                            <script type="text/javascript">
                                CKEDITOR.replace('editor1', {
                                    filebrowserBrowseUrl: '/eshopper/lib/ckfinder/ckfinder.html',
                                    filebrowserUploadUrl: '/eshopper/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                    filebrowserWindowWidth: '1000',
                                    filebrowserWindowHeight: '700'
                                });
                            </script>
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