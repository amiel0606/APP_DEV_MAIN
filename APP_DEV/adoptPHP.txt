<?php
include_once('./includes/header.php');
if (!isset($_SESSION["uID"])) {
    header("location: ./index.php?error=UserLoggedOut");
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

<div class="right-panel">

    <div id="dog-container">
        <div id="dog-card">
            <?php
                include_once './includes/dbCon.php';
                $UserN = $_SESSION['username'];
                $sql = "SELECT * FROM tbldogs WHERE username != '$UserN' ORDER BY RAND() LIMIT 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                            ?><img src="./uploads/<?php echo $row['image']?>"><?php
                    }
                }
            ?>
        </div>
    </div>



    <div id="dog-buttons">
        <button class="reject-button">&#10006;</button>
        <button id="change-image" class="heart-button">&#10084;</button>
        <button class="paw-button">&#128062;</button>
    </div>

    <div class="add-dog-form">
        <button onclick="toggleForm()" class="toggle-button">Add Dog for Adoption</button>
        <div class="add-dog-container" id="dogFormContainer">
            <div class="add-dog-form-inner">
                <!-- Added exit button here -->
                <button onclick="toggleForm()" class="exit-button">Exit Form</button>

                <form action="./includes/upload.php" method="POST" id="dogForm" enctype="multipart/form-data">

                    <label for="dogImage">Dog Image:</label>
                    <input type="file" name="dogImage">


                    <label for="dogName">Dog Name:</label>
                    <input type="text" name="dogName" required>

                    <label for="breed">Breed:</label>
                    <input type="text" name="breed" required>

                    <label for="age">Age (optional):</label>
                    <input type="text" name="age">

                    <label for="weight">Weight:</label>
                    <input type="text" name="weight" required>

                    <label for="description">Other Description (optional):</label>
                    <textarea name="description"></textarea>

                    <!-- Moved buttons to the right -->
                    <div class="add-dog-buttons">
                        <button type="submit" name="addDog">Add Dog</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function toggleForm() {
    var dogFormContainer = document.getElementById("dogFormContainer");
    dogFormContainer.style.display = (dogFormContainer.style.display === "none" || dogFormContainer.style.display === "") ? "block" : "none";
}


$(document).ready(function() {
    $("#change-image").click(function() {
        $("#dog-card").load("./includes/accept.php");
    });
});

</script>

<?php
include_once('./includes/footer.php');
?>
