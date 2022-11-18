<?php

    function galleryDisplay($dbname, $user_id){
        require("config.php");

        $qry = "SELECT * FROM $dbname";
        $result = mysqli_query($con, $qry);
        $counter = 1;
        
        while($user = mysqli_fetch_array($result, MYSQLI_ASSOC)){  
            if(($counter + 2) % 3 == 0){
                echo"
                    <div class='wrapper'>
                ";
            }
            echo"
            <div class='card'>
                <img src='$user[item_image]'>
                <div class='content'>
                    <div class='row'>
                          
                        <div class='details'>
                
                            <span>$user[item_name]</span>
                        </div>

                        <div class='price'>P$user[item_price]</div>
                    </div>

                    <form method='POST' action='php/addToCart.php'>
                        <input type='hidden' name='item_id' value='$user[item_id]'>
                        <input type='hidden' name='dbname' value='$dbname'>
                        <input type='hidden' name='user_id' value='$user_id'>
                        <div class='buttons'>
                            <button type='submit' class='cart-btn'>Add to Cart</button>
                        </div>
                  
                    </form>

                    <form method='POST' name='details' action='item-details.php'>
                        <input type='hidden' name='item_id' value='$user[item_id]'>
                        <input type='hidden' name='dbname' value='$dbname'>
                        <input type='hidden' name='user_id' value='$user_id'><br><br><br><br><br><br><br>
                        <button class='button' onclick='send()'>Details</button>
                    </form>

                          
                    
                    <div id='popup1' class='overlay'>
                        <div class='popup'>
                            <h2>Cake #1</h2>
                            <a class='close' href='#'>&times;</a>
                        
                            decorations: chocnut<br>
                            shape: round<br>
                            size: 6x4<br>
                            layers: moist cake<br>
                            layer flavor: chocolate<br>
                            premium fillings: ganache<br>
                            reg filling: whipped cream<br>
                            other engridient: eggs<br>
                            butter <br>
                            sugar <br>
                            salt<br>
                            milk <br>
                            baking soda<br>
                    
                        </div>
                    </div>

                </div>
            </div>
            ";
        
            if($counter % 3 == 0){
                echo"
                    </div>
                ";
            }
            $counter++;
        }
    }

    function cartDisplay($user_id){
        require("config.php");
        $query = mysqli_query($con, "SELECT * FROM cart_tb WHERE user_id = '$user_id'");
        $number= 0 ;
        
        while($cart = mysqli_fetch_array($query, MYSQLI_ASSOC)){  
            $item_query = mysqli_query($con, "SELECT * FROM $cart[item_db] WHERE item_id = '$cart[item_id]'");
            $cart_id = $cart['cart_id'];
            echo"<tr>";

            while($item = mysqli_fetch_array($item_query, MYSQLI_ASSOC)){ 
                if($cart['item_db'] == "custom_cakes"){
                    echo "
                            <td>";

                            if($item['item_image'] == 'no image'){
                                echo"No Image Uploaded.";
                            }
                            else{
                                echo"<img src='images/orders/$item[item_image]'>";
                            }
                            
                            echo"
                            </td>

                            <td>
                                <hr>
                                <table>
                                    <tr><td><h6>Event:</h6></td><td><h6>$item[event]</h6></td></tr>
                                    <tr><td><h6>Cake shape:</h6></td><td><h6>$item[shape]</h6></td></tr>
                                    <tr><td><h6>Cake size:</h6></td><td><h6>$item[size]</h6></td></tr>
                                    <tr><td><h6>Cake layer:</h6></td><td><h6>$item[cake_base]</h6></td></tr>
                                    <tr><td><h6>Cake layer flavors:</h6></td><td><h6>$item[cake_base_flavor]</h6></td></tr>
                                    <tr><td><h6>Regular Fillings:</h6></td><td><h6>$item[regular_filling]</h6></td></tr>
                                    <tr><td><h6>Premium Fillings:</h6></td><td><h6>$item[premium_filling]</h6></td></tr>
                                </table>
                            </td>
                            <td><h5>PHP $item[item_price]</h5></td>
                            <input type='hidden' name='cart_id[]' value='$cart_id'>
                            <td><input type='number' name='quantity[]' id='items' step='1' value='1' min='1'></td>
                        </tr>
                    ";
                    $number++;
                }
            
                else{
                    echo "
                            <td><img src='$item[item_image]'></td>
                            <td><h5>$item[item_name]</h5></td>
                            <td><h5>PHP $item[item_price]</h5></td>
                            <input type='hidden' name='cart_id[]' value='$cart_id'>
                            <td><input type='number' name='quantity[]' id='items' step='1' value='1' min='1' max='10'></td>
                        </tr>
                    ";
                    $number++;
                } 
            }
        }
    }
    
    function cartRemove($user_id){
        require("config.php");
        $query = mysqli_query($con, "SELECT * FROM cart_tb WHERE user_id = '$user_id'");
        $number= 0 ;
        
        while($cart = mysqli_fetch_array($query, MYSQLI_ASSOC)){  
            $item_query = mysqli_query($con, "SELECT * FROM $cart[item_db] WHERE item_id = '$cart[item_id]'");
            $cart_id = $cart['cart_id'];
            echo"<tr>
                <td>
                    <form method='post' action='php/deleteItem.php'>
                        <input type='hidden' name='id' value='$cart_id'>
                        <input type='submit' name='delete' value='Remove Item'>
                    </form>
                </td>";

            while($item = mysqli_fetch_array($item_query, MYSQLI_ASSOC)){ 
                if($cart['item_db'] == "custom_cakes"){
                    echo "
                            <td>";

                            if($item['item_image'] == 'no image'){
                                echo"No Image Uploaded.";
                            }
                            else{
                                echo"<img src='images/orders/$item[item_image]'>";
                            }
                            
                            echo"
                            </td>

                            <td>
                                <hr>
                                <table>
                                    <tr><td><h6>Event:</h6></td><td><h6>$item[event]</h6></td></tr>
                                    <tr><td><h6>Cake shape:</h6></td><td><h6>$item[shape]</h6></td></tr>
                                    <tr><td><h6>Cake size:</h6></td><td><h6>$item[size]</h6></td></tr>
                                    <tr><td><h6>Cake layer:</h6></td><td><h6>$item[cake_base]</h6></td></tr>
                                    <tr><td><h6>Cake layer flavors:</h6></td><td><h6>$item[cake_base_flavor]</h6></td></tr>
                                    <tr><td><h6>Regular Fillings:</h6></td><td><h6>$item[regular_filling]</h6></td></tr>
                                    <tr><td><h6>Premium Fillings:</h6></td><td><h6>$item[premium_filling]</h6></td></tr>
                                </table>
                            </td>
                            <td><h5>PHP $item[item_price]</h5></td>
                            <input type='hidden' name='cart_id[]' value='$cart_id'>
                        </tr>
                    ";
                    $number++;
                }
            
                else{
                    echo "
                            <td><img src='$item[item_image]'></td>
                            <td><h5>$item[item_name]</h5></td>
                            <td><h5>PHP $item[item_price]</h5></td>
                            <input type='hidden' name='cart_id[]' value='$cart_id'>
                        </tr>
                    ";
                    $number++;
                } 
            }
        }
    }
?>

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

<script>
    function send(){
        document.details.submit();
    }
</script>