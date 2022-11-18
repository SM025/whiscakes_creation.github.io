<?php
session_start();
if(!isset($_SESSION['user_type'])){
?>
<html lang="en">
    <head>
        <title>
            Whiscakes Creation
        </title>
        
        <!-- address logo-->
        <link rel="shortcut icon" href="images/wc-logo.png" type="image/png">


        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Rampart+One&display=swap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand:wght@300;400;700&family=Rampart+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="css/css.css">
       <!-- <link rel="stylesheet" href="css/coupon2.css">-->
        <style>
            body {
                font-family: 'Abril Fatface', cursive; 
                font-family: 'Rampart One', cursive;
                font-family: 'Quicksand', sans-serif;
            }
        </style>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>

    <body>

        <div class="hero">
           <!-- <div class="modal-container" id="modal-container">
                <div class="modal" id="modal">
                     <button class="close-btn" id="close"><i class="fa fa-times"></i></button>
                       <div class="modal-content">
                            <div class="header">
                                <h2 class="logo">Whiscakes Creation</h2>
                                <p class="tagline">something delicious is coming.</p>
                                <p>Welcome! If you want to order, Kindly please give us 2-4 days for preparation. Thank you and Keep safe!</p>
                            </div>
                        </div> 
                </div>
            </div>-->

            <div class="navigation">
                <div class="nav-logo">
                        <img src="images/wc-logo.png" class = "imglogo">
                    </div>
                        <label class="logo">Whiscakes Creation</label>
                            <div class="nav-links" id="nav-links">
                                <i class="fa fa-close" onclick="closeMenu()"></i>
                                    <ul>
                                        <a href="index.php" style="color: #ddd;"><li>Home</li></a>
                                       <!-- <a href="Guidelines.html"><li>Guidelines</li></a> -->
                                        <a href="Gallery.html"><li>Gallery</li></a>
                                        <a href="about.html"><li>About Us</li></a>
                                        <a href="FAQS.html"><li>FAQs</li></a>
                                    </ul>
                            </div>
                                <i class="fa fa-bars" style="font-size: 40px;" onclick="showMenu()"></i>
            </div>
        
            <div class="log">
                <a onclick="document.getElementById('login-form').style.display='block'" style="width: fit-content; height: fit-content;"><img src="images/user-64.png" style="width: 30px; height: 30px;"></a>
            </div>
            
         <!-- <div class="announcement">
            	<span class="close">x</span>
            	<div class="text">
            		<span class="is-desktop">
            			<strong>PROMOTION</strong>. Father's Day Promo 2%. Use Voucher Code
            		</span>
            		<span class="is-mobile">Use Voucher Code for <strong>50% OFF</strong></span>
            	</div>
            	<div class="coupon">
            		<input type="text" value="jo7L80" id="couponCode" readonly />
            		<div class="tooltip">
            			<button onclick="myFunction()" onmouseout="outFunc()">
            				<span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
            				Copy
            			</button>
            		</div>
            	</div>
            	<span id="timer" class="is-desktop"></span>
            </div> -->
        


            <div id='login-form' class="'login-page">
                <div class="form-box">
                    <span onclick="document.getElementById('login-form').style.display='none'" class="w4-button w4-display-topright">&times;</span>
                        <div class='button-box'>
                            <div id='btn'></div>
                                <button type='button' onclick='login()' class='toggle-btn'>Login</button>
                                <button type='button' onclick='register()' class='toggle-btn'>Register</button>
                        </div>

                        <form method="post" action="php/login-exec.php" id='login' class='input-group-login'>
                            <input type='text' class='input-field' placeholder='Email Address' name="email" required>
                            <input type='password' id='password' class='input-field' placeholder='Enter Password' name="password" required>
                             <!--<input type='checkbox' onclick='myFunction2()'>Show Password<br><br>-->
                            <input type='submit' class='submit-btn' value='Log in'><br><br>
                           <!-- <center><a href='php/forgot-password.php'>Forgot Password?</a></center> -->
                        </form>

                        <form  method='POST'  class='input-group-register' id="register" action='php/register.php'>
                            <input type='text' class='input-field' name='fname' placeholder='First Name' required>
                            <input type='text' class='input-field' name='lname' placeholder='Last Name' required>
                            <input type='email' class='input-field' name='email' pattern='.+@gmail\.com' placeholder='G-mail Address' required>
            
                          
                            <input type='password' class='input-field' name='pw1' placeholder='Enter Password' required>
                           
                            <input type='password' class='input-field' name='pw2' placeholder='Confirm Password' required>
                           
                           <!-- <div class = "g-recaptcha" data-sitekey="6LdLxFMgAAAAAMTKJzcmPFYYWs-KneCp9VyYsG2i"></div> -->

                            <br><input type='submit' class='submit-btn' value='Register'><br><br>                        
                        </form>
                </div>  
            </div>

     

            <div class="banner-title"> 
                <h1>Cakes and Desserts for all occassion!</h1>
                    <a href="Guidelines.html"><button class="btn">ORDER HERE</button></a>
                   <!-- <a href="user-feedbacks.php"><button class="btn">Feedbacks</button></a> -->
            </div>
            

                
                
                <div class="banner1">
                <a href="about/our services.php"><h5 class="btn1"></h5></a>
                <a href="about/privacy policy.php"><h5 class="btn1"></h5></a>
            </div>
            
            
            <div class="vertical-bar">
                    <i class="fa fa-th-list"></i>
            </div>
           
   
    
        </div>

    
   <!-- <script src="js/coupon2.js"></script>
   
         <script>
            function myFunction2() {
              var x = document.getElementById("password");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
        </script> -->
      
     
  
        <script>
            $("a").click(function(){
                $("a").css("background-color","");
                $(this).css("background-color","rgba(129, 103, 95, 0.931)");
            });
        </script>

     
        <script>
            var show = document.getElementById("nav-links");
            function showMenu() {
                show.style.right = "0"
            }
            function closeMenu() {
                show.style.right = "-200px"
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
        <script src="js/modal.js"></script>
        <script>
            var x=document.getElementById('login');
            var y=document.getElementById('register');
            var z=document.getElementById('btn');
            function register()
                {
                    x.style.left='-400px';
                    y.style.left='50px';
                    z.style.left='110px';
                }
            function login()
                {
                    x.style.left='50px';
                    y.style.left='450px';
                    z.style.left='0px';
                }
        </script>
        <script>
            var modal = document.getELementById('login-form');
            window.onclick = function(event)
            {
                if (event.target == modal)
                {
                    modal.style.display = "none";
                }
            }
        </script>

    </body>
</html>
<?php
}
else if($_SESSION['user_type'] == 'admin'){
    header("location: admin.php");
}
else if($_SESSION['user_type'] == 'client'){
    header("location: index1.php");
}
else if($_SESSION['user_type'] == 'reseller'){
    header("location: Reseller-page.php");
}
?>