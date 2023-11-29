<?php
include_once 'dbCon.php';
session_start();

if (isset($_POST['rejectDog'])) {
    $dogID = $_POST['dogID'];
    $user = $_SESSION['username'];

    // Check if the dog ID and user are valid
    if (!empty($dogID) && !empty($user)) {
        // Check if the combination of username and dogID exists
        $checkQuery = "SELECT COUNT(*) FROM tblrejecteddogs WHERE username = ? AND dogID = ?";
        $stmtCheck = $conn->prepare($checkQuery);
        $stmtCheck->bind_param("si", $user, $dogID);
        $stmtCheck->execute();
        $stmtCheck->bind_result($count);
        $stmtCheck->fetch();
        $stmtCheck->close();

        if ($count === 0) {
            // Valid combination, proceed with the insert into tblrejecteddogs
            $stmtInsert = $conn->prepare("INSERT INTO tblrejecteddogs (username, dogID) VALUES (?, ?)");
            $stmtInsert->bind_param("si", $user, $dogID);
            $stmtInsert->execute();
            $stmtInsert->close();

            // Fetch the next available dog
            $sql = "SELECT dogID, image, name, breed, age, weight, description FROM tbldogs WHERE dogID NOT IN (SELECT dogID FROM tblrejecteddogs WHERE username = ?) ORDER BY RAND() LIMIT 1";
            $stmtNextDog = $conn->prepare($sql);
            $stmtNextDog->bind_param("s", $user);
            $stmtNextDog->execute();
            $resultNextDog = $stmtNextDog->get_result();

            if ($rowNextDog = $resultNextDog->fetch_assoc()) {
                $response = '<img src="./uploads/' . $rowNextDog['image'] . '" data-dogid="' . $rowNextDog['dogID'] . '">';
                $response .= '<div class="dog-card__content">';
                $response .= '<p class="dog-card__title">Name: ' . $rowNextDog['name'] . '</p><br>';
                $response .= '<p class="dog-card__description">Breed: ' . $rowNextDog['breed'] . '</p><br>';
                $response .= '<p class="dog-card__description">Age: ' . $rowNextDog['age'] . ' months</p><br>';
                $response .= '<p class="dog-card__description">Weight: ' . $rowNextDog['weight'] . 'kg</p><br>';
                $response .= '<p class="dog-card__description">Other Description: ' . $rowNextDog['description'] . '</p>';
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

            $stmtNextDog->close();
        } else {
            // Invalid combination, handle accordingly
            echo "Invalid combination of username and dogID.";
        }
    } else {
        // Handle invalid data
        header("location: ../adopt.php?error=InvalidData");
        exit();
    }
}
?>
