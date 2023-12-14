<?php
session_start();
include_once 'dbCon.php';

$UserN = $_SESSION['username']; // the current user

// Fetch dogs put up for adoption by the current user
$sqlAdoption = "SELECT a.dogID, a.image, a.name, a.breed, a.age, a.weight, a.description FROM tbldogs a WHERE a.username = ?";
$stmtAdoption = $conn->prepare($sqlAdoption);
$stmtAdoption->bind_param("s", $UserN);
$stmtAdoption->execute();
$resultAdoption = $stmtAdoption->get_result();

$output = "";

if ($resultAdoption->num_rows > 0) {
    while ($rowAdoption = $resultAdoption->fetch_assoc()) {
        // For each dog, count how many unique users have added this dog to their favorites
        $countQuery = "SELECT COUNT(DISTINCT ownerUser) FROM tblfavorites WHERE dogID = ?";
        $stmtCount = $conn->prepare($countQuery);
        $stmtCount->bind_param("i", $rowAdoption['dogID']);
        $stmtCount->execute();
        $stmtCount->bind_result($userCount);
        $stmtCount->fetch();
        $stmtCount->close();

        $output .= $rowAdoption['dogID'] . ',' . $rowAdoption['image'] . ',' . $rowAdoption['name'] . ',' . $rowAdoption['breed'] . ',' . $rowAdoption['age'] . ',' . $rowAdoption['weight'] . ',' . $rowAdoption['description'] . ',' . $userCount . "\n";
    }
} else {
    $output = "No dogs currently up for adoption.";
}

$stmtAdoption->close();

echo trim($output);
?>
