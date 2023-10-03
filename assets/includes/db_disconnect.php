<?php

global $conn;

if (isset($conn)) {
	mysqli_close($conn);
	if ($debug==true) {
		echo "Connection closed.";
	}
} else {
	if ($debug==true) {
		echo "No connection to close.";
	}
}