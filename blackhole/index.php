<?php 
/*
Title: Blackhole for Bad Bots
Description: Automatically trap and block bots that don't obey robots.txt rules
Project URL: http://perishablepress.com/blackhole-bad-bots/
Author: Jeff Starr (aka Perishable)
Version: 3.1
License: GPLv2 or later

This program is free software; you can redistribute it and/or modify it under the 
terms of the GNU General Public License as published by the Free Software Foundation; 
either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
See the GNU General Public License for more details.

Credits: The Blackhole includes customized/modified versions of these fine scripts:
 - Network Query Tool @ http://www.drunkwerks.com/docs/NetworkQueryTool/
 - Kloth.net Bot Trap @ http://www.kloth.net/internet/bottrap.php

*/



// edit as needed
$from      = 'apache@localhost'; // from address
$recip     = 'apache@localhost'; // to address
$subject   = 'Bad Bot Alert!';
$filename  = realpath(getenv('DOCUMENT_ROOT')) .'/blackhole/blackhole.dat';



// DO NOT EDIT BELOW THIS LINE



// variables
$version   = '3.1';
$message   = '';
$badbot    = 0;

$request   = sanitize($_SERVER['REQUEST_URI']);
$ipaddress = sanitize($_SERVER['REMOTE_ADDR']);
$useragent = sanitize($_SERVER['HTTP_USER_AGENT']);
$protocol  = sanitize($_SERVER['SERVER_PROTOCOL']);
$method    = sanitize($_SERVER['REQUEST_METHOD']);



// date and time
date_default_timezone_set('UTC');
$date = date('l, F jS Y @ H:i:s');
$time = time();



// sanitize
function sanitize($string) {
	$string = trim($string); 
	$string = strip_tags($string);
	$string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	$string = str_replace("\n", "", $string);
	$string = trim($string); 
	return $string;
}



// whois lookup
function shapeSpace_whois_lookup($ipaddress) {
	
	$msg = '';
	$extra = '';
	$server = 'whois.arin.net';
	
	if (!$ipaddress = gethostbyname($ipaddress)) {
		
		$msg .= 'Can&rsquo;t perform lookup without an IP address.'. "\n\n";
		
	} else {
		
		if (!$sock = fsockopen($server, 43, $num, $error, 20)) {
			
			unset($sock);
			$msg .= 'Timed-out connecting to $server (port 43).'. "\n\n";
			
		} else {
			
			// fputs($sock, "$ipaddress\n");
			fputs($sock, "n $ipaddress\n");
			$buffer = '';
			while (!feof($sock)) $buffer .= fgets($sock, 10240); 
			fclose($sock);
			
		}
		
		if (stripos($buffer, 'ripe.net')) {
			
			$nextServer = 'whois.ripe.net';
			
		} elseif (stripos($buffer, 'nic.ad.jp')) {
			
			$nextServer = 'whois.nic.ad.jp';
			$extra = '/e'; // suppress JaPaNIC characters
			
		} elseif (stripos($buffer, 'registro.br')) {
			
			$nextServer = 'whois.registro.br';
			
		}
		
		if (isset($nextServer)) {
			
			$buffer = '';
			$msg .= 'Deferred to specific whois server: '. $nextServer .'...'. "\n\n";
			
			if (!$sock = fsockopen($nextServer, 43, $num, $error, 10)) {
				
				unset($sock);
				$msg .= 'Timed-out connecting to '. $nextServer .' (port 43)'. "\n\n";
				
			} else {
				
				fputs($sock, $ipaddress . $extra . "\n");
				while (!feof($sock)) $buffer .= fgets($sock, 10240);
				fclose($sock);
				
			}
		}
		
		$replacements = array("\n", "\n\n", "");
		$patterns = array("/\\n\\n\\n\\n/i", "/\\n\\n\\n/i", "/#(\s)?/i");
		$buffer = preg_replace($patterns, $replacements, $buffer);
		$buffer = htmlentities(trim($buffer), ENT_QUOTES, 'UTF-8');
		
		// $msg .= nl2br($buffer);
		$msg .= $buffer;
		
	}
	
	return $msg;
}

$whois = shapeSpace_whois_lookup($ipaddress);



// check ip address
if (!$ipaddress || !preg_match("/^[\w\d\.\-]+\.[\w\d]{1,4}$/i", $ipaddress)) { 
	exit('Error: Invalid Address');
}



// whitelist bots
if (preg_match("/(pywikibot|jenkins-bot|travisbot|Translation updater bot)/", $useragent)) {
	header('Location: /', true, 302);
	exit;
}



// check bot
$fp = fopen($filename, 'r') or die('<p>Error: Data File</p>');
while ($line = fgets($fp)) {
	
	$u = explode(' ', $line);
	
	if ($u[0] === $ipaddress) {
		
		++$badbot;
		break;
		
	}
	
}
fclose($fp);



// log bot & display message
if ($badbot === 0) {
	
	$fp = fopen($filename, 'a+');
	fwrite($fp, $ipaddress .' - '. $method .' - '. $protocol .' - '. $date .' - '. $useragent . "\n");
	fclose($fp);
	
	
	
// 1st visit (warning) ?>

	If you are a human seeing this page go into your websites root folder /blackhole/ <br>
	and open the file named blackhole.dat<br>
    Search and delete your ip from the blacklist.<br>
	to fork this repository visit https://github.com/jehovahsays/hiddenwiki<br>

<?php 



// 2nd+ visit (banned)
} elseif ($badbot > 0) {
	
	$message   = $date . "\n\n";
	$message  .= 'URL Request: '. $request . "\n";
	$message  .= 'IP Address: '. $ipaddress . "\n";
	$message  .= 'User Agent: '. $useragent . "\n\n";
	$message  .= 'Whois Lookup: '. "\n\n" . $whois . "\n";
	
	mail($recip, $subject, $message, 'From: '. $from);
	
echo '
	
	If you are a human seeing this page go into your websites root folder /blackhole/ <br>
	and open the file named blackhole.dat<br>
    Search and delete your ip from the blacklist.<br>
	to fork this repository visit https://github.com/jehovahsays/hiddenwiki<br>

	';
	

	
}
exit;
