<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fur-Ever Buddies</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/welcome.css">
    <link rel = "icon" type = "image/png" href = "./image/logo.png">
    <script src="./js/script.js"></script>
</head>
<body>
    <div class="bg">
            <div class="nav">
                <div class="nav-link">
                    <img class="logo" src="./image/logo.png" />
                    <img class="line" src="./image/line.svg" />
                    <a href="#" class="nav-links openbtn" onclick="openForm( )">Sign Up</a>
                    <a href="#team" class="nav-links">About Us</a>
                    <a href="#homer" class="nav-links">Home</a>
                </div>
                <div class="txt-logo">Fur-Ever Buddies</div>
            </div>
        <img src="./image/dog_bgg.png" id="dog_bgg"> 
        <div class="tagline"> <h2 class="tags">Fur-Ever Buddies: Find Your Furry Soulmate</h2> </div>

            <div id="myOverlay" class="overlay"> 
                <span onclick="closeForm()" class="closebtn" title="Close Overlay">&#10005;</span>
                <div class="wrap">
                    <h2>Log In</h2>
                    <form action="">
                        <input type="text" placeholder="Username">
                        <input type="password" placeholder="Password">
                        <input type="submit" value="Log In"></input>
                    </form>
                    <p>Don't have an account yet? <a href="index.php">Click Here</a></p>
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
    </div>
</body>
</html>