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
        $sql = "SELECT f.dogID, f.dogName, f.dogImage, f.dogBreed, f.dogAge, f.dogDescription, f.dogWeight FROM tblfavorites f WHERE f.ownerUser = ? ORDER BY f.timestamp ASC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $UserN);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <img src="http://localhost/APP_DEV/uploads/<?php echo $row['dogImage']; ?>" data-dogid="<?php echo $row['dogID']; ?>">
                    <div class="card__content">
                        <p class="card__title">Name: <?php echo $row['dogName']; ?></p><br>
                        <p class="card__description">Breed: <?php echo $row['dogBreed']; ?></p><br>
                        <p class="card__description">Age: <?php echo $row['dogAge']; ?></p><br>
                        <p class="card__description">Weight: <?php echo $row['dogWeight']; ?> kg</p><br>
                        <p class="card__description">Other Description: <?php echo $row['dogDescription']; ?></p>
                    </div>
                    <!-- Info button for this card -->
                    <div class="info_button" onclick="toggleCardContent(this)">
                        <button class="info"> <img src="./image/moreINFO.png" alt="Info"> </button>
                    </div>
                    <div class="toadopt_button" onclick="fetchDogDetailsAndNavigate(this)">
                        <button class="toadopt"></button>
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
                    <img id="imageA<?php echo $rowAdoption['dogID']; ?>" src="http://localhost/APP_DEV/uploads/<?php echo $rowAdoption['image']; ?>" data-dogid="<?php echo $rowAdoption['dogID']; ?>">
                    <div class="card__content" id="cardContentA<?php echo $rowAdoption['dogID']; ?>">
                        <!-- Card details -->
                        <p class="card__title" id="nameA<?php echo $rowAdoption['dogID']; ?>">Name: <?php echo $rowAdoption['name']; ?></p><br>
                        <p class="card__description" id="breedA<?php echo $rowAdoption['dogID']; ?>">Breed: <?php echo $rowAdoption['breed']; ?></p><br>
                        <p class="card__description" id="ageA<?php echo $rowAdoption['dogID']; ?>">Age: <?php echo $rowAdoption['age']; ?> </p><br>
                        <p class="card__description" id="weightA<?php echo $rowAdoption['dogID']; ?>">Weight: <?php echo $rowAdoption['weight']; ?> kg</p><br>
                        <p class="card__description" id="descA<?php echo $rowAdoption['dogID']; ?>">Other Description: <?php echo $rowAdoption['description']; ?></p>
                        <p class="card__description" id="countA<?php echo $rowAdoption['dogID']; ?>">Added to Favorites By: <?php echo $userCount; ?> users</p>
                    </div>
                    <!-- Info button for this card -->
                    <div class="info_button1" onclick="toggleCardContentA('<?php echo $rowAdoption['dogID']; ?>')">
                        <button class="info1">
                            <img src="./image/moreINFO.png" alt="Info">
                        </button>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $.ajax({
            type: 'GET',
            url: './includes/getFavoriteUser.php',
            success: function (response) {
                var dogs = response.split('\n');
                dogs.forEach(function (dog, index) {
                    var data = dog.split(',');
                    $('#imageA').attr('src', 'http://localhost/APP_DEV/uploads/' + data[1]).data('dogid', data[0]);
                    $('#name').text('Name: ' + data[2]);
                    $('#breed').text('Breed: ' + data[3]);
                    $('#age').text('Age: ' + data[4]);
                    $('#weight').text('Weight: ' + data[5] + ' kg');
                    $('#desc').text('Other Description: ' + data[6]);
                    $('#count').text('Added to Favorites By: ' + data[7] + ' users');
                });
            }
        });
    });
    function toggleCardContent(button) {
        var cardContent = button.closest('.card').querySelector('.card__content');
        cardContent.classList.toggle("show_content");
    }
    function toggleCardContentA(dogID) {
        var cardContentA = document.getElementById("cardContentA" + dogID);
        cardContentA.classList.toggle("show_content");
    }
    // Move the function outside the $(document).ready block
    function fetchDogDetailsAndNavigate(button) {
        var card = $(button).closest('.card');

        if (card.length === 0) {
            console.error("Card element not found.");
            return;
        }

        var dogID = card.find('img').data('dogid');

        if (!dogID) {
            console.error("Missing dogID.");
            return;
        }

        $.ajax({
            type: 'GET',
            url: './includes/getDogDetails.php',
            data: { dogID: dogID },
            dataType: 'json',
            success: function (response) {
                console.log("Server response:", response);
                if (response.error) {
                    console.error("Error fetching dog details:", response.error);
                } else {
                    var dogDetails = response;
                    updateDogDetailsInAdoptPage(dogDetails);
                    // Redirect to adopt.php after updating details
                    window.location.href = 'adopt.php';
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching dog details:", status, error);
            }
        });
    }

// Define the function before the $(document).ready block
function updateDogDetailsInAdoptPage(dogDetails) {
    // Your existing code for updating dog details
    $("#dog-card img").attr('src', 'http://localhost/APP_DEV/uploads/' + dogDetails.image).data('dogid', dogDetails.dogID);
    $("#dog-card .dog-card__title").text("Name: " + dogDetails.name);
    $("#dog-card .dog-card__description:nth-child(2)").text("Breed: " + dogDetails.breed);
    $("#dog-card .dog-card__description:nth-child(3)").text("Age: " + dogDetails.age);
    $("#dog-card .dog-card__description:nth-child(4)").text("Weight: " + dogDetails.weight + " kg");
    $("#dog-card .dog-card__description:nth-child(5)").text("Other Description: " + dogDetails.description);
}

// Keep the rest of your code as is, including the $(document).ready block
$(document).ready(function () {
    $(".toadopt_button").click(function () {
        fetchDogDetailsAndNavigate(this);
    });

    // Other functions and code here...
});

</script>

<?php
include_once('./includes/footer.php');
?>
