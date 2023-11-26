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
<<<<<<< HEAD
<div class="right-panel">

    <div id="dog-container">
        <div id="dog-card">
            <?php
                include_once './includes/dbCon.php';
                $UserN = $_SESSION['username'];
                $sql = "SELECT image FROM tbldogs ORDER BY RAND() LIMIT 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?><img src="./uploads/<?php echo $row['image']?>"><?php
                    }
                }
            ?>
=======

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
>>>>>>> a811da731042fcb0869f8ed30dc7c1274b7c9ed3
        </div>

<<<<<<< HEAD

    <div id="dog-buttons">
        <button class="reject-button">&#10006;</button>
        <button id="change-image" class="heart-button">&#10084;</button>
        <button class="paw-button">&#128062;</button>
    </div>
=======
        <div id="dog-buttons">
            <button class="reject-button">&#10006;</button>
            <button id="change-image" class="heart-button">&#10084;</button>
            <button class="paw-button">&#128062;</button>
        </div>
>>>>>>> a811da731042fcb0869f8ed30dc7c1274b7c9ed3

        <div class="add-dog-form">
        <button onclick="toggleForm()" class="toggle-button">Add Dog for Adoption</button>
        <div class="add-dog-container" id="dogFormContainer">
            <div class="add-dog-form-inner">
<<<<<<< HEAD
                <!-- Added exit button here -->
                <button onclick="toggleForm()" class="exit-button">Exit Form</button>
=======
            <button onclick="toggleForm()" class="exit-button">Exit Form</button>

>>>>>>> a811da731042fcb0869f8ed30dc7c1274b7c9ed3
                <form action="./includes/upload.php" method="POST" id="dogForm" enctype="multipart/form-data">

                    <label for="dogImage">Dog Image:</label>
                    <input type="file" name="dogImage">
<<<<<<< HEAD
=======

>>>>>>> a811da731042fcb0869f8ed30dc7c1274b7c9ed3

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
<<<<<<< HEAD
=======

>>>>>>> a811da731042fcb0869f8ed30dc7c1274b7c9ed3
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
<<<<<<< HEAD
function toggleForm() {
    var dogFormContainer = document.getElementById("dogFormContainer");
    dogFormContainer.style.display = (dogFormContainer.style.display === "none" || dogFormContainer.style.display === "") ? "block" : "none";
}

$(document).ready(function() {
    $("#change-image").click(function() {
        $("#dog-card").load("./includes/accept.php");
    });
});
=======

    
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
                        loadDog();
                    }
                },
                error: function () {
                    alert('Error adding dog to favorites.');
                }
            });
        });

        $(".paw-button").click(function () {
        window.location.href = 'message.php';
    });
    });

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
>>>>>>> a811da731042fcb0869f8ed30dc7c1274b7c9ed3
</script>


    <?php
    include_once('./includes/footer.php');
    ?>
</body>
</html>