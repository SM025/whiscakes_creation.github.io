<?php
    session_start();
?>
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
        <link rel="stylesheet" href="css/res-shop.css">
    
            <style>
                body {
                    font-family: 'Abril Fatface', cursive; 
                    font-family: 'Rampart One', cursive;
                    font-family: 'Quicksand', sans-serif;
                    background-color: #e0ba85;
                }
            </style>
    </head>

    <body>
        <div class="navigation">
            <div class="nav-logo">
                <img src="images/wc-logo.png" class = "imglogo">
            </div>
                <label class="logo">Whiscakes Creation</label>
                    <div class="nav-links" id="nav-links">
                        <i class="fa fa-close" onclick="closeMenu()"></i>
                            <ul>
                                <li><a href="Reseller-page.php">Home</a></li>
                                <li><a href="res-guidelines.html">Guidelines</a></li>
                                <li><a href="res-shop.php" style="color: #ddd;">Shop</a></li>
                                <li><a href="res-orders.php">Orders</a></li>
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
                  

                        <div class="shop-h2">
                            <h1 class="shopping">Desserts</h1> 
                        </div>
                        <form method='post' action='php/order-reseller.php'>
                            <table id="desserts">
                                <tr>
                                    <th>PRODUCTS</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                </tr>
                                <tr>
                                    <td>Cupcakes</td>
                                    <td>400.00 / box (12pcs.) <textarea class="textarea" name="cupcake_desc" placeholder="Description of your theme/color scheme of your cupcake..."></textarea></td>
                                    
                                    <td><input type="number" id="items" name="cupcake_qty" step="1" value="0" min="0" onchange= "display(this, 'cupcakes','cupcakes-qty', 400)"></td>
                                </tr>
                                <tr>
                                    <td>Cookie Bars</td>
                                    <td>130.00 / 6 pcs.</td>
                                    <td><input type="number" id="items" name="cookie_bars_qty" step="1" value="0" min="0" onchange= "display(this, 'cookiesbars','cookiesbars-qty', 130 )"></td>
                                </tr>
                                <tr>
                                    <td>Bento Cake</td>
                                    <td>200.00 / box</td>
                                    <td><input type="number" id="items" name="bento_cake_qty" step="1" value="0" min="0" onchange= "display(this, 'bentos','bentos-qty', 200)"></td>
                                </tr>
                                <tr><td>Egg Pie</td>
                                    <td>250.00</td>
                                    <td><input type="number" id="items" name="egg_pie_qty" step="1" value="0" min="0" onchange= "display(this, 'eggpies','eggpies-qty', 250)"></td>
                                </tr>
                    
                                <tr>
                                    <td>Chocolate Egg Pie</td>
                                    <td>220.00 / box</td>
                                    <td><input type="number" id="items" name="choco_eggpie_qty" step="1" value="0" min="0" onchange= "display(this, 'chocoeggs','chocoeggs-qty', 220)"></td>
                                </tr>
                                <tr> 
                                    <td>Strawberry Pie </td>
                                    <td>200.00 / box</td>
                                    <td><input type="number" id="items" name="strawberry_pie_qty" step="1" value="0" min="0" onchange= "display(this, 'strawpies','strawpies-qty', 200)"></td>
                                </tr>
                            </table>
                    
                            <table id="desserts1">
                                <h4 class="divider">Other Products</h4>
                                <tr>
                                    <th>PRODUCTS</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                </tr>
                                <tr>
                                    <td>Cake Pops </td>
                                    <td>120.00 / 12 pcs.</td>
                                    <td><input type="number" id="items" name="cake_pops_qty" step="1" value="0" min="0" onchange= "display(this, 'cakepops','cakepops-qty', 120)"></td>
                                </tr>
                                <tr><td>Brownies Bites</td>
                                    <td>220.00 / 12 pcs.</td>
                                    <td><input type="number" id="items" name="brownies_bites_qty" step="1" value="0" min="0" onchange= "display(this, 'brownies','brownies-qty', 220)"></td>
                                </tr>
                                <tr><td>Cookies </td>
                                    <td>200.00 / 12 pcs.</td>
                                    <td><input type="number" id="items" name="cookies_qty" step="1" value="0" min="0" onchange= "display(this, 'cookies','cookies-qty', 200)"></td>
                                </tr>
                                <tr> <td>Chocolate Covered Marshmallows</td>
                                    <td>75.00 / 12 pcs.</td>
                                    <td><input type="number" id="items" name="choco_mallows_qty" step="1" value="0" min="0" onchange= "display(this, 'mallows','mallows-qty', 75)"></td>
                                </tr>
                            </table>
                            
                            <table id="desserts2">
                                <h4 class="divider">Products Added</h4>
                                <tr>
                                    <th>PRODUCTS</th>
                                    <th>PRODUCTS PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE</th>
                                
                                </tr>
                                <tr id='cupcakes' style='display: none;'>
                                    <td>Cupcakes</td>
                                    <td>400.00 / box (12pcs.)</td>
                                    <td id='cupcakes-qty'></td>
                                    <td id='cupcakes-sub'>0</td>
                                </tr>
                              
                                <tr id='cookiesbars' style='display: none;'>
                                    <td>Cookie Bars</td>
                                    <td>130.00 / 6 pcs.</td>
                                    <td id="cookiesbars-qty"></td>
                                    <td id="cookiesbars-sub">0</td>
                                </tr>
                                
                                <tr id='bentos' style='display: none;'>
                                    <td>Bento Cake</td>
                                    <td>200.00 / box</td>
                                    <td id="bentos-qty"></td>
                                    <td id="bentos-sub">0</td>
                                </tr>
                                
                                <tr id='eggpies' style='display: none;'>
                                    <td>Egg Pie</td>
                                    <td>250.00 / box</td>
                                    <td id="eggpies-qty"></td>
                                    <td id="eggpies-sub">0</td>
                                </tr>
                              
                                <tr id='chocoeggs' style='display: none;'>
                                    <td>Chocolate Egg Pie</td>
                                    <td>220.00 / box</td>
                                    <td id="chocoeggs-qty"></td>
                                    <td id="chocoeggs-sub">0</td>
                                </tr>
                              
                                <tr id='strawpies' style='display: none;'>
                                    <td>Strawberry Pie</td>
                                    <td>200.00 / box</td>
                                    <td id="strawpies-qty"></td>
                                    <td id="strawpies-sub">0</td>
                                </tr>
                              
                                <tr id='cakepops' style='display: none;'>
                                    <td>Cake Pops</td>
                                    <td>120.00 / 12 pcs.</td>
                                    <td id="cakepops-qty"></td>
                                    <td id="cakepops-sub">0</td>
                                </tr>
                              
                                <tr id='brownies' style='display: none;'>
                                    <td>Brownies Bites</td>
                                    <td>220.00 / 12 pcs.</td>
                                    <td id="brownies-qty"></td>
                                    <td id="brownies-sub">0</td>
                                </tr>
                              
                                <tr id='cookies' style='display: none;'>
                                    <td>Cookies</td>
                                    <td>200.00 / 12 pcs.</td>
                                    <td id="cookies-qty"></td>
                                    <td id="cookies-sub">0</td>
                                </tr>
                              
                                <tr id='mallows' style='display: none;'>
                                    <td>Chocolate Covered Marshmallowse</td>
                                    <td>75.00 / 12 pcs.</td>
                                    <td id="mallows-qty"></td>
                                    <td id="mallows-sub">0</td>
                                </tr>
                               <tr>
                                    <td></td>
                                    <td></td>
                                    <td>TOTAL PRICE</td>
                                    <td id='totalPrice'>0</td>
                                </tr>
                              
                            </table>
                    
                             
                            <center>
                                <h4 class="divider">Where are you located?</h4>
                                <h2 class="p1">As a reminder, we only collect orders within Pasig City. <br>Free shipping within Santolan. <br>For outside of Santolan, additional 100 pesos for delivery fee.</h2>
            
                                <div class="select">
                                    <select name="location" id="format" required>
                                        <option selected disabled hidden value="">Choose your location:</option>
                                        <option disabled>DISTRICT 1</option>
                                        <option name="location" value="Bagong Ilog">Bagong Ilog</option>
                                        <option name="location" value="Bagong Katipunan">Bagong Katipunan</option>
                                        <option name="location" value="Bambang">Bambang</option>
                                        <option name="location" value="Buting">Buting</option>
                                        <option name="location" value="Caniogan">Caniogan</option>
                                        <option name="location" value="Kalawaan">Kalawaan</option>
                                        <option name="location" value="Kapasigan">Kapasigan</option>
                                        <option name="location" value="Kapitolyo">Kapitolyo</option>
                                        <option name="location" value="Malinao">Malinao</option>
                                        <option name="location" value="Oranbo">Oranbo</option>
                                        <option name="location" value="Palatiw">Palatiw</option>
                                        <option name="location" value="Pineda">Pineda</option>
                                        <option name="location" value="Sagad">Sagad</option>
                                        <option name="location" value="San Antonio">San Antonio</option>
                                        <option name="location" value="San Joaquin">San Joaquin</option>
                                        <option name="location" value="San Jose">San Jose</option>
                                        <option name="location" value="San Nicolas">San Nicolas</option>
                                        <option name="location" value="Sta. Cruz">Sta. Cruz</option>
                                        <option name="location" value="Sta. Rosa">Sta. Rosa</option>
                                        <option name="location" value="Sto. Tomas">Sto. Tomas</option>
                                        <option name="location" value="Sumilang">Sumilang</option>
                                        <option name="location" value="Ugong">Ugong</option>
                                        <option disabled >DISTRICT 2</option>
                                        <option name="location" value="Dela Paz">Dela Paz</option>
                                        <option name="location" value="Manggahan">Manggahan</option>
                                        <option name="location" value="Maybunga">Maybunga</option>
                                        <option name="location" value="Pinagbuhatan">Pinagbuhatan</option>
                                        <option name="location" value="Rosario">Rosario</option>
                                        <option name="location" value="San Miguel">San Miguel</option>
                                        <option name="location" value="Santolan">Santolan</option>
                                        <option name="location" value="Sta. Lucia">Sta. Lucia</option>
                                    </select>
                                </div>
                            </center>

                            <br>

                            <button type="submit" class="check-out">
                                <span class="button__text">CHECK OUT</sp>
                                </span>
                            </button>

                            <input type="hidden" name="id" id="user" value="<?php echo $_SESSION['user_id']; ?>">

                        </form>


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
        
        <script>
            let cupcakes1 = 0;
            let cookiesbars1 = 0;
            let bentos1 = 0;
            let eggpies1 = 0;
            let chocoeggs1 = 0;
            let strawpies1 = 0;
            let cakepops1 = 0;
            let cookies1 = 0;
            let mallows1 = 0;
            let brownies1 = 0;
            let sum = 0;
            
            function display(data, id, qty, price) {
                let quantity = 0;
                let sub = 0;
                let val = data.value;
                if(data.value > 0){
                  document.getElementById(id).style.display = "table-row";
                  sub = parseInt(val) * price;
                }
                else if(data.value == 0){
                  document.getElementById(id).style.display = "none";  
                }
              document.getElementById(qty).textContent = val;
              document.getElementById(id+"-sub").textContent = sub;
              assign(id, sub);
              subtotal();
            }
            
            function assign(id, sub){
                if(id == "cupcakes"){
                   cupcakes1 = sub;
                }
                else if(id == "cookiesbars"){
                    cookiesbars1 = sub;
                }
                else if(id == "bentos"){
                    bentos1 = sub;
                }
                else if(id == "eggpies"){
                    eggpies1 = sub;
                }
                else if(id == "chocoeggs"){
                   chocoeggs1  = sub;
                }
                else if(id == "strawpies"){
                   strawpies1  = sub;
                }
                else if(id == "cakepops"){
                    cakepops1 = sub;
                }
                else if(id == "cookies"){
                    cookies1 = sub;
                }
                else if(id == "mallows"){
                   mallows1  = sub;
                }
                else if(id == "brownies"){
                   brownies1  = sub;
                }
            }
            
            function subtotal(){
                sum = cupcakes1+cookiesbars1+bentos1+eggpies1+chocoeggs1+strawpies1+cakepops1+brownies1+cookies1+mallows1;
console.log(sum);
                 document.getElementById("totalPrice").textContent = sum;
            }
            
        </script>

    </body>
</html>