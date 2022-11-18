<?php
    require("php/admin-functions.php");
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
        
        <link rel="stylesheet" href="css/livechat.css">
        <link rel="stylesheet" href="css/admin.css">
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
                        <li><a href="admin.php" style="color: #ddd;">&nbsp&nbsp&nbsp&nbspDashboard</a></li>
                        <li><a href="admin-orders.php">Orders History</a></li>
                       <!-- <li><a href="admin-products.php">Products</a></li>
                        <li><a href="application.php">Reseller</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="admin-chats.php">Chats</a></li> -->
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
                <div class="cards">
                    <a href="admin-clients.php">
                        <div class="card-single">
                            <div>
                                <h1><?php counting(0); ?></h1>
                                <span>Clients</span>
                            </div>
                            <div>
                                <span class="fas fa-users"></span>
                            </div>
                        </div>
                    </a> 

                <div class="card-single">
                    <a class="button2" href="#popup3">
                        <h1><?php counting(1); ?></h1>
                        <span>Pending Orders</span>
                        <div>
                            <span class="fas fa-bell"></span>
                        </div>
                    </a>
                </div>

                <div id="popup3" class="overlay">
                    <div class="popup">
                        <a class="close" href="#">&times;</a>
                        <div class="content">
                            <div class='content-header'>
                                    <h2>Pending Orders</h2>
                            </div>
                            <div class='tables'>
                                <?php
                                    pendingDisplay();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                    

                <div class="card-single">
                    <a class="button2" href="#popup1">
                        <h1><?php counting(2); ?></h1>
                        <span>Ongoing Orders</span>
                        <div>
                            <span class="fas fa-clipboard-list"></span>
                        </div>
                    </a>
                </div>


                <div id="popup1" class="overlay">
                    <div class="popup">
                        <a class="close" href="#">&times;</a>
                        <div class="content">
                            <div class='content-header'>
                                <h2>On-going Orders</h2>
                            </div>
                            <div class='tables'>
                                <?php 
                                    ongoingDisplay();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-single">
                    <a class="button2" href="#popup2">
                        <h1><?php counting(3); ?></h1>
                        <span>Completed Orders</span>
                        <div>
                            <span class="fas fa-clipboard-check"></span>
                        </div>
                    </a>
                </div>


                <div id="popup2" class="overlay">
                    <div class="popup">
                        <a class="close" href="#">&times;</a>
                        <div class="content">
                            <div class='content-header'>
                                <h2>Completed Orders</h2>
                            </div>
                        <div class='tables'>
                            <?php
                                completedDisplay();
                            ?>
                        </div>
                        </div>
                    </div>
                </div> 
                </div>

            

                    <?php
                        users();
                    ?>
                
            </main>

           

            <div class="vertical-bar">
                <i class="fa fa-th-list"></i>
            </div>

        </div>

        <!-- //JS -->
        <script src="js/chat.js"></script>
        <script src="js/jquery-3.4.1.min.js"></script>

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