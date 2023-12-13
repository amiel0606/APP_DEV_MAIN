<?php

if (isset($_POST["submit"])) {
    $uName = $_POST["UserName"];
    $pwd = $_POST["password"];

    require_once('functions.php');
    require_once('dbCon.php');

    if (emptyInputLogin($uName,$pwd) !== false) {
        header("location: ../log_in.php?error=EmptyInput");
        exit();
    }

    loginUser($conn, $uName, $pwd);
}