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

    <?php
    $error_info = null;
        if ($error_info != null) {
            ?> <style>.error_info{display:block} </style> <?php
        }
?>
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
                    <h2>Sign Up</h2>
                    <form action="register.php" method="post">
                        <input name="Fname" type="text" placeholder="First Name">
                        <input name="Lname" type="text" placeholder="Last Name">
                        <input name="city" type="text" placeholder="City">
                        <input name="UserName" type="text" placeholder="Username">
                        <input name="password" type="password" placeholder="Password">
                        <input name="ConfPassword" type="password" placeholder="Confirm Password">
                        <input type="submit"value="Sign Up"></input>
                    </form>
                    <p>Already have an Account? <a href="loggedin.php" class ="disable">Click Here</a></p>
                    <p class="error_info">
                        <?php echo $error_info; ?>
                    </p>
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
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>