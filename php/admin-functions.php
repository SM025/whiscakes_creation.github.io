<?php
    function users(){
        require("config.php");

        $user_qry = mysqli_query($con, "SELECT * FROM users_tb WHERE user_id > 0");
        
        echo"
            <link rel='stylesheet' href='../css/shop-gallery.css'>
            <div class='recent-grid'>
                <div class='projects'>
                    <div class='card'>
                        <div class='card-header'>
                            <h3>Users</h3>
                        </div>

                        <div class='card-body'>
                            <div class='table-responsive'>
                                <table width='100%'>
                                    <thead>
                                        <tr>
                                            <td>User ID</td>
                                            <td>First Name</td>
                                            <td>Last Name</td>
                                            <td>Email Address</td>
                                         <!--   <td>User Type</td>-->
                                            <td>User Status</td> 
                                            <td></td>
                                        </tr>
                                    </thead>";

                            while($user = mysqli_fetch_array($user_qry, MYSQLI_ASSOC)){
                                echo"<tbody>
                                        <tr>
                                            <td>$user[user_id]</td>
                                            <td>$user[first_name]</td>
                                            <td>$user[last_name]</td>
                                            <td>$user[email]</td>
                                           <!-- <td>$user[user_type]</td>-->
                                            <td>$user[user_status]</td> 
                                            <td>
                                               <form action='php/blocking.php' method='post'>
                                                    <input type='hidden' name='id' value='$user[user_id]'>";
                                                    
                                                    if($user['user_status'] == "Active"){
                                                        echo"<input type='submit' class='block' name='Blocking' value='Block'>";
                                                    }
                                                    elseif($user['user_status'] == "Blocked"){
                                                        echo"<input type='submit' class='block' name='Blocking' value='Unblock'>";
                                                    }
                                        echo"
                                                </form>
                                            </td>
                                        </tr>";
                                    }
                                       
                               echo"</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }

    function clients(){
        require("config.php");

        $client_qry = mysqli_query($con, "SELECT * FROM order_tb");
        $old_num = -1;
        $old_id = -1;

        echo"
            <div class='recent-grid'>
                <div class='projects'>
                    <div class='card'>
                        <div class='card-header'>
                            <h3>Clients</h3>
                        </div>

                        <div class='card-body'>
                            <div class='table-responsive'>
                                <table width='100%'>
                                    <thead>
                                        <tr>
                                            <td>Cart Number</td>
                                            <td>Full Name</td>
                                            <td>Phone Number</td>
                                            <td>Address</td>
                                            <td>Email Address</td>
                                            <td>Date and Time of Delivery</td>
                                            <td>Discount</td>
                                            <td>Mode of Payment</td>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    while($client = mysqli_fetch_array($client_qry, MYSQLI_ASSOC)){
                                        $info_qry = mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $client[user_id]");
                                        while($info = mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){ 

                                            if($client['cart_number'] != $old_num || $client['user_id'] != $old_id){
                                                echo"
                                                    <tr>
                                                        <td>$client[cart_number]</td>
                                                        <td>$info[first_name] $info[last_name]</td>
                                                        <td>$client[num]</td>
                                                        <td>$client[address]</td>
                                                        <td>$info[email]</td>
                                                        <td>$client[date_time]</td>
                                                        <td>$client[discount]</td> <!--voucher code-->
                                                        <td>$client[mode]</td>
                                                    </tr>";
                                            }
                                            $old_num = $client['cart_number'];
                                            $old_id = $client['user_id'];
                                        }
                                    }

                                    $client_qry = mysqli_query($con, "SELECT * FROM order_reseller");
                                    
                                    while($client = mysqli_fetch_array($client_qry, MYSQLI_ASSOC)){
                                        $info_qry = mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $client[user_id]");
                                        while($info = mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){ 

                                            if($client['cart_number'] != $old_num || $client['user_id'] != $old_id){
                                                echo"
                                                    <tr>
                                                        <td>$client[cart_number]</td>
                                                        <td>$info[first_name] $info[last_name]</td>
                                                        <td>$client[num]</td>
                                                        <td>$client[address]</td>
                                                        <td>$info[email]</td>
                                                        <td>$client[date_time]</td>
                                                        <td>$client[discount]</td>
                                                        <td>$client[mode]</td>
                                                    </tr>";
                                            }
                                            $old_num = $client['cart_number'];
                                            $old_id = $client['user_id'];
                                        }
                                    }
                                       
                                    echo"</tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                
            </div>
        ";

    }

    function orders(){
        
        require("config.php");

        $order_qry = mysqli_query($con, "SELECT * FROM order_tb");
        while($order = mysqli_fetch_array($order_qry, MYSQLI_ASSOC)){
            $info_qry = mysqli_query($con, "SELECT * FROM $order[item_db] WHERE item_id = $order[item_id]");
            while($item = mysqli_fetch_array($info_qry, MYSQLI_ASSOC)){
                if(isset($_POST['cart_number'])){
                    $cart_number = mysqli_real_escape_string($con, $_POST['cart_number']);
                    mysqli_query($con, "DELETE FROM order_tb WHERE cart_number = $cart_number AND user_id = $order[user_id]");
                    mysqli_query($con, "DELETE FROM payment_tb WHERE cart_number = $cart_number AND user_id = $order[user_id]");
                    mysqli_query($con, "DELETE FROM ongoing_tb WHERE cart_number = $cart_number AND user_id = $order[user_id]");
                    mysqli_query($con, "DELETE FROM completed_tb WHERE cart_number = $cart_number AND user_id = $order[user_id]");
                      mysqli_query($con, "DELETE FROM completed_tb WHERE cart_number = $cart_number AND user_id = $order[user_id]");
                    echo"<script>window.location = 'admin-orders.php'</script>";
                }

                $user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $order[user_id]"), MYSQLI_ASSOC);
                
                $convert = new DateTime($order['date_time']);
                $date = $convert->format('Y-m-d h:i:sa');
                echo"
                    <tr>
                        <form  method='POST' action=''>
                            <td>$order[cart_number]</td>
                             <td>$date</td>
                            <td>$user[first_name] $user[last_name]</td>
                ";


                if($order['item_db'] == "custom_cakes"){
                    echo" 
                                <td>
                                    <table>
                                        <tr><td><p class='mt-0 title'>Event:</p></td>                 
                                            <td>$item[event]</td></tr>
                                        <tr><td><p class='mt-0 title'>Cake shape:</p></td>            
                                            <td>$item[shape]</td></tr>
                                        <tr><td><p class='mt-0 title'>Cake size:</p></td>             
                                            <td>$item[size]</td></tr>
                                        <tr><td><p class='mt-0 title'>Cake layer:</p></td>            
                                            <td>$item[cake_base]</td></tr>
                                        <tr><td><p class='mt-0 title'>Cake layer flavors:</p></td>    
                                            <td>$item[cake_base_flavor]</td></tr>
                                        <tr><td><p class='mt-0 title'>Regular Fillings:</p></td>      
                                            <td>$item[regular_filling]</td></tr>
                                        <tr><td><p class='mt-0 title'>Premium Fillings:</p></td>      
                                            <td>$item[premium_filling]</td></tr>
                                    </table>
                                </td>
                    ";
                }
                else{
                    echo"
                        <td>$item[item_name]</td>
                        
                    ";
                }

                echo"

                            <td>$order[item_quantity]</td>

                            <input type='hidden' name='cart_number' value='$order[cart_number]'>
                        
                            <td><input type='submit' class='delete' value='Delete'></td>
                        </form>
                    </tr>
                ";
            }
        }
        
        $order_qry = mysqli_query($con, "SELECT * FROM order_reseller");
            while($item = mysqli_fetch_array($order_qry, MYSQLI_ASSOC)){
                if(isset($_POST['cart_number'])){
                    $cart_number = mysqli_real_escape_string($con, $_POST['cart_number']);
                    mysqli_query($con, "DELETE FROM order_reseller WHERE cart_number = $cart_number AND user_id = $item[user_id]");
                    mysqli_query($con, "DELETE FROM payment_tb WHERE cart_number = $cart_number AND user_id = $item[user_id]");
                    mysqli_query($con, "DELETE FROM ongoing_tb WHERE cart_number = $cart_number AND user_id = $item[user_id]");
                    mysqli_query($con, "DELETE FROM completed_tb WHERE cart_number = $cart_number AND user_id = $item[user_id]");
                    mysqli_query($con, "DELETE FROM completed_tb WHERE cart_number = $cart_number AND user_id = $item[user_id]");
                    echo"<script>window.location = 'admin-orders.php'</script>";
                }

                $cupcake        =   $item['cupcakes'];
                $cookie_bars    =   $item['cookie_bars'];
                $bento_cake     =   $item['bento_cake'];
                $egg_pie        =   $item['egg_pie'];
                $choco_eggpie   =   $item['chocolate_egg_pie'];
                $strawberry_pie =   $item['strawberry_pie'];
                $cake_pops      =   $item['cake_pops'];
                $brownies_bites =   $item['brownie_bites'];
                $cookies        =   $item['cookies'];
                $choco_mallows  =   $item['marshmallows'];

               

                $user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $item[user_id]"), MYSQLI_ASSOC);
                echo"
                    <tr>
                        <form  method='POST' action=''>
                            <td>$item[cart_number]</td>
                            <td>06-15-22</td>
                            <td>$user[first_name] $user[last_name]</td>
                ";

                echo" 
                <td>
                   <center> <table>";

                if($cupcake>0){
                    echo" <tr><td>Cupcakes: </td><td>$cupcake</td></tr>";
                }
                if($cookie_bars>0){
                    echo" <tr><td>Cookie Bars: </td><td>$cookie_bars</td></tr>";
                }
                if($bento_cake>0){
                    echo" <tr><td>Bento Cake: </td><td>$bento_cake</td></tr>";
                }
                if($egg_pie>0){
                    echo" <tr><td>Egg Pie: </td><td>$egg_pie</td></tr>";
                }
                if($choco_eggpie>0){
                    echo" <tr><td>Chocolate Egg Pie: </td><td>$choco_eggpie</td></tr>";
                }
                if($strawberry_pie>0){
                    echo" <tr><td>Strawberry Pie: </td><td>$strawberry_pie</td></tr>";
                }
                if($cake_pops>0){
                    echo" <tr><td>Cake Pops: </td><td>$cake_pops</td></tr>";
                }
                if($brownies_bites>0){
                    echo" <tr><td>Brownies Bites: </td><td>$brownies_bites</td></tr>";
                }
                if($cookies>0){
                    echo" <tr><td>Cookies: </td><td>$cookies</td></tr>";
                }
                if($choco_mallows>0){
                    echo" <tr><td>Chocolate Covered Marshmallows: </td><td>$choco_mallows</td></tr>";
                }
                
                echo" </table></center>
                    </td>
                ";

                echo"
                        <td></td>
                            <input type='hidden' name='cart_number' value='$item[cart_number]'>
                            <td><input type='submit' class='delete' value='Delete'></td>
                        </form>
                    </tr>
                ";
            }
    }
    

    function counting($index){

        require("config.php");

        switch($index){
            case 0:
                $user_count = mysqli_query($con, "SELECT * FROM users_tb");

                echo $result = mysqli_num_rows($user_count) - 1;
                break;

            case 1:
                $pending_count = mysqli_query($con, "SELECT * FROM payment_tb");

                echo $result = mysqli_num_rows($pending_count);
                break;
            case 2:
                $ongoing_count = mysqli_query($con, "SELECT * FROM ongoing_tb");

                echo $result = mysqli_num_rows($ongoing_count);
                break;
            case 3:
                $completed_count = mysqli_query($con, "SELECT * FROM completed_tb");

                echo $result = mysqli_num_rows($completed_count);
                break;
        }
    }

    function pendingDisplay(){
        
        require("config.php");

        $qry = "SELECT * FROM payment_tb ORDER BY payment_id DESC";
        $result = mysqli_query($con, $qry);

        echo"
            <table width='100%'>
                <tr>
                    <th>Order ID-User ID</th>
                    <th colspan='3'>Invoice</th>
                </tr>";

            if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $query = mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $row[user_id]");
                    $info = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    echo"
                        <tr>
                            <form method='post' action='php/ordersDisplay.php'>
                                <td>$row[cart_number]-$row[user_id]</td>
                                <input type='hidden' name='user_type' value='$info[user_type]'>
                                <input type='hidden' name='payment_id' value='$row[payment_id]'>
                                <input type='hidden' name='cart_number' value='$row[cart_number]'>
                                <input type='hidden' name='user_id' value='$row[user_id]'>
                                
                                <input type='hidden' name='type' value='pending'>
                                <td><input type='submit' class='delete' value='Invoice Form' name='submit'></td>
                                <td><input type='submit' class='delete' value='Proceed' name='submit'></td>
                                <td><input type='submit' class='delete' value='Decline' name='submit'></td>
                            </form>
                        </tr>
                    ";
                }
            }
            
        
        echo"</table>";
    }

    
    function ongoingDisplay(){

        require("config.php");

        $qry = "SELECT * FROM ongoing_tb ORDER BY ongoing_id DESC";
        $result = mysqli_query($con, $qry);

        echo"
            <table width='100%'>
                <tr>
                    <th>Order ID-User ID</th>
                    <th colspan='3'>Invoice</th>
                </tr>";

            if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $query = mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $row[user_id]");
                    $info = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    echo"
                        <tr>
                            <form method='post' action='php/ordersDisplay.php'>
                                <td>$row[cart_number]-$row[user_id]</td>
                                <input type='hidden' name='user_type' value='$info[user_type]'>
                                <input type='hidden' name='ongoing_id' value='$row[ongoing_id]'>
                                <input type='hidden' name='cart_number' value='$row[cart_number]'>
                                <input type='hidden' name='user_id' value='$row[user_id]'>

                                <input type='hidden' name='type' value='ongoing'>
                                <td><input type='submit' class='delete' value='Invoice Form' name='submit'></td>
                                <td><input type='submit' class='delete' value='Done' name='submit'></td>
                            </form>
                        </tr>
                    ";
                }
            }
            
        echo"</table>";
    };

    function completedDisplay(){
        
        require("config.php");

        $qry = "SELECT * FROM completed_tb ORDER BY completed_id DESC";
        $result = mysqli_query($con, $qry);

        echo"
            <table width='100%'>
                <tr>
                    <th>Order ID-User ID</th>
                    <th colspan='3'>Invoice</th>
                </tr>";

            if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $query = mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $row[user_id]");
                    $info = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    echo"
                        <tr>
                            <form method='post' action='php/ordersDisplay.php'>
                                <td>$row[cart_number]-$row[user_id]</td>
                                <input type='hidden' name='user_type' value='$info[user_type]'>
                                <input type='hidden' name='id' value='$row[completed_id]'>
                                <input type='hidden' name='cart_number' value='$row[cart_number]'>
                                <input type='hidden' name='user_id' value='$row[user_id]'>

                                <input type='hidden' name='type' value='completed'>
                                <td><input type='submit' class='delete' value='Invoice Form' name='submit'></td>
                            </form>
                        </tr>
                    ";
                }
            }
            
        
        echo"</table>";
    }
    
    function ratingDisplay($type){
        require("config.php");

        $qry = "SELECT * FROM users_feedbacks ORDER BY feedback_id DESC";
        $result = mysqli_query($con, $qry);

        if(mysqli_num_rows($result) == 0){
            echo"No customer ratings yet.";
        }
        else{
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                echo"<div class='testimonial-box'>
                    <div class='box-top'>
                        <div class='profile'>
                            <div class='name-user'>";
                $info = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = '$row[user_id]'"), MYSQLI_ASSOC);
                $first = $info['first_name'];
                $last = $info['last_name'];
                
                
                if($type == 1){
                    echo "<strong>$first $last</strong>";
                }
                elseif($type == 2){
                    $first = $first[0];
                    echo "<strong>$first. $last</strong>";
                }
                echo"         </div>
    
                            <div class='reviews'>
                ";
    
                for($i=0; $i < $row['user_rating']; $i++){
                    echo"<i class='fas fa-star'></i>";
                }
                
                echo"
                            </div>
                
                            <div class='client-comment'>
                                <p>$row[user_feedback]</p>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }

        
    }

    function applicationList(){
        require("config.php");

        $qry = "SELECT * FROM reseller_application ORDER BY app_id DESC";
        $result = mysqli_query($con, $qry);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $image = $row['id_image'];
            
            date_default_timezone_set('Asia/Manila');
            $datetime = new DateTime(date("Y-m-d"));
            $datetime->modify('+1 day');
            $d = $datetime->format('Y-m-d');
            $t = date("H:i:s");
            $date = $d.'T'.$t;
            echo"
                <tr>
                    <form method='post' action='php/application-functions.php'>
                        <td>$row[first_name] $row[last_name]</td>
                        <td>$row[phone_number]</td>
                        <td>$row[email]</td>
                        <td>
                            <a href='php/zoom.php?image=$image'>
                                <img src='images/reseller_id/$row[id_image]' alt='' class='thumbnail'>
                            </a>
                        </td>

                        <td>
                            <input type='datetime-local' name='dat' min='$date' step='any' required><br>
                            <input type='text' name='gmeet' placeholder='Google Meet Link' pattern='*.+meet.google.com/.*' title='Google meet link' required>
                        </td>

                        <td>
                            <input type='hidden' name='id' value='$row[app_id]'>
                            <input type='hidden' name='first_name' value='$row[first_name]'>
                            <input type='hidden' name='last_name' value='$row[last_name]'>
                            <input type='hidden' name='num' value='$row[phone_number]'>
                            <input type='hidden' name='email' value='$row[email]'>
                            <input type='hidden' name='image' value='$image'>
                            <input type='hidden' name='type' value='application'>
                            <input type='submit' class='delete1' value='Accept' name='submit'><br><br><br><br>
                            <input type='submit' class='delete1' value='Decline' name='submit'>
                        </td> 
                    </form> 
                </tr>
            ";
        }
    }
    
    function approvalList(){
        require("config.php");

        $qry = "SELECT * FROM reseller_approval ORDER BY app_id DESC";
        $result = mysqli_query($con, $qry);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $image = $row['id_image'];
            echo"
                <tr>
                    <form method='post' action='php/application-functions.php'>
                        <td>$row[first_name] $row[last_name]</td>
                        <td>$row[phone_number]</td>
                        <td>$row[email]</td>
                        <td>
                            <a href='php/zoom.php?image=/approval/a$image'>
                                <img src='images/reseller_id/approval/a$row[id_image]' alt='' class='thumbnail'>
                            </a>
                        </td>

                        <td>
                            <input type='password' name='password' placeholder='Password to be sent' required><br>
                        </td>

                        <td>
                            <input type='hidden' name='id' value='$row[app_id]'>
                            <input type='hidden' name='first_name' value='$row[first_name]'>
                            <input type='hidden' name='last_name' value='$row[last_name]'>
                            <input type='hidden' name='num' value='$row[phone_number]'>
                            <input type='hidden' name='email' value='$row[email]'>
                            <input type='hidden' name='image' value='$image'>
                            <input type='hidden' name='type' value='approval'>
                            <input type='submit' class='delete1' value='Accept' name='submit'><br><br><br><br>
                            <input type='submit' class='delete1' value='Decline' name='submit'>
                        </td> 
                    </form> 
                </tr>
            ";
        }
    }

    /*

    function productss(){
        require("config.php");

        $qry = "SELECT * FROM bnp_tbl";
        $result = mysqli_query($con, $qry);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            echo"
                <h2>List of products</h2>
                <!-- TABLE CONSTRUCTION -->
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Item</th>
                    </tr>
                    <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                    <?php
                        // LOOP TILL END OF DATA
                        while($rows=$result->fetch_assoc())
                        {
                    ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
                            ROW OF EVERY COLUMN -->
                        <td><?php echo $row[item_name];?></td>
                        <td><?php echo $row[item_price];?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            ";
        }
    }
*/

    

?>