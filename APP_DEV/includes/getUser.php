<?php
session_start();
include_once 'dbCon.php';

$UserN = $_SESSION['username'];

$sql = "SELECT fname, lname, city, img FROM tblusers WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $UserN);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo $row['fname'] . ',' . $row['lname'] . ',' . $row['city'] . ',' . $row['img'];
} else {
    echo 'No user found.';
}

$stmt->close();