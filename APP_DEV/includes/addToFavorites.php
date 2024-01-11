<?php
session_start();
include_once 'dbCon.php';

if (isset($_POST['addToFavorite'])) {
    $UserN = $_SESSION['username'];
    $dogID = $_POST['dogID'];

    $checkQuery = "SELECT COUNT(*) FROM tblfavorites WHERE ownerUser = ? AND dogID = ?";
    $stmtCheck = $conn->prepare($checkQuery);
    $stmtCheck->bind_param("si", $UserN, $dogID);
    $stmtCheck->execute();
    $stmtCheck->bind_result($count);
    $stmtCheck->fetch();
    $stmtCheck->close();

    if ($count === 0) {
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
                $dog['username']
            );

            if ($stmtInsert->execute()) {
                echo "DogAdded";
                $_SESSION['favorites'][] = $dog['dogID'];
            } else {
                echo "ErrorAddingDog";
            }

            $stmtInsert->close();
        } else {
            echo "NoDogFound";
        }
    } else {
        echo "DogAlreadyInFavorites";
    }
} else {
    echo "InvalidRequest";
}