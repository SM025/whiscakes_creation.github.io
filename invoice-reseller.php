<?php
    require("php/config.php");
    require("php/computePrice.php");
    require("auth.php");

    $cart_number    = mysqli_real_escape_string($con, $_POST['cart_number']);
    $user_id        = mysqli_real_escape_string($con, $_POST['user_id']);

    $user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $user_id "), MYSQLI_ASSOC);
    
    $ret = "SELECT * FROM order_reseller WHERE cart_number = $cart_number AND user_id = $user_id ";
    $ret_qry = mysqli_query($con, $ret);
    $row = mysqli_fetch_array($ret_qry, MYSQLI_ASSOC);
    $subtotal = 0;
    $location = '';
?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <!-- Custom Style -->
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/invoice-form.css">

        <title>My invoice form</title>
    </head>

    <body>

        <button onClick="window.print()">
            <span class="button__text">Print</span>
            <span class="button__icon">
                <ion-icon name="print-outline"></ion-icon>
            </span>
        </button>

        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

        <div class="my-5 page">
            <div class="p-5">
                <section class="top-content bb d-flex justify-content-between">
                    <div class="logo">
                        <img src="images/wc-logo.png" alt="" class="img-fluid" width="30px" height="30px">
                    </div>
                    
                    <div class="top-left">
                        <div class="graphic-path">
                            <p>Invoice</p>
                        </div>

                        <div class="position-relative">
                            <p>Invoice No. <span><?php echo $cart_number;?></span></p>
                        </div>
                    </div>
                </section>

                <section class="store-user mt-5">
                    <div class="col-10">
                        <div class="row bb pb-3">

                            <div class="col-7">
                                <p>SHOP,</p>
                                <h2>Whiscakes Creation</h2>
                                <p class="address"> 42 Camia St., Sgt. De Leon Ext. <br> Santolan, <br>Pasig City</p>
                            </div>

                            <div class="col-5">
                                <p>RESELLER,</p>
                                <h2><?php echo $user['last_name'].", ".$user['first_name']?></h2>
                                <p class="address"> <?php echo $row['address']?> </p>
                                <p class="address"> <?php echo $row['num']?> </p>
                                <p class="address"> <?php echo $user['email']?> </p>
                            </div>

                        </div>

                        <div class="row extra-info pt-3">

                            <div class="col-7">
                                <p>Payment Method: <span><?php echo $row['mode']?></span></p>
                                <p>Order Number: <span>#<?php echo $cart_number?></span></p>
                            </div>

                            <div class="col-5">
                                <p>Deliver Date: <span><?php $convert = new DateTime($row['date_time']);
                                echo $convert->format('Y-m-d h:i:sa');?></span></p>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="product-area mt-4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Item Description</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                                $ord_qry = mysqli_query($con, $ret);
                                $ord = mysqli_fetch_array($ord_qry, MYSQLI_ASSOC);
                                $location = $ord['location'];

                                $cupcake        =   $ord['cupcakes'];
                                $cupcake_desc   =   $ord['cupcake_description'];
                                $cookie_bars    =   $ord['cookie_bars'];
                                $bento_cake     =   $ord['bento_cake'];
                                $egg_pie        =   $ord['egg_pie'];
                                $choco_eggpie   =   $ord['chocolate_egg_pie'];
                                $strawberry_pie =   $ord['strawberry_pie'];
                                $cake_pops      =   $ord['cake_pops'];
                                $brownies_bites =   $ord['brownie_bites'];
                                $cookies        =   $ord['cookies'];
                                $choco_mallows  =   $ord['marshmallows'];

                                if($cupcake>0){
                                    $subtotal += dispItem("Cupcakes", $cupcake, 400);
                                }
                                if($cookie_bars>0){
                                    $subtotal += dispItem("Cookie Bars", $cookie_bars, 130);
                                }
                                if($bento_cake>0){
                                    $subtotal += dispItem("Bento Cake", $bento_cake, 200);
                                }
                                if($egg_pie>0){
                                    $subtotal += dispItem("Egg Pie", $egg_pie, 250);
                                }
                                if($choco_eggpie>0){
                                    $subtotal += dispItem("Chocolate Egg Pie", $choco_eggpie, 220);
                                }
                                if($strawberry_pie>0){
                                    $subtotal += dispItem("Strawberry Pie", $strawberry_pie, 200);
                                }
                                if($cake_pops>0){
                                    $subtotal += dispItem("Cake Pops", $cake_pops, 120);
                                }
                                if($brownies_bites>0){
                                    $subtotal += dispItem("Brownies Bites", $brownies_bites, 220);
                                }
                                if($cookies>0){
                                    $subtotal += dispItem("Cookies", $cookies, 200);
                                }
                                if($choco_mallows>0){
                                    $subtotal += dispItem("Chocolate Covered Marshmallows", $choco_mallows, 75);
                                }
                                if($cupcake_desc != null){
                                    echo"
                                    <tr>
                                        <td colspan = '4'>
                                            <div class='media'>
                                                <div class='media-body'>
                                                    Cupcake Description: $cupcake_desc
                                                </div>
                                            </div>
                                        </td>
                                    </tr> 
                                ";
                                }

                            ?>
                            
                        </tbody>
                    </table>
                </section>
                <br>

                <section class="balance-info">
                    <div class="row">
                        
                        <div class="col-4">
                            <table class="table border-0 table-hover">
                                <tr>
                                    <td>Sub Total:</td>
                                    <td>P <?php echo $subtotal;?></td>
                                </tr>

                                <tr>
                                    <td>Delivery fee:</td>
                                    <td>P 
                                        <?php
                                            if($location == 'Santolan' or $location  == 'Manggahan'){
                                                echo "0";
                                            }
                                            else{
                                                echo "50";
                                            }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Discount:</td>
                                    <td>-P <?php echo $row['discount']?></td>
                                </tr>

                                <tfoot>
                                    <tr>
                                        <td>Total:</td>
                                        <td>P <?php echo $row['total'] - $row['discount']?> </td>
                                    </tr>
                                </tfoot>
                            </table>

                        <!-- Signature -->
                            <div class="col-12">
                                <img src="signature.png" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Cart BG -->
                <img src="images/cart.jpg" class="img-fluid cart-bg" alt="">

                <footer class="account">
                    <hr>
                
                    <div class="social pt-3">
                        <span class="pr-2">
                            <i class="fas fa-mobile-alt"></i>
                            <span>09999705956</span>
                        </span>
                        <span class="pr-2">
                            <i class="fas fa-envelope"></i>
                            <span>whis.cake@gmail.com</span>
                        </span>
                        <span class="pr-2">
                            <i class="fab fa-facebook-f"></i>
                            <span>bea.mendoza</span>
                        </span>
                        <span class="pr-2">
                            <i class="fab fa-instagram"></i>
                            <span>whiscakes2020</span>
                        </span>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>