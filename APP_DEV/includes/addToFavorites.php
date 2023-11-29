<?php
include_once 'dbCon.php';
session_start();

if (isset($_POST['addToFavorite'])) {
    $UserN = $_SESSION['username'];

    // Get the last added dog to tbldogs
    $lastDogQuery = "SELECT * FROM tbldogs WHERE username = '$UserN' ORDER BY dogID DESC LIMIT 1";
    $lastDogResult = mysqli_query($conn, $lastDogQuery);

    if (mysqli_num_rows($lastDogResult) > 0) {
        $lastDog = mysqli_fetch_assoc($lastDogResult);

        // Insert the last added dog into tblfavorites
        $sql_insert = "INSERT INTO tblfavorites (ownerUser, dogID, dogName, dogImage, dogBreed, dogAge, dogDescription, dogWeight) 
                       VALUES ('$UserN', ".$lastDog['dogID'].", '".$lastDog['name']."', '".$lastDog['image']."', '".$lastDog['breed']."', '".$lastDog['age']."', '".$lastDog['description']."', '".$lastDog['weight']."')";
        if(mysqli_query($conn, $sql_insert)){
            echo "Dog added to favorites successfully!";
        } else {
            echo "ERROR: Could not able to execute $sql_insert. " . mysqli_error($conn);
        }
    } else {
        echo "No dog found in tbldogs.";
    }
}
?>
