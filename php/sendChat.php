<?php
    require("config.php");

    date_default_timezone_set("Asia/Manila");
    $date = date("Y/m/d");
    $time = date("h:ia");
    $receiver;

    $message = mysqli_real_escape_string($con, $_POST['message']);
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $user_type = mysqli_real_escape_string($con, $_POST['user_type']);

    if($user_id != 0){
        $receiver = 0;
    }
    elseif($user_id == 0){
        $receiver = mysqli_real_escape_string($con, $_POST['receiver_id']);
    }

    $query = "INSERT INTO message_tb (`sender_id`, `receiver_id`, `time_sent`, `date_sent`, `message_content`) VALUES ('$user_id', $receiver ,'$time','$date','$message')";

    mysqli_query($con, $query);

    if($user_id == 0){
        $receiver_id = mysqli_real_escape_string($con, $_POST['receiver_id']);
        echo"<script>window.location = 'conversation.php?sender_id=$receiver_id'</script>";
    }
    elseif($user_type == 'reseller'){
        echo"<script>window.location = '../Reseller-page.php'</script>";
    }
    else{
        echo"<script>window.location = '../index1.php'</script>";
    }
    
?>