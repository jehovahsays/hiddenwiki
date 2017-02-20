<?php 
include(realpath(getenv('DOCUMENT_ROOT')) .'/blackhole/blackhole.php');
header( 'Cache-control: none' );
header( 'Pragma: no-cache' );
header( 'Content-Type-Options: nosniff' );
header( 'XSS-Protection: 1; mode=block' );
header( 'X-Frame-Options: Deny' );
header( 'Vary: Accept-Encoding' );
header( 'Cache-control: private, must-revalidate, max-age=0' );
header( 'Expires: 0' );
header( 'viewport: width=device-width' );
header( 'Connection: Keep-alive' );
header( 'Content-Security-Policy: default-src "self" upgrade-insecure-requests; reflected-xss block;' );
header( 'X-Content-Security-Policy: default-src "self" upgrade-insecure-requests; reflected-xss block;' );
header_remove( 'X-Powered-By' );
?>
<html>
<head>
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; upgrade-insecure-requests; reflected-xss block;">
</head>
<body>
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