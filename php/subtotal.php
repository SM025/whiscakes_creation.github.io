<?php
    require("config.php");
    require("../auth.php");

    $location =  mysqli_real_escape_string($con, $_POST['location']);
    $subtotal = 0;
    $item_id; $item_db; $user_id;

    //getting the id and adding 1
    $query = "SELECT cart_number FROM hidden_tb ORDER BY cart_number DESC Limit 1";
    $res = mysqli_query($con,$query);
    if(mysqli_num_rows($res) == 0){
        $cart_number = 0;
    }
    else{
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $cart_number = $row['cart_number']+1;
    }


    for($i = 0; $i < count($_POST['cart_id']); $i++) {
        $cart_id = $_POST['cart_id'][$i];
        $quantity = $_POST['quantity'][$i];
        $query = mysqli_query($con, "SELECT * FROM cart_tb WHERE cart_id = $cart_id");

        while($cart = mysqli_fetch_array($query, MYSQLI_ASSOC)){  
            $item_query = mysqli_query($con, "SELECT item_price FROM $cart[item_db] WHERE item_id = '$cart[item_id]'");

            while($item = mysqli_fetch_array($item_query, MYSQLI_ASSOC)){
                $subtotal += ($item['item_price'] * $quantity);
            }

            $item_id = $cart['item_id']; 
            $item_db = $cart['item_db']; 
            $user_id = $cart['user_id'];
        }

        $insert = "INSERT INTO hidden_tb (`item_id`, `item_db`, `user_id`, `item_quantity`, `cart_number`, `location`) VALUES ('$item_id','$item_db','$user_id','$quantity','$cart_number','$location')";
        mysqli_query($con,$insert);
    }

    if($location == 'Santolan' or $location  == 'Manggahan'){
        $del_fee = 0;
    }
    else{
        $del_fee = 50;
    }

    $subtotal += $del_fee;

    echo "
            <form name='subtotal' action='../payments.php' method='post'>
                <input type='hidden' name='subtotal' value='$subtotal'>
                <input type='hidden' name='cart_number' value='$cart_number'>
            </form>

            <script>
                submitform();

                function submitform()
                {
                    document.subtotal.submit();
                }
            </script>
        ";
        
?>