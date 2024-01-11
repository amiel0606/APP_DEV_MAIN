<?php
include_once 'dbCon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the AJAX request
    $ratedUser = $_POST['ratedUser'];
    $rating = $_POST['rating'];

    // Fetch the current Rating and NumRatings from the tblusers table
    $selectSql = "SELECT Rating, NumRatings FROM tblusers WHERE username = ?";
    $selectStmt = $conn->prepare($selectSql);
    $selectStmt->bind_param("s", $ratedUser);
    $selectStmt->execute();
    $selectStmt->bind_result($currentRating, $numRatings);
    
    if ($selectStmt->fetch()) {
        $selectStmt->close();  // Close the first statement

        // Update the tblusers table
        $newRating = (($currentRating * $numRatings) + $rating) / ($numRatings + 1);
        $updateSql = "UPDATE tblusers SET Rating = ?, NumRatings = NumRatings + 1 WHERE username = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ss", $newRating, $ratedUser);

        if ($updateStmt->execute()) {
            echo "Rating updated successfully!";
        } else {
            echo "Error updating rating: " . $updateStmt->error;
        }

        $updateStmt->close();
    } else {
        echo "User not found!";
    }

    $conn->close();
} else {
    echo "Invalid request!";
}
?>
