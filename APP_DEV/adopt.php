<?php
include_once('./includes/header.php');

if (!isset($_SESSION["uID"])) {
    header("location: ./index.php?error=UserLoggedOut");
    exit();
}
?>
    <div id="left-panel">
        <ul>
            <li><a href="#"> <img class="logo-side" src="./image/account.png">Profile</a></li>
            <li><a href="adopt.php"><img class="logo-side" src="./image/dog.png">Adopt</a></li>
            <li><a href="message.php"><img class="logo-side" src="./image/email.png">Messages</a></li>
            <li><a href="./includes/logout.php"><img class="logo-side" src="./image/logout.png">Logout</a></li>
        </ul>
    </div>
<div class="right-panel">
    <div id="dog-container">
        <div id="dog-card">
            <img src="./image/dogies/igit.jpg" alt="Dog Image">
        </div>
    </div>


            
    <div id="dog-buttons">
            <button class="reject-button">&#10006;</button>
            <button class="heart-button">&#10084;</button>
            <button class="paw-button">&#128062;</button>
    </div>
    </div>

<?php
include_once('./includes/footer.php');
?>