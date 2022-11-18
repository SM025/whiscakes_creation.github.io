<?php
    require("config.php");
    //require("shifter.php"); //FORGOT PASS
    //require("otp.php");  //CODE EMAIL
    session_start();

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pw = mysqli_real_escape_string($con, $_POST['password']);
    //$pw = encrypt($pw1);

    $qry = "SELECT * FROM users_tb WHERE email = '$email' AND password = '$pw'";
    $result = mysqli_query($con, $qry);

    if($result){
        if(mysqli_num_rows($result) == 1){
            session_regenerate_id();
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id']        = $row['user_id'];
            $_SESSION['first_name']     = $row['first_name'];
            $_SESSION['last_name']      = $row['last_name'];
            $_SESSION['email']          = $row['email'];
            $_SESSION['order_number']   = $row['order_number'];
            $_SESSION['user_type']      = $row['user_type'];
            //$code = rand_code();
            
            //$subject        = "Login Code";
            //$from           = "From: whiscakes.creation@gmail.com";
            //$message        = "login code: $code";
            
            if($row['user_type'] == "admin"){
                header("location: ../admin.php"); 
            }
        
           /* if(!isset($_POST['submit'])){
                mail( $_SESSION['email'], $subject, $message, $from);
            } */
            
            if(isset($_POST['submit'])){
                    
            //$login = $_POST['code'] == $_POST['code1'];
              //  if($login){
                    if($row['user_status'] == "Blocked"){
                        echo"<script>alert('User is blocked by Admin.')</script>";
                        echo"<script>window.location = '../index.php'</script>";
                        exit();
                    }
                    elseif($row['user_type'] == "client"){
                        header("location: ../index1.php");
                    }
                    elseif($row['user_type'] == "reseller"){
                        header("location: ../Reseller-page.php");
                    }
                    elseif($row['user_type'] == "admin"){
                        header("location: ../admin.php");
                    }
             /* }
                else{
                    session_unset();
    	            session_destroy();
    	            
                    //echo"<script>alert('Wrong code')</script>";
                    echo"<script>window.location = '../index.php'</script>";
                    exit();
                }*/
            }
          /*  else{
               echo"
                    <html>
                        <head>
                            <title>
                                Whiscakes Creation
                            </title>
                    
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1'>
                    
                            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
                            <link rel='stylesheet' href='https://fonts.googleapis.com'>
                            <link rel='stylesheet' href='https://fonts.gstatic.com' crossorigin>
                            <link href='https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Rampart+One&display=swap.css' rel='stylesheet'>
                            <link rel='stylesheet' href='https://fonts.googleapis.com'>
                            <link rel='stylesheet' href='https://fonts.gstatic.com' crossorigin>
                            <link href='https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand:wght@300;400;700&family=Rampart+One&display=swap' rel='stylesheet'>
                            <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
                            <link rel='stylesheet' href='../css/css.css'>
                    
                            <style>
                                body {
                                    font-family: 'Abril Fatface', cursive; 
                                    font-family: 'Rampart One', cursive;
                                    font-family: 'Quicksand', sans-serif;
                                }
                            </style>
                        </head>
                    
                        <body>
                                <div class='hero'>
                                    <div class='navigation'>
                                        <div class='nav-logo'>
                                            <img src='../images/wc-logo.png' class = 'imglogo'>
                                        </div>
                                        <label class='logo'>Whiscakes Creation</label>
                        
                                        <div class='nav-links' id='nav-links'>
                                            <i class='fa fa-close' onclick='closeMenu()'></i>
                                            <ul>
                                                <a href='../index.php' style='color: #ddd;'><li>Home</li></a>
                                                <a href='../Guidelines.html'><li>Guidelines</li></a>
                                                <a href='../Gallery.html'><li>Gallery</li></a>
                                                <a href='../about.html'><li>About Us</li></a>
                                                <a href='../FAQS.html'><li>FAQs</li></a>
                                            </ul>
                                        </div>
                                        <i class='fa fa-bars' style='font-size: 40px;' onclick='showMenu()'></i>
                                    </div>
                                
                                    <form method='post' action='login-exec.php'>
                                        <div class='CodeCheck'>
                                            <p id='Info'>Verification Code</p>
                                            <p>Enter Code Below:</p>
                                            <input type='text5' placeholder = 'Enter code' name='code' id='Ans'>
                                            <input type='hidden' name='code1' value='$code'>
                                            <input type='hidden' name='email' value='$email'>
                                            <input type='hidden' name='password' value='$pw1'>
                                            <button type='submit' name='submit' id='Check' class='fas fa-check-circle' &nbsp>VERIFY</button>
                                        </div>
                                    </form>
                                
                                    <div class='vertical-bar'>
                                        <i class='fa fa-th-list'></i>
                                    </div>
                                </div>
                            
                            <script>
                                $('a').click(function(){
                                    $('a').css('background-color','');
                                    $(this).css('background-color','rgba(129, 103, 95, 0.931)');
                                });
                            </script>
                    
                            <script>
                                var show = document.getElementById('nav-links');
                                function showMenu() {
                                    show.style.right = '0'
                                }
                                function closeMenu() {
                                    show.style.right = '-200px'
                                }
                            </script>
                    
                            <script src='https://code.jquery.com/jquery-3.6.0.min.js' integrity='sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=' crossorigin='anonymous'></script>
                            
                            <script src='../js/modal.js'></script>
                            <script>
                                var x=document.getElementById('login');
                                var y=document.getElementById('register');
                                var z=document.getElementById('btn');
                                function register()
                                    {
                                        x.style.left='-400px';
                                        y.style.left='50px';
                                        z.style.left='110px';
                                    }
                                function login()
                                    {
                                        x.style.left='50px';
                                        y.style.left='450px';
                                        z.style.left='0px';
                                    }
                            </script>
                            <script>
                                var modal = document.getELementById('login-form');
                                window.onclick = function(event)
                                {
                                    if (event.target == modal)
                                    {
                                        modal.style.display = 'none';
                                    }
                                }
                            </script>
                        </body>
                    </html>
               "; 
            }*/
        }
        else{
            echo"<script>alert('Login Failed')</script>";
            echo"<script>window.location = '../index.php'</script>";
            exit();
        }
        }
    else{
        die("Query failed");
    }
?>