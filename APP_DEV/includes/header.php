<?php
    session_start();
    include_once 'dbCon.php';
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/inside.css">
    <link rel="stylesheet" href="./css/adoptPage.css">  
    <link rel="stylesheet" href="./css/messageDesign.css">
    <script src="./js/script.js"></script>
</head>
<body>
    <div class="bg">
            <div class="nav">
                <div class="nav-link">
                    <img class="logo" src="./image/logo.png" />
                    <img class="line" src="./image/line.svg" />
                    
                    <?php
                        if (isset($_SESSION["uID"])) {
                            echo "<a href='#' class='nav-links openbtn' style='display:none;' onclick='openForm( )'>Log in</a>";
                            echo "<a href='index.php#team' class='nav-links' style='display:none;'>About Us</a>";
                            echo "<a href='index.php#homer' class='nav-links' style='display:none;'>Home</a>";

                        }
                        else {
                            echo "<a href='#' class='nav-links openbtn' onclick='openForm( )'>Log in</a>";
                            echo "<a href='index.php#homer' class='nav-links'>About</a>";
                            echo "<a href='index.php#homer' class='nav-links'>Home</a>";
                        }
                    ?>
                </div>
                <div class="txt-logo">Fur-Ever Buddies</div>
            </div>