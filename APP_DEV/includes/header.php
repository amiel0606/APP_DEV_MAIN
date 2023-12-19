<?php
    session_start();
    include_once 'dbCon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fur-Ever Buddies</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/welcome.css">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="icon" type="image/png" href="./image/logo.png">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/7.8.5/d3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="./css/inside.css">
    <link rel="stylesheet" href="./css/adoptPage.css">  
    <link rel="stylesheet" href="./css/messageDesign.css">
    <script src="./js/script.js"></script>

    <script>
        $(document).ready(function () {
            var notificationsLoaded = false;
            $('.notif-clickable').click(function () {
                // Toggle notification overlay
                toggleNotification();

                if (!notificationsLoaded) {
                    fetchNotifications();
                    notificationsLoaded = true; // Set the flag to true after loading notifications
                }
            });
       

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

    function acceptMatch(interestedUsername, uploaderUsername, timestamp) {
    // AJAX request to insert a new record into tblmatch
    $.ajax({
        type: 'POST',
        url: './includes/acceptMatch.php',
        data: {
            interestedUsername: interestedUsername,
            uploaderUsername: uploaderUsername,
            timestamp: timestamp
        },
        success: function (response) {
            // Handle success (you can show a message or perform additional actions)
            showPopup('Match Accepted!');
        },
        error: function () {
            // Handle error (you can show an error message)
            showPopup('Error accepting match.');
        }
    });
}
        function toggleNotification() {
            $('.notification-overlay').toggleClass('show');
        }

        function fetchNotifications() {
    // AJAX request to get notifications
    $.ajax({
        type: 'POST',
        url: './includes/fetchNotifications.php',
        data: {
            getNotifications: true,
        },
        success: function (response) {
            // Parse the JSON response
            var result = JSON.parse(response);

            // Check if the status is "Success"
            if (result.status === "Success") {
                // Clear existing notifications
                $('#notificationContent').empty();

                // Iterate through notifications and append to the content
                result.notifications.forEach(function (notification) {
                    // Create HTML elements for each notification
                    var notificationItem = $('<div class="notification-item">');
                    notificationItem.append('<img src="' + notification.sender_img + '" alt="Sender Image">');
                    var notificationDetails = $('<div class="notification-details">');
                    notificationDetails.append('<p>' + notification.content + '</p>');
                    var notificationButtons = $('<div class="notification-buttons">');
                    notificationButtons.append('<button class="accept-btn">Accept</button>');
                    notificationButtons.append('<button class="decline-btn">Decline</button>');
                    notificationDetails.append(notificationButtons);
                    notificationDetails.append('<small>' + notification.timestamp + '</small>');
                    notificationItem.append(notificationDetails);

                    // Append the notification to the content
                    $('.notification-content').append(notificationItem);

                    // Add click event listener to the "Accept" button
                    notificationButtons.find('.accept-btn').on('click', function () {
                        // Call the acceptMatch function with the necessary information
                        acceptMatch(notification.sender, result.currentUser, notification.timestamp);
                    });
                });
            } else {
                // Handle the case where the user is not logged in
                alert('User not logged in.');
            }
        },
        error: function () {
            alert('Error fetching notifications.');
        }
    });
}
    });
    </script>

</head>
<body>
    <div class="bg">
        <div class="nav">
            <div class="nav-link">
                <img class="logo" src="./image/logo.png" />
                <img class="line" src="./image/line.svg" />
                
                <?php
                    if (isset($_SESSION["uID"])) {
                        echo "<a href='#' class='nav-links openbtn' style='display:none;' onclick='openForm( )'>Log in</a>";
                        echo "<a href='index.php#team' class='nav-links' style='display:none;'>About Us</a>";
                        echo "<a href='index.php#homer' class='nav-links' style='display:none;'>Home</a>";
                        echo "<a href='./includes/logout.php'> <img class='logo-top' src='./image/logo/logout.png'></a>";
                        echo "<a href='message.php#'> <img class='logo-top' src='./image/logo/message.png'></a>";
                        echo "<a href='adopt.php#'> <img class='logo-top' src='./image/logo/adopt.png'></a>";
                        echo "<a href='welcome.php#'> <img class='logo-top' src='./image/logo/home.png'></a>";
                        echo "<a href='profile.php#'> <img class='logo-top' src='./image/logo/profile.png'></a>";
                        echo "<div class='nav-links notif-clickable'><img class='logo-top' src='./image/logo/notif.png'></div>";
                    } else {
                        echo "<a href='#' class='nav-links openbtn' onclick='openForm( )'>Log in</a>";
                        echo "<a href='index.php#team' class='nav-links'>About</a>";
                        echo "<a href='index.php#homer' class='nav-links'>Home</a>";
                    }
                ?>
            </div>
            <div class="txt-logo">Fur-Ever Buddies</div>
        </div>

        <div class="notification-overlay">
            <div class="notification-content">
                <!-- Your notification content goes here -->
                <p>Notifications</p>
            </div>
        </div>
