<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/db_templates.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';

$auth_required = true;

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

	<?php require $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>


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
					<!-- Get phone number -->
					<div class="form-group">
						<label for="phone_number" class="form-label fw-bold">Phone Number</label>
						<div class="input-group mb-3">
							<span class="input-group-text">+1</span>
							<input type="tel" class="form-control" id="phone_number" name="phone_number" required>
						</div>
						<div class="invalid-feedback">
							Please input a valid ten-digit phone number including the area code.
						</div>
						<p class="text-muted fst-italic">We'll send you a text with a verfication code. You'll enter it on the next screen.</p>
					</div>
					<!-- Submit button -->
					<div class="form-group">
						<button type="submit" class="btn outline-dark-green">Send Code</button>
					</div>
				</form>

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

										// Get the values from the form and set them to the hidden input
										// This is so we can pass the full name to the server
										// var first_name = document.getElementById('first_name').value
										// var last_name = document.getElementById('last_name').value
										// var full_name = first_name + ' ' + last_name;
										// console.log(full_name);
									}

									form.classList.add('was-validated')
								}, false)
							})
					})()
				</script>

</body>