<?php
    require("config.php");
    require_once("computePrice.php");

    $user_id            =  mysqli_real_escape_string($con, $_POST['id']);
    $cupcake_desc       =  mysqli_real_escape_string($con, $_POST['cupcake_desc']);
    $cupcake            =  mysqli_real_escape_string($con, $_POST['cupcake_qty']);
    $cookie_bars        =  mysqli_real_escape_string($con, $_POST['cookie_bars_qty']);
    $bento_cake         =  mysqli_real_escape_string($con, $_POST['bento_cake_qty']);
    $egg_pie            =  mysqli_real_escape_string($con, $_POST['egg_pie_qty']);
    $choco_eggpie       =  mysqli_real_escape_string($con, $_POST['choco_eggpie_qty']);
    $strawberry_pie     =  mysqli_real_escape_string($con, $_POST['strawberry_pie_qty']);
    $cake_pops          =  mysqli_real_escape_string($con, $_POST['cake_pops_qty']);
    $brownies_bites     =  mysqli_real_escape_string($con, $_POST['brownies_bites_qty']);
    $cookies            =  mysqli_real_escape_string($con, $_POST['cookies_qty']);
    $choco_mallows      =  mysqli_real_escape_string($con, $_POST['choco_mallows_qty']);
    $location           =  mysqli_real_escape_string($con, $_POST['location']);
    $subtotal           =  0;

    $query = "SELECT cart_number FROM hidden_reseller ORDER BY cart_number DESC Limit 1";
    $res = mysqli_query($con,$query);
    if(mysqli_num_rows($res) == 0){
        $cart_number = 0;
    }
    else{
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $cart_number = $row['cart_number']+1;
    }

    if($location == 'Santolan' or $location  == 'Manggahan'){
        $del_fee = 0;
    }
    else{
        $del_fee = 50;
    }


    if($cupcake>0){
        $subtotal += ($cupcake * 400);
    }
    if($cookie_bars>0){
        $subtotal += ($cookie_bars * 130);
    }
    if($bento_cake>0){
        $subtotal += ($bento_cake * 200);
    }
    if($egg_pie>0){
        $subtotal += ($egg_pie * 250);
    }
    if($choco_eggpie>0){
        $subtotal += ($choco_eggpie * 220);
    }
    if($strawberry_pie>0){
        $subtotal += ($strawberry_pie * 200);
    }
    if($cake_pops>0){
        $subtotal += ($cake_pops * 120);
    }
    if($brownies_bites>0){
        $subtotal += ($brownies_bites * 220);
    }
    if($cookies>0){
        $subtotal += ($cookies * 200);
    }
    if($choco_mallows>0){
        $subtotal += ($choco_mallows * 75);
    }

    $subtotal += $del_fee;
    $down = $subtotal /2;
   
    $order              = "INSERT INTO `hidden_reseller`(`user_id`, `location`, `cupcakes`, `cupcake_description`, `cookie_bars`, `bento_cake`, `egg_pie`, `chocolate_egg_pie`, `strawberry_pie`, `cake_pops`, `brownie_bites`, `cookies`, `marshmallows`, `cart_number`, `down_payment`, `total`) VALUES ('$user_id','$location','$cupcake','$cupcake_desc','$cookie_bars','$bento_cake','$egg_pie','$choco_eggpie','$strawberry_pie','$cake_pops','$brownies_bites','$cookies','$choco_mallows','$cart_number','$down','$subtotal')"; 
    mysqli_query($con, $order);
    
    echo "
        <form name='customCake' action='../res-payment.php' method='post'>
            <input type='hidden' name='cart_number' value='$cart_number'>
            <input type='hidden' name='subtotal' value='$subtotal'>
        </form>

        <script>
            submitform();

            function submitform()
            {
                document.customCake.submit();
            }
        </script>
    ";

?>

