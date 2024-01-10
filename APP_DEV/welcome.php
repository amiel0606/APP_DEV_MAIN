<?php
include_once('./includes/header.php');
if (!isset($_SESSION["uID"])) {
    header("location: ./index.php?error=UserLoggedOut");
    exit();
}
?>


<div id="right-panel">
    <div class="favorites">
        <h2 class="faves">Favorites</h2>
        <?php
            include_once './includes/dbCon.php';
            $UserN = $_SESSION['username'];
            $sql = "SELECT f.dogName, f.dogImage, f.dogBreed, f.dogAge, f.dogDescription, f.dogWeight FROM tblfavorites f WHERE f.ownerUser = ? ORDER BY f.timestamp ASC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $UserN);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="card">
                        <img src="./uploads/<?php echo $row['dogImage']; ?>">
                        <div class="card__content">
                            <p class="card__title">Name: <?php echo $row['dogName']; ?></p><br>
                            <p class="card__description">Breed: <?php echo $row['dogBreed']; ?></p><br>
                            <p class="card__description">Age: <?php echo $row['dogAge']; ?></p><br>
                            <p class="card__description">Weight: <?php echo $row['dogWeight']; ?> kg</p><br>
                            <p class="card__description">Other Description: <?php echo $row['dogDescription']; ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No favorites yet, go to the Adopt page to find your fur-ever buddy!";
            }
            $stmt->close();
            ?>

    </div>
    <div class="up-for-adoption">
        <h2 class="up-for-adoption-title">Up For Adoption</h2>
        <?php
            $UserN = $_SESSION['username'];
            $sqlAdoption = "SELECT a.dogID, a.image, a.name, a.breed, a.age, a.weight, a.description FROM tbldogs a WHERE a.username = ?";
            $stmtAdoption = $conn->prepare($sqlAdoption);
            $stmtAdoption->bind_param("s", $UserN);
            $stmtAdoption->execute();
            $resultAdoption = $stmtAdoption->get_result();
            if ($resultAdoption->num_rows > 0) {
                while ($rowAdoption = $resultAdoption->fetch_assoc()) {
                    $countQuery = "SELECT COUNT(DISTINCT ownerUser) FROM tblfavorites WHERE dogID = ?";
                    $stmtCount = $conn->prepare($countQuery);
                    $stmtCount->bind_param("i", $rowAdoption['dogID']);
                    $stmtCount->execute();
                    $stmtCount->bind_result($userCount);
                    $stmtCount->fetch();
                    $stmtCount->close();
                    ?>
                    <div class="card">
                        <img class="imageA" src="./uploads/<?php echo $rowAdoption['image']; ?>">
                        <div class="card__content">
                            <p class="card__title name">Name: <?php echo $rowAdoption['name']; ?></p><br>
                            <p class="card__description" id="breed">Breed: <?php echo $rowAdoption['breed']; ?></p><br>
                            <p class="card__description" id="age">Age: <?php echo $rowAdoption['age']; ?> </p><br>
                            <p class="card__description" id="weight">Weight: <?php echo $rowAdoption['weight']; ?> kg</p><br>
                            <p class="card__description" id="desc">Other Description: <?php echo $rowAdoption['description']; ?></p>
                            <p class="card__description" id="count">Added to Favorites By: <?php echo $userCount; ?> users</p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No dogs currently up for adoption.";
            }
            $stmtAdoption->close();
            ?>
    </div>
</div>

<?php
include_once('./includes/footer.php');
?>