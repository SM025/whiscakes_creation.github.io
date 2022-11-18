<?php
    require("php/admin-functions.php");


// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'whiscakes_creation';

// Server is localhost with
// port number 3306
$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM bnp_tbl";
$result = $mysqli->query($sql);
$mysqli->close();

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
                        <li><a href="admin.php">Dashboard</a></li>
                        <li><a href="admin-orders.php" style="color: #ddd;">Orders History</a></li>
                        <li><a href="admin-products.php">Products</a></li>
                        <!--<li><a href="application.php">Reseller</a></li>
                       <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="admin-chats.php">Chats</a></li> -->
                    </ul>
                </div>
                    <i class="fa fa-bars" style="font-size: 40px;" onclick="showMenu()"></i>
            </div>

            <div class="drop"><a onclick="document.getElementById('dropdown-content').style.display='block'" style="width: fit-content; height: fit-content;"><img src="images/user-64.png" style="width: 30px; height: 30px;"></a> 
                <div class="dropdown-content">
                    <a href="php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
                </div>
            </div>


                <!--Tabla-->
                <main>
                <div id="products">

                <h2>ADD PRODUCT</h2>
                Product name: <input type="text">
                Price: <input type="text">
                Category: <input type="text">
                <input type="submit">
                </div>


                <div id="products1">
                     <section>
                            <h1>Products</h1>
                            <!-- TABLE CONSTRUCTION -->
                            <table>
                                <tr>
                    
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                                <?php
                                    // LOOP TILL END OF DATA
                                    while($rows=$result->fetch_assoc())
                                    {
                                ?>
                                <tr>
                                    <!-- FETCHING DATA FROM EACH
                                        ROW OF EVERY COLUMN -->
                                    <td><?php echo $rows['item_name'];?></td>
                                    <td><?php echo $rows['item_price'];?></td>
                                  
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </section>
                 </div>
                

            </main>


                <div class="vertical-bar">
                    <i class="fa fa-th-list"></i>
                </div>

        </div>


            <!-- //JS                         -->
            <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

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