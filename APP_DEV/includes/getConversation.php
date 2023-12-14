<?php
    session_start();
    include 'dbCon.php';
    $ownerUser = $_GET['user'];
    $loggedInUser = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT * FROM tblmessages WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?) ORDER BY timestamp");
    $stmt->bind_param("ssss", $loggedInUser, $ownerUser, $ownerUser, $loggedInUser);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $class = $row['sender'] === $loggedInUser ? 'sent' : 'received';
        echo '<div class="messages ' . $class . '">';
        echo '<p><strong>' . htmlspecialchars($row['sender']) . ':</strong> ' . htmlspecialchars($row['message']) . '</p>';
        echo '</div>';
    }