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
        <?php
                include_once './includes/dbCon.php';
                $UserN = $_SESSION['username'];
                $sql = "SELECT * FROM tblfavorites WHERE ownerUser = '$UserN' LIMIT 4";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="card">
                        <img src="./uploads/<?php echo $row['dogImage']?>">
                        <div class="card__content">
                        <p class="card__title">Name: <?php echo $row['dogName']?></p><br>
                        <p class="card__description">Breed: <?php echo $row['dogBreed']?></p><br>
                        <p class="card__description">Age: <?php echo $row['dogAge']?></p><br>
                        <p class="card__description">Weight: <?php echo $row['dogWeight']?></p><br>
                        <p class="card__description">Other Description: <?php echo $row['dogDescription']?></p>
                    </div>
                </div>
                        <?php
                    }
                } else {
                    echo "No favorites yet, go to Adopt page to find your fur-ever buddy!.";
                }
        ?>
</div>
    </div>
<?php
include_once('./includes/footer.php');
?>