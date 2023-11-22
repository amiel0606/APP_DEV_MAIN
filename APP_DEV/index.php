<?php
    include_once('./includes/header.php');
?>
        <img src="./image/dog_bgg.png" id="dog_bgg"> 
        <div class="tagline"> <h2 class="tags">Fur-Ever Buddies: Find Your Furry Soulmate</h2> </div>

        <div id="myOverlay" class="overlay"> 
                <span onclick="closeForm()" class="closebtn" title="Close Overlay">&#10005;</span>
                <div class="wrap">
                        <div class="form-box signup" id="signupWrap">
                            <h2>Sign Up</h2>
                            <form action="./includes/register.php" method="post">
                                <input name="Fname" type="text" placeholder="First Name">
                                <input name="Lname" type="text" placeholder="Last Name">
                                <input name="city" type="text" placeholder="City">
                                <input name="UserName" type="text" placeholder="Username">
                                <input name="password" type="password" placeholder="Password">
                                <input name="ConfPassword" type="password" placeholder="Confirm Password">
                                <input name="submit" type="submit"value="Sign Up"></input>
                            </form>
                            <div class="register-login">
                                <p>Already have an Account? <a href="javascript:void(0);" onclick="showLogInForm()">Click Here</a></p>
                            </div>
                        </div>
                    <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "EmptyInput") {
                                echo '<p class = "errors">Fill in all fields!</p>';
                            }
                            else if ($_GET["error"] == "PassNotMatching") {
                                echo '<p class = "errors">Passwords do not match!</p>';
                            }
                            else if ($_GET["error"] == "UsernameTaken") {
                                echo '<p class = "errors">This Username is already taken!</p>';
                            }
                            else if ($_GET["error"] == "InvalidUsername") {
                                echo '<p class = "errors">Choose a proper Username </p>';
                            }
                            else if ($_GET["error"] == "stmtFailed") {
                                echo '<p class = "errors">Something went wrong, </br> please try again later.</p>';
                            }
                            elseif ($_GET["error"] == "none") {
                                echo '<p class = "errors">Successfully registered! </br>  Please log in to continue.</p>';
                            }
                            elseif ($_GET["error"] == "UserLoggedOut") {
                                echo '<p class = "errors">Please Log in or Create an account. </p>';
                            }
                        }
                    ?>
                </div>
                <div class="wrap" id="loginWrap" style="display: none;" style= "opacity: 0;">
                        <div class="form-box signup">
                            <h2>Log In</h2>
                            <form action="./includes/login.php" method="post">
                                <input name="UserName" type="text" placeholder="Username">
                                <input name="password" type="password" placeholder="Password">
                                <input name="submit" type="submit"value="Log In"></input>
                            </form>
                            <div class="login-register">
                                <p>Don't have an account yet? <a href="javascript:void(0);" onclick="showSignUpForm()">Click Here</a></p>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "EmptyInput") {
                                echo '<p class = "errors">Fill in all fields!</p>';
                            }
                            else if ($_GET["error"] == "WrongLogin") {
                                echo '<p class = "errors">Invalid Username or Password</p>';
                            }
                            else if ($_GET["error"] == "stmtFailed") {
                                echo '<p class = "errors">Something went wrong, </br> please try again later.</p>';
                            }
                            elseif ($_GET["error"] == "none") {
                                echo '<p class = "errors">Successfully registered! </br>  Please log in to continue.</p>';
                            }
                            elseif ($_GET["error"] == "UserLoggedOut") {
                                echo '<p class = "errors">Please Log in or Create an account. </p>';
                            }
                        }
                    ?>
                </div>
            </div>
            
        <div id="home_info" >
            <div id="rectangle_1"  >
            <div  id="homer" >
                Fur-Ever Buddies is a website that connects you with adorable dogs who are waiting for their forever homes. It's like Tinder, 
                but for dog adoption. You can browse through profiles of dogs from various shelters and rescues, and swipe right to show your interest. 
                If there's a match, you can chat with the dog's caretaker and arrange a meet-up.Fur-Ever Buddies is more than just a website. 
                It's a community of dog lovers who want to make a positive impact on the world. By adopting a dog, you are not only saving a life, 
                but also gaining a friend who will always be there for you. 
            </div>
            <img src="./image/bg-image2.jpg" id="bg_image2_1" />
        </div>
        </div>

        <div id="low" ><h2 id="team">Our Team</h2></div>

        <div id="nigga">
            <div id="bg__card_Amiel"  ></div>
            <div id="carhyl" > <h2>Amiel</h2></d>
            <div id="programmer" > <h3>Programmer</h3></div>
            <div id="dev" > <h2>Front-End developer of the team</h2></div>
        </div>
        <img src="./image/amiel.png" id="amiel" />

        <div id="card_gelo">
            <div id="bg__card_gelo"  ></div>
            <div id="gelo" > <h2>Gelo</h2></div>
            <div id="programmer_gelo" ><h3>Programmer</h3></div>
            <div id="dev_gelo" ><h2>Front-End developer of the team</h2></div>
        </div>
        <img src="./image/gelo.png" id="gelo" />

        <div id="card_jorenz">
            <div id="bg__card_jorenz"></div>
            <div id="jorenz" ><h2>Jorenz</h2></div>
            <div id="programmer_jorenz" ><h3>Programmer</h3></div>
            <div id="dev_jorenz" ><h2>Front-End developer of the team</h2></div>
        </div>
        <img src="./image/jorenz.png" id="jorenz" />

        <div id="card_nelson">
            <div id="bg__card_nelson"></div>
            <div id="nelson"><h2>Nelson</h2></div>
            <div id="programmer_nelson"><h3>Programmer</h3></div>
            <div id="dev_nelson"><h2>Front-End developer of the team</h2></div>
        </div>
        <img src="./image/noslen.png" id="nelson" /> 
    </div>
<?php
include_once('./includes/footer.php');
?>