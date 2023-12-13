<?php
session_start();
include_once 'dbCon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $UserN = $_SESSION['username'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $city = $_POST['city'];

    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img = $_FILES['img'];

        $ext = pathinfo($img['name'], PATHINFO_EXTENSION);
        $new_filename = uniqid() . '.' . $ext;

        $target_dir = "../uploads/";
        $target_file = $target_dir . $new_filename;
        if (move_uploaded_file($img["tmp_name"], $target_file)) {
            echo "The file ". $new_filename . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $sql = "UPDATE tblusers SET lname = ?, fname = ?, city = ?, img = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $lname, $fname, $city, $new_filename, $UserN);
    } else {
        $sql = "UPDATE tblusers SET lname = ?, fname = ?, city = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $lname, $fname, $city, $UserN);
    }

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "User data updated successfully!";
    } else {
        echo "No changes were made.";
    }

    $stmt->close();
}