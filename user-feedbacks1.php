<?php
    require_once("php/chat-functions.php");
    session_start();
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
          
                <div class="navigation">
                    <div class="nav-logo">
                        <img src="images/wc-logo.png" class = "imglogo">
                    </div>
                        <label class="logo">Whiscakes Creation</label>
                            <div class="nav-links" id="nav-links">
                                <i class="fa fa-close" onclick="closeMenu()"></i>
                                    <ul>
                                        <li><a href="index1.php" style="color: #ddd;">Home</a></li>
                                        <li><a href="Guidelines1.html">Guidelines</a></li>
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
                  
                   
        <div class="backBtn">
            <span class="line tLine"></span>
            <span class="line mLine"></span>
            <a class="label" href="index1.php">Back</a>
            <span class="line bLine"></span>
        </div>
        
        
              
            <section id="testimonials">
                <div class="testimonial-heading">
                    <span>Feedbacks</span>
                    <h1>Client Says</h1>
                </div>
           

                <div class="testimonial-box-container">
                  <?php
                        require_once("php/admin-functions.php");
                        ratingDisplay(2); 
                    ?>
                </div>
                 </section>
          

              
                <div class="vertical-bar">
                        <i class="fa fa-th-list"></i>
                </div>
        </div>
                

       <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       
       
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