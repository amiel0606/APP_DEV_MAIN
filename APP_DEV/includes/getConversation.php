<?php

    include 'dbCon.php';


    $ownerUser = $_GET['user'];

    $stmt = $conn->prepare("SELECT * FROM tblmessages WHERE sender = ? OR receiver = ? ORDER BY timestamp");
    $stmt->bind_param("ss", $ownerUser, $ownerUser);
    $stmt->execute();


    $result = $stmt->get_result();


    while ($row = $result->fetch_assoc()) {
        echo '<div class="message">';
        echo '<p><strong>' . htmlspecialchars($row['sender']) . ':</strong> ' . htmlspecialchars($row['message']) . '</p>';
        echo '</div>';
    }
