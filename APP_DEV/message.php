<?php
include_once('./includes/header.php');
if (!isset($_SESSION["uID"])) {
    header("location: ./index.php?UserLoggedOut");
    exit();
}
?>  

    <div id="left-panel">
        <ul>
            <li><a href="welcome.php"> <img class="logo-side" src="./image/account.png">Profile</a></li>
            <li><a href="adopt.php"><img class="logo-side" src="./image/dog.png">Adopt</a></li>
            <li><a href="message.php"><img class="logo-side" src="./image/email.png">Messages</a></li>
            <li><a href="./includes/logout.php"><img class="logo-side" src="./image/logout.png">Logout</a></li>
        </ul>
    </div>

    <div id="rectangle_message">
        <div  id="mssgs">
            <div class="myProfile">
                <h6 class="mp">My Profile</h6>
                <div id="buttons">
                    <ul>
                        <li><a href="message.php"> <img class="logo-search" src="./image/search.png"></a></li>
                        <li><a href="message.php"> <img class="logo-notif" src="./image/notification.png"></a></li>
                    </ul>
                </div>
            </div>    
            <div class="message">
                <h5>Messages</h5>
            </div>
        </div>
    </div>

    <div class="vertical-line">

    </div>
    <div id="rectangle_convo">
        <div class="inputbox">

        </div>
        <div id="buttons">
            <ul>
                <li><a href="message.php"> <img class="logo-gallery" src="./image/gallery.png"></a></li>
                <li><a href="message.php"> <img class="logo-call" src="./image/call.png"></a></li>
                <li><a href="message.php"> <img class="logo-videocall" src="./image/videocall.png"></a></li>
                <li><a href="message.php"> <img class="logo-information" src="./image/information.png"></a></li>
            </ul>
        </div>
    </div>

<?php
include_once('./includes/footer.php');
?>