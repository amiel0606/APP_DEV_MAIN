<?php
if (isset($_POST["submit"])) {
    $Fname = $_POST["Fname"];
    $Lname = $_POST["Lname"];
    $city = $_POST["city"];
    $UserName = $_POST["UserName"];
    $password = $_POST["password"];
    $ConfPassword = $_POST["ConfPassword"];

    require_once 'functions.php';
    require_once 'dbCon.php';

    if (emptyInputSignup($Fname,$Lname,$city,$UserName,$password,$ConfPassword) !== false) {
        header("location: ../index.php?error=EmptyInput");
        exit();
    }
    if (passMatch($password,$ConfPassword) !==false) {
        header("location: ../index.php?error=PassNotMatching");
        exit();
    }
    if (InvalidUser($UserName) !== false) {
        header("location: ../index.php?error=InvalidUsername");
        exit();
    }
    if (userExist($conn,$UserName) !== false) {
        header("location: ../index.php?error=UsernameTaken");
        exit();
    }
    createUser($conn,$UserName,$Lname,$Fname,$city,$password,$ConfPassword);
}
else {
    header("location: ../index.php");
    exit();
}
