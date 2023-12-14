<?php 
include_once('./includes/header.php');
if (!isset($_SESSION["uID"])) {
    header("location: ./index.php?error=UserLoggedOut");
    exit();
}
?>  


<!-- DIV CONTACTS -->
<div id="rectangle_message">
    <h2>Messages</h2>
    <div id="mssgs">
        <!-- Messages will be inserted here by JavaScript -->
    </div>
</div>
<div class="vertical-line"></div>
<!-- END OF DIV CONTACTS -->

<!-- MESSAGING WINDOW -->
<div id="rectangle_convo">
    <div id="messages">
        <!-- Messages will be inserted here by JavaScript -->
    </div>
    <div class="inputbox">
        <div id="ownerUserDiv" data-owneruser="someUser"></div>
        <input id="message_input" type="text" style="display: none;">
        <button id="sendbtn" style="display: none;" onclick="sendMessage()">
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
    $.ajax({
        url: './includes/getContacts.php',
        type: 'GET',
        success: function(response) {
            var mssgsDiv = document.getElementById('mssgs');
            mssgsDiv.innerHTML = response;
        }
    });
});

function handleClick(element) {
    var user = element.getAttribute('data-owneruser');

    // Update the data-owneruser attribute of the ownerUserDiv
    $('#ownerUserDiv').attr('data-owneruser', user);
    $('#ownerUserDiv').text(user); // Update the text of the ownerUserDiv

    // Show the message_input and sendbtn
    $('#message_input').show();
    $('#sendbtn').show();

    $.ajax({
        url: './includes/getConversation.php',
        type: 'GET',
        data: { user: user },
        success: function(response) {
            var messagesDiv = document.getElementById('messages');
            messagesDiv.innerHTML = response; // Insert the conversation into the div
        }
    });
}

function sendMessage() {
    var ownerUser = $('#ownerUserDiv').attr('data-owneruser');
    var message = $('#message_input').val();

    $.ajax({
        url: './includes/sendMessage.php',
        type: 'POST',
        data: { ownerUser: ownerUser, message: message },
        success: function(response) {
            var messagesDiv = document.getElementById('messages');
            var messageElement = document.createElement('div');
            messageElement.className = 'messages';
            messageElement.innerHTML = '<p><strong>You:</strong> ' + message + '</p>';
            messagesDiv.appendChild(messageElement);
        }
    });
    $('#message_input').val('');
}



</script>
<!-- END OF JAVASCRIPT FOR THIS PAGE -->
<?php
include_once('./includes/footer.php');
?>