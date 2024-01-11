<?php 
include_once('./includes/header.php');
if (!isset($_SESSION["uID"])) {
    header("location: index.php?error=UserLoggedOut");
    exit();
}
?>  

<!-- DIV CONTACTS -->
<div id="rectangle_message">
    <div class="h2message">
        <h2>Messages</h2>
    </div>
    <div id="mssgs">
    </div>
    <hr class="hr">
</div>
<!-- END OF DIV CONTACTS -->

<!-- MESSAGING WINDOW -->
<div id="rectangle_convo">
    <div id="messages">
        <!-- Messages will be inserted here by JavaScript -->
    </div>
    <div id="details">
        <div id="text">
            <button id="off" style="position: absolute; top: 0; right: 0; cursor: pointer;">X</button>
        </div>
    </div>

    <div class="inputbox">
        <!-- Add the initially hidden "Rate User" button -->
        <button id="rateUserBtn" style="display: none;" onclick="toggleRatingOverlay()">
            🐾 Rate User
        </button>

        <!-- Add the overlay for ratings -->
        <div id="ratingOverlay" style="display: none;">
            <p>Click to rate:</p>
            <div class="rating-option" onclick="rateUser(1)">⭐</div>
            <div class="rating-option" onclick="rateUser(2)">⭐⭐</div>
            <div class="rating-option" onclick="rateUser(3)">⭐⭐⭐</div>
            <div class="rating-option" onclick="rateUser(4)">⭐⭐⭐⭐</div>
            <div class="rating-option" onclick="rateUser(5)">⭐⭐⭐⭐⭐</div>
        </div>

        <div id="ownerUserDiv" data-owneruser="someUser" style="display: none;" data-dogid="haha"></div>
        <input id="message_input" type="text" style="display: none;">
        <button id="sendbtn" style="display: none;" onclick="sendMessage(this)">
            <img id="sendImg" src="./image/paper-plane.png" alt="Send">
        </button>
    </div>
</div>
<!-- END OF MESSAGING WINDOW -->

<!-- JAVASCRIPT FOR THIS PAGE -->
<script>
$(document).ready(function() {
    $('#message_input').hide();
    $('#sendbtn').hide();
    $('#message_input').on('keypress', function(e) {
    if (e.keyCode === 13) {
        sendMessage();
        e.preventDefault();
    }
    $('#off').click(function(){
        $('#details').hide();
        $('#text').hide();
    });
});



$.ajax({
    url: './includes/getContacts.php',
    type: 'GET',
        success: function (response) {
            var mssgsDiv = document.getElementById('mssgs');
            mssgsDiv.innerHTML = response;
        }
    });
});

function toggleRatingOverlay() {
    // Toggle the visibility of the rating overlay
    $('#ratingOverlay').toggle();
}


function rateUser(rating) {
    // Get the values from the ownerUserDiv
    var ratedUser = $('#ownerUserDiv').data('owneruser');

    // Call the rateUserAjax function with the obtained values
    rateUserAjax(ratedUser, rating);
}

function rateUserAjax(ratedUser, rating) {
    $.ajax({
        url: './includes/rateUser.php',
        type: 'POST',
        data: { ratedUser: ratedUser, rating: rating },
        success: function (response) {
            console.log(response);
            // Handle the response if needed
        },
        error: function (error) {
            console.error('Error rating user:', error);
        }
    });
}

function handleClick(element) {
    var user = element.getAttribute('data-owneruser');
    var dogID = element.getAttribute('data-dogid');
    var messagesDiv = document.getElementById('messages');
    messagesDiv.scrollTop = messagesDiv.scrollHeight;

    $.ajax({
        url: './includes/getConversation.php',
        type: 'GET',
        data: { user: user, dogID: dogID },
        success: function (response) {
            var messagesDiv = document.getElementById('messages');
            messagesDiv.innerHTML = response;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
            $('#details').show();

            // Show the "Rate User" button when a user is selected
            $('#rateUserBtn').show();
        }
    });

    $('#ownerUserDiv').data('owneruser', user);
    $('#ownerUserDiv').data('dogid', dogID);
    $('#ownerUserDiv').text(user + ' - ' + dogID);

    $('#message_input').show();
    $('#sendbtn').show();
}

function sendMessage() {
    var ownerUser = $('#ownerUserDiv').data('owneruser');
    var dogID = $('#ownerUserDiv').data('dogid');
    var message = $('#message_input').val();
    $.ajax({
        url: './includes/sendMessage.php',
        type: 'POST',
        data: { ownerUser: ownerUser, message: message, dogID: dogID },
        success: function (response) {
            var messagesDiv = document.getElementById('messages');
            if (!messagesDiv.innerHTML.includes(response.trim())) {
                messagesDiv.insertAdjacentHTML('beforeend', response);
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            }
        }
    });
    $('#message_input').val('');
}



</script>
<!-- END OF JAVASCRIPT FOR THIS PAGE -->
<?php
include_once('./includes/footer.php');
?>