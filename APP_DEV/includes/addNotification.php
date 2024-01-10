<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include_once 'dbCon.php';
if (isset($_POST["addNotification"])) {
    if (!isset($_SESSION["uID"])) {
        echo "UserNotLoggedIn";
        exit();
    }
    $senderID = $_SESSION["uID"];
    $usernameQuery = "SELECT username FROM tblusers WHERE uID = ?";
    $stmtUsername = $conn->prepare($usernameQuery);
    $stmtUsername->bind_param("s", $senderID);
    $stmtUsername->execute();
    $stmtUsername->bind_result($sender);
    $stmtUsername->fetch();
    $stmtUsername->close();
    $dogID = $_POST["dogID"];
    $receiverQuery = "SELECT username FROM tbldogs WHERE dogID = ?";
    $stmtReceiver = $conn->prepare($receiverQuery);
    $stmtReceiver->bind_param("i", $dogID);
    $stmtReceiver->execute();
    $stmtReceiver->bind_result($receiver);
    $stmtReceiver->fetch();
    $stmtReceiver->close();
    $type = "Match Request";
    $message = "Match request with dog successfully sent!";
    $insertQuery = "INSERT INTO tblnotifications (sender, receiver, type, message, timestamp, dogID) VALUES (?, ?, ?, ?, NOW(), ?)";
    $stmtInsert = $conn->prepare($insertQuery);
    $stmtInsert->bind_param("ssssi", $sender, $receiver, $type, $message, $dogID);
    if ($stmtInsert->execute()) {
        echo "NotificationAdded";
    } else {
        echo "ErrorAddingNotification";
    }
    $stmtInsert->close();
    $conn->close();
} else {
    echo "InvalidRequest";
}