<!DOCTYPE html>
<html>
    <head>
        <title>
            Whiscakes Creation
        </title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Rampart+One&display=swap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com">
        <link rel="stylesheet" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Quicksand:wght@300;400;700&family=Rampart+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        
        <link rel="stylesheet" href="css/css.css">
        <link rel="stylesheet" href="css/profile.css">
            <style>
                body {
                    font-family: 'Abril Fatface', cursive; 
                    font-family: 'Rampart One', cursive;
                    font-family: 'Quicksand', sans-serif;
                }
            </style>
    </head>

    <body>

            <div id="account" class="account-page">
                <div class="my-account">My Account<br><br></div>
            </div>

                <div class="profile">
                    <div class="title1">
                        <p>Personal Info</p>
                    </div>
                    <form action="php/update-profile.php" method="post">
                        <div class="user-details1">
                            <div class="input-box1">
                                <span class="details2">Old Email</span>
                                <input type="email" name="oemail" placeholder="Enter New Email" required>
                            </div>
                            <div class="input-box1">
                                <span class="details2">Old Password</span>
                                <input type="password" name="opw" placeholder="Enter New Password" required>
                            </div>
                            <div class="input-box1">
                                <span class="details2">New Email</span>
                                <input type="email" name="nemail" placeholder="Enter New Email" required>
                            </div>
                            <div class="input-box1">
                                <span class="details2">New Password</span>
                                <input type="password" name="npw1" placeholder="Enter New Password" required>
                            </div>
                            <div class="input-box1">
                                <span class="details2">Confirm New Password</span>
                                <input type="password" name="npw2" placeholder="ReEnter New Password" required>
                            </div>
                                    
                                <button type="submit" class="button1">
                                    <span class="button__text">UPDATE</span>
                                    <span class="button__icon">
                                        <ion-icon name="save-outline"></ion-icon>
                                    </span>
                                </button>
                        </div>
                    </form>

                
        
                <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

    </body>
</html>