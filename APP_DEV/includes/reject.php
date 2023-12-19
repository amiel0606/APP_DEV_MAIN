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
            $sql = "SELECT tbldogs.dogID, tbldogs.image, tbldogs.name, tbldogs.breed, tbldogs.age, tbldogs.weight, tbldogs.description,
                    tblusers.img AS user_img, CONCAT(tblusers.fname, ' ', tblusers.lname) AS user_name,
                    tblusers.city AS user_location, tblusers.dogsAdopted, tblusers.dogsForAdoption, tblusers.rating
                    FROM tbldogs
                    INNER JOIN tblusers ON tbldogs.username = tblusers.username
                    WHERE tbldogs.username != ? 
                    AND tbldogs.dogID NOT IN (SELECT dogID FROM tblrejecteddogs WHERE username = ?)
                    AND tbldogs.dogID NOT IN (SELECT dogID FROM tbldogs WHERE username = ?)
                    ORDER BY RAND() LIMIT 1";
                    
            $stmtNextDog = $conn->prepare($sql);
            $stmtNextDog->bind_param("sss", $user, $user, $user);
            $stmtNextDog->execute();
            $resultNextDog = $stmtNextDog->get_result();

            if ($rowNextDog = $resultNextDog->fetch_assoc()) {
                $response = '<img src="./uploads/' . $rowNextDog['image'] . '" data-dogid="' . $rowNextDog['dogID'] . '">';
                $response .= '<div class="dog-card__content">';
                $response .= '<p class="dog-card__title">Dog Name: ' . $rowNextDog['name'] . '</p><br>';
                
                // Two-column layout for Breed and Weight
                $response .= '<div class="dog-info-columns">';
                $response .= '<p class="dog-card__description">Breed: ' . $rowNextDog['breed'] . '</p>';
                $response .= '<p class="dog-card__description">Weight: ' . $rowNextDog['weight'] . ' kg</p>';
                $response .= '</div>';
                
                // Display Age and Other Description
                $response .= '<div class="dog-info-columns">';
                $response .= '<p class="dog-card__description">Age: ' . $rowNextDog['age'] . '</p>';
                $response .= '<p class="dog-card__description">Other Description: ' . $rowNextDog['description'] . '</p>';
                $response .= '</div>';
                
                // Display uploader's information
                $response .= '<div class="uploader-info">';
                $response .= '<p class="uploader-name">Owner Name: ' . $rowNextDog['user_name'] . '</p>';
                $response .= '<img class="uploader-profile-picture" src="./uploads/' . $rowNextDog['user_img'] . '" alt="Uploader Profile Picture">';
                $response .= '<div class="uploader-details">';
                $response .= '<div class="uploader-row">';
                $response .= '<p class="uploader-location">Location: ' . $rowNextDog['user_location'] . '</p>';
                $response .= '<p class="uploader-dogs-adopted">Dogs Adopted: ' . $rowNextDog['dogsAdopted'] . '</p>';
                $response .= '</div>';
                $response .= '<div class="uploader-row">';
                $response .= '<p class="uploader-rating">Rating: ' . $rowNextDog['rating'] . ' stars</p>';
                $response .= '<p class="uploader-dogs-for-adoption">Dogs For Adoption: ' . $rowNextDog['dogsForAdoption'] . '</p>';
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

            $stmtNextDog->close();
        } else {
            // Invalid combination, handle accordingly
            http_response_code(400); // Set HTTP response status code to 400 (Bad Request)
            echo "Invalid combination of username and dogID. Please try again.";
        }
    } else {
        // Handle invalid data
        header("location: ../adopt.php?error=InvalidData");
        exit();
    }
}
?>
