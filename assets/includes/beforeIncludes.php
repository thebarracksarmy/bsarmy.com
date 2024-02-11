<?php

// Start the session on every page so we can use session variables if they exist
session_start();

// Set HTTP headers 
header("Cache-Control: max-age=604800, must-revalidate");
header('Content-Type: text/html; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: no-referrer-when-downgrade');
header('Feature-Policy: accelerometer \'none\'; camera \'none\'; geolocation \'none\'; gyroscope \'none\'; magnetometer \'none\'; microphone \'none\'; payment \'none\'; usb \'none\'');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
header('Server: None-of-your-business server (v1.0), -22GB RAM, 15PB eMMC storage, 15GHz 13-core CPU, 69PB/s bandwidth');

if($_SERVER['SERVER_NAME'] == "bsarmy.com") {
	$cacheVersion = "prod";
} else if($_SERVER['SERVER_NAME'] == "dev.bsarmy.com") {
	$cacheVersion = "dev".time();
	$debug = true;

	// Set debug cookie
	setcookie("debug", "true", time() + (86400 * 30), "/");
}




if ($debug = true) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
} else {
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(0);
}

// If the user is not logged in and they are trying to access a page they need to 
// be logged in to view, then redirect them to the login page
if (isset($auth_required)) {
	if ($auth_required) {
		if (!isset($_SESSION["id"])) {
			header("Location: /login/index.php");
		}
	}
}

