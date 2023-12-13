<?php
session_start();
include_once 'dbCon.php';

$UserN = $_SESSION['username'];
$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : array();
$favorites_str = implode(',', $favorites);

$sqlFavorites = "SELECT * FROM tblfavorites WHERE ownerUser = ? ORDER BY RAND() LIMIT 1";
$stmtFavorites = $conn->prepare($sqlFavorites);
$stmtFavorites->bind_param("s", $UserN);
$stmtFavorites->execute();
$resultFavorites = $stmtFavorites->get_result();

if ($rowFavorites = $resultFavorites->fetch_assoc()) {
    $response = '<img src="./uploads/' . $rowFavorites['dogImage'] . '" data-dogid="' . $rowFavorites['dogID'] . '">';
    $response .= '<div class="dog-card__content">';
    $response .= '<p class="dog-card__title">Name: ' . $rowFavorites['dogName'] . '</p><br>';
    $response .= '<p class="dog-card__description">Breed: ' . $rowFavorites['dogBreed'] . '</p><br>';
    $response .= '<p class="dog-card__description">Age: ' . $rowFavorites['dogAge'] . '</p><br>';
    $response .= '<p class="dog-card__description">Weight: ' . $rowFavorites['dogWeight'] . ' kg</p><br>';
    $response .= '<p class="dog-card__description">Other Description: ' . $rowFavorites['dogDescription'] . '</p>';
    $response .= '</div>';

    echo $response;
} else {
   
    $sqlDogs = "SELECT * FROM tbldogs WHERE username != ? AND dogID NOT IN ($favorites_str) ORDER BY RAND() LIMIT 1";
    $stmtDogs = $conn->prepare($sqlDogs);
    $stmtDogs->bind_param("s", $UserN);
    $stmtDogs->execute();
    $resultDogs = $stmtDogs->get_result();

    if ($rowDogs = $resultDogs->fetch_assoc()) {
        $response = '<img src="./uploads/' . $rowDogs['image'] . '" data-dogid="' . $rowDogs['dogID'] . '">';
        $response .= '<div class="dog-card__content">';
        $response .= '<p class="dog-card__title">Name: ' . $rowDogs['name'] . '</p><br>';
        $response .= '<p class="dog-card__description">Breed: ' . $rowDogs['breed'] . '</p><br>';
        $response .= '<p class="dog-card__description">Age: ' . $rowDogs['age'] . '</p><br>';
        $response .= '<p class="dog-card__description">Weight: ' . $rowDogs['weight'] . ' kg</p><br>';
        $response .= '<p class="dog-card__description">Other Description: ' . $rowDogs['description'] . '</p>';
        $response .= '</div>';

        echo $response;
    } else {
        echo "No more dogs available.";
    }

    $stmtDogs->close();
}

$stmtFavorites->close();
?>
