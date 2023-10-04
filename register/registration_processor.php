<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/db_templates.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';


if (isset($_POST['username'])) {

	// set values from POST
	$username = $_POST['username'];
	// Don't let the fullname be null, but if it is, fix it
	if (!isset($_POST['fullname']) || empty($_POST['fullname']) || $_POST['fullname'] == "" || $_POST['fullname'] == NULL) {
		$fullname = $_POST['first_name'] . ' ' . $_POST['last_name'];
	} else {
		// Default to the POST value
		$fullname = $_POST['fullname'];
	}

	$phone_number = (int) $_POST['phone_number'];
	$carrier_name = (string) $_POST['carrier_name'];
	$military_branch = (string) $_POST['military_branch'];
	$military_base_name = (string) $_POST['military_base_name'];
	$military_grade = (int) $_POST['military_grade'];
	$dfac_sms_optin = (bool) $_POST['dfac_sms_optin'];


	// escape the strings to prevent SQL injection
	$username = mysqli_real_escape_string($conn, $username);
	$fullname = mysqli_real_escape_string($conn, $fullname);
	$phone_number = mysqli_real_escape_string($conn, $phone_number);
	$carrier_name = mysqli_real_escape_string($conn, $carrier_name);
	$military_base_name = mysqli_real_escape_string($conn, $military_base_name);
	$military_grade = mysqli_real_escape_string($conn, $military_grade);


	// insert_user($username, $fullname, $bio, $phone_number, $carrier_name, $military_branch, $military_base_name, $pay_grade);
	$result = insert_new_user($username, $fullname, $phone_number, $carrier_name, $military_branch, $military_base_name, $military_grade, $dfac_sms_optin);

	echo $result;
	// if the result is true, then the user was inserted successfully
	if ($result) {
		// redirect to the login page
		header('Location: /login');
	} else {
		// otherwise, log the error and redirect to the register page
		log_server_command('lburlingham', 'localhost', 'registration_processor', '4');
		header('Location: /register');
	}
}


?>
