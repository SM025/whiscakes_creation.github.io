<?php
    function cartCount($user_id){
        require_once("config.php");

        $cartCount = mysqli_query($con, "SELECT * FROM cart_tb WHERE user_id = '$user_id'");
        echo $cartCount  = mysqli_num_rows($cartCount );
    }
?>