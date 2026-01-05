<?php require_once 'template/public/inc/header.php';
$user = (isset($_SESSION['user']) ? $_SESSION['user'] : []);
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<section id="cart_items" class="ctn">
	<?php if (isset($_SESSION['user'])) { ?>
	<div class="container-sm">
		<?php
        if (isset($_POST['name'])) {

            if (empty($cart)) {
                echo '<div class="alert alert-danger">
                        <strong>No products to pay for!</strong>
                     </div>';
            } else {
                $idKH = $user['id_customer'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $payment = $_POST['payment'];
                $qr = "INSERT INTO `order`(id_customer,address,phone,payment) VALUES ('$idKH','$address','$phone','$payment')";
                $result = mysqli_query($conn, $qr);

                if ($result) {
                    $id_order = mysqli_insert_id($conn);
                    foreach ($cart as $value) {
                        $qr2 = "INSERT INTO `order_detail`(id_order, id_sp, qty, price, image, size) VALUES ('$id_order', '$value[id_sp]', '$value[qty]', '$value[price]', '$value[image]', '$value[size]')";
                        $result = mysqli_query($conn, $qr2);
                    }
					$qr3 = "DELETE FROM `cart` WHERE `id_customer`='$idKH'";
					$result = mysqli_query($conn, $qr3);
					
					require_once 'sendmail.php';
            		$orderDate = date("Y-m-d H:i:s");
    				sendEmail($user, $cart, $address, $phone, $id_order, $orderDate);
                    echo '<script>
            			Swal.fire({
                		title: "Thank you for your purchase!",
                		imageUrl: "https://images.squarespace-cdn.com/content/v1/54a2257ae4b004237f8db615/1597674536317-U3EKJF3J0MS6IS8KWSQP/Nike-Presentation29.jpg",
		                imageWidth: 400,
        		        imageHeight: 200,
            		    imageAlt: "Custom image",
                		showClass: {
                    		popup: "animate__animated animate__fadeInDown"
                		},
                		hideClass: {
                	    	popup: "animate__animated animate__fadeOutUp"
                		},
                		confirmButtonColor: "#000000",
                		cancelButtonColor: "#000000",
                		customClass: {
                		    title: "black-title"
                		},
            			}).then((result) => {
                		if (result.isConfirmed || result.isDismissed) {
                    		window.location.href = "orders.php";
                		}
            		});
        			</script>';
					$orderDetails = "Product: {$idKH}, Quantity: {$address}, Price: {$phone}, Total: {$payment}";
                   
                }
            }
        }
        ?>
		<form action="" method="POST" style="padding: 0px 20px;">
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Information customer</p>
							<form>
								<div class="form-group">
									<input type="text" placeholder="Your Name" name="name" readonly class="form-control"
										value="<?php echo $user['fname'] ?>" required>
								</div>
								<div class="form-group">
									<input type="text" placeholder="Your Email" name="email" readonly
										class="form-control" value="<?php echo $user['email'] ?>" required>
								</div>
								<div class="form-group">
									<input type="text" placeholder="Your address" name="address" class="form-control"
										required>
								</div>
								<div class="form-group">
									<input type="text" placeholder="Your Phone number" name="phone" class="form-control"
										value="<?php echo $user['phone_number'] ?>" required>
								</div>
								<div class="form-group">
									<select name="payment" id="">
										<option value="1">Direct payment(shipcod)</option>
										<option value="2">Pay by PayPal</option>
									</select>
								</div>
							</form>
							<div id="paypal-payment-button"></div>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="table-responsive cart_info">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col"></th>
										<th scope="col">Product</th>
										<th scope="col">Name</th>
										<th scope="col">Price</th>
										<th scope="col">Quantity</th>
										<th scope="col">Size</th>
										<th scope="col">Into money</th>
									</tr>
								</thead>
								<tbody>
									<?php
        								$i = 0;
        								$tolal_price = 0;
        								if (empty($cart)) {
            								echo '<tr class="no-products"><td colspan="7" class="text-center">- No products to pay for.<a href="shop.php"> Start shopping now ! -</a></td></tr>';
        								} else {
            								foreach ($cart as $key => $value) {
                								$tolal_price += ($value['price'] * $value['qty']);
                								$i++;
                					?>
									<tr>
										<td><?php echo $i ?></td>
										<td><img src="admin/upload/<?php echo $value['image'] ?>" alt="" width="100px">
										</td>
										<td><?php echo $value['name_product'] ?></td>
										<td><?php echo number_format($value['price']) . ' VND' ?></td>
										<td><?php echo $value['qty'] ?></td>
										<td><?php echo $value['size'] ?></td>
										<td><?php $tolal = ($value['price'] * $value['qty']); echo number_format($tolal) . " VND"; ?>
										</td>
									</tr>
									<?php
            							}
        								}
        							?>
								</tbody>
							</table>
						</div>


						<div class="row">
							<div class="col-md-4">
								<form action="" method="POST">
									<div class="form-group">
										<label for="">Discount code</label>
										<input type="text" name="discount" class="form-control">
									</div>
									<button type="submit" class="btn btn-info btn-apply-discount">Apply
										Discount</button>
								</form>
							</div>
						</div>
						<br>
						<div class="col-md-12"
							style="display: flex; justify-content: space-between;border-top: 2px solid black;padding-top: 10px;">
							<p style="color: red;">Total payment:</p>
							<?php
        						if (isset($_POST['discount'])) {
            						$_SESSION['discount'] = $_POST['discount'];
            				?>
							<p class="text-center bg-info">
								<?php echo number_format($tolal_price * 0.7) ?> VND</p>
							<?php
        					} else {
            				?>
							<p class="text-center bg-info">
								<?php echo number_format($tolal_price) ?> VND</p>
								<?php
							}
        					?>
							<button id="paymentButton" class="btn btn-info btn-payment">Payment</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php
    } else {
    ?>
	<div class="div-no-login">
		<div class="div-anh col-sm-6">
			<img src="template/img-index/Nike-checkout.jpg" alt="" class="anh-login">
		</div>
		<div class="div-login col-sm-6">
			<div class="div-login-con">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<h1>Sorry but you still haven't signed in to your account.</h1>
				<strong>Please Log-in to Purchase :</strong> <a href="login.php?action=checkout">Log-in</a> <br>
				<strong>If you do not have an account - Register now :</strong>
				<a href="signup.php?action=checkout">Sign-up</a>
			</div>
		</div>
	</div>
	<?php
    }
    ?>
</section>

<?php require_once 'template/public/inc/footer.php' ?>
<link rel="stylesheet" href="css-user/checkout.css">
<script
	src="https://www.paypal.com/sdk/js?client-id=AQRrtoQ42LODRDjgK3hmXId--PrY1g4lK7nNXmY02BWK9tm68vvfBtCCF7rAH7bUFjavbPIsiTImC5V6&disable-funding=credit,card">
</script>
<script src="template/public/js/payment.js"></script>