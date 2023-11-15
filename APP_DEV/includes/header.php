<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fur-Ever Buddies</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/welcome.css">
    <link rel = "icon" type = "image/png" href = "./image/logo.png">
    <script src="./js/script.js"></script>

    <?php
    $error_info = null;
        if ($error_info != null) {
            ?> <style>.error_info{display:block} </style> <?php
        }
?>
</head>
<body>
    <div class="bg">
            <div class="nav">
                <div class="nav-link">
                    <img class="logo" src="./image/logo.png" />
                    <img class="line" src="./image/line.svg" />
                    <a href="#" class="nav-links openbtn" onclick="openForm( )">Sign Up</a>
                    <a href="#team" class="nav-links">About Us</a>
                    <a href="#homer" class="nav-links">Home</a>
                </div>
                <div class="txt-logo">Fur-Ever Buddies</div>
            </div>