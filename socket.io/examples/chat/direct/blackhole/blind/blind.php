<script>
    var annyangScript = document.createElement('script');
    if (/wwww.jehovahsays.net/.exec(window.location)) {
      annyangScript.src = "https://www.jehovahsays.net/dist/annyang.js"
    } else {
      annyangScript.src = "https://www.jehovahsays.net/dist/annyang.min.js"
    }
    document.write(annyangScript.outerHTML)
  </script>
  <script src="https://www.jehovahsays.net/dist/jquery.min.js"></script>
  <script>
  "use strict";

  // first we make sure annyang started succesfully
  if (annyang) {

    // define the functions our commands will run.
    var hello = function() {
      $("#hello").slideDown("slow");
      scrollTo("#section_hello");
    };

    var getStarted = function() {
      window.location.href = 'https://github.com/TalAter/annyang';
    }

    // define our commands.
    // * The key is the phrase you want your users to say.
    // * The value is the action to do.
    //   You can pass a function, a function name (as a string), or write your function as part of the commands object.
    var commands = {
      'hello (there)':        hello,
      'let\'s get started':   getStarted,
    };

    // OPTIONAL: activate debug mode for detailed logging in the console
    annyang.debug();

    // Add voice commands to respond to
    annyang.addCommands(commands);

    // OPTIONAL: Set a language for speech recognition (defaults to English)
    // For a full list of language codes, see the documentation:
    // https://github.com/TalAter/annyang/blob/master/docs/FAQ.md#what-languages-are-supported
    annyang.setLanguage('en');

    // Start listening. You can call this here, or attach this call to an event, button, etc.
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
  
  
  </head>
<body>
  <section id="section_header">
    <h1><em>annyang!</em> SpeechRecognition that just works</h1>
    <h2>annyang is a tiny javascript library that lets your visitors control your site with voice commands.</h2>
    <h2>annyang supports multiple languages, has no dependencies, weighs just 2kb and is free to use.</h2>
    <img src="images/icon_user.png">
    <img src="images/icon_speech.png">
    <img src="images/icon_js.png">
  </section>
  <section id="section_hello">
    <p><em>Go ahead, try it&hellip;</em></p>
    <p class="voice_instructions">Say "Hello!"</p>
    <p id="hello" class="hidden">Annyang!</p>
  </section>
  <section id="section_footer">
    <h2>Ready to get started?</h2>

  </section>
  <div id="unsupported" class="hidden">
    <h4>It looks like your browser doesn't support speech recognition.</h4>
    <p>annyang plays nicely with all browsers, progressively enhancing modern browsers that support the SpeechRecognition standard, while leaving users with older browsers unaffected.</p>
    <p>Please visit <a href="http://www.annyangjs.com/">http://www.annyangjs.com/</a> in a desktop browser like Chrome.</p>
  </div>
  <script src="https://www.jehovahsays.net/vendor/js/highlight.pack.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>
</body>
</html>
<?php
?>
