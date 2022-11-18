
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
                            <li><a href="admin.php">&nbsp&nbsp&nbsp&nbspDashboard</a></li>
                            <li><a href="admin-orders.php">Orders History</a></li>
                            <li><a href="application.php" style="color: #ddd;">Reseller</a></li>
                            <li><a href="feedback.php">Feedback</a></li>
                            <li><a href="admin-chats.php">Chats</a></li>
                        </ul>
                </div>
                    <i class="fa fa-bars" style="font-size: 40px;" onclick="showMenu()"></i>
            </div>


            <div class="drop"><a onclick="document.getElementById('dropdown-content').style.display='block'" style="width: fit-content; height: fit-content;"><img src="images/user-64.png" style="width: 30px; height: 30px;"></a> 
                <div class="dropdown-content">
                    <a href="php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
                </div>
            </div>


                    <div class='recent-grid'>
                        <div class='projects'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h3>Reseller Application</h3>
                                </div>
        
                                    <div class='card-body'>
                                        <div class='table-responsive'>
                                            <table width='100%'>
                                                <thead>
                                                    <tr>
                                                        <td>Complete Name</td>
                                                        <td>Phone Number</td>
                                                        <td>Email Address</td>
                                                        <td>Valid ID</td>
                                                        <td>Date and Time/Google Meet</td>
                                                        <td></td>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                        require("php/admin-functions.php");
                                                        applicationList();
                                                        
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
        
                            </div>
                        </div> 
                    </div> 
                    <div class='recent-grid'>
                        <div class='projects'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h3>Reseller Approval</h3>
                                </div>
        
                                    <div class='card-body'>
                                        <div class='table-responsive'>
                                            <table width='100%'>
                                                <thead>
                                                    <tr>
                                                        <td>Complete Name</td>
                                                        <td>Phone Number</td>
                                                        <td>Email Address</td>
                                                        <td>Valid ID</td>
                                                        <td>Password</td>
                                                        <td></td>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                        approvalList();
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
        
                            </div>
                        </div> 
                    </div>
    

                    <div class="vertical-bar">
                        <i class="fa fa-th-list"></i>
                    </div>
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