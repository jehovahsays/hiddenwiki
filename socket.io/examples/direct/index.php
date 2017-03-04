<?php
//header( 'Location: http://www.jehovahsays.net:3000', true, 302);
?>
<!DOCTYPE html>
<!-- 

 , __                                   __                      
/|/  \                                 /  \                     
 | __/ ,_    __           ,   _   ,_  | __ |          _   , _|_ 
 |   \/  |  /  \_|  |  |_/ \_|/  /  | |/  \|  |   |  |/  / \_|  
 |(__/   |_/\__/  \/ \/   \/ |__/   |_/\__/\_/ \_/|_/|__/ \/ |_/

Mozilla presents an HTML5 mini-MMORPG by Little Workshop http://www.littleworkshop.fr

* Client libraries used: RequireJS, Underscore.js, jQuery, Modernizr
* Server-side: Node.js, Worlize/WebSocket-Node, miksago/node-websocket-server
* Should work in latest versions of Firefox, Chrome, Safari, Opera, Safari Mobile and Firefox for Android

 -->
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=0.56, maximum-scale=0.56, user-scalable=no">
        <link rel="icon" type="image/png" href="https://www.jehovahsays.net/img/common/favicon.png">
        <meta property="og:title" content="BrowserQuest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://browserquest.mozilla.org/">
        <meta property="og:image" content="http://browserquest.mozilla.org/img/common/promo-title.jpg">
        <meta property="og:site_name" content="BrowserQuest">
        <meta property="og:description" content="Play Mozilla's BrowserQuest, an HTML5 massively multiplayer game demo powered by WebSockets!">
        <link rel="stylesheet" href="https://www.jehovahsays.net/css/main.css" type="text/css">
        <link rel="stylesheet" href="https://www.jehovahsays.net/css/achievements.css" type="text/css">
        <script src="https://www.jehovahsays.net/js/lib/modernizr.js" type="text/javascript"></script>
        <!--[if lt IE 9]>
                <link rel="stylesheet" href="https://www.jehovahsays.net/css/ie.css" type="text/css">
                <script src="https://www.jehovahsays.net/js/lib/css3-mediaqueries.js" type="text/javascript"></script>
                <script type="text/javascript">
                document.getElementById('parchment').className = ('error');
                </script>
        <![endif]-->
        <script src="https://www.jehovahsays.net/js/detect.js" type="text/javascript"></script>
        <title>BrowserQuest</title>
		<meta http-equiv="refresh" content="666;url=http://www.jehovahsays.net:3000"/>
		  <meta name="X-Powered-By">
  <meta name="Content-Type-Options" content="nosniff">
  <meta name="X-Content-Type-Options" content="nosniff">
  <meta name="XSS-Protection" content="1; mode=block">
  <meta name="X-XSS-Protection" content="1; mode=block">
  <meta name="Frame-Options" content="sameorigin">
  <meta name="X-Frame-Options" content="sameorigin">
  <meta name ="theme-color" content="green">
	</head>
<br><br>	<br><br>	

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Google Ads -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-0113719323713908"
     data-ad-slot="8303252048"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<br><br>
	<center><a href="http://www.jehovahsays.net">	
	<button>
	
	<img src="https://www.jehovahsays.net/img/3/guard.png" alt="BroswerQuest">
	<br>PRESS HERE TO PLAY MULTIPLAYER
</button></a>

<BR><BR><BR><BR>
<a href="http://www.jehovahsays.net:3000">	
	<button>
PRESS HERE TO SEARCH THIS WEBSITE
</button></a>

</center>
    <!--[if lt IE 9]>
	<body class="intro upscaled">
    <![endif]-->
	<body class="intro">

	    <div id="intro">
	        <section>
	        <article id="portrait">
			
			
	            <p>
	               Please rotate your device to landscape mode<br>
	            </p>
	            <div id="tilt"></div>

	            </div>

</article>
</section>

  <script src="https://www.jehovahsays.net/jquery-1.10.2.min.js"></script>
  <script src="https://www.jehovahsays.net/socket.io/socket.io.js"></script>
  <script src="https://www.jehovahsays.net/main.js"></script>	

		

        
        <div id="resize-check"></div>
		
        <script type="text/javascript">
            var ctx = document.querySelector('canvas').getContext('2d'),
                parchment = document.getElementById("parchment");
            
            if(!Detect.supportsWebSocket()) {
                parchment.className = "error";
            }
            
            if(ctx.mozImageSmoothingEnabled === undefined) {
                document.querySelector('body').className += ' upscaled';
            }
            
            if(!Modernizr.localstorage) {
                var alert = document.createElement("div");
                    alert.className = 'alert';
                    alertMsg = document.createTextNode("You need to enable cookies/localStorage to play BrowserQuest");
                    alert.appendChild(alertMsg);

                target = document.getElementById("intro");
                document.body.insertBefore(alert, target);
            } else if(localStorage && localStorage.data) {
                parchment.className = "loadcharacter";
            }
        </script>
        
        <script src="https://www.jehovahsays.net/js/lib/log.js"></script>
        <script>
                var require = { waitSeconds: 60 };
        </script>
        <script data-main="js/home" src="https://www.jehovahsays.net/js/lib/require-jquery.js"></script>
	</body>
<iframe 
width="100%" 
height="0" 
src="https://www.jehovahsays.net/index.html" 
frameborder="0" 
allowfullscreen>
</iframe>
</html>