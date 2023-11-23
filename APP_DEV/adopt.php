<?php
include_once('./includes/header.php');

// Check if the user is logged in
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
<<<<<<< Updated upstream
            <img src="./image/dogies/igit.jpg" alt="Dog Image">
=======
            <!-- Default dog card -->
            <img src="./image/defaultDoggo.png" alt="Default Dog Image">
            <div class="dog-card__content">
                <p class="dog-card__title">No Dog Available</p>
                <p class="dog-card__description">Check back later to find more buddies!</p>
            </div>
>>>>>>> Stashed changes
        </div>

<<<<<<< Updated upstream
    <div id="dog-buttons">
        <button class="reject-button">&#10006;</button>
        <button class="heart-button">&#10084;</button>
        <button class="paw-button">&#128062;</button>
    </div>

    <div class="add-dog-form">
        <button onclick="toggleForm()" class="toggle-button">Add Dog for Adoption</button>
        <div class="add-dog-container" id="dogFormContainer">
            <div class="add-dog-form-inner">
                <!-- Added exit button here -->
                <button onclick="toggleForm()" class="exit-button">Exit Form</button>
                <form action="" method="post" id="dogForm">

                    <label for="dogImage">Dog Image:</label>
                    <input type="file" name="dogImage" accept="image/*">

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
=======
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
                        <!-- Your form inputs go here -->
                        <div class="add-dog-buttons">
                            <button type="submit" name="addDog">Add Dog</button>
                        </div>
                    </form>
                </div>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>

    <script>
        function toggleForm() {
            var dogFormContainer = document.getElementById("dogFormContainer");
            dogFormContainer.style.display = (dogFormContainer.style.display === "none" || dogFormContainer.style.display === "") ? "block" : "none";
        }

        $(document).ready(function () {
            loadDog(); // Load the initial dog on page load

            $("#change-image").click(function () {
                // Handle changing the image
                loadDog();
            });

            $(".reject-button").click(function () {
                rejectDog();
            });
        });

        function loadDog() {
            $.ajax({
                type: 'POST',
                url: './includes/getDog.php',
                data: { cacheBuster: new Date().getTime() }, // Cache buster
                success: function (response) {
                    $("#dog-card").html(response);
                },
                error: function () {
                    alert('Error loading dog.');
                }
            });
        }

        function rejectDog() {
            var currentDogID = $("#dog-card img").data("dogid");

            $.ajax({
                type: 'POST',
                url: './includes/reject.php',
                data: { rejectDog: true, dogID: currentDogID },
                success: function (response) {
                    $("#dog-card").html(response);
                },
                error: function () {
                    alert('Error rejecting dog.');
                }
            });
        }
    </script>

    <?php
    include_once('./includes/footer.php');
    ?>
</div>
<<<<<<< Updated upstream

<script>
function toggleForm() {
    var dogFormContainer = document.getElementById("dogFormContainer");
    dogFormContainer.style.display = (dogFormContainer.style.display === "none" || dogFormContainer.style.display === "") ? "block" : "none";
}
</script>

<?php
include_once('./includes/footer.php');
?>
=======
>>>>>>> Stashed changes
