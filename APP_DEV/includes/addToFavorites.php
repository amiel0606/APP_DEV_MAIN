<?php
session_start();
include_once 'dbCon.php';
if (isset($_POST['addToFavorite'])) {
    $UserN = $_SESSION['username'];
    $dogID = $_POST['dogID'];

    $dogQuery = "SELECT * FROM tbldogs WHERE dogID = '$dogID'";
    $dogResult = mysqli_query($conn, $dogQuery);
    if (mysqli_num_rows($dogResult) > 0) {
        $dog = mysqli_fetch_assoc($dogResult);
        $sql_insert = "INSERT INTO tblfavorites (ownerUser, dogID, dogName, dogImage, dogBreed, dogAge, dogDescription, dogWeight, uploader) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtInsert = $conn->prepare($sql_insert);
        $stmtInsert->bind_param(
        "sisssssss",
        $UserN,
        $dog['dogID'],
        $dog['name'],
        $dog['image'],
        $dog['breed'],
        $dog['age'],
        $dog['description'],
        $dog['weight'],
        $dog['username']);
        if ($stmtInsert->execute()) {
            echo "Dog added to favorites successfully!";

            $_SESSION['favorites'][] = $dog['dogID'];
        } else {
            echo "ERROR: Could not able to execute $sql_insert. " . $stmtInsert->error;
        }
    } else {
        echo "No dog found in tbldogs.";
    }
    $stmtInsert->close();

} else {
    echo "";
}