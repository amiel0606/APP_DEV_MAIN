<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
include 'dbCon.php';

$ownerUser = $_GET['user'];
$loggedInUser = $_SESSION['username'];
$dogID = $_GET['dogID'];

$stmt = $conn->prepare("SELECT * FROM tblmessages WHERE (sender = ? AND receiver = ? AND dogID = ?) OR (sender = ? AND receiver = ? AND dogID = ?) ORDER BY timestamp ASC");
$stmt->bind_param("ssssss", $loggedInUser, $ownerUser, $dogID, $ownerUser, $loggedInUser, $dogID);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $class = $row['sender'] === $loggedInUser ? 'sent' : 'received';
    echo '<div class="messages ' . $class . '">';
    echo '<p><strong>' . htmlspecialchars($row['sender']) . ':</strong> ' . htmlspecialchars($row['message']) . '</p>';
    echo '</div>';
}