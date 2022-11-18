<?php
    require("php/config.php");
    require_once("php/productDisplay.php");
    session_start();

  if(!isset($_SESSION['user_id'])){
    header('Location:index.php');
}

    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($con, "SELECT * FROM cart_tb WHERE user_id = '$user_id'");
    $cartCount  = mysqli_num_rows($query);
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
        <link rel="stylesheet" href="css/shop.css">

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
                        <li><a href="cart-page.php"><i class="fas fa-cart-plus"  style="color: #ddd;"></i></a></li>
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
                    
            <form action="php/subtotal.php" method="post">
                <!-- <input type="submit" name="submit" value="Remove Item/s"> -->
                <?php
                    if($cartCount != 0){
                ?>
                <a href="removeItem.php">
                <div name="submit" class="check-out1" style="margin-right: 43%;">
                    <span class="button__text1">REMOVE ITEM</span>
                </div></a>

                <?php
                    }
                ?>
                <section id="cart-container" class="container my-5">
                    <table width="100%">
                        <thead>
                            <tr><td>MY CART</td>
                        </thead>
                        
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if($cartCount == 0){?>
                                <tr>
                                    <td colspan="4">No items in your cart.</td>
                                </tr>
                            <?php 
                            }
                            else{
                                cartDisplay($user_id);
                            }
                            ?>
                        </tbody>
                        
                    </table>
                </section>
                <?php
                if($cartCount != 0){
                    ?>
                <center>
                    <div id="notee">
                    <h4 class="divider" style="color: black;">Where are you located?</h4>
                    <h2 class="p1">As a reminder, we only collect orders within Pasig City. <br>Free shipping within Santolan. <br>For outside of Santolan, additional P50 for delivery fee.</h2>
                    </div>
                    <div class="select">
                        <select name="location" id="format" required>
                            <option selected disabled hidden value="">Choose your location:</option>
                            <option disabled>DISTRICT 1</option>
                            <option name="location" value="Bagong Ilog">Bagong Ilog</option>
                            <option name="location" value="Bagong Katipunan">Bagong Katipunan</option>
                            <option name="location" value="Bambang">Bambang</option>
                            <option name="location" value="Buting">Buting</option>
                            <option name="location" value="Caniogan">Caniogan</option>
                            <option name="location" value="Kalawaan">Kalawaan</option>
                            <option name="location" value="Kapasigan">Kapasigan</option>
                            <option name="location" value="Kapitolyo">Kapitolyo</option>
                            <option name="location" value="Malinao">Malinao</option>
                            <option name="location" value="Oranbo">Oranbo</option>
                            <option name="location" value="Palatiw">Palatiw</option>
                            <option name="location" value="Pineda">Pineda</option>
                            <option name="location" value="Sagad">Sagad</option>
                            <option name="location" value="San Antonio">San Antonio</option>
                            <option name="location" value="San Joaquin">San Joaquin</option>
                            <option name="location" value="San Jose">San Jose</option>
                            <option name="location" value="San Nicolas">San Nicolas</option>
                            <option name="location" value="Sta. Cruz">Sta. Cruz</option>
                            <option name="location" value="Sta. Rosa">Sta. Rosa</option>
                            <option name="location" value="Sto. Tomas">Sto. Tomas</option>
                            <option name="location" value="Sumilang">Sumilang</option>
                            <option name="location" value="Ugong">Ugong</option>
                            <option disabled >DISTRICT 2</option>
                            <option name="location" value="Dela Paz">Dela Paz</option>
                            <option name="location" value="Manggahan">Manggahan</option>
                            <option name="location" value="Maybunga">Maybunga</option>
                            <option name="location" value="Pinagbuhatan">Pinagbuhatan</option>
                            <option name="location" value="Rosario">Rosario</option>
                            <option name="location" value="San Miguel">San Miguel</option>
                            <option name="location" value="Santolan">Santolan</option>
                            <option name="location" value="Sta. Lucia">Sta. Lucia</option>
                        </select>
                    </div>
                </center>
                <button type="submit" name="submit" class="check-out1" value='submit'>
                    <span class="button__text1">CHECK OUT</span>
                    <span class="button__icon1">
                        <ion-icon name="cart-outline"></ion-icon>
                    </span>
                </button>
            </form>
            <?php } ?>

            <!-- JS -->
            <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

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
        </div>
    </body>
</html>