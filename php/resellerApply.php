<?php
    require("config.php");
    require_once("computePrice.php");

    
    define ("MAX_SIZE","1000");

    function getExtension($str) {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }

    function save($image_name){
        require("config.php");
        
        $first_name         =  mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name          =  mysqli_real_escape_string($con, $_POST['last_name']);
        $num                =  mysqli_real_escape_string($con, $_POST['num']);
        $email              =  mysqli_real_escape_string($con, $_POST['email']);

        $order              = "INSERT INTO `reseller_application` ( `first_name`, `last_name`, `phone_number`, `email`, `id_image`) VALUES ('$first_name','$last_name','$num','$email','$image_name')"; 
        mysqli_query($con, $order);

        echo"<script>alert('Reseller application submitted.')</script>";
        echo"<script>window.location = '../resellers.php'</script>";
    }

    $errors = 0;
    $message;
    $image_name = '';
    $id = 0;

    //getting the id and adding 1
    $query = "SELECT app_id FROM reseller_application ORDER BY app_id DESC Limit 1";
    $res = mysqli_query($con,$query);

    if($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
        $id = $row['app_id']+1;
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
                $newname="../images/reseller_id/".$image_name;


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
            if($image_name == null){
                // echo"<script>alert('Picture of ID is needed.')</script>";
                echo"<script>alert('2.')</script>";
                echo '<script>window.history.go(-1)</script>';
            }

            save($image_name);
        }
        else{
            echo"<script>alert('$message.')</script>";
            echo '<script>window.history.go(-1)</script>';
        }
    }
    else{
        // echo"<script>alert('Picture of ID is needed.')</script>";
        echo"<script>alert('1.')</script>";
        echo '<script>window.history.go(-1)</script>';
    }
?>