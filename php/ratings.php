<?php
    require_once("config.php");
    session_start();

    $rate       = mysqli_real_escape_string($con, $_POST['rate']);
    $comment    = mysqli_real_escape_string($con, $_POST['comment']);
    $user_id        = $_SESSION['user_id'];
    $user_type      = $_SESSION['user_type'];

    mysqli_query($con, "INSERT INTO users_feedbacks (`user_id`, `user_feedback`, `user_rating`) VALUES ('$user_id ','$comment ','$rate')");
            
    echo '<script>alert("Feedback Submitted. \nThank you!")</script>';
    if($user_type == 'client'){
        echo '<script>window.location="../index1.php"</script>';
    }
    else{
        echo"<script>window.location = '../Reseller-page.php'</script>";
    }
    
?>