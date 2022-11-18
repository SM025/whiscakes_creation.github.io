<?php 
    //establish connection
    //$con = mysqli_connect("localhost","root","","whiscakes_creation");
    $con = mysqli_connect("localhost","root","","whiscakes_creation");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>