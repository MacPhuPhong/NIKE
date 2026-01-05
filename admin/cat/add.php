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
                    if (isset($_POST['submit'])) {
                        $cat_name = $_POST['cat_name'];
                        $item = $_POST['item'];
                        $item2 = $_POST['item2'];
                        $id_parent = $_POST['id_parent'];
                        if($id_parent) {
                            $qr3 = mysqli_query($conn, "INSERT INTO `cat_items`(`name_item`, `name_cat`, `id_parent`) VALUES ('$item2','$cat_name','$id_parent')");
                        } else {
                            $qr3 = mysqli_query($conn, "INSERT INTO `cat_items`(`name_item`, `name_cat`) VALUES ('$item','$cat_name')");
                        }
                       
                        if($qr3) {
                            echo '<script>window.location="admin/cat";</script>';
                        }
                    }
                    ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Tên Danh Mục Cha</label>
                            <select name="cat_name" class="form-control">
                                <?php
                                $qr2 = mysqli_query($conn, "SELECT *FROM cat");
                                while ($row_cat = mysqli_fetch_assoc($qr2)) {
                                ?>
                                    <option value="<?php echo $row_cat['id_cat'] ?>"><?php echo $row_cat['name_cat'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Danh mục 1</label>
                            <select name="id_parent" class="form-control">
                                <?php
                                $qr1 = mysqli_query($conn, "SELECT * FROM `cat_items`");
                                while ($row_cat_items = mysqli_fetch_assoc($qr1)) {
                                ?>
                                    <option value="<?php echo $row_cat_items['id_items'] ?>"><?php echo $row_cat_items['name_item'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Danh Mục 2</label>
                            <input type="text" class="form-control" name="item2">
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