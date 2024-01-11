<?php
// getDogDetails.php

include_once 'dbCon.php';

header('Content-Type: application/json');

if (!isset($_GET['dogID'])) {
    echo json_encode(['error' => 'Missing dogID.']);
    exit();
}

$dogID = intval($_GET['dogID']); 

if ($dogID <= 0) {
    echo json_encode(['error' => 'Invalid dogID.']);
    exit();
}

$sql = "SELECT tbldogs.dogID, tbldogs.image, tbldogs.name, tbldogs.breed, tbldogs.age, tbldogs.weight, tbldogs.description,
                tblusers.img AS user_img, CONCAT(tblusers.fname, ' ', tblusers.lname) AS user_name,
                tblusers.city AS user_location, tblusers.dogsAdopted, tblusers.dogsForAdoption, tblusers.rating
        FROM tbldogs
        INNER JOIN tblusers ON tbldogs.username = tblusers.username
        WHERE tbldogs.dogID = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['error' => 'Database error: ' . $conn->error]);
} else {
    $stmt->bind_param("i", $dogID);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $dogDetails = array(
                'name' => $row['name'],
                'breed' => $row['breed'],
                'age' => $row['age'],
                'weight' => $row['weight'],
                'description' => $row['description'],
                'user_name' => $row['user_name'],
                'user_img' => $row['user_img'],
                'user_location' => $row['user_location'],
                'dogsAdopted' => $row['dogsAdopted'],
                'rating' => $row['rating'],
                'dogsForAdoption' => $row['dogsForAdoption']
            );
            echo json_encode($dogDetails);
        } else {
            echo json_encode(['error' => 'Dog not found.']);
        }
    } else {
        echo json_encode(['error' => 'Database error: ' . $stmt->error]);
    }

    $stmt->close();
}

?>
