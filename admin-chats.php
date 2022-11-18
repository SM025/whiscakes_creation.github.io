<?php
    require("php/admin-functions.php");
    require("php/chat-functions.php");
?>
<html>
    <head>
        <title>
            Whiscakes Creation
        </title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Rampart+One&display=swap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand:wght@300;400;700&family=Rampart+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/admin1.css"> 
      
    </head>

    <body>
        <div class="hero4">
            <div class="navigation">
                <div class="nav-logo">
                    <img src="images/wc-logo.png" class = "imglogo">
                </div>
                <label class="logo">WC System Report</label>
                <div class="nav-links" id="nav-links">
                    <i class="fa fa-close" onclick="closeMenu()"></i>
                    <ul>
                        <li><a href="admin.php" >&nbsp&nbsp&nbsp&nbspDashboard</a></li>
                        <li><a href="admin-orders.php">Orders History</a></li>
                        <li><a href="application.php">Reseller</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="admin-chats.php" style="color: #ddd;">Chats</a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" style="font-size: 40px;" onclick="showMenu()"></i>
            </div>

            <div class="drop">
                <a onclick="document.getElementById('dropdown-content').style.display='block'" style="width: fit-content; height: fit-content;"><img src="images/user-64.png" style="width: 30px; height: 30px;"></a> 

                <div class="dropdown-content">
                    <a href="php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
                </div>
            </div>


            <main>
                <div class="container4">
                    <div class="chate-liste">
                        <div class="m-info">
                            <div class="avatar">
                                <img src="images/wc-logo.png"
                                width="60px" alt="">
                            </div>

                            <div class="p-info">
                                <div class="pname">
                                    <h2>Whiscakes Creation</h2>
                                    <span class="p-disc">Admin</span>
                                </div>
                                <!-- <div class="icon">
                                    <i class='fas fa-bars'></i>
                                </div> -->
                            </div>
                        </div><br>


                        <!-- <div class="search-box">
                            <i class='fas fa-search'></i>
                            <input type="text" placeholder="Search for chat or group chate">
                        </div> -->

                        <?php chatList(); ?>
                    </div>
                    
                    <iframe class="chate" src="php/conversation.php" name='conversation'></iframe>
                </div> 
            </main>
            <!-- <div class="vertical-bar">
                <i class="fa fa-th-list"></i>
            </div> -->

        </div>

        <!-- //JS -->
      

        <script>
            var show = document.getElementById("nav-links");
            function showMenu() {
                show.style.right = "0"
            }
            function closeMenu() {
                show.style.right = "-200px"
            }
        </script>
            
    </body>

</html>