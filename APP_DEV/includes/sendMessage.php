<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include_once 'dbCon.php';

    $ownerUser = $_POST['ownerUser'];
    $message = $_POST['message'];
    $sender = $_SESSION['username'];
    $dogID = $_POST['dogID'];

    echo $ownerUser . " " . $dogID . " " . $message . " " . $sender;
    $stmt = $conn->prepare("INSERT INTO tblmessages (sender, receiver, message, dogID, seen, received, timestamp) VALUES (?, ?, ?, ?, 0, 0, NOW())");
    $stmt->bind_param("ssss", $sender, $ownerUser, $message, $dogID);
    $stmt->execute();
    
    $html = '<div class="sent-message">';
    $html .= '<p><strong>' . htmlspecialchars($sender) . ':</strong> ' . htmlspecialchars($message) . '</p>';
    $html .= '</div>';
    echo $html;
