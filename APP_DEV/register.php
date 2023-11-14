<?php


$Fname = $_POST["Fname"];
$Lname = $_POST["Lname"];
$city = $_POST["city"];
$UserName = $_POST["UserName"];
$password = $_POST["password"];
$ConfPassword = $_POST["ConfPassword"];

$host = "localhost";
$dbname = "dbusers";
$user = "root";
$pass = "";



$conn = mysqli_connect($host, $user, $pass, $dbname);

if (mysqli_connect_errno()) {
    die("Connection Error: " . mysqli_connect_errno());
}



$sql = "INSERT INTO tblusers (username, password, confirmpass, city, fname, lname)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

if (empty($password)||empty($ConfPassword)) {
    $error_info =  "Password is required";
} else if ($password != $ConfPassword) {
    $error_info =  "Password does not match";
} else {
    $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
    $hashedPwd1 = password_hash($ConfPassword, PASSWORD_BCRYPT);
}
mysqli_stmt_bind_param($stmt, "ssssss", $UserName, $hashedPwd, $hashedPwd1, $city, $Fname, $Lname);
mysqli_stmt_execute($stmt);
echo "Successful";

