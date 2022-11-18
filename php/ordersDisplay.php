<?php
    function dispOrd(){
        session_start();
        //require("auth.php");
        require("php/config.php");

        $user_id = $_SESSION['user_id'];

        $qry = "SELECT DISTINCT cart_number, user_id FROM payment_tb WHERE user_id = $user_id ORDER BY cart_number DESC";
        $result = mysqli_query($con, $qry);

        if($_SESSION['user_type'] == 'reseller'){
            $to = 'invoice-reseller.php';
        }
        else{
            $to = 'invoice-form.php';
        }
        ?>
        

        <div class='orders'>
            <h2 class='title1'>Pending Orders:</h2>
            <hr>

            <?php        
                if(mysqli_num_rows($result)){
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        
                        $user_id            = $row['user_id'];
                        $cart_number        = $row['cart_number'];
                        $_SESSION['order']  = $cart_number ;

                        
                    ?>
        
                    <form action="<?php echo $to; ?>" method="post">
                        <h1>No.: <?php print $cart_number ; ?>
                        </h1>
                        <input type="hidden" name="cart_number" value="<?php echo $cart_number; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <button type="submit" class="invoices">Invoice form &nbsp&nbsp&nbsp<i class="fas fa-file-invoice"></i></button>
                        <hr>
                    </form>

                    <style>
                        form .invoices {
                            color: rgb(0, 0, 0);
                            cursor: pointer;
                            background: rgb(195, 130, 9);
                            border: none;
                            outline: none;
                            height: 30px;
                        }
                    </style>
        
                    <?php
                            }
                        }
                        else{
                            echo "<h2>No orders yet.</h2>";
                        }

        $og= "SELECT DISTINCT cart_number, user_id FROM ongoing_tb WHERE user_id = $user_id ORDER BY cart_number DESC";
        $og_result = mysqli_query($con, $og);
                    ?>

        </div>

        <div class='orders'>
            <h2 class='title1'>On-going Orders:</h2>
            <hr>

            <?php        
                if(mysqli_num_rows($og_result)){
                    while($row1 = mysqli_fetch_array($og_result, MYSQLI_ASSOC)){
                        
                        $user_id1           = $row1['user_id'];
                        $order_id1          = $row1['cart_number'];
                        $_SESSION['order']  = $order_id1 ;
                    ?>
            
                        <form action="<?php echo $to; ?>" method="post">
                            <h1>No.: <?php print $order_id1; ?>
                            </h1>
                            <input type="hidden" name="cart_number" value="<?php echo $order_id1; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id1; ?>">
                            <button type="submit" class="invoices">Invoice form &nbsp&nbsp&nbsp<i class="fas fa-file-invoice"></i></button>
                            <hr>
                        </form>

                        <style>
                            form .invoices {
                                color: rgb(0, 0, 0);
                                cursor: pointer;
                                background: rgb(195, 130, 9);
                                border: none;
                                outline: none;
                                height: 30px;
                            }
                        </style>
        
                        <?php
                    }
                }
                else{
                    echo "<h2>No orders yet.</h2>";
                }

                $comp= "SELECT * FROM completed_tb WHERE user_id = $user_id ORDER BY cart_number DESC";
                $comp_result = mysqli_query($con, $comp);
            ?>

            
        </div>

        <div class='orders'>
            <h2 class='title1'>Completed Orders:</h2>
            <hr>

            <?php        
                if(mysqli_num_rows($comp_result)){
                    while($row2 = mysqli_fetch_array($comp_result, MYSQLI_ASSOC)){
                        
                        $user_id2    = $row2['user_id'];
                        $order_id2   = $row2['cart_number'];
                        $_SESSION['order'] = $order_id2;
                    ?>
    
                        <form action="<?php echo $to; ?>" method="post">
                            <h1>No.: <?php print $order_id2; ?>
                            </h1>
                            <input type="hidden" name="cart_number" value="<?php echo $order_id2; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id2; ?>">
                            <button type="submit" class="invoices">Invoice form &nbsp&nbsp&nbsp<i class="fas fa-file-invoice"></i></button>
                            <hr>
                        </form>

                        <style>
                            form .invoices {
                                color: rgb(0, 0, 0);
                                cursor: pointer;
                                background: rgb(195, 130, 9);
                                border: none;
                                outline: none;
                                height: 30px;
                            }
                        </style>
 
                        <?php
                    }
                }
                else{
                    echo "<h2>No completed orders yet.</h2>";
                }
                            //end
            ?>

        </div>
