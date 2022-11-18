<?php
    require("php/config.php");
    require_once("php/productDisplay.php");
    session_start();

    $user_id = $_SESSION['user_id'];
    
    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($con, "SELECT * FROM cart_tb WHERE user_id = '$user_id'");
    $cartCount  = mysqli_num_rows($query);
    if($cartCount == 0){
        echo '<script>window.location="cart-page.php"</script>';
    }
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
                        <li><a href="Guidelines1.html">Guidelines</a></li>
                        <li><a href="Shop.php">Shop</a></li>
                        <li><a href="ordersPage.php">Orders</a></li>
                        <li><a href="about1.html">About Us</a></li>
                        <li><a href="FAQS1.html">FAQs</a></li>
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
           
            <a href='cart-page.php'><button type="submit" name="submit" class="check-out1" value='back'>
                <span class="button__text1">Back</span>
            </button></a>
            <section id="cart-container" class="container my-5">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Remove</td>
                            <td>Image</td>
                            <td>Product</td>
                            <td>Price</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            cartRemove($user_id);
                        ?>
                    </tbody>
                    
                </table>
            </section>
            

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