<?php
    include_once 'dbCon.php';

    if (isset($_POST['interestedUsername']) && isset($_POST['uploaderUsername']) && isset($_POST['timestamp'])) {
        $interestedUsername = $_POST['interestedUsername'];
        $uploaderUsername = $_POST['uploaderUsername'];
        $timestamp = $_POST['timestamp'];

        // Insert into tblmatch
        $query = "INSERT INTO tblmatch (interestedUsername, uploaderUsername, timestamp) VALUES ('$interestedUsername', '$uploaderUsername', '$timestamp')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Return success response if the query is successful
            echo json_encode(['status' => 'Success']);
        } else {
            // Return error response if the query fails
            echo json_encode(['status' => 'Error']);
        }
    } else {
        // Return error response if the required parameters are not set
        echo json_encode(['status' => 'Error']);
    }
?>
