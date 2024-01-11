<?php
//NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING
session_start();
include_once 'dbCon.php';

$lastSeenTimestamp = isset($_GET['lastSeenTimestamp']) ? $_GET['lastSeenTimestamp'] : null;
$updateSeenStmt = $conn->prepare("UPDATE tblmessages SET seen = 0 WHERE receiver = ? AND timestamp > ?");
$updateSeenStmt->bind_param("ss", $_SESSION['username'], $lastSeenTimestamp);
$updateSeenStmt->execute();
$sql = "SELECT sender, receiver, message, timestamp FROM tblmessages
        WHERE (receiver = ? AND timestamp > ?)
        OR (sender = ? AND timestamp > ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $_SESSION['username'], $lastSeenTimestamp, $_SESSION['username'], $lastSeenTimestamp);
$stmt->execute();

$newMessages = "";

if ($stmt->get_result()->num_rows > 0) {
    while ($row = $stmt->get_result()->fetch_assoc()) {
        $sender = htmlspecialchars($row['sender']);
        $message = htmlspecialchars($row['message']);
        $htmlFragment = "<p><strong>$sender:</strong> $message</p>";
    if ($sender === $_SESSION['username']) {
        $newMessages .= $htmlFragment;
        break;
    } else {
        //For notifications
    }
}
    $lastSeenTimestamp = $stmt->get_result()->fetch_assoc()['timestamp'];
}

$output = "";
if ($newMessages) {
    $output .= "newMessages=$newMessages&";
}
$output .= "lastSeenTimestamp=$lastSeenTimestamp";

echo $output;

$stmt->close();
$updateSeenStmt->close();
$conn->close();
//NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING NOT WORKING