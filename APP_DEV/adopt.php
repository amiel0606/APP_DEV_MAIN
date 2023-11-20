<!-- JORENZ CODE FOR ADOPT PAGE -->
<?php
include_once('./includes/header.php');
?>
    
<div id="left-panel">
    <ul>
        <li><a href="#"> <img class="logo-side" src="./image/account.png">Profile</a></li>
        <li><a href="adopt.php"><img class="logo-side" src="./image/dog.png">Adopt</a></li>
        <li><a href="#"><img class="logo-side" src="./image/email.png">Messages</a></li>
        <li><a href="./includes/logout.php"><img class="logo-side" src="./image/logout.png">Logout</a></li>
    </ul>
</div>

<link rel="stylesheet" href="./css/adoptPage.css">
<div id="right-panel">

    <div class="dog-container">
        <div class="dog-card">
            <img src="./image/dogies/igit.jpg" alt="Dog Image">
        </div>
        <div class="dog-buttons">
            <button class="reject-button">&#10006;</button>
            <button class="heart-button">&#10084;</button>
            <button class="paw-button">&#128062;</button>
        </div>
    </div>

    <div class="add-dog-form">
        <button onclick="toggleForm()">Add Dog for Adoption</button>
        <div class="add-dog-container" id="dogFormContainer">
            <div class="add-dog-form-inner">
                <form action="" method="post" id="dogForm">
                    <!-- Your form fields here -->
                    <button type="submit" name="addDog">Add Dog</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleForm() {
        var formContainer = document.getElementById('dogFormContainer');
        formContainer.style.display = formContainer.style.display === 'none' ? 'flex' : 'none';
    }
</script>

</body>
</html>

<?php
include_once('./includes/footer.php');
?>
