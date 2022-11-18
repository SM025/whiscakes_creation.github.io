<?php
  require("php/config.php");
  require("php/computePrice.php");
  session_start();

  $subtotal  	=  mysqli_real_escape_string($con, $_POST['subtotal']);
  $cart_number	=  mysqli_real_escape_string($con, $_POST['cart_number']);
  
  date_default_timezone_set('Asia/Manila');

    $datetime = new DateTime(date("Y-m-d"));
    $datetime->modify('+4 day');
    $d = $datetime->format('Y-m-d');
    $t = date("H:i:s");
?>
<html>
    <head>
        <title>
            Whiscakes Creation
    	</title>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Rampart+One&display=swap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand:wght@300;400;700&family=Rampart+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/index1.css">


			<!--BOOTSTRAP CDN, DO NOT REMOVE.-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        
       <!-- <script src="//www.google.com/recaptcha/api.js"></script> -->
    </head>

    <body>
        <div class="hero4">
			<div class="navigation">
				<div class="nav-logo">
					<img src="images/wc-logo.png" class = "imglogo">
				</div>
				<label class="logo">Whiscakes Creation</label>

				<div class="nav-links" id="nav-links">
					<i class="fa fa-close" onclick="closeMenu()"></i>
					<ul>
						<li><a href="index1.php">Home</a></li>
						<!--<li><a href="Guidelines1.html">Guidelines</a></li>-->
						<li><a href="Shop.php">Shop</a></li>
						<li><a href="ordersPage.php">Orders</a></li>
						<li><a href="about1.html">About Us</a></li>
						<li><a href="FAQS1.html">FAQs</a></li>
						<li><a href="cart-page.php"><i class="fas fa-cart-plus"></i></a></li>
					</ul>
				</div>
				<i class="fa fa-bars" style="font-size: 40px;" onclick="showMenu()"></i>
			</div>

			<div class="drop"><a onclick="document.getElementById('dropdown-content').style.display='block'" style="width: fit-content; height: fit-content;"><img src="images/user-64.png" style="width: 30px; height: 30px;"></a> 
				<div class="dropdown-content">
					<a href="profile.php"><i class="fas fa-user"></i>Profile</a>
					<a href="php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
				</div>
			</div>
            
