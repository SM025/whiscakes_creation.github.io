<?php
  require("php/config.php");
  //require("total.php");
  require("php/ordersDisplay.php");

?>
<!DOCTYPE html>
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
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="css/css1.css">
        <link rel="stylesheet" href="css/css.css">
    </head>


    <body>

        <div>
            <div class="hero3">
                <div class="navigation1">
                    <div class="nav-logo2">
                        <img src="images/wc-logo.png" class = "imglogo">
                    </div>
                        <label class="logo2">Whiscakes Creation</label>
                    <div class="nav-links2" id="nav-links">
                                <i class="fa fa-close" onclick="closeMenu()"></i>
                        <ul>
                            <li><a href="index1.php">Home</a></li>
                           <!-- <li><a href="Guidelines1.html">Guidelines</a></li>-->
                            <li><a href="Shop.php">Shop</a></li>
                            <li><a href="ordersPage.php">Orders</a></li>
                            <li><a href="about1.php" style="color: #ddd;">About Us</a></li>
                            <li><a href="FAQS1.php">FAQs</a></li>
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
            

            
                <div class="about">
                    <div>
                        <img src="images/bday6.jpg"  width="400px" height="550px" style="padding: 35px;">
                    </div>
                    <div class="about-content">
                        <h4 class="divider" data-aos="fade-up">About</h4>
                        <p class="p2" data-aos="zoom-out">At Whiscakes Creation, we enjoy the process of making cake and pastries. This stems from the desire to make custom order that the family desires to design. Our cakes and pastries are lovingly made by hand, and we only use wholesome ingredients with no preservatives or extenders ??? cake & sweets made the traditional way. All our recipes were developed with the utmost care as these were made with our families in mind.  We look forward to baking for you and your family!</p>

                        <div class="banner1">
                            <a href="our services1.php"><h5 class="btn1">Our Services</h5></a>
                            <a href="privacy policy1.php"><h5 class="btn1">Privacy Policy</h5></a>
                        </div>
                  
                    </div>
                    <div>
                        <img src="images/bday10.jpg"  width="400px" height="550px" style="padding: 35px;">
                    </div>
                </div>
            
            </div>


            <!-- //JS -->
            <script>
                $("a").click(function(){
                    $("a").css("background-color","");
                    $(this).css("background-color","rgba(129, 103, 95, 0.931)");
                });
            </script>

            <!-- //animation js -->
            <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                <script>
                AOS.init({
                    duration: 2000,
                    once: true,
                });
            </script>

            <!-- //mobile mode nav-links -->
            <script>
                var show = document.getElementById("nav-links");
                function showMenu() {
                    show.style.right = "0"
                }
                function closeMenu() {
                    show.style.right = "-200px"
                }
            </script>

    </body>

</html>