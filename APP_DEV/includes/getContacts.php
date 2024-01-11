<?php

    session_start();
    include_once('dbCon.php');
    $loggedInUser = $_SESSION['username'];

    // Query for contacts for interested user awdawdawdawd
    $query1 = "SELECT m.uploader, d.name, d.dogID FROM tblmatch m INNER JOIN tbldogs d ON m.dogID = d.dogID WHERE m.interestedUser = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("s", $loggedInUser);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    while ($row = $result1->fetch_assoc()) {
        echo '<div class="ownerUser" data-owneruser="' . $row['uploader'] . '" data-dogid="' . $row['dogID'] . '" onclick="handleClick(this)">' . $row['uploader'] . ' - ' . $row['name'] . '</div>';
    }

    // Query for contacts for uploader ahaawadad
    $query2 = "SELECT n.sender, d.name, d.dogID FROM tblnotifications n INNER JOIN tbldogs d ON n.dogID = d.dogID WHERE n.type = 'Success' AND n.receiver = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("s", $loggedInUser);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    while ($row = $result2->fetch_assoc()) {
        echo '<div class="ownerUser" data-owneruser="' . $row['sender'] . '" data-dogid="' . $row['dogID'] . '" onclick="handleClick(this)">' . $row['sender'] . ' - ' . $row['name'] . '</div>';
    }