<!-- GRID COLUMN BS5 -->
<div class=" container-fluid d-flex justify-content-center">
  <div class="row">
    <div class="col">
      
	  <div class="invoice">
				<h2 class="title">Full Payment (Delivery Fee included):</h2>

                <h1>P 
					<?php  
						echo $subtotal;
					?>
                </h1>
				
               
                <a class="button" href="#popup3">
					<button type="submit" class="inclusion">Inclusions</button>
                </a>

				 <!-- INCLUSION
				<div id="popup3" class="overlay">
                    <div class="popup"> 
                        <a class="close" href="#">&times;</a>

						<div class="content">
							<div class='content-header'>
								<h2>Inclusions</h2>
							</div>

							<table>
								<div class='tables'>
									<tr>
										<th>Items</th>
										<th>Price</th>
										<th>Qty</th>
									</tr>
									<tr>
										<?php
											inclusion($cart_number);
										?>
									</tr>
								</div> 
							</table>
						</div>
                    </div>
				</div>
				 -->
				 
				<br>
               <h2 class="title">Down Payment:</h2>
				<h1>P 
					
						<?php 
						$down = $subtotal/2;
						echo $down;
					?>
					
					<h5 id="messagee">NOTE:  
					If you pay FULL or DOWN payment via GCash, please send proof of payment via G-mail BEFORE we process your order. You can scan our Gmail & Gcash qr code here.
				
				</h5>


							
				<figure Class="text-center">
				<img id="cancel" src="images/proof.png"> 
				<figcaption>GMAIL:  whiscakes.creation@gmail.com</figcaption>
				
					<br>
				
				<img id="cancel" src="images/gcash0.jpg"> 
				<figcaption>GCASH: 09317939229 (Nenita M.)</figcaption>
				</figure>
					
					
					
					<br>
					<!--
					
					
					<h5 id="messagee" >Our Email:  whiscakes.creation@gmail.com</h5>
					<h5 id="messagee" >Our Gcash Number: 09317939229 (Nenita M.)</h5>-->
					
					
				</h1>
				
				
            </div>

    </div>

    <div class="col">
      

	  <div class="invoice">
				<div class="title">
					<p>Please fill up the form</p>
				</div>

				<?php
					
					if(isset($_POST['Submit'])){
						require("php/config.php");
						
						$order_id		=  mysqli_real_escape_string($con, $_POST['order_id']);
						$cart_number	=  mysqli_real_escape_string($con, $_POST['cart_number']);
						$num     		=  mysqli_real_escape_string($con, $_POST['num']);
						$address 		=  mysqli_real_escape_string($con, $_POST['add']);
						$dat     		=  mysqli_real_escape_string($con, $_POST['dat']);
						$mode    		=  mysqli_real_escape_string($con, $_POST['mode']);
						$subtotal   	=  mysqli_real_escape_string($con, $_POST['subtotal']);
						$dp      		=  mysqli_real_escape_string($con, $_POST['dp']);
						$voucher		=  mysqli_real_escape_string($con, $_POST['voucher']);
						$errflag        = true;
						
    					/* if($_POST['g-recaptcha-response'] != ""){
                            $secret = '6LdLxFMgAAAAAF5dYILchw-RnIYPJFnZR0F0DXt5';
                            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                            $responseData = json_decode($verifyResponse);
                        }
                        else{
                           $errmsg = 'Captcha failed';
                            $errflag = false; 
                        } */
    
        
                        //Saving of information to database
                        if($errflag){
                           // if($responseData->success){
                               $row = mysqli_fetch_array(mysqli_query($con,"SELECT order_number FROM users_tb WHERE user_id = $_SESSION[user_id]"), MYSQLI_ASSOC);
        						$cart_id	= $row['order_number'] + 1;
        						mysqli_query($con,"UPDATE `users_tb` SET `order_number`='$cart_id' WHERE user_id = $_SESSION[user_id]");
        
        						$discount 		= discount($voucher,$subtotal);
        
        						$query 			= mysqli_query($con, "SELECT * FROM hidden_tb WHERE cart_number = $cart_number");
        
        						while($cart = mysqli_fetch_array($query, MYSQLI_ASSOC)){  
        
        							$item_id 		= $cart['item_id']; 
        							$item_db 		= $cart['item_db']; 
        							$user_id 		= $cart['user_id'];
        							$item_quantity	= $cart['item_quantity'];
        							$location		= $cart['location'];
        
        							$order 			= "INSERT INTO order_tb( `item_id`, `item_db`, `item_quantity`, `cart_number`, `num`, `address`, `date_time`, `mode`, `discount`, `down_payment`, `total`, `user_id`, `location` ) VALUES ('$item_id','$item_db','$item_quantity','$cart_id','$num','$address','$dat','$mode','$discount','$dp','$subtotal','$user_id','$location')";
        
        							mysqli_query($con, $order);
        						}
        
        						$pay	= "INSERT INTO payment_tb(`cart_number`, `user_id` ) VALUES ('$cart_id','$user_id')";
        
        						mysqli_query($con, $pay);
        						
        						$delete1	= "DELETE FROM `hidden_tb` WHERE user_id = $user_id";
        						$delete2	= "DELETE FROM `cart_tb` WHERE user_id = $user_id";
        
        						mysqli_query($con, $delete1);
        						mysqli_query($con, $delete2);
        						
        						
                                	
        						$subject        = "Order Confirmation: Pending Order No. ".$cart_id;
                                $from           = "From: whiscakes.creation@gmail.com";
                                $message        = "Good day our dear client! \n\nKindly reply here your proof of payment for full or down payment and your invoice to proceed your pending order. 
								\nNote: You can upload your proof of payment and invoice form only within 24 hrs. Otherwise, your request order will be declined
								\nYou can download your invoice form in the orders section of the website; \n\n1. Click the invoice form button under your order number, \n2. Click the print or press ctrl + p, 
								\n3. Then, choose in the destination dropdown 'save as PDF'.";
                              
                                mail( $_SESSION['email'], $subject, $message, $from);
        						echo '<script>window.location="ordersPage.php"</script>'; 
                           // }
                            
                        }
                        else{
                             echo '<script>alert("'.$errmsg.'!")</script>';
                            echo '<script>window.location="cart-page.php"</script>';
                        }
					}
					else{
				?>

				<form action="" method="post">
					<div class="user-details">
						<div class="input-box">
							<span class="details">Full Name</span>
							<input type="text" placeholder="Enter your name" value="<?php echo $_SESSION['first_name'].$_SESSION['last_name']; ?>" disabled>
						</div>

						<div class="input-box">
							<span class="details">Phone Number</span>
							<input type="text" placeholder="Enter your number" name = "num" required>
						</div>

						<div class="input-box">
							<span class="details">Address</span>
							<input type="text" name="add" placeholder="Your complete address" required>
						</div>

						<div class="input-box">
							<span class="details">Email Address</span>
							<input type="text" placeholder="Enter your email" value="<?php echo $_SESSION['email'];?>"  disabled>
						</div>    

						<div class="input-box">
							<span class="details">Date and Time of Delivery</span>
							<input type="datetime-local" name="dat" min="<?php echo$d.'T'.$t;?>" step="any" required>
						</div>

						<!-- <div class="input-box">
							<span class="details">Theme/Color Scheme (For custom products: cake and cupcake)</span>
							<input type="text" name=" custom" placeholder="Enter your theme/color scheme" >
						</div>  -->
						<!-- 
						<span class="details">Upload the proof of payment<br></span>
						<input type="file" id="real-file" name="image" hidden="hidden"  required/>
						<button type="button" id="custom-button"><i class="fas fa-cloud-upload-alt"></i>   CHOOSE A FILE</button>
						<span id="custom-text">No file chosen, yet.</span> -->

						<!--<div class="input-box">
							<span class="details">Enter Voucher Code</span>
							<input type="text" name="voucher" placeholder="Voucher code">
						</div>-->

						<div class="payment2">
							<span class="details1">Mode of Payment :</span>
							<div class="radio-containerx">
								<input type="radio" id="Cash on Delivery" name="mode" value="Cash on Delivery"/>
								<label for="Cash on Delivery">Cash on Delivery</label>
						
								<input type="radio" id="Gcash" name="mode" value="Gcash"/>
								<label for="Gcash">Gcash</label>
	
							</div>
						</div>
						<!--<div class = "g-recaptcha" data-sitekey="6LdLxFMgAAAAAMTKJzcmPFYYWs-KneCp9VyYsG2i"></div>-->
												
						<!-- <input type="hidden" name="id" id="user" value="<?php //echo $_SESSION['user_id']; ?>"> -->
						<!-- <input type="hidden" name="order_id" value="<?php //echo $_SESSION['order']; ?>"> -->
						<input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
						<input type="hidden" name="dp" value="<?php echo $down; ?>">
						<input type="hidden" name="cart_number" value="<?php echo $cart_number ?>">

						<button type="submit" class="check-out" name ='Submit'>
							<span class="button__text">PLACE ORDER</span>
							<span class="button__icon">
								<ion-icon name="bag-check-outline"></ion-icon>
							</span>
						</button>					
					</div>
				</form>
					<?php
										}
					?>
				<div class="vertical-bar">
					<i class="fa fa-th-list"></i>
				</div>
			</div>
        </div>

    </div>
    
  </div>
</div>



			

			

		<script src="js/choose-file.js"></script>
		<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
          
		<script>
			$("a").click(function(){
				$("a").css("background-color","");
				$(this).css("background-color","rgba(129, 103, 95, 0.931)");
			});
		</script>

		<script>
			var show = document.getElementById("nav-links");
			function showMenu(){
				show.style.right = "0"
			}
			function closeMenu(){
				show.style.right = "-200px"
			}
		</script>
    </body>
</html>