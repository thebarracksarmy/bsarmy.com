<?php

include_once '../../creds.php';


$DB_SERVER = constant('DB_SERVER');
$DB_USERNAME = constant('DB_USERNAME');
$DB_PASSWORD = constant('DB_PASSWORD');
$DB_NAME = constant('DB_NAME');

// Connect to DB
$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	$db_connection_status = true;
}

?>