<?php 
    require("php/config.php");
    require("auth.php");
    if(!isset($_SESSION['user_id'])){
        header('Location:index.php');
    }
?>
<html>
    <head>
        <title>
            Whiscakes Creation
        </title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Rampart+One&display=swap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand:wght@300;400;700&family=Rampart+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        
        <link rel="stylesheet" href="css/shop.css">
        <link rel="stylesheet" href="css/shop-gallery.css">
    </head>

    <body>
        <div class="hero7">
            <div class="navigation">
                <div class="nav-logo">
                    <img src="images/wc-logo.png" class="imglogo">
                </div>

                <label class="logo">Whiscakes Creation</label>
                <div class="nav-links" id="nav-links">
                    <i class="fa fa-close" onclick="closeMenu()"></i>
                    <ul>
                        <li><a href="index1.php">Home</a></li>
                      <!--  <li><a href="Guidelines1.html">Guidelines</a></li> -->
                        <li><a href="Shop.php" style="color: #ddd;">Shop</a></li>
                        <li><a href="ordersPage.php">Orders</a></li>
                        <li><a href="about1.php">About Us</a></li>
                        <li><a href="FAQS1.php">FAQs</a></li>
                        <li><a href="cart-page.php">My Cart<i class="fas fa-cart-plus"></i></a></li>
                    </ul>
                </div>
                <i class="fa fa-bars" style="font-size: 40px;" onclick="showMenu()"></i>
            </div>

            <div class="drop"><a onclick="document.getElementById('dropdown-content').style.display='block'" style="width: fit-content; height: fit-content;"><img src="images/user-64.png" style="width: 30px; height: 95px;"></a> 
                <div class="dropdown-content">
                    <a href="profile.php"><i class="fas fa-user"></i>Profile</a>
                    <a href="php/logout.php"><i class="fas fa-sign-out-alt"></i>Log out</a>
                </div>
            </div>
                
            <div class="shop-h2">
                <h1 class="shopping">Our Products</h1>
            </div>

            <div class="body-content3" data-aos="flip-left">
                <div class="gallery">
                    <a href="Gallery-Bday.php"><img src="images/bdaycake0.gif" width="300px" height="300px">
                        <div class="desc">Birthday Cakes</div>
                    </a>
                </div>

                <div class="gallery">
                    <a href="Gallery-Christening.php"><img src="images/christening1.jpg" width="450px" height="350px">
                        <div class="desc">Christening and Minimalist Cakes</div>
                    </a>
                </div>

                <div class="gallery">
                    <a href="Gallery-desserts.php"><img src="images/cupcake_2.jpg" width="450px" height="350px">
                        <div class="desc">Sweets</div>
                    </a>
                </div>

                <div class="gallery">
                    <a href="Gallery-breadpie.php"><img src="images/bananabread.jpg" width="450px" height="350px">
                        <div class="desc">Bread and Pie</div>
                    </a>
                </div>
            </div>

            <div class="shop-h2" id="notee">
                <h1 class="shopping">Customize your cake!</h1>
                <h2 class="p1">Feel free to mix the cake, fillings, icing and flavors below to create a cake that is uniquely yours </h2>
            </div>

            <form method="post" action="php/order.php"  enctype="multipart/form-data"> 
                <div class="body-content4">
                    <div class="input-box">
                        <span class="details">THEME:</span>
                        <input type="text" placeholder="Drop your cake theme" name = "event" required>
					</div>
                    
                    <div class="select">
                        <label for="shape">CAKE SHAPE:</label>
                        <select name="shape" id="format" >
                            <option value="none" value="0" hidden readonly>Choose a cake shape</option>
                            <option name="shape" value="sheet">Sheet</option>
                            <option name="shape" value="round">Round</option>
                        </select>
                    </div>
                
                    <div class="select">
                        <label for="size">CAKE SIZE:</label>
                        <select name="size" id="format" onchange='sizing(this)' >
                            <option name="size" value="0" hidden readonly>Choose a cake size</option>
                            <option name="size" value="1">6x4</option>
                            <option name="size" value="2">8x4</option>
                            <option name="size" value="3">10x4</option>
                        </select>
                    </div>
                    
                    <div class="select">
                        <label for="cake-base">CAKE LAYER:</label><br>
                        <select name="base" id="format" onchange='layer(this)' onshow='layer(this)' >
                            <option name="base" value="0" hidden readonly>Choose a cake layer</option>
                            <option name="base" value="4">Sponge Cake</option>
                            <option name="base" value="5">Moist Cake</option>
                            <option name="base" value="6">Fondant Covered Sponge Cake</option>
                            <option name="base" value="7">Fondant Covered Moist Cake</option>
                        </select>
                    </div>
            
                    <div class="select">
                        <label for="base-flavors">CAKE LAYER FLAVORS:</label><br>
                        <select name="base_flavor" id="format" onchange='flavor(this)' >
                            <option name="base_flavor" value="0" hidden readonly>Choose a cake layer flavors</option>
                            <option name="base_flavor" value="8">Chocolate</option>
                            <option name="base_flavor" value="9">Vanilla</option>
                            <option name="base_flavor" value="10">Red Velvet</option>
                            <option name="base_flavor" value="11">Mocha</option>
                            <option name="base_flavor" value="12">Coffee</option>
                        </select>
                    </div>
            
                    <div class="select">
                        <label for="regular">REGULAR FILLINGS:</label><br>
                        <select name="reg_fill" id="format" onchange='regular(this)' >
                            <option name="reg_fill" value="0" hidden readonly>Choose a Regular Fillings</option>
                            <option name="reg_fill" value="13">Whipped Cream</option>
                            <option name="reg_fill" value="14">Chocolate Whipped Cream</option>
                            <option name="reg_fill" value="15">Buttercream</option>
                        </select>
                    </div>
             
                    <div class="select">
                        <label for="premium">PREMIUM FILLINGS:</label><br>
                        <select name="prem_fill" id="format" onchange='premium(this)' >
                            <option name="prem_fill" value="0" hidden readonly>Choose a Premium Fillings</option>
                            <option name="prem_fill" value="16">Dulce De Leche</option>
                            <option name="prem_fill" value="17">Vanilla Custard</option>
                            <option name="prem_fill" value="18">Ganache</option>
                        </select>
                    </div>
                    
                    <span class="details">
                        Upload the picture of the cake you want to copy<br>
                    </span>
                    <input type="file" id="real-file" name="image" hidden="hidden"/>
                    <button type="button" id="custom-button">
                        <i class="fas fa-cloud-upload-alt"></i>   
                        CHOOSE A FILE
                    </button>
                    <span id="custom-text">No file chosen, yet.</span>
                    
                </div>

                <input type="hidden" name="id" id="user" value="<?php echo $_SESSION['user_id']; ?>">

                <br>
            
                <button type="submit" class="check-out">
                    <span class="button__text">Add to Cart</span>

                    <span class="button__icon">
                        <ion-icon   ion-icon name="cart-outline"></ion-icon>
                    </span>
                </button>
            </form>
            
            <div class="invoice">
				<div class="title">
					<p>Price</p>
				</div>
				
				<form action="" method="post">
    				<div class="user-details">
    					<div class="input-box">
    						<label class = "details">Cake Size</label>
                            <input type='textbox' placeholder='Cake Size Price' value='0' id='cake_size'  readonly>
    						
    					</div>
    
    					<div class="input-box">
        					<label class = "details">Cake Layer</label>
    						<input type='textbox' placeholder='Cake Layer Price' value='0' id='lay' readonly>
    					</div>
    
    					<div class="input-box">
                            <label class = "details">Cake Layer Flavor</label>
    						<input type='textbox' placeholder='Cake Layer Flavor Price' value='0' id='flav' readonly>
    					</div>
    
    					<div class="input-box">
        					<label class = "details">Regular Filling</label>
    						<input type='textbox' placeholder='Regular Filling Price' value='0' id='reg' readonly>
    					</div>    
    
                        <div class="input-box">
        					<label class = "details">Premium Filling</label>
    						<input type='textbox' placeholder='Premium Filling Price' value='0' id='prem' readonly>
    					</div> 
    
                        <div class="title">
                            <p>Total</p>
                        </div>
    
                        <div class="input-box">
                            <input type='textbox' placeholder='Click to see Subtotal' id='sub' onclick="subtotal()"  readonly>
                        </div> 
                    </div>
                </form>
            </div>

            <div class="vertical-bar">
                <i class="fa fa-th-list"></i>
            </div>
        </div>

        <script src="js/shop-gallery.js"></script>
        <script src="js/choose-file.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

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

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

        <script>
            AOS.init({
                duration: 2000,
                once: true,
            });
        </script>
        
        <script>
            let asize = 0, alayer = 0, aflavor = 0, aregular = 0, apremium = 0;
            let asubtotal = asize + alayer + aflavor + aregular + apremium;

            function sizing(data) {

                if(data.value == 1){
                    asize = 200;
                }
                else if(data.value == 2){
                    asize = 400;
                }
                else if(data.value == 3){
                    asize = 600;
                }
                else{
                    asize = 0; 
                }
                document.getElementById("cake_size").value = asize;
                subtotal();
            }
            function layer(data) {
                if(data.value == 4){
                    alayer = 75;
                }
                else if(data.value == 5){
                    alayer = 175;
                }
                else if(data.value == 6){
                    alayer = 200; 
                }
                else if(data.value == 7){
                    alayer = 350;
                }
                else{
                    alayer = 0; 
                }
                document.getElementById("lay").value = alayer;
                subtotal();
            }
            function flavor(data) {
                if(data.value == 8){
                    aflavor = 75;
                }
                else if(data.value == 9){
                    aflavor = 20;
                }
                else if(data.value == 10){
                    aflavor = 50;
                }
                else if(data.value == 11){
                    aflavor = 75;
                }
                else if(data.value == 12){
                    aflavor = 50;
                }
                else{
                    aflavor = 0; 
                }
                document.getElementById("flav").value = aflavor;
                subtotal();
            }
            function regular(data) {
                if(data.value == 13){
                    aregular = 75;
                }
                else if(data.value == 14){
                    aregular = 150;
                }
                else if(data.value == 15){
                    aregular = 200;
                }
                else{
                    aregular = 0; 
                }
                document.getElementById("reg").value = aregular;
                subtotal();
            }
            function premium(data) {
                if(data.value == 16){
                    apremium = 200;
                }
                else if(data.value == 17){
                    apremium = 150;
                }
                else if(data.value == 18){
                    apremium = 200;
                }
                else{
                    apremium = 0; 
                }
                document.getElementById("prem").value = apremium;
                subtotal();
            }

            function subtotal() {
                let size = document.getElementById("cake_size").value;
                let layer = document.getElementById("lay").value;
                let flavor = document.getElementById("flav").value;
                let regular = document.getElementById("reg").value;
                let premium = document.getElementById("prem").value;

                if(layer == null){
                    layer = 0;
                }
                if(size == null){
                    size = 0;
                }
                if(flavor == null){
                  flavor = 0;  
                }
                if(regular == null){
                    regular = 0;
                }
                if(premium == null){
                    premium = 0;
                }

                let subtotal = parseInt(size) + parseInt(layer) + parseInt(flavor) + parseInt(regular) + parseInt(premium);
                document.getElementById("sub").value = subtotal;
            }
        </script>
    </body>
</html>