<?php
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