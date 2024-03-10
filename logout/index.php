<?php

// Starts session, so don't need to start it again
include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';

// Destroy the session
session_destroy();

// Unset the session variables just in case
unset($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>You've been logged out...</title>

	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/head.php'; ?>

</head>

<body>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>

	<div class="p-5">
		<div class="container-fluid pb-5">
			<h1 class="mt-4 p-5 bg-dark-green text-white rounded"><i>Good bye!</i> You've been logged out.</h1>
			<p class="fst-italics">To return to the home page, click the home button or wait another few seconds to be redirected automatically. If you'd like to log back in, click the <i>login</i> button below. </p>
			<a href="/index.php" class="btn btn-light-tan">Return to Home</a>
			<a href="/login/index.php" class="btn outline-dark-green">Login</a>
			
		</div>
	</div>

	<?php
		// Add footer to page
		require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/footer.php';
	?>

	<script>
		// Redirect to home page after 5 seconds
		setTimeout(function () {
			window.location.href = "/index.php?logout=true";
		}, 5000);
	</script>
</body>

</html>
