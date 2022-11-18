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
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css1/index1.css">
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
        <!-- <div class="drop"><i class="fas fa fa-user" onclick="document.getElementsByClassName('dropdown-content').style.display='block'"></i>  -->
                <div class="dropdown-content">
                          <a href="profile.html"><i class="fas fa-user"></i>Profile</a>
                           <a href="php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
                      </div>
                      </div>
        

               <div class="faqs">
                <h1>Frequently Asked Questions</h1>
            </div>
        <div class="navbarfaqs">
            <div class="navbarfaqs">
                <section class="navbarfaqs">
                    <section class="navbar">
                        <div class="subcontent">
                            <a href="price.html" target="faqs">I. PRICES</a>
                            <a href="delivery.html" type="button" target="faqs">II. DELIVERY</a>
                            <a href="flavor and tastings.html" target="faqs">III. FLAVORS AND TASTINGS</a>
                            <a href="ordering info.html" target="faqs">IV. ORDERING INFORMATION</a>
                            <a href="payment-faqs.html" target="faqs">V. PAYMENT</a>
                            <a href="miscellaneous.html" target="faqs">VI.MISCELLANEOUS</a></div>
                </section>
        
           
                    <section class="bodyiframe">
                        <div class="iframe"><center><iframe src="price.html" height="600" width="600" name="faqs"></iframe></center></div>
                    </section>

             </section>
            </div>
            </div>
            <div class="vertical-bar">
                <i class="fa fa-th-list"></i>
            </div>
                    <!-- <footer class="footer">
                        <div class="container">
                            <div class="row">
                                <div class="footer-col">
                                    <h4>business</h4>
                                    <ul>
                                        <li><a href="about1.html">about us</a></li>
                                        <li><a href="our services1.html">our services</a></li>
                                        <li><a href="privacy policy1.html">privacy policy</a></li>
                                    </ul>
                                </div>
                                <div class="footer-col">
                                    <h4>get help</h4>
                                    <ul>
                                        <li><a href="FAQS1.html">FAQ</a></li>
                                        <li><a href="delivery.html">shipping</a></li>
                                        <li><a href="payment-faqs.html">returns</a></li>
                                        <li><a href="payment-faqs.html">payment options</a></li>
                                     
                                    </ul>
                                </div>
                            
                                <div class="footer-col">
                                    <h4>follow us</h4>
                                    <div class="social-links">
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </footer> -->
</div>
<script src="js/faqs.js"></script>
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

    </body>

</html>