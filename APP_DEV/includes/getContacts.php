<?php
    session_start();
    include_once('dbCon.php');
    $loggedInUser = $_SESSION['username'];

    $query = "
    (SELECT uploader AS user, MAX(m.timestamp) AS max_timestamp 
    FROM tblfavorites f 
    LEFT JOIN tblmessages m ON (m.sender = f.ownerUser AND m.receiver = f.uploader) OR (m.sender = f.uploader AND m.receiver = f.ownerUser) 
    WHERE f.ownerUser = ? 
    GROUP BY f.uploader)
    UNION
    (SELECT ownerUser AS user, MAX(m.timestamp) AS max_timestamp 
    FROM tblfavorites f 
    LEFT JOIN tblmessages m ON (m.sender = f.ownerUser AND m.receiver = f.uploader) OR (m.sender = f.uploader AND m.receiver = f.ownerUser) 
    WHERE f.uploader = ? 
    GROUP BY f.ownerUser)
    ORDER BY max_timestamp DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $loggedInUser, $loggedInUser);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<div class="ownerUser" data-owneruser="' . $row['user'] . '" onclick="handleClick(this)">' . $row['user'] . '</div>';
    }