<?php 
include(realpath(getenv('DOCUMENT_ROOT')) .'/blackhole/blackhole.php');
header( 'Referrer-Policy: no-referrer' );
header( 'Content-Type-Options: nosniff' );
header( 'X-Content-Type-Options: nosniff' );
header( 'XSS-Protection: 1; mode=block' );
header( 'X-XSS-Protection: 1; mode=block' );
header( 'X-Frame-Options: Deny' );
header( 'Content-Security-Policy: default-src "none"; reflected-xss block;' );
header( 'X-Content-Security-Policy: default-src "none"; reflected-xss block;' );
header_remove( 'X-Powered-By' );
?>
<html>
<head>
<meta http-equiv="Content-Security-Policy" content=" default-src 'none'; reflected-xss block; referrer no-referrer;">
</head>
<body>
<br>
<center>
<form 
action="index.php" 
id="searchform" 
autocomplete="off">
<input 
type="search" 
name="search" 
placeholder="Search" 
title="Search [alt-shift-f]" 
accesskey="f" 
id="searchInput" 
tabindex="1" 
autocomplete="off" 
style="color: black; background-color: white">
<input 
type="hidden" 
value="Special:Search" 
name="title">
<input 
type="submit" 
name="go" 
value="Go" 
title="Go to a page with this exact name if it exists" 
id="searchButton" 
class="button">				
</form>
</center>
</body>
</html>