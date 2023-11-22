<?php
    include_once('./includes/header.php');
    if (!isset($_SESSION["uID"])) {
        header("location: ./index.php?UserLoggedOut");
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
    <div id="right-panel">
        
        <div class="favorites">
        <h2 class="faves">Favorites</h2>
            <div class="card">
                <img src="./image/dogies/mejoNigga.jpg">
                <div class="card__content">
                    <p class="card__title">Name: Juan</p><br>
                    <p class="card__description">Location: Trece Martires</p> <br>
                    <p class="card__description">Breed: Australian Terrier</p><br>
                    <p class="card__description">Age: 5 months</p><br>
                    <p class="card__description">Weight: 3kg</p><br>
                    <p class="card__description">Other Description: Laging Tulog</p>
                </div>
            </div>
            <div class="card">
                <img src="./image/dogies/igit.jpg">
                <div class="card__content">
                    <p class="card__title">Name: Igit</p><br>
                    <p class="card__description">Location: General Trias</p> <br>
                    <p class="card__description">Breed: ASPIN</p><br>
                    <p class="card__description">Age: 2 Years Old</p><br>
                    <p class="card__description">Weight: 10kg</p><br>
                    <p class="card__description">Other Description: Kumakaen ng Tae</p>
                </div>
            </div>
            <div class="card">
                <img src="./image/dogies/enz.jpg">
                <div class="card__content">
                    <p class="card__title">Name: XxxTentacion</p><br>
                    <p class="card__description">Location: Tagaytay</p> <br>
                    <p class="card__description">Breed: Tiger Commando</p><br>
                    <p class="card__description">Age: 2 months</p><br>
                    <p class="card__description">Weight: 4kg</p><br>
                    <p class="card__description">Other Description: Tiger Commando pero Dog Food kinakaen</p>
                </div>
            </div>
            <div class="card">
                <img src="./image/dogies/blackEye.jpg">
                <div class="card__content">
                    <p class="card__title">Name: Black Eye</p><br>
                    <p class="card__description">Location: Trece Martires</p> <br>
                    <p class="card__description">Breed: ASPIN</p><br>
                    <p class="card__description">Age: 2 months</p><br>
                    <p class="card__description">Weight: 2kg</p><br>
                    <p class="card__description">Other Description: May black eye</p>
                </div>
            </div>
        </div>
        <div class="adoptees">
            <h6 class="faves">Adoptees</h6>
            <div class="adopt-photo1">  </div>
            <div class="adopt-photo2">  </div>
            <div class="adopt-photo3">  </div>
            <div class="adopt-photo4">  </div>
        </div>
    </div>
<?php
include_once('./includes/footer.php');
?>