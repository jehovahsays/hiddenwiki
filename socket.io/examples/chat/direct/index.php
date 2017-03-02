<?php
header_remove( 'X-Powered-By: Deny' );
header( 'Content-Type-Options: nosniff' );
header( 'X-Content-Type-Options: nosniff' );
header( 'XSS-Protection: 1; mode=block' );
header( 'X-XSS-Protection: 1; mode=block' );
header( 'Frame-Options: Deny' );
header( 'X-Frame-Options: Deny' );
header( 'Host: www.jehovahsays.net' );
header( 'viewport: width=device-width' );
header( 'Strict-Transport-Security: max-age=31536000;' );
ob_start();
$html = ob_get_clean();
$output = ob_get_contents();
ob_end_clean();
header('Location: http://www.jehovahsays.net/blackhole/');
include(realpath(getenv('DOCUMENT_ROOT')) .'/blackhole/blackhole.php');
exit();
?>
