<?php
session_start();
include_once 'dbCon.php';

if (isset($_POST["addNotification"])) {
    // Check if the user is logged in
    if (!isset($_SESSION["uID"])) {
        echo "UserNotLoggedIn";
        exit();
    }

    // Get the current user's uID from the session
    $senderID = $_SESSION["uID"];

    // Prepare and execute the query to get the username based on uID
    $usernameQuery = "SELECT username FROM tblusers WHERE uID = ?";
    $stmtUsername = $conn->prepare($usernameQuery);
    $stmtUsername->bind_param("s", $senderID);
    $stmtUsername->execute();
    $stmtUsername->bind_result($sender);
    $stmtUsername->fetch();
    $stmtUsername->close();

    // Get the dog ID from the AJAX request
    $dogID = $_POST["dogID"];

    // Prepare and execute the query to add the notification
    $receiverQuery = "SELECT username FROM tbldogs WHERE dogID = ?";
    $stmtReceiver = $conn->prepare($receiverQuery);
    $stmtReceiver->bind_param("i", $dogID);
    $stmtReceiver->execute();
    $stmtReceiver->bind_result($receiver);
    $stmtReceiver->fetch();
    $stmtReceiver->close();

    $type = "Match Request";
    $message = "Match request with dog successfully sent!";
    $timestamp = date("Y-m-d H:i:s");

    $insertQuery = "INSERT INTO tblnotifications (sender, receiver, type, message, timestamp, dogID) VALUES (?, ?, ?, ?, ?, ?)";
    $stmtInsert = $conn->prepare($insertQuery);
    $stmtInsert->bind_param("sssssi", $sender, $receiver, $type, $message, $timestamp, $dogID);
    
    if ($stmtInsert->execute()) {
        // Notification added successfully
        echo "NotificationAdded";
    } else {
        // Error adding notification
        echo "ErrorAddingNotification";
    }

    // Close the database connection
    $stmtInsert->close();
    $conn->close();
} else {
    // Echo an error message if the request is invalid
    echo "InvalidRequest";
}
?>
