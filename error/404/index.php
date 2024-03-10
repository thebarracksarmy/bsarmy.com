<?php

$description = "HTTP Error 404 - Page or resource not found.";
$image = "";
$url = "";
$type = "error";
$title = "404 - Page Not Found";


include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>404 - Page Not Found</title>

	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/head.php'; ?>

</head>

<body>
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>

	<div class="p-5 my-4 bg-body-tertiary rounded-3 centered">
		<div class="container-fluid py-5">
			<h1 class="display-5 fw-bold"><kbd>http error 404</kbd> Page or resource not found.</h1>
			<p class="fst-italics">Sorry, the page you are looking for does not exist.</p>
			<a href="/index.php" class="btn btn-light-tan">Return to Home</a>

			<!-- go back to page referrer or close page if not referred -->
			<?php
				if (isset($_SERVER['HTTP_REFERER'])) {
					echo '<a href="' . $_SERVER['HTTP_REFERER'] . '" class="btn outline-dark-green">Go back</a>';
				} else {
					// I have no idea what these extra single quotes (') do but they work
					echo '<a onClick="javascript:window.close(\'\',\'_parent\',\'\');" class="btn outline-dark-green">Go back</a>';
				}
			?>
			
		</div>
	</div>

	<?php
		// Add footer to page
		require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/footer.php';
	?>
</body>

</html>