<?php
    require("config.php");

    $user_id    =  mysqli_real_escape_string($con, $_POST['id']);
    $submit     =  mysqli_real_escape_string($con, $_POST['Blocking']);

    if($submit == "Block"){
        mysqli_query($con, "UPDATE `users_tb` SET `user_status` = 'Blocked' WHERE `user_id` = '$user_id' ");
    }
    elseif($submit == "Unblock"){
        mysqli_query($con, "UPDATE `users_tb` SET `user_status` = 'Active' WHERE `user_id` = '$user_id' ");
    }

    header("location: ../admin.php");
?>