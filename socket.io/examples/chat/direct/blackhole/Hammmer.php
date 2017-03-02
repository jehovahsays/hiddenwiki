		<script>
    var annyangScript = document.createElement('script');
    if (/www.jehovahsays.net/.exec(window.location)) {
      annyangScript.src = "https://www.jehovahsays.net/blind/dist/annyang.js"
    } else {
      annyangScript.src = "https://www.jehovahsays.net/blind/dist/annyang.min.js"
    }
    document.write(annyangScript.outerHTML)
  </script>
  <script src="https://www.jehovahsays.net/blind/dist/jquery.min.js"></script>
  <script>
  "use strict";

  if (annyang) {

        var home = function() {
      window.location.href = 'https://www.jehovahsays.net/Talk:Main_Page&action=edit';
    }
	
	    var specialpages = function() {
      window.location.href = 'https://www.jehovahsays.net/Special:SpecialPages';
    }
	
	    var recentchanges = function() {
      window.location.href = 'https://www.jehovahsays.net/Special:RecentChanges';
    }
	
	    var edit = function() {
      window.location.href = 'https://www.jehovahsays.net/Talk:Main_Page&action=edit';
    }
	
	    var version = function() {
      window.location.href = 'https://www.jehovahsays.net/Special:Version';
	}

    var commands = {
	  'home':                 home,
      'special pages':        specialpages,
      'recent changes':       recentchanges,	  
      'edit':                 edit,
	  'version':              version,
    };


    annyang.debug();


    annyang.addCommands(commands);

    annyang.setLanguage('en');
	
    annyang.start();
  } else {
    $(document).ready(function() {
      $('#unsupported').fadeIn('fast');
    });
  }

  var scrollTo = function(identifier, speed) {
    $('html, body').animate({
        scrollTop: $(identifier).offset().top
    }, speed || 1000);
  }
  </script>
  <link rel="stylesheet" href="css/main.min.css" />

  <body onload="getLocation()">

  <script type="text/javascript">
/**
* Get location
*/
var x = document.getElementById("chartdiv");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
}
</script>	

  <script src="https://www.jehovahsays.net/blind/vendor/js/highlight.pack.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>

			Voice Commands<br>
			Home<br>
			Special Pages<br>
			Recent Changes<br>
			Edit<br>
			Version
			<?php
			?>