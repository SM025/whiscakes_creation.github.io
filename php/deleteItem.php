<?php
    require("config.php");

    $cart_id =  mysqli_real_escape_string($con, $_POST['id']);

    $query = "DELETE FROM `cart_tb` WHERE cart_id = $cart_id";
    $info_qry = mysqli_query($con, $query);

    echo"<script>alert('Item removed from cart.')</script>";
    echo '<script>window.location="../removeItem.php"</script>';
    
?>