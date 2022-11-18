<html>
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
        
        <link rel="stylesheet" href="css/index1.css">
        <link rel="stylesheet" href="css/account.css">

        <style>
            body {
                font-family: 'Abril Fatface', cursive; 
                font-family: 'Rampart One', cursive;
                font-family: 'Quicksand', sans-serif;     
            }
        </style>
    </head>

    <body>
        <div class="hero4">
            <div class="navigation">
                <div class="nav-logo">
                    <img src="images/wc-logo.png" class = "imglogo">
                </div>
                    <label class="logo">Whiscakes Creation</label>
                        <div class="nav-links" id="nav-links">
                            <i class="fa fa-close" onclick="closeMenu()"></i>
                                <ul>
                                    <li><a href="index1.php" style="color: #ddd;">Home</a></li>
                                    <li><a href="Guidelines1.html">Guidelines</a></li>
                                    <li><a href="Shop.php">Shop</a></li>
                                    <li><a href="ordersPage.php">Orders</a></li>
                                    <li><a href="about1.html">About Us</a></li>
                                    <li><a href="FAQS1.html">FAQs</a></li>
                                    <li><a href="cart-page.php"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                        </div>
                            <i class="fa fa-bars" style="font-size: 40px;" onclick="showMenu()"></i>
            </div>


            <div class="drop"><a onclick="document.getElementById('dropdown-content').style.display='block'" style="width: fit-content; height: fit-content;"><img src="images/user-64.png" style="width: 30px; height: 30px;"></a>    
                <div class="dropdown-content">
                    <a href="profile.php"><i class="fas fa-user"></i>Profile</a>
                    <a href="php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
                </div>
            </div>

                    <div class="reseller"> 
                        <h1>Reseller</h1>
                            <a href="res-pricelist.html"><button class="btn">Click here for reseller's price list</button></a>
                    </div>

                    <div class="res-guide">
                        <p>STEP 1: Complete the form below to register<br>STEP 2: For Resellers price, you may click the link above<br>STEP 3: You may now place your order in a way: <br>  - Resellers Name<br>  - Resellers Contact<br>  - Your list of orders<br>  - Date and Time of Pick up<br>  - Location of Pick up<br>STEP 4: You will receive an email for order confirmation. For the meanwhile, your quotation will be given here in our website<br>STEP 5: Please be guided accordingly to the ff:<br>  a. Paid orders will be serve at least 2-3  days lead time / prior to delivery. Close of shop is 6pm daily.<br>  b. Payments received at 6pm and onwards will no longer be served but will rather be considered as next day for payment.<br>  c. No cancelling or change of orders if it is in ongoing status.<br>  d. Be reminded that your order will delivered approximately from 10am onward. We cannot guarantee time of arrival as the transportation is erratic. We advise to make an ample amount of time for your orders in case of any delays.<br>NOTE: IT IS IMPORTANT TO KEEP THE CAKES IN A COOL AND DRY PLACE. IMPROPER STORAGE MAY AFFECT SHELF LIFE AND PRODUCT QUALITY.</p>
                    </div>

                    <div class="apply">
                        <div class="header-apply">
                            <p>Apply As A Reseller Now!</p>
                        </div>

                        <form method="post" action="php/resellerApply.php" enctype="multipart/form-data">
                            <div class="user-details3">
                                <div class="input-box3">
                                    <span class="details3">First Name</span>
                                        <input type="text3" placeholder="Enter your name" name="first_name" required>
                                </div>
                                <div class="input-box3">
                                    <span class="details3">Last Name</span>
                                        <input type="text3" placeholder="Enter your name" name="last_name" required>
                                </div>
                                <div class="input-box3">
                                    <span class="details3">Phone Number</span>
                                        <input type="text3" placeholder="Enter your number" name = "num" required>
                                </div>
                                <div class="input-box3">
                                    <span class="details3">Email (use other gmail account as you apply as reseller of you still want to access your client account)</span>
                                        <input type="email" placeholder="Enter your email" name="email" pattern='.+@gmail\.com' title='Gmail only' required>
                                </div>
                                    <span class="details3">
                                        Upload an image of any valid ID<br>
                                    </span>
                                    <input type="file" id="real-file" name="image" hidden="hidden" required/>
                                    <button type="button" id="custom-button">
                                        <i class="fas fa-cloud-upload-alt"></i>   
                                        CHOOSE A FILE
                                    </button>
                                    <span id="custom-text">No file chosen, yet.</span>

                                    <p>Upload a valid ID with signature (e.g. Company ID or Government ID)</p>

                                    <span class="details3">Confirmation:</span><br>
                                    <br><input type="checkbox" name="con" value="confirm" required>
                                    <label for="con">I already read the Guidelines above.</label><br><br>

                                    <button type="submit" class="submits">
                                        <a class="button__text">Submit</a>
                                        <span class="button__icon">
                                        <ion-icon name="cart-outline"></ion-icon>
                                        </span>
                                    </button>
                            </div>
                        </form>
                    </div>

            <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
            <script src="js/choose-file.js"></script>
            
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            
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
    </body>
</html>