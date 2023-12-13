<?php 
include_once('./includes/header.php');
if (!isset($_SESSION["uID"])) {
    header("location: ./index.php?error=UserLoggedOut");
    exit();
}
?>  
<!-- LEFT NAVBAR -->
    <div id="left-panel">
        <ul>
            <li><a href="welcome.php"> <img class="logo-side" src="./image/account.png">Profile</a></li>
            <li><a href="adopt.php"><img class="logo-side" src="./image/dog.png">Adopt</a></li>
            <li><a href="message.php"><img class="logo-side" src="./image/email.png">Messages</a></li>
            <li><a href="./includes/logout.php"><img class="logo-side" src="./image/logout.png">Logout</a></li>
        </ul>
    </div>
<!-- END OF LEFT NAVBAR -->

<!-- DIV CONTACTS -->
    <div id="rectangle_message">
        <h2>Messages</h2>
        <?php
            include_once('./includes/dbCon.php');
            $user= $_SESSION['username'];
            $query = "SELECT ownerUser FROM tblfavorites WHERE uploader = ? ORDER BY timestamp DESC";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();

            echo '<div id="mssgs">';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="ownerUser" data-owneruser="' . $row['ownerUser'] . '" onclick="handleClick(this)">' . $row['ownerUser'] . '</div>';
            }
            echo '</div>';
        ?>
    </div>
    <div class="vertical-line"></div>
<!-- END OF DIV CONTACTS -->

<!-- MESSAGING WINDOW -->
    <div id="rectangle_convo">
        <div class="inputbox">
        <div id="ownerUserDiv" data-owneruser="someUser"></div>
        <input id="message_input" type="text" style="display: none;">
        <button id="sendbtn" style="display: none;">
                <img id="sendImg" src="./image/paper-plane.png" alt="Send">
        </button>
        </div>
    </div>
<!-- END OF MESSAGING WINDOW -->

<!-- JAVASCRIPT FOR THIS PAGE -->
<script>
function handleClick(ownerUserDiv) {
    var ownerUser = ownerUserDiv.getAttribute('data-owneruser');

    // Change the URL
    window.history.pushState({}, '', '?user=' + encodeURIComponent(ownerUser));

    var xhr = new XMLHttpRequest();
    xhr.open('GET', './includes/getConversation.php?user=' + encodeURIComponent(ownerUser), true);
    xhr.onload = function() {
        if (this.status == 200) {
            var conversation = this.responseText.trim().split('\n');
            updateConversation(conversation);
        }
    };
    xhr.send();
}

function updateConversation(conversation) {
    var rectangleConvoDiv = document.getElementById('rectangle_convo');
    rectangleConvoDiv.innerHTML = ''; // Clear the existing conversation

    for (var i = 0; i < conversation.length; i++) {
        var messageDiv = document.createElement('div');
        messageDiv.textContent = conversation[i];
        rectangleConvoDiv.appendChild(messageDiv);
    }
}



</script>
<!-- END OF JAVASCRIPT FOR THIS PAGE -->
<?php
include_once('./includes/footer.php');
?>