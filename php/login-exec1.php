<?php
    require("config.php");
    session_start();

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pw = mysqli_real_escape_string($con, $_POST['password']);

    $qry = "SELECT * FROM users_tb WHERE email = '$email' AND password = '$pw'";
    $result = mysqli_query($con, $qry);



    if($result && $email == "whiscakes.creation@gmail.com"){
        header("location: ../admin1.php"); 
    }

    elseif($result){
        if(mysqli_num_rows($result) == 1){
            session_regenerate_id();
            $_SESSION['user_id']        = $row['user_id'];
            $_SESSION['first_name']     = $row['first_name'];
            $_SESSION['last_name']      = $row['last_name'];
            $_SESSION['email']          = $row['email'];
            $_SESSION['order_number']   = $row['order_number'];
            $_SESSION['user_type']      = $row['user_type'];

           
            header("location: ../index1.html");
        }

        else{
            echo"<script>alert('Login Failed')</script>";
            echo"<script>window.location('../index.html')</script>";
            exit();
        }
    }

    else{
        die("Query failed");
    }

    
?>