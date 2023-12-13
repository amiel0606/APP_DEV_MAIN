<?php
session_start();
include_once 'dbCon.php';

$UserN = $_SESSION['username'];

$sql = "SELECT * FROM tbldogs 
        WHERE username != ? 
        AND dogID NOT IN (SELECT dogID FROM tblrejecteddogs WHERE username = ?)
        ORDER BY RAND() LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $UserN, $UserN);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $response = '<img src="./uploads/' . $row['image'] . '" data-dogid="' . $row['dogID'] . '">';
    $response .= '<div class="dog-card__content">';
    $response .= '<p class="dog-card__title">Name: ' . $row['name'] . '</p><br>';
    $response .= '<p class="dog-card__description">Breed: ' . $row['breed'] . '</p><br>';
    $response .= '<p class="dog-card__description">Age: ' . $row['age'] . '</p><br>';
    $response .= '<p class="dog-card__description">Weight: ' . $row['weight'] . ' kg</p><br>';
    $response .= '<p class="dog-card__description">Other Description: ' . $row['description'] . '</p>';
    $response .= '</div>';

    echo $response;
} else {
    $response = '<img src="./image/defaultDoggo.png" alt="Default Dog Image">';
    $response .= '<div class="dog-card__content">';
    $response .= '<p class="dog-card__title">No Dog Available</p>';
    $response .= '<p class="dog-card__description">Check back later for more dogs!</p>';
    $response .= '</div>';
    echo $response;
}

$stmt->close();
?>
