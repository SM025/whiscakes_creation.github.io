<?php
    require('config.php');
    require("shifter.php");
    session_start();

    $result = mysqli_query($con, "SELECT email, password FROM users_tb WHERE user_id = $_SESSION[user_id]");

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){


    $oemail     =   mysqli_real_escape_string($con, $_POST['oemail']);
    $opw        =   mysqli_real_escape_string($con, $_POST['opw']);
    $nemail     =   mysqli_real_escape_string($con, $_POST['nemail']);
    $npw1       =   mysqli_real_escape_string($con, $_POST['npw1']);
    $npw2       =   mysqli_real_escape_string($con, $_POST['npw2']);
    $opw        =   encrypt($opw);


    if($oemail != $row['email'] || $opw != $row['password']){
            echo '<script>alert("Old email or password does not match!")</script>';
            echo '<script>window.location="../profile.php"</script>';
    }
    else{
        if($npw1 == $npw2){
            $npw1 = encrypt($npw1);
            mysqli_query($con, "UPDATE users_tb SET email = '$nemail', password = '$npw1' WHERE user_id = $_SESSION[user_id]");
            echo '<script>alert("Update successful!")</script>';
            
            if($_SESSION['user_type'] == 'reseller'){
                echo '<script>window.location="../Reseller-page.php"</script>';
            }
            else{
                
            echo '<script>window.location="../index1.php"</script>';
            }
        }
        else{
            echo '<script>alert("Passwords do no match!")</script>';
            echo '<script>window.location="../profile.php"</script>';
        }
    }
}
?>