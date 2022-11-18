<?php
    function total($item){
        require("auth.php");
        require("php/config.php");

        $qry = "SELECT * FROM order_tb WHERE user_id = $_SESSION[user_id] ORDER BY `order_id` DESC LIMIT 1";
        $result = mysqli_query($con, $qry);

        if($result){
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);

                $user_id    = $row['user_id'];
                $order_id   = $row['order_id'];
                $_SESSION['order'] = $order_id;
                

                $qry1 = "SELECT * FROM users_tb WHERE user_id = $user_id";
                $result1 = mysqli_query($con, $qry1);
                if($result1){
                    if(mysqli_num_rows($result1) == 1){
                        $row1 = mysqli_fetch_assoc($result1);
                        $name   = $row1['first_name']." ".$row1['last_name'];
                        $email  = $row1['email'];

                        if($item == 'name'){
                            echo $name;
                        }
                        elseif($item == 'total'){
                            $total = 0;

                            $cake_order = "SELECT SUM(cake.price) as total
                            FROM order_tb 
                            INNER JOIN cake 
                            WHERE(
                                size = cake.name OR 
                                cake_base = cake.name OR 
                                cake_base_flavor = cake.name OR 
                                regular_filling = cake.name OR 
                                premium_filling = cake.name
                            ) 
                            AND order_tb.order_id = $order_id";

                            $dessert_order = "SELECT desserts.price,

                            SUM(orders.cupcake_qty*(SELECT desserts.price WHERE desserts.dessert_id = 1))+
                            SUM(orders.cake_pops_qty*(SELECT desserts.price WHERE desserts.dessert_id = 2))+
                            SUM(orders.brownies_bites_qty*(SELECT desserts.price WHERE desserts.dessert_id = 3))+
                            SUM(orders.cookies_qty*(SELECT desserts.price WHERE desserts.dessert_id = 4))+
                            SUM(orders.mallow_pops_qty*(SELECT desserts.price WHERE desserts.dessert_id = 5))+
                            SUM(orders.cBars_qty*(SELECT desserts.price WHERE desserts.dessert_id = 6))+
                            SUM(orders.mini_cake_qty*(SELECT desserts.price WHERE desserts.dessert_id = 7))+
                            SUM(orders.cake_cup_qty*(SELECT desserts.price WHERE desserts.dessert_id = 8)) AS total
                            
                            
                            FROM order_tb as orders
                            INNER JOIN desserts
                             WHERE(
                                    cupcake_id = desserts.dessert_id OR 
                                    cake_pops_id = desserts.dessert_id OR 
                                    brownies_bites_id = desserts.dessert_id OR 
                                    cookies_id = desserts.dessert_id OR
                                     mallow_pops_id = desserts.dessert_id OR
                                     cBars_id = desserts.dessert_id OR
                                     mini_cake_id = desserts.dessert_id OR
                                    cake_cup_id = desserts.dessert_id
                                    ) 
                            AND orders.order_id = $order_id
                            ";

                            $bnp_order="SELECT bnp.price,

                            SUM(orders.banana_bread_qty*(SELECT bnp.price WHERE bnp.bnp_id = 1))+
                            SUM(orders.egg_pie_qty*(SELECT bnp.price WHERE bnp.bnp_id = 2))+
                            SUM(orders.choco_egg_qty*(SELECT bnp.price WHERE bnp.bnp_id = 3))+
                            SUM(orders.banoffee_qty*(SELECT bnp.price WHERE bnp.bnp_id = 4)) as total
                            
                            
                            FROM order_tb as orders
                            INNER JOIN bnp_tb as bnp
                             WHERE(
                                    banana_bread_id = bnp.bnp_id OR 
                                    egg_pie_id = bnp.bnp_id OR 
                                    choco_egg_id = bnp.bnp_id OR 
                                    banoffee_id = bnp.bnp_id
                                    ) 
                            AND orders.order_id = $order_id
                            
                            ";

                            
                            $location = "SELECT location FROM order_tb WHERE order_id = $order_id";


                            
                            $cake = mysqli_query($con, $cake_order);
                            $dessert = mysqli_query($con, $dessert_order);
                            $bnp= mysqli_query($con, $bnp_order);
                            $loc_query= mysqli_query($con, $location);

                            $cake_total = mysqli_fetch_assoc($cake);
                            $dessert_total = mysqli_fetch_assoc($dessert);
                            $bnp_total = mysqli_fetch_assoc($bnp);
                            $del_loc =  mysqli_fetch_assoc($loc_query);
                            $del_fee;

                           
                            if($del_loc['location'] == 'Santolan' or $del_loc['location']  == 'Manggahan'){
                                $del_fee = 0;
                            }
                            else{
                                $del_fee = 50;
                            }
                            

                            $final_price = $cake_total['total']+$dessert_total['total']+$bnp_total['total']+$del_fee;
                            
                            return $final_price;
                              
                        }
                    }
                }
            }

        }

    }


    function discount($voucher,$total){
        require("php/config.php");

        $result = mysqli_query($con, "SELECT *  FROM vouchers_tb WHERE code = '$voucher'");
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) == 1 && $voucher == $row['code']){
            $total *= $row['discount'];
            
            return $total;
        }
        else{
            return 0;
        }
    }

?>
