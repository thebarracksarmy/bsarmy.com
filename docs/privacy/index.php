<?php

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
		<?php require $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>

		<!-- All Content -->

		<div class="container">
			<div class="mt-4 p-5 bg-dark-green text-white rounded">
			<h1>The Barracks | Privacy Policy</h1>
		</div>
		<p class="text-muted fst-italic my-3">Last Updated: 09 January 2023</p>
		<p>
			We collect no other information that you do not provide us, with the exception of your IP address, 
			which is logged by all web servers. We do not use this information, 
			and logs are kept only for the purpose of troubleshooting, and will never be shared.
		</p>
		<p>
			Additionally, we use Google Analytics to track user activity on our site, for the purpose of improving our site and user experience. 
			You may find this information at <a href="https://policies.google.com/technologies/partner-sites" target="_blank" rel="noopener noreferrer">https://policies.google.com/technologies/partner-sites</a> 
				and <a href="https://marketingplatform.google.com/about/analytics/terms/us/" target="_blank" rel="noopener noreferrer">https://marketingplatform.google.com/about/analytics/terms/us/</a>.
		</p>
		<p>
			We use cookies to store your session information, and to keep you logged in. 
			We also use cookies to store your theme preference, if you have selected one. 
			We do not use cookies for any other purpose.
		</p>
	<?php
		// Add footer to page
		require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/footer.php';
	?>

</body>



</html>