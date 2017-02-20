<?php 
include(realpath(getenv('DOCUMENT_ROOT')) .'/blackhole/blackhole.php');
header( 'Referrer-Policy: no-referrer' );
header( 'Content-Type-Options: nosniff' );
header( 'X-Content-Type-Options: nosniff' );
header( 'XSS-Protection: 1; mode=block' );
header( 'X-XSS-Protection: 1; mode=block' );
header( 'X-Frame-Options: Deny' );
header_remove( 'X-Powered-By' );
?>
<html>
<head>
<meta name="viewport" content="width=device-width">
<style>body{color:green}</style>
</head>
<body style="background-color:black">
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
style="color: green; background-color: black">
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