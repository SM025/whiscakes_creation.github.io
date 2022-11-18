<?php
    require("config.php");
    require("shifter.php");

    $id                 =  mysqli_real_escape_string($con, $_POST['id']);
    $type               =  mysqli_real_escape_string($con, $_POST['type']);
    $first_name         =  mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name          =  mysqli_real_escape_string($con, $_POST['last_name']);
    $num                =  mysqli_real_escape_string($con, $_POST['num']);
    $email              =  mysqli_real_escape_string($con, $_POST['email']);
    $image              =  mysqli_real_escape_string($con, $_POST['image']);


    if($_POST['submit'] == 'Accept' && $type == 'application'){
        
        $gmeet          =  mysqli_real_escape_string($con, $_POST['gmeet']);
        $dat            =  mysqli_real_escape_string($con, $_POST['dat']);
        $convert = new DateTime($dat);
        $dat =  $convert->format('Y-m-d h:i:sa');
        
        $subject        = "Reseller Application: $first_name $last_name";
        $from           = "From: whiscakes.creation@gmail.com";
        $message        = "Good day!\n The management of Whiscakes Creation would like to invite you in an interview on $dat.\n Google Meet Link: $gmeet\n\nWe hope you will attend the meeting, Have a good day!";
        
        mail($email, $subject, $message, $from);
        
        copy("../images/reseller_id/$image", "../images/reseller_id/approval/a$image");
        unlink("../images/reseller_id/$image");

        mysqli_query($con, "INSERT INTO `reseller_approval`(`first_name`, `last_name`, `phone_number`, `email`, `id_image`) VALUES ('$first_name','$last_name','$num','$email','$image')");
        mysqli_query($con, "DELETE FROM `reseller_application` WHERE app_id = $id");

        echo '<script>alert("Email sent to '.$email.'.")</script>';
    }
    elseif($_POST['submit'] == 'Decline' && $type == 'application'){
        
        $subject        = "Reseller Application: $first_name $last_name";
        $from           = "From: whiscakes.creation@gmail.com";
        $message        = "Good day!\n The management of Whiscakes Creation declined your application as a reseller.";
        
        unlink("../images/reseller_id/$image");
        
        mail($email, $subject, $message, $from);

        mysqli_query($con, "DELETE FROM `reseller_application` WHERE app_id = $id");

        echo '<script>alert("Application deleted.")</script>';
    }
    elseif($_POST['submit'] == 'Accept' && $type == 'approval'){

        $password       =  mysqli_real_escape_string($con, $_POST['password']);
        
        $subject        = "Reseller Application: $first_name $last_name";
        $from           = "From: whiscakes.creation@gmail.com";
        $message        = "Good day!\n The management of Whiscakes Creation accepted your application as a reseller.\nYou can now access your reseller account with: \nEmail: $email\nPassword: $password\n\nWe hope you have a great day!";
        
        unlink("../images/reseller_id/approval/a$image");
        
        mail($email, $subject, $message, $from);
        $save = encrypt($password);
        
        $query = mysqli_query($con, "SELECT * FROM users_tb WHERE email = '$email'");
        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            mysqli_query($con, "UPDATE `users_tb` SET `password`= '$save',`user_type`= 'reseller',`order_number`= 0 WHERE user_id = $user[user_id]");
        }
        else{
            mysqli_query($con, "INSERT INTO `users_tb`(`first_name`, `last_name`, `email`, `password`, `user_type`, `user_status`, `order_number`) VALUES ('$first_name','$last_name','$email','$save','reseller','Active', 0)");
        }
        
        mysqli_query($con, "DELETE FROM `reseller_approval` WHERE app_id = $id");

        echo '<script>alert("Reseller accepted.")</script>';
    }
    elseif($_POST['submit'] == 'Decline' && $type == 'approval'){
        
        $subject        = "Reseller Application: $first_name $last_name";
        $from           = "From: whiscakes.creation@gmail.com";
        $message        = "Good day!\n The management of Whiscakes Creation declined your application as a reseller.";
        
        mail($email, $subject, $message, $from);
        
        unlink("../images/reseller_id/approval/a$image");

        mysqli_query($con, "DELETE FROM `reseller_approval` WHERE app_id = $id");

        echo '<script>alert("Application deleted.")</script>';
    }

    echo '<script>window.location="../application.php"</script>';
    
?>