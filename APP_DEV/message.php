<?php 
include_once('./includes/header.php');
if (!isset($_SESSION["uID"])) {
    header("location: index.php?error=UserLoggedOut");
    exit();
}
?>  

<!-- DIV CONTACTS -->
<div id="rectangle_message">
    <h2>Messages</h2>
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
    <div class="inputbox">
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
});

$.ajax({
    url: './includes/getContacts.php',
    type: 'GET',
        success: function (response) {
            console.log(response);
            var mssgsDiv = document.getElementById('mssgs');
            mssgsDiv.innerHTML = response;
        }
    });
});

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
    console.log(ownerUser + " " + dogID + " " + message);
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