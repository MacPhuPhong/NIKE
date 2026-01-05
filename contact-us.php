<link rel="stylesheet" href="css-user/contact-us.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<?php $page = 'CONTACT'; ?>
<?php require_once 'template/public/inc/header.php'?>
<section>
	<?php 
	if(isset($_POST['submit'])) {
		$fulname = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$qr = "INSERT INTO `contacts`(`fulname`, `email`, `content`) VALUES ('$fulname','$email','$message')";
		$insert = mysqli_query($conn,$qr);
		
		if($insert) {
			echo '<script>
			Swal.fire({
				title: "Thank you for giving us your feedback.",
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
					window.location.href = "index.php";
				}
			});
			</script>';
		}
	}
	?>
	<form name="contact-form" method="post" class="form">
		<h1>Contact us</h1>
		<input type="text" placeholder="First and Last name" class="text" name="name" required="required"><br>
		<input type="email" placeholder="Email" class="text" name="email" required="required"> <br>
		<textarea cols="65" rows="10" placeholder="Write your query" name="message" required="required" class="textarea"></textarea> <br>
		<br>
		<input type="submit" value="Send" class="submit" name="submit">
	</form>
</section>
<?php require_once 'template/public/inc/footer.php'?>
