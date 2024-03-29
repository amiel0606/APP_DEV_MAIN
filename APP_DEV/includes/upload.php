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
                $newFileName = uniqid('', true) . '.' . $fileActualExtension;
                $fileDestination = '../uploads/' . $newFileName;

                // Move the uploaded file to the destination
                move_uploaded_file($fileTmpName, $fileDestination);

                // Prepare the SQL statement for inserting a new dog
                $sql = "INSERT INTO tbldogs(username, name, breed, age, description, weight, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo '<script>alert("SQL Error");</script>';
                    header("location: ../adopt.php?error=stmtFailed");
                    exit();
                }

                // Retrieve user information from the session
                $dogName = $_POST['dogName'];
                $dogBreed = $_POST['breed'];
                $dogAge = $_POST['age'];
                $dogDescription = $_POST['description'];
                $dogWeight = $_POST['weight'];
                $userN = $_SESSION['username'];

                // Bind parameters and execute the statement
                mysqli_stmt_bind_param($stmt, "sssssss", $userN, $dogName, $dogBreed, $dogAge, $dogDescription, $dogWeight, $newFileName);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                // Update dogsForAdoption in tblusers
                $updateUserSql = "UPDATE tblusers SET dogsForAdoption = dogsForAdoption + 1 WHERE username = ?";
                $stmtUpdateUser = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($stmtUpdateUser, $updateUserSql)) {
                    mysqli_stmt_bind_param($stmtUpdateUser, "s", $userN);
                    mysqli_stmt_execute($stmtUpdateUser);
                    mysqli_stmt_close($stmtUpdateUser);
                }

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