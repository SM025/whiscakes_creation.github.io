<?php
    require("php/config.php");
    require("auth.php");

    $cart_number    = mysqli_real_escape_string($con, $_POST['cart_number']);
    $user_id        = mysqli_real_escape_string($con, $_POST['user_id']);

    $user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $user_id "), MYSQLI_ASSOC);
    
    $ret = "SELECT * FROM order_tb WHERE cart_number = $cart_number AND user_id = $user_id ";
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
        <br>
        <br>

        <button onClick="window.print()">
            <span class="button__text">Print</span>
            <span class="button__icon">
                <ion-icon name="print-outline"></ion-icon>
            </span>
        </button>

        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

        <br>
        <br>

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
                                <p>CLIENT,</p>
                                <h2><?php echo $user['last_name'].", ".$user['first_name']?></h2>
                                <p class="address"> <?php echo $row['address']?> </p>
                                <p class="address"> <?php echo $row['num']?> </p>
                                <p class="address"> <?php echo $user['email']?> </p>
                            </div>

                        </div>

                        <div class="row extra-info pt-3">

                            <div class="col-7">
                                <p>Payment Method: <span><?php echo $row['mode']?></span></p>

                                <!--FULL OR DOWN -->
                                <p>Payment Type: <span>full or down/partial payment</p>

                                <p>Order Number: <span>#<?php echo $cart_number?></span></p>
                            </div>

                            <div class="col-5">
                                <p>Deliver Date: <span><?php 
                                $convert = new DateTime($row['date_time']);
                                echo $convert->format('Y-m-d h:i:sa');
                                ?></span></p>
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
                                while($ord = mysqli_fetch_array($ord_qry, MYSQLI_ASSOC)){
                                    $getItem = mysqli_query($con, "SELECT * FROM $ord[item_db] WHERE item_id = $ord[item_id] ");
                                    $item_id = $ord['item_id'];
                                    $location = $ord['location'];

                                    while($item = mysqli_fetch_array($getItem, MYSQLI_ASSOC)){
                                        ?>

                                        <?php
                                            if($ord['item_db'] == "custom_cakes"){
                                                $subtotal1 = $item['item_price'] * $ord['item_quantity'];
                                                $subtotal += $subtotal1;
                                        ?>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <table>
                                                                    <tr><td><p class="mt-0 title">Event:</p></td>                 
                                                                        <td><?php echo $item['event'];?></td></tr>
                                                                    <tr><td><p class="mt-0 title">Cake shape:</p></td>            
                                                                        <td><?php echo $item['shape'];?></td></tr>
                                                                    <tr><td><p class="mt-0 title">Cake size:</p></td>             
                                                                        <td><?php echo $item['size'];?></td></tr>
                                                                    <tr><td><p class="mt-0 title">Cake layer:</p></td>            
                                                                        <td><?php echo $item['cake_base'];?></td></tr>
                                                                    <tr><td><p class="mt-0 title">Cake layer flavors:</p></td>    
                                                                        <td><?php echo $item['cake_base_flavor'];?></td></tr>
                                                                    <tr><td><p class="mt-0 title">Regular Fillings:</p></td>      
                                                                        <td><?php echo $item['regular_filling'];?></td></tr>
                                                                    <tr><td><p class="mt-0 title">Premium Fillings:</p></td>      
                                                                        <td><?php echo $item['premium_filling'];?></td></tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>P <?php echo $item['item_price'];?></td>
                                                    <td><?php echo $ord['item_quantity']; ?></td>
                                                    <td><?php echo $subtotal1; ?></td>
                                                </tr>

                                                <?php                           
                                            }
                                            else{
                                                $subtotal1 = $item['item_price'] * $ord['item_quantity'];
                                                $subtotal += $subtotal1;
                                                echo"
                                                    <tr>
                                                        <td>
                                                            <div class='media'>
                                                                <div class='media-body'>
                                                                    $item[item_name]
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>P $item[item_price]</td>
                                                        <td>$ord[item_quantity]</td>
                                                        <td>$subtotal1</td>
                                                    </tr> 
                                                ";
                                            }
                                    }
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

                                <tr> <!--DOWN PAYMENT DETAILS IF NAG DOWN PAYMENT SI CUSTOMER-->

                                    <h4>Down Payment:</h4>
                                            <h5>P 
                                                
                                                    <?php 
                                                    $down = $row['total']/2;
                                                    echo $down;
                                                ?>
                                            </h5>
                                </tr>

                                    <br>
                                <tr>
                                    <h3>FULL Payment:</h3>
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

                              <!--  <tr>
                                    <td>Discount:</td>
                                    <td>-P <?php echo $row['discount']?></td>
                                </tr> -->

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
                            <span>whiscakes.creation@gmail.com</span>
                        </span>
                        <span class="pr-2">
                            <i class="fab fa-facebook-f"></i>
                            <span>bea.mendoza</span>
                        </span>
                       <!-- <span class="pr-2">
                            <i class="fab fa-instagram"></i>
                            <span>whiscakes2021</span>
                        </span> -->
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>