<?php require_once 'db/dbConnect.php';
require_once 'db/utf8tolatintutil.php';
session_start();

$cart = [];
$totalQuantity = 0;

if (isset($_SESSION['user'])) {
    $id_customer = $_SESSION['user']['id_customer'];
    $getCartQuery = mysqli_query($conn, "SELECT * FROM cart WHERE id_customer = $id_customer");

    // Xử lý dữ liệu giỏ hàng
    while ($cartItem = mysqli_fetch_assoc($getCartQuery)) {
        $totalQuantity += $cartItem['qty'];
        $cart[] = $cartItem;
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<base href="http://localhost/eshopper/">
	<title>NIKE VN - Just do it</title>
	<link href="template/public/css/bootstrap.min.css" rel="stylesheet">
	<link href="template/public/css/font-awesome.min.css" rel="stylesheet">
	<link href="template/public/css/prettyPhoto.css" rel="stylesheet">
	<link href="template/public/css/price-range.css" rel="stylesheet">
	<link href="template/public/css/animate.css" rel="stylesheet">
	<link href="template/public/css/responsive.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="icon"
		href="https://4.bp.blogspot.com/-BGYw9I05BVk/TiRdC7c0NzI/AAAAAAAAAiQ/1ebLElEEGCc/s1600/Nike_logo.jpg"
		type="image/x-icon">
	<!-- <link rel="stylesheet" href="css-user/header.css"> -->
	<script src="https://unpkg.com/scrollreveal"></script>
	<link rel="stylesheet" href="css-user/footer.css">
	<link href="template/public/css/main.css" rel="stylesheet">
</head>
<style>
	.user-menu-trigger {
		border: 2px white solid;
		font-size: 17px;
		color: white;
		background-color: black;
		border-radius: 13px;
		border: 2px white solid;
		padding: 5px 5px;
		margin-right: -10px;
	}
	.user-menu-trigger option{
		border-radius: 0px;
		background-color: white;
		color: black;
	}
	.user-menu-trigger option:hover{
		background-color: black;
		color: white;
	}
</style>

<body>
	<header>
		<nav class="nav">
			<input type="checkbox" id="check">
			<label for="check" class="checkbtn1">
				<i class="bx bx-menu"></i>
			</label>
			<input type="checkbox" id="check1">
			<label for="check1" class="checkbtn2">
				<a href="shop.html"><i class="bi bi-bag-plus"></i></a>
			</label>
			<label class="logo"><a href="#">NIKE</a></label>
			<ul class="ul2">
				<li class="search-header">
					<?php
					if (isset($page) && $page == 'PRODUCTS') {
					?>
					<form action="" method="GET">
						<input type="text" name="key" placeholder="Search here..." class=" text-search-header">
						<label for=""><i class="bi bi-search"></i></label>
					</form>
					<?php
					} else if (isset($page) && $page == 'HOME') {
					?>
					<form action="" method="GET">
						<input type="text" name="key" placeholder="Search here..." class=" text-search-header">
						<label for=""><i class="bi bi-search"></i></label>
					</form>
					<?php
					} else if (isset($page) && $page == 'BLOG') {
						?>
						<form action="" method="GET">
							<input type="text" name="key" placeholder="Search here..." class=" text-search-header">
							<label for=""><i class="bi bi-search"></i></label>
						</form>
					<?php
					} else if (isset($page) && $page == 'CATEGORY') {
						?>
					<form action="" method="GET">
						<input type="text" name="key" placeholder="Search here..." class=" text-search-header">
						<label for=""><i class="bi bi-search"></i></label>
					</form>
					<?php
						}
					?>

				</li>
				<li><a href="index.html" class="<?php if ($page == 'HOME') {
																	echo 'active';
																} ?>">Home</a></li>
				<li><a href="shop.html"
						class="<?php echo ($page == 'PRODUCTS' || $page == 'CATEGORY') ? 'active' : ''; ?>">
						Shop
					</a>
				</li>

				<li><a href="blog.html" class="<?php if ($page == 'BLOG') {
																	echo 'active';
																} ?>">News</a></li>
				<?php
								if (isset($_SESSION['user'])) {
									$name = $_SESSION['user']['fname'];
									$id = $_SESSION['user']['id_customer'];

								?>
				<li><a href="checkout.html">Payment</a></li>
				<li><a href="cart.html" class="<?php if ($page == 'CART') { echo 'active';}?>"> Cart (<?php echo count($cart) ?>)</a></li>
				<?php
					// Lấy tên khách hàng
					if (isset($_SESSION['user'])) {
   					$fullName = $_SESSION['user']['fname'];

    				// Tách tên thành mảng các từ
    				$nameParts = explode(' ', $fullName);

    				// Lấy từ cuối cùng
    				$lastName = end($nameParts);
					}
				?>
				<li>
					<select class="user-menu-trigger" onchange="location = this.value;">
						<option selected disabled hidden><?php echo $lastName; ?></option>
						<option value="profile.html" class="option">Account</option>
						<option value="logout.php" class="option">Log out <i class="bi bi-box-arrow-right"></i></option>
					</select>
				</li>

				<?php
								} else {

								?>
				<li><a href="checkout.html">Payment</a></li>
				<li><a href="cart.html">Cart (<?php echo count($cart) ?>)</a></li>
				<li><a href="login.html" class="<?php if ($page == 'LOGIN') { echo 'active';}?>">Log-in</a></li>

				<?php
								}
								?>
			</ul>
		</nav>
	</header>
	<!--/header-->