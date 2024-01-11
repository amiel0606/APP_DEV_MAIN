<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
include 'dbCon.php';

$dogID = $_GET['dogID'];

// Prepare a new statement to get the dog's details
$stmtDog = $conn->prepare("SELECT name, breed, age, description, weight, image FROM tbldogs WHERE dogID = ?");
$stmtDog->bind_param("s", $dogID);
$stmtDog->execute();
$resultDog = $stmtDog->get_result();

// Fetch the dog's details
if ($rowDog = $resultDog->fetch_assoc()) {
    echo '<div class="details">';
    echo '<p>Name: ' . htmlspecialchars($rowDog['name']) . '</p>';
    echo '<p>Breed: ' . htmlspecialchars($rowDog['breed']) . '</p>';
    echo '<p>Age: ' . htmlspecialchars($rowDog['age']) . '</p>';
    echo '<p>Description: ' . htmlspecialchars($rowDog['description']) . '</p>';
    echo '<p>Weight: ' . htmlspecialchars($rowDog['weight']) . '</p>';
    echo '<img src="./uploads/' . htmlspecialchars( $rowDog['image'] ) . '" />';
    echo '</div>';
    echo '<button id="off" style="position: absolute; top: 0; right: 0; cursor: pointer;">X</button>';
}