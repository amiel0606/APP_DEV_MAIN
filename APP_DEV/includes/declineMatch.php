<?php
include_once 'dbCon.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_POST['sender']) && isset($_POST['receiver']) && isset($_POST['timestamp'])) {
    $sendername = $_POST['sender'];
    $receiverUsername = $_POST['receiver'];
    $timestamp = $_POST['timestamp'];
    $dogIDQuery = "SELECT dogID FROM tblnotifications WHERE sender = ? AND receiver = ? AND timestamp = ?";
    $stmtDogID = $conn->prepare($dogIDQuery);
    $stmtDogID->bind_param("sss", $receiverUsername, $sendername, $timestamp);
    $stmtDogID->execute();
    $stmtDogID->bind_result($dogID);
    $stmtDogID->fetch();
    $stmtDogID->close();
    $updateQuery = "UPDATE tblnotifications SET type = 'Declined' WHERE sender = ? AND receiver = ? AND timestamp = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("sss", $receiverUsername, $sendername, $timestamp);
    $stmtUpdate->execute();
    $stmtUpdate->close();
    $insertQuery = "INSERT INTO tblrejectedusers (username, RejectedUser, dogID, timestamp) VALUES (?, ?, ?, NOW())";
    $stmtInsert = $conn->prepare($insertQuery);
    $stmtInsert->bind_param("ssi", $sendername, $receiverUsername, $dogID);
    if ($stmtInsert->execute()) {
        echo json_encode(['status' => 'Success']);
    } else {
        echo json_encode(['status' => 'Error', 'error' => $conn->error]);
    }
    $stmtInsert->close();
    $conn->close();
} else {
    $last_error = error_get_last();
    echo json_encode(['status' => 'Error', 'error' => $conn->error, 'php_error' => $last_error]);
}