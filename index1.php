<?php
    require_once("php/chat-functions.php");
    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Location:index.php');
    }
?>
<html>
    <head>
        <title>
            Whiscakes Creation
        </title>

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
        <link rel="stylesheet" href="css/index1.css">
        <link rel="stylesheet" href="css/account.css">
        <link rel="stylesheet" href="css/livechat.css">
        <link rel="stylesheet" href="css/coupon2.css">
            <style>
                body {
                    font-family: 'Abril Fatface', cursive; 
                    font-family: 'Rampart One', cursive;
                    font-family: 'Quicksand', sans-serif;
                    font-family: 'Poppins', sans-serif;
                }
            </style>
    </head>

    <body>

        <div class="hero4">

        <!--message window -->
           <div class="modal-container" id="modal-container">
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
            </div>

                <div class="navigation">
                    <div class="nav-logo">
                        <img src="images/wc-logo.png" class = "imglogo">
                    </div>
                        <label class="logo">Whiscakes Creation</label>
                            <div class="nav-links" id="nav-links">
                                <i class="fa fa-close" onclick="closeMenu()"></i>
                                    <ul>
                                        <li><a href="index1.php" style="color: #ddd;">Home</a></li>
                                       <!-- <li><a href="Guidelines1.html">Guidelines</a></li> -->
                                        <li><a href="Shop.php">Shop</a></li>
                                        <li><a href="ordersPage.php">Orders</a></li>
                                        <li><a href="about1.php">About Us</a></li>
                                        <li><a href="FAQS1.php">FAQs</a></li>
                                        <li><a href="cart-page.php">My Cart<i class="fas fa-cart-plus"></i></a></li>
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
                  
         <!--<div class="announcement">
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

                <div class="banner-title"> 
                    <h1>Cakes and Desserts for all occassion!</h1>
                        <a href="Shop.php"><button class="btn">ORDER HERE</button></a><br>
                        <!--
                        <a href="resellers.php"><button class="btn">Be Our Reseller!</button></a>
                        <a href="user-feedbacks1.php"><button class="btn">Feedbacks</button></a> -->
                </div>

                    
                <div class="container1">
                    <!-- chat box -->
                    <div class="chat-box">
                        <!-- client -->
                        <div class="client">
                            <img src="images/wc-logo.png" />
                            <div class="client-info">
                                <h2>Whiscakes Creation</h2>
                                <!-- <p>online</p> -->
                            </div>
                        </div>
                    
                                <!-- main chat section -->
                                <div class="chats">
                                    <?php
                                       chat_bubbles();
                                    ?>
                                </div>
                   
                                <!-- input field section -->
                               <form method="post" action="php/sendChat.php">
                                   <div class="chat-input">
                                        <input type="text" placeholder="Enter Message" name="message"/>
                                        <input type="hidden" placeholder="Enter Message" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" /> <input type="hidden" placeholder="Enter Message" name="user_type" value="<?php echo $_SESSION['user_type']; ?>" />
                                        <button class="send-btn">
                                            <img src="images/send.png">
                                        </button>
                                    </div>
                                </form>
                    </div>
                    
                            <!-- button -->
                           <!-- <div class="chat-btn">
                                <img src="images/Circle-icons-chat.svg.png" alt="chat box icon btn">
                            </div>-->
                </div>
                <!--<form method="post" action="php/ratings.php">
                    <div class="container2">
                        <div class="post">
                            <div class="text">Thanks for rating us!</div>
                                <div class="edit">EDIT</div>
                        </div>
                        
                        <div class="star-widget">
                            <input type="radio" name="rate" id="rate-5" value="5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-4" value="4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-3" value="3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-2" value="2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="radio" name="rate" id="rate-1" value="1">
                            <label for="rate-1" class="fas fa-star"></label>

                            <header></header>
                            <div class="textarea2">
                                <textarea cols="30" placeholder="Describe your experience.." name="comment"></textarea>
                            </div>
                            <div class="btn2">
                                <button type="submit">Post</button>
                            </div>
                        </div>
                    </div>
                </form>-->
                        
             <!--   <div class="banner1">
                    <a href="our services1.html"><h5 class="btn1">Our Services</h5></a>
                    <a href="privacy policy1.html"><h5 class="btn1">Privacy Policy</h5></a>
                </div>
            -->
              <!--  <div class="vertical-bar">
                        <i class="fa fa-th-list"></i>
                </div> -->
        </div>
                

       <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       
       <script src="js/modal.js"></script>
       
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

        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/coupon2.js"></script>
        <script src="js/chat.js"></script>

        <script>
            const btn2 = document.querySelector("button");
            const post = document.querySelector(".post");
            const widget = document.querySelector(".star-widget");
            const editBtn = document.querySelector(".edit");
            btn2.onclick = ()=>{
              widget.style.display = "none";
              post.style.display = "block";
              editBtn.onclick = ()=>{
                widget.style.display = "block";
                post.style.display = "none";
              }
              return false;
            }
        </script>

    </body>
</html>