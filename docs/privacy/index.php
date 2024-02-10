<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Privacy Policy - The Barracks</title>

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
		<p class="text-muted fst-italic my-3">Last Updated: 10 February 2024</p>
		<p>
			We collect no other information that you do not provide us, with the exception of your basic device information,
			which is logged by all web servers. We do not use this information, 
			and logs are kept only for the purpose of troubleshooting, and will never be shared. An example of what information is automatically collected can be found below.
		</p>
		<p>
			Additionally, we use Google Analytics to track user activity on our site, for the purpose of improving our site and user experience. 
			You may find this information at <a href="https://policies.google.com/technologies/partner-sites" target="_blank" rel="noopener noreferrer">https://policies.google.com/technologies/partner-sites</a> 
				and <a href="https://marketingplatform.google.com/about/analytics/terms/us/" target="_blank" rel="noopener noreferrer">https://marketingplatform.google.com/about/analytics/terms/us/</a>. -
			<i>Please note that this information may contain hints to the location you are accessing the site from, i.e, City & State that your ISP (internet service provider) is located.</i>
		</p>
		<p>
			We use cookies to store your session information, and to keep you logged in. 
			We also use cookies to store your theme preference, if you have selected one. 
			We do not use cookies for any other purpose.
		</p>


		<h2>Information Automatically Collected</h2>
		<p>
			When you visit this website, we automatically collect and store the following information about your visit:
		</p>
		<pre>
<?php
// 127.0.0.1 - - [10/Feb/2024:16:41:47 +0000] "GET /docs/privacy/ HTTP/1.1" 200 4564 "-" "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:122.0) Gecko/20100101 Firefox/122.0"
$string = '127.0.0.1 - - ['.date('d/M/Y:H:i:s O').'] "GET /docs/privacy/ '.$_SERVER['SERVER_PROTOCOL'].'" 200 4564 "-"'.$_SERVER['HTTP_USER_AGENT'].'"';
// Clean the user agent string to prevent XSS and other attacks
htmlentities($string);
htmlspecialchars($string);

echo $string;
?>
		</pre>
		<p>
			Please note that the IP address listed is <code>127.0.0.1</code>, which is the loopback address for our server. <i>This is not your IP address.</i>
			We do not collect your IP address, and we do not store it in our logs. For more information on how we accomplish this, please read about <a href="https://developers.cloudflare.com/cloudflare-one/connections/connect-networks/">Cloudflare Tunnels</a>.
	
	<h2>More informaiton on tracking on the Internet:</h2>
	<p>
		For more information about how tracking works on the internet, please visit <a href="https://www.eff.org/deeplinks/2022/01/privacy-when-you-need-it">https://www.eff.org/deeplinks/2022/01/privacy-when-you-need-it</a>.
		To see what information you give out when browsing the internet, please visit <a href="https://panopticlick.eff.org/">https://panopticlick.eff.org/</a>.
	</p>
	<?php
		// Add footer to page
		require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/footer.php';
	?>

</body>



</html>