<?php

// Start the session on every page so we can use session variables if they exist
session_start();


$debug = false;


if($debug = True) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

// If the user is not logged in and they are trying to access a page they need to 
// be logged in to view, then redirect them to the login page
if(isset($auth_required)) {
	if($auth_required === true) {
		if(!isset($_SESSION["id"])) {
			header("Location: /login/index.php");
		}
	}
}

?>