<?php
session_start();

if (!isset($_SESSION['dogID'])) {
    $dogID = $_SESSION['dogID'] = 0;
    echo $dogID;
}
echo $_SESSION["username"];
if (isset($_SESSION["uID"])) {
    echo $_SESSION["uID"];
}