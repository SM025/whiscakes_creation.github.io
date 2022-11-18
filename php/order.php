<?php
    require("config.php");
    require_once("computePrice.php");

    //define a maxim size for the uploaded images in Kb
    define ("MAX_SIZE","1000");

    //This function reads the extension of the file. It is used to determine if the
    // file  is an image by checking the extension.
    function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }

    function save($image_name){
        require("config.php");

        $size_name          =  mysqli_fetch_assoc(mysqli_query($con, "SELECT name FROM cake WHERE part_id = $_POST[size]"));
        $base_name          =  mysqli_fetch_assoc(mysqli_query($con, "SELECT name FROM cake WHERE part_id = $_POST[base]"));
        $base_flavor_name   =  mysqli_fetch_assoc(mysqli_query($con, "SELECT name FROM cake WHERE part_id = $_POST[base_flavor]"));
        $reg_fill_name      =  mysqli_fetch_assoc(mysqli_query($con, "SELECT name FROM cake WHERE part_id = $_POST[reg_fill]"));
        $prem_fill_name     =  mysqli_fetch_assoc(mysqli_query($con, "SELECT name FROM cake WHERE part_id = $_POST[prem_fill]"));
        
        $user_id            =  mysqli_real_escape_string($con, $_POST['id']);
        $event              =  mysqli_real_escape_string($con, $_POST['event']);
        $shape              =  mysqli_real_escape_string($con, $_POST['shape']);
        $size               =  mysqli_real_escape_string($con, $size_name['name']);
        $cake_base          =  mysqli_real_escape_string($con, $base_name['name']);
        $base_flavor        =  mysqli_real_escape_string($con, $base_flavor_name['name']);
        $reg_fill           =  mysqli_real_escape_string($con, $reg_fill_name['name']);
        $prem_fill          =  mysqli_real_escape_string($con, $prem_fill_name['name']);
        $dbname             = "custom_cakes";

        $order              = "INSERT INTO $dbname (`user_id`, `event`, `shape`, `size`, `cake_base`, `cake_base_flavor`, `regular_filling`, `premium_filling`, `item_image`) VALUES ('$user_id','$event','$shape','$size','$cake_base','$base_flavor','$reg_fill','$prem_fill','$image_name')"; 
        mysqli_query($con, $order);

        $result             = mysqli_query($con, "SELECT * FROM custom_cakes WHERE `user_id` = '$user_id' ORDER BY item_id  DESC LIMIT 1");
        
        if($user               = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $cakePrice          = customCompute($user['item_id']);
        }

        mysqli_query($con, "UPDATE `custom_cakes` SET `item_price`= $cakePrice WHERE item_id = $user[item_id]");

        echo "
            <form name='customCake' action='addToCart.php' method='post'>
                <input type='hidden' name='item_id' value='$user[item_id]'>
                <input type='hidden' name='dbname' value='$dbname'>
                <input type='hidden' name='user_id' value='$user_id'>
            </form>

            <script>
                submitform();

                function submitform()
                {
                    document.customCake.submit();
                }
            </script>
        ";
    }

    $errors = 0;
    $message;
    $image_name = '';

    //getting the id and adding 1
    $query = "SELECT item_id FROM custom_cakes ORDER BY item_id DESC Limit 1";
    $res = mysqli_query($con,$query);
    if( $row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
        $id = $row['item_id']+1;
    }
    else{
        $id = 0;
    }

    if($_FILES['image'] != NULL){
        //reads the name of the file the user submitted for uploading
        $image=$_FILES['image']['name'];

        //if it is not empty
        if ($image){
            //get the original name of the file from the clients machine
            $filename = stripslashes($_FILES['image']['name']);
            //$filename = stripslashes($pic);
            //get the extension of the file in a lower case format
            $extension = getExtension($filename);
            $extension = strtolower($extension);

            //if it is not a known extension, we will suppose it is an error and 
            // will not  upload the file,  
            //otherwise we will do more tests
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension !="png") && ($extension != "gif")&& ($extension != "pdf")){
                //print error message
                $message = 'Unknown extension!';
                $errors=1;
            }
            else{
                //get the size of the image in bytes
                //$_FILES['image']['tmp_name'] is the temporary filename of the file
                //in which the uploaded file was stored on the server
                $size=filesize($_FILES['image']['tmp_name']);
                //$size=filesize($pic);

                //compare the size with the maxim size we defined and print error if bigger
                if($size > MAX_SIZE*2048){
                    $message = 'You have exceeded the size limit!';
                    $errors=1;
                }

                //we will give an unique name, for example the time in unix time format
                $image_name=$id.'.'.$extension;

                //the new name will be containing the full path where will be stored (images
                //folder)
                $newname="../images/orders/".$image_name;

                //we verify if the image has been uploaded, and print error instead
                $copied = copy($_FILES['image']['tmp_name'], $newname);
                //$copied = copy($pic, $newname);
                if(!$copied){
                    $message = 'Upload unsuccessful!';
                    $errors=1;
                }
            }
        }

        //If no errors registred, print the success message
        if(!$errors){
            if($image_name == null)
                $image_name = 'no image';

            save($image_name);
        }
        else{
            echo"<script>alert('$message.')</script>";
            echo '<script>window.history.go(-1)</script>';
        }
    }
    else{
        save("No image");
    }
?>

