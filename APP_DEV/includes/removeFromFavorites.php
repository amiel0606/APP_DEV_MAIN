<?php
session_start();

if (isset($_POST['removeFromFavorites']) && isset($_POST['dogID'])) {
    require_once 'dbCon.php'; // Include your database connection file

    $username = $_SESSION['username'];
    $dogID = $_POST['dogID'];

    // Remove the dog from tblfavorites
    $query = "DELETE FROM tblfavorites WHERE ownerUser = ? AND dogID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('si', $username, $dogID);

    if ($stmt->execute()) {
        echo 'Dog Removed from Favorites';
    } else {
        echo 'Error removing dog from favorites: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request';
}
?>