<?php  
    }

    if(isset($_POST['submit'])){
        
        if($_POST['submit'] == 'Invoice Form' && $_POST['user_type'] == 'reseller'){
            echo"
            <form id='invoice' method='post' action='../invoice-reseller.php'>
                <input type='hidden' name='cart_number' value='$_POST[cart_number]'>
                <input type='hidden' name='user_id' value='$_POST[user_id]'>
            </form>

            <script>
                document.getElementById('invoice').submit('../invoice-reseller.php');
            </script>
            ";
        }
         elseif($_POST['submit'] == 'Invoice Form' && $_POST['user_type'] == 'client'){
            echo"
            <form id='invoice' method='post' action='../invoice-form.php'>
                <input type='hidden' name='cart_number' value='$_POST[cart_number]'>
                <input type='hidden' name='user_id' value='$_POST[user_id]'>
            </form>

            <script>
                document.getElementById('invoice').submit('../invoice-form.php');
            </script>
            ";
        }
        // elseif($_POST['submit'] == 'Invoice Form' && $_POST['type'] == 'completed'){
        //     echo"
        //     <form id='invoice' method='post' action='../invoice-completed.php'>
        //         <input type='hidden' name='cart_number' value='$_POST[cart_number]'>
        //         <input type='hidden' name='user_id' value='$_POST[user_id]'>
        //     </form>

        //     <script>
        //         document.getElementById('invoice').submit('../invoice-ongoing.php');
        //     </script>
        //     ";
        // }
        elseif($_POST['submit'] == 'Proceed' && $_POST['type'] == 'pending'){
            require("config.php");

            $payment_id        =  mysqli_real_escape_string($con, $_POST['payment_id']);
            $cart_number       =  mysqli_real_escape_string($con, $_POST['cart_number']);
            $user_id           =  mysqli_real_escape_string($con, $_POST['user_id']);

            $insert = "INSERT INTO ongoing_tb (cart_number, user_id) VALUES ('$cart_number', '$user_id')";
            
            $subject        = "Order No. ".$cart_number;
            $from           = "From: whiscakes.creation@gmail.com";
            $message        = "Good day our dear client! \n\nYour order is already ongoing. Be reminded that you are no longer to cancel your order. \n\nThank you!";
            
            $result = mysqli_query($con, "SELECT email FROM users_tb WHERE user_id = '$user_id'");
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
          
            mail( $user['email'], $subject, $message, $from);

            $delete ="DELETE FROM payment_tb WHERE payment_id = '$payment_id'";

            mysqli_query($con, $insert);
            mysqli_query($con, $delete);
            echo '<script>window.location="../admin.php"</script>';
        }
        elseif($_POST['submit'] == 'Done' && $_POST['type'] == 'ongoing'){
            require("config.php");

            $ongoing_id        =  mysqli_real_escape_string($con, $_POST['ongoing_id']);
            $cart_number       =  mysqli_real_escape_string($con, $_POST['cart_number']);
            $user_id           =  mysqli_real_escape_string($con, $_POST['user_id']);

            $insert = "INSERT INTO completed_tb (cart_number, user_id) VALUES ('$cart_number', '$user_id')";
            
            $result1 = mysqli_query($con, "SELECT date_time FROM order_reseller WHERE user_id = '$user_id' AND cart_number = '$cart_number'");
            $dateTime = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            
            $convert = new DateTime($dateTime['date_time']);
            $date = $convert->format('Y-m-d h:i:sa');
          
            
            $subject        = "Order No. ".$cart_number;
            $from           = "From: whiscakes.creation@gmail.com";
            $message        = "Good day our dear client! \n\nYour order is ready to be delivered.\nDate and Time of delivery: ".$date." \n\nThank you!";
            
            $result2 = mysqli_query($con, "SELECT email FROM users_tb WHERE user_id = '$user_id'");
            $user = mysqli_fetch_array($result2, MYSQLI_ASSOC);
          
            mail( $user['email'], $subject, $message, $from);

            $delete ="DELETE FROM ongoing_tb WHERE ongoing_id = '$ongoing_id'";

            mysqli_query($con, $insert);
            mysqli_query($con, $delete);
            echo '<script>window.location="../admin.php"</script>';
        }
        elseif($_POST['submit'] == 'Decline'&& $_POST['type'] == 'pending'){

            require("config.php");

            $delete ="DELETE FROM payment_tb WHERE payment_id = '$_POST[payment_id] AND user_id = $_POST[user_id]'";
            if($_POST['user_type'] == 'reseller'){
                $delete1 ="DELETE FROM order_reseller WHERE cart_number = '$_POST[cart_number] AND user_id = $_POST[user_id]'";
            }
            else{
                $delete1 ="DELETE FROM order_tb WHERE cart_number = '$_POST[cart_number] AND user_id = $_POST[user_id]'";
            }
            mysqli_query($con, $delete);
            mysqli_query($con, $delete1);
            echo '<script>window.location="../admin.php"</script>';
        }
    }

    
?>
