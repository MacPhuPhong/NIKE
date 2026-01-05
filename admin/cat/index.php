<?php $page = 'CAT' ?>
<?php require_once '../inc/header.php'; ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `cat_items`");
    $nume_row = mysqli_num_rows($sql);
    $nume_page = ceil($nume_row / 7);
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $offset = ($current_page - 1) * 7;
    $isAdmin = ($_SESSION['userAdmin']['level'] == 1);
    ?>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="margin-bottom:20px">
                    <?php if ($isAdmin) : ?>
                    <a href="admin/cat/add.php"><button class="btn btn-add">Thêm</button></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Tên Danh Mục</th>
                                <?php if ($isAdmin) : ?>
                                <th></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            $qr = mysqli_query($conn, "SELECT * FROM `cat_items` ORDER BY id_items DESC LIMIT $offset,7");
                            while ($row_cat = mysqli_fetch_assoc($qr)) {
                                $stt++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $stt; ?></th>
                                <td><?php echo $row_cat['name_item'] ?></td>
                                <?php if ($isAdmin) : ?> 
                                <td>
                                    <a href="admin/cat/edit.php?id_capnhat=<?php echo $row_cat['id_items'] ?>">
                                        <button class="btn btn-update">Cập Nhật</button>
                                    </a>
                                    <a href="admin/cat/del.php?id_xoa=<?php echo $row_cat['id_items'] ?>">
                                        <button class="btn btn-danger">Xóa</button>
                                    </a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <br>
            <br>
            <div class="col-sm-6" style="text-align: right;">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <?php
                            if ($current_page > 1) {
                                $previous = $current_page - 1;

                            ?>
                            <li class="page-item">
                                <a class="page-link" href="admin/cat?page=<?php echo $previous ?>"><i
                                        class="bi bi-chevron-left"></i></a>
                            </li>
                            <?php } ?>
                            <?php
                            for ($i = 1; $i <= $nume_page; $i++) {
                                $active = '';
                                if ($i == $current_page) {
                                    $active = 'active';
                                }
                            ?>
                            <li class="page-item <?php echo $active ?>">
                                <a class="page-link" href="admin/cat?page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($current_page < $nume_page) {
                                $next = $current_page + 1;

                            ?>
                            <li class="page-item">
                                <a class="page-link" href="admin/cat?page=<?php echo $next ?>"><i
                                        class="bi bi-chevron-right"></i></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>
<?php require_once '../inc/footer.php' ?>
<link rel="stylesheet" href="admin/cat/cat.css">