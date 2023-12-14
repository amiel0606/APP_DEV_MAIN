<?php
session_start();
include_once 'dbCon.php';

if (isset($_POST['addDog'])) {
    $file = $_FILES['dogImage'];
    $fileName = $_FILES['dogImage']['name'];
    $fileTmpName = $_FILES['dogImage']['tmp_name'];
    $fileSize = $_FILES['dogImage']['size'];
    $fileError = $_FILES['dogImage']['error'];
    $fileType = $_FILES['dogImage']['type'];
    $fileExtension = explode('.', $fileName);
    $fileActualExtension = strtolower(end($fileExtension));
    $allowed = array('jpeg', 'jpg', 'png');

    if (in_array($fileActualExtension, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $newFileName = uniqid('', true).'.'.$fileActualExtension;
                $fileDestination = '../uploads/'.$newFileName;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sqlInsertDog = "INSERT INTO tbldogs(username, name, breed, age, description, weight, image) VALUES(?, ?, ?, ?, ?, ?, ?)";
                $stmtInsertDog = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmtInsertDog, $sqlInsertDog)) {
                    echo '<script>alert("SQL Error");</script>';
                    header("location: ../adopt.php?error=stmtFailed");
                    exit();
                }

                $dogName = $_POST['dogName'];
                $dogBreed = $_POST['breed'];
                $dogAge = $_POST['age'];
                $dogDescription = $_POST['description'];
                $dogWeight = $_POST['weight'];
                $userN = $_SESSION['username'];

                mysqli_stmt_bind_param($stmtInsertDog, "sssssss", $userN, $dogName, $dogBreed, $dogAge, $dogDescription, $dogWeight, $newFileName);
                mysqli_stmt_execute($stmtInsertDog);
                mysqli_stmt_close($stmtInsertDog);

                // Increment dogsForAdoption count in tblusers
                $sqlUpdateDogsForAdoption = "UPDATE tblusers SET dogsForAdoption = dogsForAdoption + 1 WHERE username = ?";
                $stmtUpdateDogsForAdoption = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmtUpdateDogsForAdoption, $sqlUpdateDogsForAdoption)) {
                    echo '<script>alert("SQL Error");</script>';
                    header("location: ../adopt.php?error=stmtFailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmtUpdateDogsForAdoption, "s", $userN);
                mysqli_stmt_execute($stmtUpdateDogsForAdoption);
                mysqli_stmt_close($stmtUpdateDogsForAdoption);

                echo '<script>alert("Dog added successfully");</script>';
                header("location: ../adopt.php?SuccessfullyAdded");
            } else {
                echo '<script>alert("File is too big");</script>';
                header("location: ../adopt.php?error=FileTooBig");
                exit();
            }
        } else {
            echo '<script>alert("Error uploading file");</script>';
            header("location: ../adopt.php?error=ErrorUploading");
            exit();
        }
    } else {
        echo '<script>alert("Cannot upload this type of file");</script>';
        header("location: ../adopt.php?error=WrongFileType");
        exit();
    }
}
?>
