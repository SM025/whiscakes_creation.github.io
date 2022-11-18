<?php
    require("config.php");
    require("shifter.php");
?>
<html lang="en">
    <head>
        <title>
            Whiscakes Creation
        </title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Rampart+One&display=swap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand:wght@300;400;700&family=Rampart+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="../css/css.css">

        <style>
            body {
                font-family: 'Abril Fatface', cursive; 
                font-family: 'Rampart One', cursive;
                font-family: 'Quicksand', sans-serif;
            }
        </style>
    </head>

    <body>

       <?php
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $result = mysqli_query($con, "SELECT * FROM users_tb WHERE email = '$email'");
            
            if(mysqli_num_rows($result)){
                $row = mysqli_fetch_assoc($result);
                $password = decrypt($row['password']);
                
                $subject        = "Forgot Password";
                $from           = "From: whiscakes.creation@gmail.com";
                $message        = "Password:\n $password";


                mail( $email, $subject, $message, $from);
                echo"<script>alert('Password sent to your email.')</script>";
                echo"<script>window.location = '../index.php'</script>";
            }
            else{
                echo"<script>alert('No existing user with email found.')</script>";
                echo"<script>window.location = '../index.php'</script>";
            }
        }
        else{
       ?>
            <div class="hero">
                <div class="navigation">
                    <div class="nav-logo">
                        <img src="../images/wc-logo.png" class = "imglogo">
                    </div>
                    <label class="logo">Whiscakes Creation</label>
    
                    <div class="nav-links" id="nav-links">
                        <i class="fa fa-close" onclick="closeMenu()"></i>
                        <ul>
                            <a href="../index.php" style="color: #ddd;"><li>Home</li></a>
                            <a href="../Guidelines.html"><li>Guidelines</li></a>
                            <a href="../Gallery.html"><li>Gallery</li></a>
                            <a href="../about.html"><li>About Us</li></a>
                            <a href="../FAQS.html"><li>FAQs</li></a>
                        </ul>
                    </div>
                    <i class="fa fa-bars" style="font-size: 40px;" onclick="showMenu()"></i>
                </div>
            
                <form method="post" action="">
                    <div class="CodeCheck">
                        <p id="Info">Forgot Password</p>
                        <p>Enter Email Below:</p>
                        <input type="text5" placeholder = "Enter g-mail" name='email' pattern='.+@gmail\.com' id="Ans">
                        <button type='submit' id="Check" name='submit' class="fas fa-check-circle" &nbsp>Request Password</button>
                    </div>
                </form>
            
                <div class="vertical-bar">
                    <i class="fa fa-th-list"></i>
                </div>
               
            </div>
        
        <?php
        }
        ?>
        
        <script>
            $("a").click(function(){
                $("a").css("background-color","");
                $(this).css("background-color","rgba(129, 103, 95, 0.931)");
            });
        </script>

        <script>
            var show = document.getElementById("nav-links");
            function showMenu() {
                show.style.right = "0"
            }
            function closeMenu() {
                show.style.right = "-200px"
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
        <script src="../js/modal.js"></script>
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
                    modal.style.display = "none";
                }
            }
        </script>

    </body>
</html>