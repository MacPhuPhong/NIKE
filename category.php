<?php $page = 'CATEGORY'; ?>
<?php require_once 'template/public/inc/header.php' ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="css-user/shop.css">
<section id="advertisement">
	<div class="container">
	</div>
</section>
<section>
	<div class="container-sm">
		<?php
		$sql = mysqli_query($conn, "SELECT * FROM `products` WHERE id_items = {$_GET['id_item']}");
		$nume_row = mysqli_num_rows($sql);
		$nume_page = ceil($nume_row / 4);
		if (isset($_GET['page'])) {
			$current_page = $_GET['page'];
		} else {
			$current_page = 1;
		}
		$offset = ($current_page - 1) * 4;
		?>
		<div class="row">
			<?php require_once 'template/public/inc/left-sidebar.php' ?>
			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<?php
					$qr = mysqli_query($conn, "SELECT * FROM cat_items WHERE id_items = {$_GET['id_item']}");
					$row_cate = mysqli_fetch_assoc($qr);
					?>
					<h2 class="title text-left"><?php echo $row_cate['name_item'] ?></h2>
					<?php
					$qr2 = mysqli_query($conn, "SELECT * FROM products WHERE id_items = {$_GET['id_item']} AND id_cat = {$_GET['id_cat']} LIMIT $offset,12");
					while ($arProducts = mysqli_fetch_assoc($qr2)) {
						$id_Cat = $arProducts['id_cat'];
                        $id_Item = $arProducts['id_items'];
						$nameReplace = utf8ToLatin($arProducts['name_product']);
						$url = $nameReplace.'-'.$arProducts['id_items'].'-'.'sp'.'-'.$arProducts['id_sp'].'.html';
						
					?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-left">
									<a href="<?php echo $url ?>" class="product-link">
										<img src="admin/upload/<?php echo $arProducts['image'] ?>" alt="" />
										<div class="product-details animate__animated animate__fadeInUp col-sm-12">
											<div class="col-sm-6">
												<h5><?php echo $arProducts['name_product'] ?></h5>
												<h5><?php echo number_format($arProducts['price']) . "VND" ?></h5>
											</div>
											<div class="col-sm-6 text-right">
												<h3 class="logo-image">NIKE</h3>
											</div>
										</div>
									</a>
									<a href="cartxuly.php?&id=<?php echo $arProducts['id_sp'] ?> "
										onclick="divFunction()" class="btn btn-default add-to-cart">
										<i class="fa fa-shopping-cart"></i>Add to cart
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php
					}
					?>
				</div>

				<ul class="pagination">
					<?php
    if ($current_page > 1) {
        $previous = $current_page - 1;
        ?>
					<li class="page-item">
						<a class="page-link"
							href="category.php?id_cat=<?php echo $id_Cat ?>&id_item=<?php echo $id_Item ?>&page=<?php echo $previous ?>"><i
								class="bi bi-chevron-left"></i></a>
					</li>
					<?php } ?>
					<?php
    					$part = 1;
    					$begin = $current_page - $part;
    					if ($begin < 1) {
        					$begin = 1;
    					}
    					$end = $current_page + $part;
    					if ($end > $nume_page) {
        				$end = $nume_page;
    					}
    					for ($i = $begin; $i <= $end; $i++) {
        				$active = '';
        				if ($i == $current_page) {
            			$active = 'active';
        				}
        			?>
					<li class="page-item <?php echo $active ?>">
						<a class="page-link"
							href="category.php?id_cat=<?php echo $id_Cat ?>&id_item=<?php echo $id_Item ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
					</li>
					<?php
    				}
    				?>
					<?php
    					if ($current_page < $nume_page) {
        				$next = $current_page + 1;
        			?>
					<li class="page-item">
						<a class="page-link"
							href="category.php?id_cat=<?php echo $id_Cat ?>&id_item=<?php echo $id_Item ?>&page=<?php echo $next ?>"><i
								class="bi bi-chevron-right"></i>
						</a>
					</li>
					<?php } ?>
				</ul>

			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	function divFunction() {
		Swal.fire({
			icon: "success",
			title: "Added to cart.",
			showConfirmButton: false,
			timer: 1500,
		}).then((result) => {
			if (result.isConfirmed || result.isDismissed) {}
		});
	}
</script>
<?php require_once 'template/public/inc/footer.php' ?>