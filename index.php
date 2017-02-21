<?php 
include(realpath(getenv('DOCUMENT_ROOT')) .'/blackhole/blackhole.php');
header( 'Content-Type-Options: nosniff' );
header( 'X-Content-Type-Options: nosniff' );
header( 'XSS-Protection: 1; mode=block' );
header( 'X-XSS-Protection: 1; mode=block' );
header( 'Frame-Options: Deny' );
header( 'X-Frame-Options: Deny' );
header_remove( 'X-Powered-By' );
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<iframe src="http://www.jehovahsays.net/blackhole/browserquest/web/" style="border: 0; position:absolute; top:0; left:0; right:0; bottom:0; width:100%; height:100%"></iframe>
</body>
</html>