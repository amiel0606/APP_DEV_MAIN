<?php
include_once 'dbCon.php';

session_start();
$user = $_SESSION['username'];

$sql = "SELECT tbldogs.dogID, tbldogs.image, tbldogs.name, tbldogs.breed, tbldogs.age, tbldogs.weight, tbldogs.description,
                tblusers.img AS user_img, CONCAT(tblusers.fname, ' ', tblusers.lname) AS user_name,
                tblusers.city AS user_location, tblusers.dogsAdopted, tblusers.dogsForAdoption, tblusers.rating
        FROM tbldogs
        INNER JOIN tblusers ON tbldogs.username = tblusers.username
        WHERE tbldogs.username != ? 
        AND tbldogs.dogID NOT IN (SELECT dogID FROM tblrejecteddogs WHERE username = ?)
        AND tbldogs.dogID NOT IN (SELECT dogID FROM tbldogs WHERE username = ?) 
        ORDER BY RAND() LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $user, $user, $user);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Dog available
    $response = '<img src="./uploads/' . $row['image'] . '" data-dogid="' . $row['dogID'] . '">';
    $response .= '<div class="dog-card__content">';
    // Display dog information
    $response .= '<p class="dog-card__title">Dog Name: ' . $row['name'] . '</p><br>';
    
    // Two-column layout for Breed and Weight
    $response .= '<div class="dog-info-columns">';
    $response .= '<p class="dog-card__description">Breed: ' . $row['breed'] . '</p>';
    $response .= '<p class="dog-card__description">Weight: ' . $row['weight'] . ' kg</p>';
    $response .= '</div>';
    
    // Display Age and Other Description
    $response .= '<div class="dog-info-columns">';
    $response .= '<p class="dog-card__description">Age: ' . $row['age'] . '</p>';
    $response .= '<p class="dog-card__description">Other Description: ' . $row['description'] . '</p>';
    $response .= '</div>';
    
    // Display uploader's information
    $response .= '<div class="uploader-info">';
    $response .= '<p class="uploader-name">Owner Name: ' . $row['user_name'] . '</p>';
    $response .= '<img class="uploader-profile-picture" src="./uploads/' . $row['user_img'] . '" alt="Uploader Profile Picture">';
    $response .= '<div class="uploader-details">';
    $response .= '<div class="uploader-row">';
    $response .= '<p class="uploader-location">Location: ' . $row['user_location'] . '</p>';
    $response .= '<p class="uploader-dogs-adopted">Dogs Adopted: ' . $row['dogsAdopted'] . '</p>';
    $response .= '</div>';
    $response .= '<div class="uploader-row">';
    $response .= '<p class="uploader-rating">Rating: ' . $row['rating'] . ' stars</p>';
    $response .= '<p class="uploader-dogs-for-adoption">Dogs For Adoption: ' . $row['dogsForAdoption'] . '</p>';
    $response .= '</div>';
    $response .= '</div>';
    $response .= '</div>';

    $response .= '</div>';

    echo $response;
} else {
    // No more dogs available, return default dog card
    $response = '<img src="./image/defaultDoggo.png" alt="Default Dog Image">';
    $response .= '<div class="dog-card__content">';
    $response .= '<p class="dog-card__title">No Dog Available</p>';
    $response .= '<p class="dog-card__description">Check back later for more dogs!</p>';
    $response .= '</div>';

    echo $response;
}
$stmt->close();
?>