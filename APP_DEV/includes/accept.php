<?php
<<<<<<< HEAD
    include_once 'dbCon.php';
    session_start();
    $UserN = $_SESSION['username'];

    $sql = "SELECT image FROM tbldogs WHERE username != '$UserN' ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?><img src="./uploads/<?php echo $row['image']?>"><?php
        }
    } else {
        echo "0 results";
    }



    // if (!isset($_SESSION['dogID'])) {
    //     $dogID = $_SESSION['current_image_id'] = 0;
    // }

    // $sql = "SELECT image FROM tbldogs WHERE username != '$UserN' AND dogID > '$dogID' ORDER BY dogID ASC LIMIT 1";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         $dogID = $row["dogID"];
    //         echo $row["image"];
    //     }
    // } else {
    //     $dogID = $_SESSION['current_image_id'] = 0;
    //     echo "No more images";
    // }
    // $conn->close();
=======
include_once 'dbCon.php';
session_start();

if (isset($_POST['addToFavorite'])) {
    $UserN = $_SESSION['username'];

    // Select a random dog that is not in tblfavorites and not added by the current user
    $sql = "SELECT * FROM tbldogs 
            WHERE username != ? 
            AND dogID NOT IN (SELECT dogID FROM tblfavorites) 
            ORDER BY RAND() LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $UserN);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Insert the selected dog into tblfavorites
        $sql_insert = "INSERT INTO tblfavorites (ownerUser, dogID, dogName, dogImage, dogBreed, dogAge, dogDescription, dogWeight) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmtInsert = $conn->prepare($sql_insert);
        $stmtInsert->bind_param(
            "sissssss",
            $UserN,
            $row['dogID'],
            $row['name'],
            $row['image'],
            $row['breed'],
            $row['age'],
            $row['description'],
            $row['weight']
        );

        if ($stmtInsert->execute()) {
            echo "Dog added to favorites successfully!";
        } else {
            echo "ERROR: Could not able to execute $sql_insert. " . $stmtInsert->error;
        }

        $stmtInsert->close();
    } else {
        // No more eligible dogs found
        echo "";
    }

    $stmt->close();
}
?>
>>>>>>> a811da731042fcb0869f8ed30dc7c1274b7c9ed3
