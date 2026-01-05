
<?php require_once 'template/public/inc/header.php' ?>
<?php
if (isset($_GET['id_blog'])) {
	$id_blog = $_GET['id_blog'];
} else {
	$id_blog = '';
}
if (isset($_GET['id_cmt'])) {
	$id_cmt = $_GET['id_cmt'];
} else {
	$id_cmt = '';
}
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	$qr3 = mysqli_query($conn, "DELETE FROM `comment` WHERE id_cmt = '$id_cmt' AND id_customer = $user[id_customer]");
} else {

	$user = '';
}


if (isset($_POST['submit'])) {
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	} else {

		$user = '';
	}
	$cmt = $_POST['comment'];
	$sql = mysqli_query($conn, "INSERT INTO `comment`(`id_customer`, `comment`,`id_blog`) VALUES ('$user[id_customer]','$cmt','$id_blog')");
}
?>

<section id="advertisement">
	<div class="container">
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post-area">
					<?php
					$qr = mysqli_query($conn, "SELECT * FROM blog WHERE id_blog = {$_GET['id_blog']}");
					$row_blog_detail = mysqli_fetch_assoc($qr);
					?>
					<div class="single-blog-post">
						<h1><?php echo $row_blog_detail['title'] ?></h1>
						<div class="post-meta">
							<ul>
								<li><i class="fa fa-calendar"></i>Date Posted: <?php echo $row_blog_detail['created_at'] ?></li>
							</ul>
							<br>
							<br>
							<p><?php echo $row_blog_detail['content'] ?></p>
						</div>
					</div>
				</div>
				<!--/blog-post-area-->
				<h3>Comment</h3>
			</div>
			<?php if (isset($_SESSION['user'])) {
			?>
				<div class="col-md-6">
					<form method="POST">
                      
						<div class="form-group">
							<textarea name="comment" id="" cols="30" rows="5" class="form-control" required placeholder="Your comment"></textarea>
						</div>
						
						<input type="submit" class="btn btn-send" name="submit" value="Send">
					</form>
					<br>
					<br>
					<div class="panel panel-default">
						<?php
						$qr2 = mysqli_query($conn, "SELECT comment.*, customers.fname FROM comment JOIN customers ON comment.id_customer = customers.id_customer WHERE id_blog = '$id_blog' ORDER BY id_cmt DESC");
						while ($row_cmt = mysqli_fetch_assoc($qr2)) {
						?>
							<div class="panel-body">
								<p><i class="fa fa-user"></i> <?php echo $row_cmt['fname'] ?> - <?php echo $row_cmt['created_at'] ?></p>
								<p>- <?php echo $row_cmt['comment'] ?>
								<p><a href="blogdetail.php?id_blog=<?php echo $id_blog ?>&id_cmt=<?php echo $row_cmt['id_cmt'] ?>">Delete</a></p>
								</p>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			<?php
			} else {
			?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					<strong>Please Log In Before:</strong> <a href="login.php?comment=blogdetail">Log In</a>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</section>
<br>
<br>
<?php require_once 'template/public/inc/footer.php' ?>
<link rel="stylesheet" href="css-user/blogdetail.css">