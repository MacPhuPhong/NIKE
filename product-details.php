<?php require_once 'template/public/inc/header.php' ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="css-user/product-details.css">
<section id="advertisement">
	<div class="container">
	</div>
</section>
<section>
	<div class="container-sm">
		<div class="row">
			<?php require_once 'template/public/inc/left-sidebar.php' ?>
			<div class="col-sm-9 padding-right">
				<?php
				if (isset($_GET['id_sp'])) {
					$id_sp = $_GET['id_sp'];
				}
				$qr = mysqli_query($conn, "SELECT * FROM products WHERE id_sp = $id_sp");
				while ($arSP = mysqli_fetch_assoc($qr)) {
				?>
				<form action="cartxuly.php" method="GET">
					<div class="product-details">
						<!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<a href="admin/upload/<?php echo $arSP['image'] ?>"><img id="main-image"
										src="admin/upload/<?php echo $arSP['image'] ?>" alt="" /></a>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<!-- Wrapper for slides -->
								<div class="carousel-inner">
									<?php
										$qr4 = mysqli_query($conn, "SELECT * FROM img_products WHERE id_sp = $id_sp ORDER BY id DESC");
										$totalImages = mysqli_num_rows($qr4);
										$itemsPerSlide = 4;

										for ($i = 0; $i < $totalImages; $i += $itemsPerSlide) {
											echo '<div class="item ' . (($i === 0) ? 'active' : '') . '">';

											for ($j = 0; $j < $itemsPerSlide; $j++) {
												$row_img = mysqli_fetch_assoc($qr4);

												// Check if there are no more images, loop back to the beginning
												if (!$row_img) {
													// Reset the query pointer to the beginning
													mysqli_data_seek($qr4, 0);
													$row_img = mysqli_fetch_assoc($qr4);
												}

												echo '<a href="#" class="thumbnail-image" data-image-path="admin/upload/' . $row_img['img'] . '">';
												echo '<img src="admin/upload/' . $row_img['img'] . '" alt="" width="90px">';
												echo '</a>';
											}

											echo '</div>';
										}
										?>
								</div>
								<!-- Controls -->
								<a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information">
								<!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h1 class="h1-name"><?php echo $arSP['name_product'] ?></h1>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span><?php echo number_format($arSP['price']) ?> VND <br>
										Available size : 37-48 <br>
										Colour Shown : White/Black <br>
										Quantity in stock : <?php echo $arSP['quantity']; ?> <br><br>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-half"></i>
									</span>
								</span>
								<hr>
								<span class="quantity"><?php echo $arSP['detail'] ?></span>
								<hr>
								<span class="quantity">
									<span class="quantity-label">Quantity :</span>
									<div class="input-group">
										<button class="btn btn-outline-secondary quantity-btn" type="button"
											id="subtractQty">-</button>
										<input aria-label="quantity" class="form-control input-qty size" max="300"
											min="1" name="qty" type="text" value="1">
										<button class="btn btn-outline-secondary quantity-btn" type="button"
											id="addQty">+</button>
									</div>
								</span>
								<br>
								<input type="hidden" name="id" value="<?php echo $arSP['id_sp'] ?>">
								<span class="quantity">Choose size : </span>
								<input type="hidden" name="size" value="37">
								<div class="size-options">
									<button type="button" class="btn btn-outline-dark btn-size">37</button>
									<button type="button" class="btn btn-outline-dark btn-size">38</button>
									<button type="button" class="btn btn-outline-dark btn-size">39</button>
									<button type="button" class="btn btn-outline-dark btn-size">40</button>
									<button type="button" class="btn btn-outline-dark btn-size">41</button>
									<button type="button" class="btn btn-outline-dark btn-size">42</button>
									<button type="button" class="btn btn-outline-dark btn-size">43</button>
									<button type="button" class="btn btn-outline-dark btn-size">44</button>
									<button type="button" class="btn btn-outline-dark btn-size">45</button>
									<button type="button" class="btn btn-outline-dark btn-size">46</button>
								</div>
								<br>
								<br>
								<button type="submit" name="submit" class="btn btn-fefault cart add-to-cart"
									onclick="divFunction()">
									<i class="fa fa-shopping-cart"></i>Add to cart
								</button>
							</div>
							<!--/product-information-->
						</div>
					</div>
				</form>
				<?php
				}
				?>
				<?php
				if (isset($_SESSION['user'])) {
				?>
				<div class="container">
					<div class="col-md-6">
						<h2>Product Reviews</h2>
						<form action="javascript:void(0)" method="POST" id="form_cmt">
							<input type="hidden" id="id_sp" value="<?php echo $id_sp ?>">
							<div class="form-group">
								<textarea name="comment" id="comment" cols="30" rows="5" class="form-control" required
									placeholder="We need your comment."></textarea>
							</div>
							<input type="submit" id="submit_data" class="btn btn-send" name="submit" value="Send">
						</form>
						<h3>Latest Comments</h3>
						<div id="load_data">
							
						</div>
					</div>
				</div>
				<?php
				} else {
				?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					<strong>Please Login first to Comment :</strong> <a href="login.html">Login</a>
				</div>
				<?php } ?>
				<!--/product-details-->

				<div class="recommended_items">
					<h2 class="title text-center lien-quan">Products related</h2>

					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php
							$sql = mysqli_query($conn, "SELECT * FROM products WHERE id_items = {$_GET['cat_item']} LIMIT 9");
							$totalProducts = mysqli_num_rows($sql);
							$productsPerSlide = 3;

							for ($i = 0; $i < $totalProducts; $i += $productsPerSlide) {
								echo '<div class="item ' . (($i === 0) ? 'active' : '') . '">';

								for ($j = 0; $j < $productsPerSlide; $j++) {
									$row_lq = mysqli_fetch_assoc($sql);
									if (!$row_lq) {
										break;  // Break the inner loop if no more products
									}

									$nameReplace = utf8ToLatin($row_lq['name_product']);
									$url = $nameReplace . '-' . $row_lq['id_items'] . '-' . 'sp' . '-' . $row_lq['id_sp'] . '.html';

									echo '<div class="col-sm-4">';
									echo '<div class="product-image-wrapper">';
									echo '<div class="single-products">';
									echo '<div class="productinfo text-center">';
									echo '<a href="' . $url . '"><img src="admin/upload/' . $row_lq['image'] . '" alt="" /></a>';
									echo '<h3>' . number_format($row_lq['price']) . '</h3>';
									echo '<p>' . $row_lq['name_product'] . '</p>';
									echo '<a href="cartxuly.php?id=' . $row_lq['id_sp'] . '"><button type="button" class="btn btn-default add-to-cart" onclick="divFunction()">';
									echo '<i class="fa fa-shopping-cart"></i>Add to cart</button></a>';
									echo '</div></div></div></div>';
								}

								echo '</div>';
							}
							?>
						</div>
						<!-- Controls -->
						<a class="left item-control" href="#recommended-item-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right item-control" href="#recommended-item-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js-user/product-details.js"></script>
<?php require_once 'template/public/inc/footer.php' ?>