<?php
	require_once("php/cart.php");
	require_once("php/productDisplay.php");
	require_once("php/config.php");
	session_start();
	$user_id = $_SESSION['user_id'];

    
    $item_id    =  mysqli_real_escape_string($con, $_POST['item_id']);
    $dbname     =  mysqli_real_escape_string($con, $_POST['dbname']);
    $user_id    =  mysqli_real_escape_string($con, $_POST['user_id']);
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
            <a class="label" onclick="back()">Back</a>
            <span class="line bLine"></span>
        </div>

        <div class="gallery-section">
          	<div class="inner-width">
                  <h1>Item Details</h1>
            <div class="border"></div>
            <div class="gallery">

            <script>
                function back(){
                    window.history.go(-1);
                }
            </script>
            
            <?php
            
                $qry = "SELECT * FROM $dbname WHERE item_id = $item_id";
                $result = mysqli_query($con, $qry);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                 echo"
                 <center>
                    <h2>$user[item_name]</h2>
                    <h2>P $user[item_price]</h2>
                    
                 
                     <div style='display: flex; justify-content: space-around;'>
                        <div><img src='$user[item_image]' style='height: 500px; width:500px;'></div>
                        <div><h3>Ingredients:</h3>
                        $user[item_desc]</div>
                     </div>
                 </center>
                 ";
            
            ?>

			
			
			
  	</body>
</html>