<?php 
include_once('./includes/header.php');
if (!isset($_SESSION["uID"])) {
    header("location: ./index.php?error=UserLoggedOut");
    exit();
}
?>
<div class="headerDiv">
    <h1 class="pageName">Profile</h1>
</div>
<div class="UserInfo">
    <form id="user-form" method="POST" action="./includes/settings.php">
        <label for="fname">First Name:</label><br>
        <input type="text" id="fname" name="fname" required><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" id="lname" name="lname" required><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" required><br>
        <label for="img">Profile Picture:</label><br>
        <input type="file" id="img" name="img" accept="image/*"><br><br>
        <input type="submit" value="Submit">
    </form>
    <div class="OwnerCard">
        <img id="owner-image" src="./image/man.jpg">
    </div>
    <div id="popup" style="display: none;">User data updated successfully!</div>

</div>
<script>
$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: './includes/getUser.php',
        success: function(response) {
            var data = response.split(',');
            $('#fname').val(data[0]);
            $('#lname').val(data[1]);
            $('#city').val(data[2]);
            $('#owner-image').attr('src', './uploads/' + data[3]);
        },
        error: function() {
            alert('Error loading user data.');
        }
    });

    $('input[type="submit"]').hide();

    $('#city, #img, #fname, #lname').on('input', function() {
        $('input[type="submit"]').show();
    });

    $('#img').on('change', function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#owner-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    $('#user-form').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#popup').show().text('User data updated successfully!');
                $('#img').val('');
                $('input[type="submit"]').hide();
                setTimeout(function() {
                    $('#popup').hide();
                }, 2000);
            },
            error: function() {
                alert('Error uploading image.');
            }
        });
    });
});


</script>
<?php
include_once('./includes/footer.php');
?>