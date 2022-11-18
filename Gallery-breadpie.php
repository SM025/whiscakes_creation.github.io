<?php
	require_once("php/cart.php");
	require_once("php/productDisplay.php");
	session_start();
	$user_id = $_SESSION['user_id'];
?>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Whiscakes Creation</title>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/shop-gallery.css">
		<link rel="stylesheet" href="js/shop-gallery.js">
	</head>

	<style>
		body{
			background-color: #e0ba85;
		}
	</style>

	<body>

		<div class="backBtn">
			<span class="line tLine"></span>
			<span class="line mLine"></span>
			<a class="label" href="Shop.php">Back</a>
			<span class="line bLine"></span>
		</div>
	
		<div class="gallery-section">
			<div class="inner-width">
			<h1>Bread 'n Pie</h1>
			<p>Whiscakes Creation's previous orders you might like.</p>
			<div class="border"></div>
			<div class="gallery">

				<div class="wrapper">
					<div class="cart-nav">
						<div class="icon">
							<i class="fas fa-shopping-cart"></i>
							<span>Cart</span>
						</div>
						<div class="item-count"><?php cartCount($user_id); ?></div>
					</div>
				</div>
			
			<?php 
				galleryDisplay("bnp_tb", $user_id); 
			?>

			<script src="https://kit.fontawesome.com/a076d05399.js"></script>
			<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
			

	</body>
</html>
