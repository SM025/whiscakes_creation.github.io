<?php
    function customCompute($item_id){
        require("config.php");

        $cake_order = "SELECT SUM(cake.price) as total
        FROM custom_cakes
        INNER JOIN cake 
        WHERE(
            size = cake.name OR 
            cake_base = cake.name OR 
            cake_base_flavor = cake.name OR 
            regular_filling = cake.name OR 
            premium_filling = cake.name
        ) AND item_id = $item_id";

        $cake = mysqli_query($con, $cake_order);
        $cake_total = mysqli_fetch_assoc($cake);

        return $cake_total['total'];
    }

    function discount($voucher,$total){
        require("php/config.php");

        $result = mysqli_query($con, "SELECT *  FROM vouchers_tb WHERE code = '$voucher'");
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) == 1 && $voucher == $row['code']){
            $total *= $row['discount'];
            
            return $total;
        }
        else{
            return 0;
        }
    }

    function inclusion($cart_number){
        require("php/config.php");
       
        $query = mysqli_query($con, "SELECT * FROM hidden_tb WHERE cart_number = '$cart_number'");
        while($cart = mysqli_fetch_array($query, MYSQLI_ASSOC)){  
            $item_query = mysqli_query($con, "SELECT * FROM $cart[item_db] WHERE item_id = '$cart[item_id]'");
            //$cart_id = $cart['cart_id'];
           
            while($item = mysqli_fetch_array($item_query, MYSQLI_ASSOC)){ 
                if($cart['item_db'] == "custom_cakes"){
                    
                            echo"
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
                            <td>$cart[item_quantity]</td>
                        </tr>
                    ";
                }
                else{
                    echo "
                            <td><h5>$item[item_name]</h5></td>
                            <td><h5>PHP $item[item_price]</h5></td>
                            <td>$cart[item_quantity]</td>
                        </tr>
                    ";
                } 
            }
        }
    }

    function inclusion_reseller($cart_number){
        require("php/config.php");
       
        $query = mysqli_query($con, "SELECT * FROM hidden_reseller WHERE cart_number = '$cart_number'");
        while($cart = mysqli_fetch_array($query, MYSQLI_ASSOC)){  
            
            $cupcake        =   $cart['cupcakes'];
            $cookie_bars    =   $cart['cookie_bars'];
            $bento_cake     =   $cart['bento_cake'];
            $egg_pie        =   $cart['egg_pie'];
            $choco_eggpie   =   $cart['chocolate_egg_pie'];
            $strawberry_pie =   $cart['strawberry_pie'];
            $cake_pops      =   $cart['cake_pops'];
            $brownies_bites =   $cart['brownie_bites'];
            $cookies        =   $cart['cookies'];
            $choco_mallows  =   $cart['marshmallows'];

            if($cupcake>0){
                echo"
                    <td>Cupcakes</td>
                    <td><h5>PHP 400</h5></td>
                    <td>$cupcake</td>
                </tr>
                ";
            }
            if($cookie_bars>0){
                echo"
                    <td>Cookie Bars</td>
                    <td><h5>PHP 130</h5></td>
                    <td>$cookie_bars</td>
                </tr>
                ";
            }
            if($bento_cake>0){
                echo"
                    <td>Bento Cake</td>
                    <td><h5>PHP 200</h5></td>
                    <td>$bento_cake</td>
                </tr>
                ";
            }
            if($egg_pie>0){
                echo"
                    <td>Egg Pie</td>
                    <td><h5>PHP 250</h5></td>
                    <td>$egg_pie</td>
                </tr>
                ";
            }
            if($choco_eggpie>0){
                echo"
                    <td>Chocolate Egg Pie</td>
                    <td><h5>PHP 220</h5></td>
                    <td>$choco_eggpie</td>
                </tr>
                ";
            }
            if($strawberry_pie>0){
                echo"
                    <td>Strawberry Pie</td>
                    <td><h5>PHP 200</h5></td>
                    <td>$strawberry_pie</td>
                </tr>
                ";
            }
            if($cake_pops>0){
                echo"
                    <td>Cake Pops</td>
                    <td><h5>PHP 120</h5></td>
                    <td>$cake_pops</td>
                </tr>
                ";
            }
            if($brownies_bites>0){
                echo"
                    <td>Brownies Bites</td>
                    <td><h5>PHP 220</h5></td>
                    <td>$brownies_bites</td>
                </tr>
                ";
            }
            if($cookies>0){
                echo"
                    <td>Cookies</td>
                    <td><h5>PHP 200</h5></td>
                    <td>$cookies</td>
                </tr>
                ";
            }
            if($choco_mallows>0){
                echo"
                    <td>Chocolate Covered Marshmallows</td>
                    <td><h5>PHP 75</h5></td>
                    <td>$choco_mallows</td>
                </tr>
                ";
            }
        }
    }

    function dispItem($name, $quantity, $price){
        $subtotal = $quantity * $price;

        echo"
            <tr>
                <td>
                    <div class='media'>
                        <div class='media-body'>
                            $name
                        </div>
                    </div>
                </td>
                <td>P $price</td>
                <td>$quantity</td>
                <td>$subtotal</td>
            </tr> 
        ";

        return $subtotal;
        
    }
?>