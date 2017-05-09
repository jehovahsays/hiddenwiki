<?php
header_remove( 'X-Powered-By' );
header( 'Cache-control: none' );
header( 'Pragma: no-cache' );
header( 'Content-Type-Options: nosniff' );
header( 'X-Content-Type-Options: nosniff' );
header( 'XSS-Protection: 1; mode=block' );
header( 'X-XSS-Protection: 1; mode=block' );
header( 'Vary: Accept-Encoding' );
header( 'Cache-control: private, must-revalidate, max-age=0' );
header( 'Expires: 5' );
header( 'Host: www.jehovahsays.net' );
header( 'viewport: width=device-width' );
header( 'Accept-Language: en-US,en;q=0.5' );
header( 'Connection: Keep-alive' );
header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains; preload' );
header( 'Public-Key-Pins: pin-sha256="etUIaIpkLFWKHoSKeulr5CS/XHN6rVRq4XcdGRGCqTo="; 
pin-sha256="Slt48iBVTjuRQJTjbzopminRrHSGtndY0/sj0lFf9Qk="; 
pin-sha256="h6801m+z8v3zbgkRHpq6L29Esgfzhj89C1SyUCOQmqU="; 
pin-sha256="EDag/9Ub9j75I8wEW6LIcdUBcZyXeI8XVbzBlm0uBQU="; 
pin-sha256="AYyIEVI7Cz5FAWKATkzY51TwbGqzvDQyUZWpzt8lHjw="; 
pin-sha256="NTP1sOnRt6yYs00V7BVgxjmhwc289k7i+K/97AZUd4w="; 
max-age=2592000;' );
 echo "<meta name=\"theme-color\" content=\"green\" />	\n";
//exit();
?>
<iframe
width="100%" 
height="200" 
src="https://www.youtube.com/embed/videoseries?list=PLwMe8hyy9osJ75rfH-SjYb7Mlx-1GKh7Y&index=<?php print rand(1,10)?>"
    frameborder="0"
    allowfullscreen></iframe>
