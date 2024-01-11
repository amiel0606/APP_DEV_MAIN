<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once 'dbCon.php';

if (isset($_POST["getNotifications"])) {
    if (!isset($_SESSION["username"])) {
        echo json_encode(["status" => "UserNotLoggedIn"]);
        exit();
    }
    $receiver = $_SESSION["username"];
    $fetchQuery = "SELECT n.*, u.fname AS sender_fname, u.lname AS sender_lname, u.img AS sender_img, u.city AS sender_city, d.name AS dog_name,
                           u.dogsAdopted AS sender_dogsAdopted, u.dogsForAdoption AS sender_dogsForAdoption, u.Rating AS sender_rating
                    FROM tblnotifications n
                    INNER JOIN tblusers u ON n.sender = u.username
                    INNER JOIN tbldogs d ON n.dogID = d.dogID
                    WHERE n.receiver = ? AND n.type = 'Match Request' ORDER BY n.timestamp DESC";
    $stmtFetch = $conn->prepare($fetchQuery);
    $stmtFetch->bind_param("s", $receiver);
    $stmtFetch->execute();
    $result = $stmtFetch->get_result();
    $notifications = [];
    while ($row = $result->fetch_assoc()) {
        $notificationItem = [
            "sender" => $row['sender'],
            "receiver" => $row['receiver'],
            "sender_img" => "./uploads/{$row['sender_img']}",
            "sender_fname" => $row['sender_fname'],
            "sender_lname" => $row['sender_lname'],
            "sender_city" => $row['sender_city'], // Added city information
            "sender_dogsAdopted" => $row['sender_dogsAdopted'],
            "sender_dogsForAdoption" => $row['sender_dogsForAdoption'],
            "sender_rating" => $row['sender_rating'],
            "content" => "{$row['sender_fname']} {$row['sender_lname']} from {$row['sender_city']} is requesting a match with your dog {$row['dog_name']}!",
            "timestamp" => $row['timestamp']
        ];
        $notifications[] = $notificationItem;
    }
    echo json_encode(["status" => "Success", "notifications" => $notifications]);
    $stmtFetch->close();
    $conn->close();
}
?>
