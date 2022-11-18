<?php
    // echo "Today is " . date("Y/m/d") . "<br>";
    // echo "The time is " . date("h:ia");

    function chat_bubbles(){
        require("config.php");

        $user_id = $_SESSION['user_id'];
        $date = 0;
        $time = 0;

        $query = "SELECT * FROM message_tb WHERE sender_id = '$user_id' OR receiver_id = '$user_id'";
        $result = mysqli_query($con, $query);
       
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            
            if($date != $row['date_sent']){
                echo "<center><div>".$row['date_sent']."<br></div></center>";
            }

            $date = $row['date_sent'];

            if($time != $row['time_sent']){
                echo"$row[time_sent]";
            }

            $time = $row['time_sent'];

            if($user_id == $row['sender_id']){
                echo"
                    <div class='my-chat'>$row[message_content]</div>
                ";
            }
            elseif($user_id == $row['receiver_id']){
                echo"
                    <div class='client-chat'>$row[message_content]</div>
                ";
            }
        
        }
    }

    function chatList(){
        require("config.php");

        // $query = "SELECT * FROM message_tb  ORDER BY message_id";
        // $result = mysqli_query($con, $query);

        $client_count = mysqli_query($con, "SELECT DISTINCT `sender_id` FROM `message_tb` WHERE `sender_id` != 0 ORDER BY `message_id` DESC;");
        
        // echo"
        //     <div class='ms-a chat-active'>
        //         <div class='avatar'>
        //             <img src='images/iconfinder_afro_woman_female_person_4043231.png' width='50px' alt=''>
        //         </div>

        //         <div class='mesg-info '>
        //             <div class='ms-info'>
        //                 <span class=' sender-name'> Jamine Mendoza </span> 
        //             </div>
        //         </div>
        //     </div>
        // ";

        while($row = mysqli_fetch_array($client_count, MYSQLI_ASSOC)){
            $sender_id = $row['sender_id'];

            $info = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $sender_id"));
                $first_name = $info['first_name'];
                $last_name = $info['last_name'];
                $type = $info['user_type'];

            echo"
                <a href='php/conversation.php?sender_id=$sender_id' target='conversation''>
                    <div class='ms-a '>
                        <div class='avatar'>
                            <img src='images/user-64.png' width='50px' alt=''>
                        </div>

                        <div class='mesg-info '>
                            <div class='ms-info'>
                                <span class=' sender-name'>$first_name $last_name</span>
                            </div>
                            <div class='action'>
                            <span>$type</span>
                        </div>
                        </div>
                    </div>
                </a>
        ";
        }
    }
?>