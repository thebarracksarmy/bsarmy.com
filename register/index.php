<?php

$file_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/db_templates.php';

if (file_exists($file_path)) {
	require_once($file_path);
} else {
	echo "Error: The file does not exist at path: $file_path";
}

$file_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';

if (file_exists($file_path)) {
	require_once($file_path);
} else {
	echo "Error: The file does not exist at path: $file_path";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Register - The Barracks</title>

	<!-- Use includes to insert snippets of code that will be reused in every page -->
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/head.php'; ?>
</head>

<body>
	<!-- The navbar won't change so insert it for a more consistant exprience -->
	<!-- TODO: figure out how to pass the active page to make it aria accessable -->
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>

	<!-- All Content -->

	<!-- Register headline -->


	<div class="container">

		<div class="row">
			<div class="col">
				<h1 class="m-3 h1">Register</h1>
				<hr>
			</div>
		</div>
		<div class="row">
			<!-- Registration form -->
			<div class="col">
				<form class="form row g-3 needs-validation" method="POST" action="registration_processor.php" novalidate>
					<!-- Gather fullname -->
					<div class="form-group">
						<label for="first_name" class="form-label fw-bold">Full name</label>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="First name" aria-label="First name" name="first_name" id="first_name" required>
							<input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="last_name" id="last_name" required>
							<!-- Value set with JS so we can have a full_name variable passed -->
							<input type="text" id="full_name" name="full_name" hidden>
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="form-label fw-bold">Username</label>
						<div class="input-group">
							<span class="input-group-text" id="username">@</span>
							<input class="form-control" type="text" name="username" id="username" placeholder="Username" aria-label="Username" required>
						</div>

					</div>
					<!-- Get phone number -->
					<div class="container-fluid">
						<div class="row">
							<div class="col">
								<label for="phone_number" class="form-label fw-bold">Phone Number</label>
								<div class="form-group">
									<!-- Get Phone number & carrier -->
									<div class="input-group mb-3">
										<span class="input-group-text">Phone Number</span>
										<input type="tel" class="form-control" id="phone_number" name="phone_number" required>
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text">Cell Phone Carrier</span>
										<select id="carrier_name" class="form-select" required>
											<?php

											$carriers_list = array(
												"AT&T" => "@sms.myboostmobile.com",
												"Boost Mobile" => "@cspire1.com",
												"C-Spire" => "@mailmymobile.net",
												"Consumer Cellular" => "@txt.att.net",
												"Cricket" => "@sms.cricketwireless.net",
												"Google Fi" => "@msg.fi.google.com",
												"H20 Wireless" => "@txt.att.net",
												"MetroPCS" => "@mymetropcs.com",
												"Mint Mobile" => "@mailmymobile.net",
												"Red Pocket" => "@text.republicwireless.com",
												"Republic Wireless" => "@messaging.sprintpcs.com",
												"Page Plus" => "@vtext.com",
												"T-Mobile" => "@tmomail.net",
												"Ting" => "@message.ting.com",
												"Tracfone" => "@mmst5.tracfone.com",
												"US Cellular" => "@email.uscc.net",
												"Verizon Mobile" => "@vtext.com",
												"Visible" => "@vmobl.com",
												"Xfinity Mobile" => "@vtext.com",
											);

											foreach ($carriers_list as $carrier_name_value => $carrier_name) {
												echo "<option value='$carrier_name'>$carrier_name_value</option>";
											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Upload profile picture -->
					<div class="form-group mb-3 ">
						<label for="profile_picture" class="form-label fw-bold">Profile Picture</label>
						<div class="input-group">
						<label class="input-group-text" for="profilepicture_upload">
								Upload Profile Picture</label>
							<input type="file" class="form-control" id="profilepicture_upload" name="profile_picture" accept="image/png, image/jpeg, image/gif">
							
						</div>
						<p class="text-muted fst-italics">PNG, JPG, or GIF files only.</p>
					</div>
					

					<!-- Get military information -->
					<div class="form-group mb-3">
						<label for="military_status" class="form-label fw-bold">Military Status</label>
						<div class="input-group">
							<label for="military_branch" class="input-group-text fw-bold">US Military Branch</label>
							<select class="form-select" id="military_branch" name="military_branch" required>
								<option value="Army">Army</option>
								<option value="Navy">Navy</option>
								<option value="Marines">Marines</option>
								<option value="Air Force">Air Force</option>
								<option value="Coast Guard">Coast Guard</option>
								<option value="Space Force">Space Force</option>
							</select>
						</div>
						<p class="text-muted fst-italics">
								(if you are on active orders in the National Guard, select the active component)
						</p>
						<div class="input-group">
							<label for="military_grade" class="input-group-text">Pay Grade</label>
							<select name="military_grade" id="military_grade" class="form-select">
								<?php foreach (range(1, 5) as $grade) { echo "<option value='$grade'>E-$grade</option>"; }?>
							</select>
						</div>
						
						</div>
					<!-- Submit button -->
					<div class="form-check mb-3">
						<input class="form-check-input" type="checkbox" value="yes" id="terms_conditions_checkbox" name="terms_conditions_checkbox" required>
						<label class="form-check-label" for="terms_conditions_checkbox">
							Check this box to agree to the
							<a href="documents/terms_conditions/" target="_blank">
								terms and conditions</a>.
							We will only send you text messages for account verification and password resets.
						</label>
					</div>
					<div class="col-12">
						<button class="btn btn-primary" type="submit">Sign Up</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		(function () {
	'use strict'

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.querySelectorAll('.needs-validation')

	// Loop over them and prevent submission
	Array.prototype.slice.call(forms)
		.forEach(function (form) {
			form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
				}

				form.classList.add('was-validated')
			}, false)
		})
	})()
	</script>
</body>

</html>