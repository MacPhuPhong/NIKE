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
<!DOCTYPE html>
<html lang="en">

<!-- rest of your code -->

<link rel="stylesheet" href="admin/products/products.css">
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <?php
                    if (isset($_POST['submit'])) {
                        $name_cat = $_POST['name_cat'];
                        $name_item = $_POST['name_item'];
                        $name_sp = $_POST['name_sp'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $detail = $_POST['detail'];
                        $hot = $_POST['hot'];
                        if (isset($_FILES['image'])) {
                            $filename = $_FILES['image']['name'];
                            $tmp_name = $_FILES['image']['tmp_name'];
                            $name_file = 'hinhanh-' . time() . $filename;
                            $path = '../upload/' . $name_file;
                            move_uploaded_file($tmp_name, $path);
                        }
                        if (isset($_FILES['images']['name'])) {
                            $files = $_FILES['images'];
                            $filenames = $_FILES['images']['name'];
                            foreach ($filenames as $key => $value) {
                                move_uploaded_file($files['tmp_name'][$key], '../upload/' . time() . $value);
                            }
                        }
                        $query = "INSERT INTO `products`(`id_cat`, `id_items`, `name_product`, `price`, `image`, `quantity`, `detail`,`hot_product`) VALUES ('$name_cat','$name_item','$name_sp','$price','$name_file','$qty','$detail','$hot')";
                        $result = mysqli_query($conn,$query);
                        $id_product = mysqli_insert_id($conn);
                        foreach($filenames as $key => $value) {
                            $name_files = time().$value;
                            mysqli_query($conn,"INSERT INTO img_products(id_sp,img) VALUES('$id_product','$name_files')");
                        }    
                        if($query) {
                            echo '<script>window.location="admin/products";</script>';
                        }           
                    }
                    ?>
                    <form  method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <select name="name_cat" id="" class="form-control">
                                <?php
                                $qr = mysqli_query($conn, "SELECT * FROM `cat`");
                                while ($row = mysqli_fetch_assoc($qr)) {
                                ?>
                                    <option value="<?php echo $row['id_cat'] ?>"><?php echo $row['name_cat'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Loại Sản Phẩm Danh Mục</label>
                            <select name="name_item" id="name_item" class="form-control">
                                <?php
                                $qr2 = mysqli_query($conn, "SELECT * FROM `cat_items`");
                                while ($row_item = mysqli_fetch_assoc($qr2)) {
                                ?>
                                    <option value="<?php echo $row_item['id_items'] ?>"><?php echo $row_item['name_item'] ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input type="text" name="name_sp" class="form-control" required placeholder="Sản Phẩm">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh sản phẩm</label>
                            <input type="file" name="image" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh mô tả</label>
                            <input type="file" name="images[]" required class="form-control" multiple>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="text" name="price" required class="form-control" placeholder="Giá">
                        </div>
                        <div class="form-group">
                            <label>Số Lượng</label>
                            <input type="text" name="qty" required class="form-control" placeholder="Số Lượng">
                        </div>
                        <div class="form-group">
                            <label>Mô Tả Sản Phẩm</label>
                            <textarea name="detail" id="" required cols="10" rows="4" class="ckeditor form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Sản Phẩm Hot</label>
                            <input type="number" value="1" name="hot">
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
</div>
<?php require_once '../inc/footer.php' ?>
<script src="admin/js-admin/products.js"></script>