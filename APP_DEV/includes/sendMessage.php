<?php
session_start();
include_once 'dbCon.php';

$ownerUser = $_POST['ownerUser'];
$message = $_POST['message'];

$sender = $_SESSION['username'];
$receiver = $ownerUser;

$stmt = $conn->prepare("INSERT INTO tblmessages (sender, receiver, message, seen, received, timestamp) VALUES (?, ?, ?, 0, 0, NOW())");
$stmt->bind_param("sss", $sender, $receiver, $message);
$stmt->execute();