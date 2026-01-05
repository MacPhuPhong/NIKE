<?php $page = 'COMMENTS'?>
<?php require_once '../inc/header.php' ?>
<link rel="stylesheet" href="admin/comment/comment.css">
<!-- MAIN CONTENT-->
<div class="main-content">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `comment`");
    $nume_row = mysqli_num_rows($sql);
    $nume_page = ceil($nume_row / 5);
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $offset = ($current_page - 1) * 5;

    ?>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <?php
            if (isset($_GET['msg']) && $_GET['msg']) {
                $msg = $_GET['msg'];
                echo "<span style='color : green'>$msg</span>";
            }
            ?>
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Họ Và Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nội Dung</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $qr = mysqli_query($conn, "SELECT comment.*, customers.fname, customers.email FROM comment
                            INNER JOIN customers ON comment.id_customer = customers.id_customer
                            ORDER BY comment.id_cmt DESC LIMIT $offset, 5");
                            while ($arComment = mysqli_fetch_assoc($qr)) {
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $arComment['fname']; ?></td>
                                    <td><?php echo $arComment['email']; ?></td>
                                    <td><?php echo $arComment['comment']; ?></td>
                                    <td>
                                        <?php if ($_SESSION['userAdmin']['level'] == 1) { ?>
                                            <a href="admin/comment/del.php?id=<?php echo $arComment['id_cmt'] ?>"><button class="btn btn-danger">Xóa</button></a>
                                        <?php } ?>
                                    </td>
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
                                    <a class="page-link" href="admin/comment?page=<?php echo $previous ?>"><i class="bi bi-chevron-left"></i></a>
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
                                    <a class="page-link" href="admin/comment?page=<?php echo $i ?>"><?php echo $i ?></a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            if ($current_page < $nume_page) {
                                $next = $current_page + 1;
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="admin/comment?page=<?php echo $next ?>"><i class="bi bi-chevron-right"></i></a>
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
