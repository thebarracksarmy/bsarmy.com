<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/db_templates.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';

// Load the Twilio PHP Helper Library 
require_once '/var/www/bsarmy.com/twilio-php/src/Twilio/autoload.php';

use Twilio\Rest\Client;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// if $_POST["phone_number"] is set, then process that, if not, then process the verification code
	if (isset($_POST["phone_number"]) && $_POST["phone_number"] != 'null' && $_POST["verification_code"] = 'null') {

		// Get the phone number from the POST request
		$phone_number = '+1' . $_POST["phone_number"];
		$_SESSION["phone_number"] = $phone_number;


		$sid = constant("TWILIO_ACCOUNT_SID");
		$token = constant("TWILIO_AUTH_TOKEN");
		$twilio = new Client($sid, $token);

		$verification = $twilio->verify->v2->services("VAc054b56484c015510b2216f96bbfdce3")
			->verifications
			->create($phone_number, "sms");

		echo $verification->status;
	} else if (isset($_POST["verification_code"]) && $_POST["verification_code"] != 'null') {
		// Get the verification code from the POST request
		$verification_code = $_POST["verification_code"];

		// Get the phone number from the session
		$phone_number = $_SESSION["phone_number"];

		$sid = constant("TWILIO_ACCOUNT_SID");
		$token = constant("TWILIO_AUTH_TOKEN");
		$twilio = new Client($sid, $token);

		$verification_check = $twilio->verify->v2->services("VAc054b56484c015510b2216f96bbfdce3")
			->verificationChecks
			->create([
				"to" => $phone_number,
				"code" => $verification_code
			]);

		echo $verification_check->status;
		// If the verification code is correct, then log the user in
		if ($verification_check->status == 'approved') {
			// Get the user's information from the database
			$user = get_user_by_phone_number($phone_number);

			$rows_keys = ["id", "username", "name", "date_joined_epoch", "phone_number", "phone_carrier", "military_branch", "military_base_name", "home_location", "last_login_epoch", "user_bio", "user_permissions", "user_reputation", "user_pay_grade", "dfac_sms_optin"];


			// Loop through the keys and set the session variables
			foreach ($rows_keys as $key) {
				unset($_SESSION[$key]);
				$_SESSION[$key] = $user[$key];
				// echo $key  . ": " . $user[$key] . "<br>";

				unset($key);
			}
			// Redirect the user to the home page
			header("Location: /index.php");
		} else {
			// If the verification code is incorrect, then redirect the user to the login page
			header("Location: /login/index.php");
		}
	}
} else {
	// If the verification process hasn't been started (aka the user hasn't submitted their phone number), then redirect the user to the login page
	header("Location: /login/index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login | THE BARRACKS</title>

	<!-- Use includes to insert snippets of code that will be reused in every page -->
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/head.php'; ?>
</head>

<body>

	<!-- The navbar won't change so insert it for a more consistant exprience -->
	<!-- TODO: figure out how to pass the active page to make it aria accessable -->

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="m-3 h1">Login</h1>
				<hr>
			</div>
		</div>
		<div class="row">
			<!-- Login form -->
			<div class="col">
				<form class="form row g-3 needs-validation" method="post" action="login_processor.php" enctype="multipart/form-data" novalidate>
					<!-- Get verification code -->
					<div class="form-group">
						<label for="verification_code" class="form-label fw-bold">Verification Code</label>
						<div class="input-group mb-3">
							<span class="input-group-text">Code: </span>
							<input type="tel" class="form-control" id="verification_code" name="verification_code" required>
						</div>
						<div class="invalid-feedback">
							Please input the six digit code we sent you. Please keep in mind that the code will expire in about 10 minutes.
						</div>
						<p class="text-muted fst-italic">Please put in the code. If you did not receive this code, please <a href="/login/index.php">try again</a> and make sure the phone number you submitted was the one you signed up with. </p>
					</div>
					<!-- Submit button -->
					<div class="form-group">
						<button type="submit" class="btn btn-outline-dark-green">Send Code</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		(function() {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function(form) {
					form.addEventListener('submit', function(event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()

							// TODO: #8 Need to check lengths of phone numbers and verification codes
						}

						form.classList.add('was-validated')
					}, false)
				})
		})()
	</script>



	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/footer.php'; ?>
</body>

</html>