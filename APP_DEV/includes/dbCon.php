<?php
$host = "localhost";
$dbname = "dbusers";
$user = "root";
$pass = "";
$conn = mysqli_connect($host, $user, $pass, $dbname);

if (mysqli_connect_errno()) {
    die("Connection Error: " . mysqli_connect_errno());
}