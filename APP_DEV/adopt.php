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
            <li><a href="welcome.php"> <img class="logo-side" src="./image/account.png">Profile</a></li>
            <li><a href="adopt.php"><img class="logo-side" src="./image/dog.png">Adopt</a></li>
            <li><a href="message.php"><img class="logo-side" src="./image/email.png">Messages</a></li>
            <li><a href="./includes/logout.php"><img class="logo-side" src="./image/logout.png">Logout</a></li>
        </ul>
    </div>

    <div class="right-panel">
        <div id="dog-container">
            <div id="dog-card">
                <!-- Default dog card -->
                <img src="./image/defaultDoggo.png" alt="Default Dog Image">
                <div class="dog-card__content">
                    <p class="dog-card__title">No Dog Available</p>
                    <p class="dog-card__description">Check back later to find more buddies!</p>
                </div>
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
<div id="popup-container">
    <p id="popup-message"></p>
    <p id="popup-close"></p>
</div>
 
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Load the initial dog on page load
        loadDog();

        $(".toggle-button").click(function () {
            $("#dogFormContainer").toggle();
        });

        $(".exit-button").click(function () {
            $("#dogFormContainer").toggle();
        });

        $(".reject-button").click(function () {
            rejectDog();
        });

        $("#change-image").click(function () {
            var currentDogID = $("#dog-card img").data("dogid");

            // Check if the dog is already in favorites
            var isInFavorites = checkIfInFavorites(currentDogID);

            if (isInFavorites) {
                removeDogFromFavorites(currentDogID);
            } else {
                addToFavorites();
            }
        });

        $(".paw-button").click(function () {
            window.location.href = 'message.php';
        });
    });

    function addToFavorites() {
        $.ajax({
            type: 'POST',
            url: './includes/accept.php',
            data: { addToFavorite: true },
            success: function (response) {
                if (response.trim() === "") {
                    // No more dogs available, show default dog card
                    $("#dog-card").html('<img src="./image/defaultDoggo.png" alt="Default Dog Image">' +
                        '<div class="dog-card__content">' +
                        '<p class="dog-card__title">No Dog Available</p>' +
                        '<p class="dog-card__description">Check back later to find more buddies!</p>' +
                        '</div>');
                } else {
                    // Dog added to favorites, show popup
                    showPopup("Dog Added to Favorites");
                    // Handle the response if needed
                    console.log(response);
                    loadDog(); // Load the next dog
                }
            },
            error: function () {
                alert('Error adding dog to favorites.');
            }
        });
    }

    function removeDogFromFavorites(dogID) {
        $.ajax({
            type: 'POST',
            url: './includes/removeFromFavorites.php',
            data: { removeFromFavorites: true, dogID: dogID },
            success: function (response) {
                // Dog removed from favorites, show popup
                showPopup("Dog Removed from Favorites");
                // Handle the response if needed
                console.log(response);
                loadDog(); // Load the next dog
            },
            error: function () {
                alert('Error removing dog from favorites.');
            }
        });
    }

    function checkIfInFavorites(dogID) {
        // Check if the current dog is in favorites
        // You may need to modify this part based on your actual implementation
        var isInFavorites = false;
        // Perform an AJAX call or use other methods to check if the dog is in favorites
        // Set isInFavorites to true or false based on the result

        return isInFavorites;
    }

    function loadDog() {
        $.ajax({
            type: 'GET',
            url: './includes/getDog.php',
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

    function showPopup(message) {
        $("#popup-message").text(message);
        $("#popup-container").fadeIn();
        setTimeout(function () {
            $("#popup-container").fadeOut();
        }, 3000);
    }

    // Close popup on click
    $("#popup-close").click(function () {
        $("#popup-container").fadeOut();
    });
</script>



    <?php
    include_once('./includes/footer.php');
    ?>
</body>
</html>