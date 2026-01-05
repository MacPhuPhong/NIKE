<?php $page = 'PRODUCTS' ?>
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
<link rel="stylesheet" href="admin/products/products.css">
<!-- MAIN CONTENT-->
<div class="main-content">

    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <?php
                    $id_capnhat = $_GET['id_capnhat'];
                    $qr3 = mysqli_query($conn, "SELECT* FROM products WHERE id_sp = $id_capnhat");
                    $row_sp = mysqli_fetch_assoc($qr3);
                    if (isset($_POST['submit'])) {
                        $cName = $_POST['name_cat'];
                        $iName = $_POST['name_item'];
                        $sName = $_POST['name_sp'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $detail = $_POST['detail'];
                        $hotProduct = $_POST['hot_product'];
                        if ($_FILES['image']['name']) {
                            $filename = $_FILES['image']['name'];
                            $tmp_name = $_FILES['image']['tmp_name'];
                            $name_file = 'hinhanh-' . time() . $filename;
                            $path = '../upload/' . $name_file;
                           
                        }                                      
                        if(!$name_file) {
                            $sql = "UPDATE products SET id_cat = '$cName', id_items = '$iName',name_product = '$sName',price = '$price',quantity = '$qty',detail = '$detail', hot_product = '$hotProduct' WHERE id_sp = $id_capnhat";
                        } else {
                            move_uploaded_file($tmp_name,$path);
                            $sql = "UPDATE products SET id_cat = '$cName', id_items = '$iName',name_product = '$sName',price = '$price',image = '$name_file',quantity = '$qty',detail = '$detail', hot_product = '$hotProduct' WHERE id_sp = $id_capnhat";
                        }    
                        if (isset($_FILES['images']['name'])) {
                            $files = $_FILES['images'];
                            $filenames = $_FILES['images']['name'];
                          
                        }  
                        foreach ($filenames as $key => $value) {
                            $name_files = time().$value;
                            move_uploaded_file($files['tmp_name'][$key], '../upload/' .$name_files);
                            mysqli_query($conn,"INSERT INTO img_products (id_sp,img) VALUES ('$id_capnhat','$name_files')");
                        }           
                        mysqli_query($conn, $sql);                   
                        if (mysqli_query($conn, $sql)) {
                            echo '<script>window.location="admin/products";</script>';
                        }
                    }
                    ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <select name="name_cat" id="" class="form-control">
                                <?php
                                $qr = mysqli_query($conn, "SELECT * FROM `cat`");
                                while ($row = mysqli_fetch_assoc($qr)) {
                                    if ($row_sp['id_cat'] == $row['id_cat']) {
                                ?>
                                <option selected value="<?php echo $row['id_cat'] ?>"><?php echo $row['name_cat'] ?>
                                </option>
                                <?php
                                    } else {
                                    ?>
                                <option value="<?php echo $row['id_cat'] ?>"><?php echo $row['name_cat'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Loại Sản Phẩm Danh Mục</label>
                            <select name="name_item" id="" class="form-control">
                                <?php
                                $qr2 = mysqli_query($conn, "SELECT * FROM `cat_items`");
                                while ($row_item = mysqli_fetch_assoc($qr2)) {
                                    if ($row_sp['id_items'] == $row_item['id_items']) {                                      
                                ?>
                                <option selected value="<?php echo $row_item['id_items'] ?>">
                                    <?php echo $row_item['name_item'] ?></option>
                                <?php
                                    } else {
                                    ?>
                                <option value="<?php echo $row_item['id_items'] ?>"><?php echo $row_item['name_item'] ?>
                                </option>
                                <?php
                                    }
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input type="text" name="name_sp" class="form-control"
                                value="<?php echo $row_sp['name_product'] ?>" placeholder="Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh sản phẩm</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh mô tả</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="text" name="price" class="form-control" placeholder="Giá"
                                value="<?php echo $row_sp['price'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Số Lượng</label>
                            <input type="text" name="qty" class="form-control" placeholder="Số Lượng"
                                value="<?php echo $row_sp['quantity'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mô Tả Sản Phẩm</label>
                            <textarea name="detail" cols="10" rows="4"
                                class="ckeditor form-control"><?php echo $row_sp['detail'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-add" value="Cập Nhật">
                        </div>
                        <div class="form-group">
                            <label>Hot Product</label>
                            <select name="hot_product" class="form-control">
                                <option value="1" <?php echo ($row_sp['hot_product'] == 1) ? 'selected' : ''; ?>>No
                                </option>
                                <option value="2" <?php echo ($row_sp['hot_product'] == 2) ? 'selected' : ''; ?>>Yes
                                </option>
                            </select>
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
<script src="admin/js-admin/products.js"></script>