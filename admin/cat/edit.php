<?php $page = 'CAT' ?>
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
<link rel="stylesheet" href="admin/cat/cat.css">

<!-- MAIN CONTENT-->
<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <?php
                    $id = $_GET['id_capnhat'];
                    $qr3 = mysqli_query($conn,"SELECT * FROM `cat_items` WHERE id_items = $id");
                    $htCat = mysqli_fetch_assoc($qr3);
                    if (isset($_POST['submit'])) {
                        $cat_name = $_POST['cat_name'];
                        $item = $_POST['item'];
                        $qr = "UPDATE `cat_items` SET `name_item`='{$item}',`name_cat`='{$cat_name}' WHERE id_items = $id";
                        $result = mysqli_query($conn, $qr);
                        if ($result) {
                            echo '<script>window.location="admin/cat";</script>';
                        } else {
                            echo "Có Lỗi Khi Thêm";
                        }
                    }
                    ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <select name="cat_name" class="form-control">
                        <?php 
                          $qr2 = mysqli_query($conn,"SELECT * FROM cat");
                          while($cat = mysqli_fetch_assoc($qr2)) {  
                              if($htCat['name_cat'] == $cat['id_cat']) {                            
                        ?>
                              <option selected value="<?php echo $cat['id_cat']?>"><?php echo $cat['name_cat']?></option>
                              <?php 
                              } else {       
                              ?>
                               <option  value="<?php echo $cat['id_cat']?>"><?php echo $cat['name_cat']?></option>
                        <?php
                          }
                        }
                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Loại Sản Phẩm</label>
                            <input type="text" class="form-control" name="item" placeholder="Danh Mục" value="<?php echo $htCat['name_item']?>">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-update" value="Cập Nhật">
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