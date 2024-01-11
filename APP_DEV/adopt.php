<?php
include_once('./includes/header.php');
if (!isset($_SESSION["uID"])) {
    header("location: index.php?error=UserLoggedOut");
    exit();
    
}
?>
    <div class="right-panel">
        <div id="dog-container">
            <div id="dog-card">
                <img src="./image/defaultDoggo.png" alt="Default Dog Image">
                <div class="dog-card__content">
    <img class="uploader-profile-picture" src="./image/anon.png" alt="Uploader Profile Picture">
    <div class="uploader-info">
        <p class="uploader-name">Name: John Doe</p>
        <p class="uploader-location">Location: City, Country</p>
        <p class="uploader-rating">Rating: 5 stars</p>
    </div>
    <p class="dog-card__title">Name: </p><br>
    <p class="dog-card__description">Breed: </p><br>
    <p class="dog-card__description">Age: </p><br>
    <p class="dog-card__description">Weight: kg</p><br>
    <p class="dog-card__description">Other Description: </p>
</div>      
            </div>
        </div>

        <div id="info-button">
        <button class="information"> <img src="./image/moreINFO.png" alt="Info"> </button>
        </div>

        <div id="dog-buttons">
            <button class="reject-button" > <img src="./image/Reject.png" alt="Reject"></button>
            <button id="change-image" class="heart-button"><img src="./image/Heart.png" alt="Heart"></button>
            <button class="paw-button"><img src="./image/Paw.png" alt="Paw"></button>
        </div>

        <div class="add-dog-form">
        <button class="toggle-button">Add Dog for Adoption</button>
        <div class="add-dog-container" id="dogFormContainer">
            <div class="add-dog-form-inner">
            <button class="exit-button">Exit Form</button>

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
        loadDog();
        $(".toggle-button").click(function () {
            $("#dogFormContainer").toggle();
        });

        $(".exit-button").click(function () {
            $("#dogFormContainer").toggle();
        });

        $(".information").click(function () {
        $(".dog-card__content").toggleClass("show-content");
    });
    
    $(document).keydown(function (e) {
        // Check which key is pressed and trigger the corresponding function
        switch (e.which) {
            case 37: // Left arrow key
                rejectDog();
                showPopup("Dog Rejected... You won't see them again :((");
                break;
            case 38: // Up arrow key
                $("#change-image").click();
                break;
            case 39: // Right arrow key
                $(".paw-button").click();
                break;
            case 40: // Down arrow key
                $(".information").click();
                break;
            default:
                // Do nothing for other keys
        }
    });

    function showPopup(message) {
        $("#popup-message").text(message);
        $("#popup-container").fadeIn();
        setTimeout(function () {
            $("#popup-container").fadeOut();
        }, 3000);
    }

    function rejectDog() {
    var currentDogID = $("#dog-card img").data("dogid");
    $.ajax({
        type: 'POST',
        url: './includes/reject.php',
        data: {
            rejectDog: true,
            dogID: currentDogID
        },
        success: function (response) {
            if (response.trim() !== "") {
                $("#dog-card").html(response);
            } else {
                $("#dog-card").html('<img src="./image/defaultDoggo.png" alt="Default Dog Image">' +
                    '<div class="dog-card__content">' +
                    '<p class="dog-card__title">No Dog Available</p>' +
                    '<p class="dog-card__description">Check back later to find more buddies!</p>' +
                    '</div>');
                $("#popup-close").off("click");
            }
        },
        error: function () {
            alert('Error rejecting dog.');
        }
    });
}

        $(".reject-button").click(function () {
            rejectDog();
        });

        $("#change-image").click(function () {
    var dogID = $("#dog-card img").data("dogid"); 
    $.ajax({
        type: 'POST',
        url: './includes/addToFavorites.php',
        data: { 
            addToFavorite: true,
            dogID: dogID
        },
        success: function (response) {
            console.log("addToFavorites.php response:", response);
            if (response.trim() === "DogAdded") {
                showPopup("Dog Added to Favorites");
                $.ajax({    
                    type: 'POST',
                    url: './includes/fetchNewDog.php',
                    success: function (newDogResponse) {
                        console.log("fetchNewDog.php response:", newDogResponse);
                        if (newDogResponse.trim() !== "No more dogs available.") {
                            $("#dog-card").html(newDogResponse);
                        } else {
                            $("#dog-card").html('<img src="./image/defaultDoggo.png" alt="Default Dog Image">' +
                                '<div class="dog-card__content">' +
                                '<p class="dog-card__title">No Dog Available</p>' +
                                '<p class="dog-card__description">Check back later to find more buddies!</p>' +
                                '</div>');
                        }
                    },
                    error: function () {
                        alert('Error fetching new dog image.');
                    }
                });
            } else if (response.trim() === "DogAlreadyInFavorites") {
                alert('This dog is already in your favorites.');
                fetchNextDog();
            } else if (response.trim() === "ErrorAddingDog") {
                alert('Error adding dog to favorites.');
            } else if (response.trim() === "NoDogFound") {
                alert('No dog found.');
            } else {
                alert('Unexpected response.');
            }
        },
        error: function () {
            alert('Error adding dog to favorites.');
        }
    });
});
$(".paw-button").click(function () {
    var dogID = $("#dog-card img").data("dogid");
    $.ajax({
        type: 'POST',
        url: './includes/addNotification.php',
        data: { 
            addNotification: true,
            dogID: dogID
        },
        success: function (response) {
            console.log("addNotification.php response:", response);
            if (response.trim() === "NotificationAdded") {
                showPopup("Match request with dog successfully sent!");
                rejectDog();
                loadDog();
            } else {
                alert('Unexpected response while adding notification.');
            }
        },
        error: function () {
            alert('Error adding notification.');
        }
    });
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

function fetchNextDog() {
    $.ajax({
        type: 'POST',
        url: './includes/fetchNewDog.php',
        success: function (newDogResponse) {
            console.log("fetchNewDog.php response:", newDogResponse);
            if (newDogResponse.trim() !== "No more dogs available.") {
                $("#dog-card").html(newDogResponse);
            } else {
                $("#dog-card").html('<img src="./image/defaultDoggo.png" alt="Default Dog Image">' +
                    '<div class="dog-card__content">' +
                    '<p class="dog-card__title">No Dog Available</p>' +
                    '<p class="dog-card__description">Check back later to find more buddies!</p>' +
                    '</div>');
            }
        },
        error: function () {
            alert('Error fetching new dog image.');
        }
    });
}

    $("#popup-close").click(function () {
        $("#popup-container").fadeOut();
    });

</script>


    <?php
    include_once('./includes/footer.php');
    ?>