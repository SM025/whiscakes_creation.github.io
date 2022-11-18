<?php
    require("config.php");
    require("shifter.php");

    //Array to store validation errors
    $errmsg_arr = array();

    //Validation error flag
    $errflag = true;

    //Function to sanitize values received from the form. Prevents SQL injection
    $firstname                  = mysqli_real_escape_string($con, $_POST['fname']);
    $lastname                   = mysqli_real_escape_string($con, $_POST['lname']);
    $email                      = mysqli_real_escape_string($con, $_POST['email']);
    $password1                  = mysqli_real_escape_string($con, $_POST['pw1']);
    $password2                  = mysqli_real_escape_string($con, $_POST['pw2']);
    

    /*if($password1 != $password2) {
        $errmsg = 'Passwords are not the same';
        $errflag = false;
        }
        
    /*if($_POST['g-recaptcha-response'] != ""){
        $secret = '6LdLxFMgAAAAAF5dYILchw-RnIYPJFnZR0F0DXt5';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    }else{
       $errmsg = 'Captcha failed';
        $errflag = false; 
    }*/
    
    /*
    $same = mysqli_query($con, "SELECT * FROM users_tb WHERE email = '$email'");
    if(mysqli_num_rows($same) > 0){
        $errmsg = 'Email is registered to an existing account';
        $errflag = false; 
    }
    
        $password1 = encrypt($password1);
    
        
        //Saving of information to database
        if($errflag){
            if($responseData->success){
            $result = mysqli_query($con, "INSERT INTO users_tb(`first_name`, `last_name`, `email`, `password`, `user_type`, `user_status`, `order_number`) VALUES ('$firstname ','$lastname ','$email','$password1', 'client', 'Active', 0)");
            echo '<script>alert("Registration Success!")</script>';
            echo '<script>window.location="../index.php"</script>';}
        }
        else{
            echo '<script>alert("'.$errmsg.'!")</script>';
            echo '<script>window.location="../index.php"</script>';
        };
        */

        
    if($password1 != $password2) {
        $errmsg_arr[] = 'Passwords are not the same';
        $errflag = false;
        }
    
        
        //Saving of information to database
        if($errflag){
            $result = mysqli_query($con, "INSERT INTO users_tb(`first_name`, `last_name`, `email`, `password`, `user_type`, `user_status`, `order_number`) VALUES ('$firstname ','$lastname ','$email','$password1','client', 'Active', 0)");
            echo '<script>alert("Registration successful!")</script>';
            echo '<script>window.location="../index.php"</script>';
        }
        else{
            echo '<script>alert("Passwords not matched.")</script>';
           echo '<script>window.location="../index.html"</script>';
        };
    

    

?>