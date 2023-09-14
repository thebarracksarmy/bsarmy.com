<?php

include_once '../../creds.php';

# connect to DB
$conn = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

# check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {
	$db_connection_status = true;
}




?>