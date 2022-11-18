<?php
    
    session_start();
?>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Rampart+One&display=swap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand:wght@300;400;700&family=Rampart+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin1.css"> 
</head>


<?php
    require("config.php");

    // $sender_id = $row['sender_id'];
    $user_id = $_SESSION['user_id'];
    $date = 0;
    $time = 0;
    $counter = 0;
    $sender_exist = false;

    if(isset($_GET['sender_id'])){
        $sender_id = $_GET['sender_id'];
        $sender_exist = true;
    
        $query = "SELECT * FROM message_tb WHERE (sender_id = $sender_id AND receiver_id = $user_id) OR (sender_id = $user_id AND receiver_id = $sender_id) ORDER BY message_id";
        $result = mysqli_query($con, $query);

        $info = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users_tb WHERE user_id = $sender_id"));
            $first_name = $info['first_name'];
            $last_name = $info['last_name'];
    }

    echo"
        <div class='chate'>
            <div class='chate-header'>
                <div class='header-content'>";

                if(isset($_GET['sender_id'])){
                    echo"<div class='sender-avatar'>
                    <img src='../images/user-64.png' width='50px' alt=''>
                    </div>

                    <div class='sender-action'>
                        <h3>$first_name $last_name </h3>
                    </div>";
                }
                    
    echo"
                </div>
            </div>
        <div class='chate-body'>
        ";

    if(isset($_GET['sender_id'])){    
        while($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
            if($date != $row1['date_sent']){
                echo "<br><center><div>".$row1['date_sent']."<br></div></center>";
                $date = $row1['date_sent'];
            }

            if($time != $row1['time_sent']){
                echo"$row1[time_sent]";
                $time = $row1['time_sent'];
            }

            if($user_id == $row1['sender_id']){
                echo"
                    <div class='message-sender'>
                        <div class='message-sender-message '>
                            <p>$row1[message_content]</p>
                        </div>
                    </div>
                ";
            }
            elseif($user_id == $row1['receiver_id']){
                echo"
                    <div class='message-recever'>
                        <div class='message-sender-message rece'>
                            <p>$row1[message_content]</p>
                        </div>
                    </div>
                ";
            }
        }

        echo"
                    <form method='post' action='sendChat.php'>
                        <div class='message-box'>
                            <div class='message-box-aria'>
                                <input type='text' placeholder='Type a message..' name='message'>
                                <input type='hidden' name='user_id' value= '$_SESSION[user_id]' />
                                <input type='hidden' name='receiver_id' value= '$sender_id' />
                                <button class='send-btn'>
                                    <i class='far fa-send'></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        ";
    }
    else{
        echo"<div id='none'>Click a conversation to open.</div>";
    }
    
?>