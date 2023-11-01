<?php

/*

Purpose: 

Allow users to signup for SMS and email alerts for monthly DFAC schedules.
Provides links to the DFACs' Facebook page and the DFACs' website.
Replicates and builds on information found in the DFACs' monthly schedules.

TODO:
.ics file for each DFAC, all DFACS, and each DFAC's monthly schedule
Show what DFACs are open at the current time, plus driving time
Directions to each DFAC

1000M goals:
DFAC Rating system
DFAC event system (aka Taco Tuesday, Pizza Friday, etc.)

*/

// require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/db_templates.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';

$full_month = strtolower(date('F'));
$month = date('m');
$year = date('Y');
$base = "liberty";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DFAC Schedules | THE BARRACKS</title>

	<!-- Use includes to insert snippets of code that will be reused in every page -->
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/head.php'; ?>
</head>

<body>
	<!-- The navbar won't change so insert it for a more consistant exprience -->
	<!-- TODO: figure out how to pass the active page to make it aria accessable -->
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>

	<section class="py-5 text-center container">
		<div class="row py-lg-3">
			<h3 class="h3">
				<?php echo date('F Y'); ?> &middot; <span class="text-muted" disabled>
					Fort Liberty, NC
				</span>
			</h3>
			<!-- Show JPG version of schedule for the current month -->
			<!-- Image name syntax is as follows: -->
			<!-- /DFAC/schedules/YYYY/MMM/liberty_mmmmm_yyyy.jpg -->
			<!-- /DFAC/schedules/YYYY/MMM/liberty_mmmmm_yyyy.pdf -->
			<!-- /DFAC/schedules/YYYY/MMM/liberty_mmmmm_yyyy.png -->

			<div class="container">
				<div class="row">
					<div class="col">

						<?php
							$filename = $base . '_' . $full_month . '_' . $year . '.jpg';
							if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/DFAC/schedules/' . $year . '/' . $month . '/' . $filename)) {

								$schedule = <<<EOT
								<a href='/DFAC/schedules/$year/$month/$filename' target="_blank" rel="noopener noreferrer">
									<img src='/DFAC/schedules/$year/$month/$filename' alt="Fort Liberty, NC DFAC Schedule for date('F Y') " class="img-fluid" />
								</a>
								<!-- Show links to download different versions -->
								<br>
								<hr style="width: 50%;" class="mx-auto my-1">
								<div class="text-muted mt-1">
									Download a different format: 
								EOT;

								echo $schedule;

									// iterate through each format and output a link to it
									$formats = ['pdf', 'png', 'jpg'];

									foreach ($formats as $format) {
										// Prepare filename
										$format_upper = strtoupper($format);
										$base = "liberty";
										$filename = $base . '_' . $full_month . '_' . $year . '.' . $format;

										// Construct link
										$href = <<<EOT
										<a href="/DFAC/schedules/$year/$month/$filename" target="_blank" rel="noopener noreferrer" class="text-muted"> $format_upper version </a>&middot;
										EOT;

										// if it's the last element in the array, don't add the middot
										if ($format == end($formats)) {
											$href = substr($href, 0, -9);
										}


										// Output link to page
										echo $href;
									}

							} else {
								echo '<p class="text-muted">Schedule for '. date('F Y') .' not found. Please check back later.<p>';
								echo '<p class="text-muted">If you believe this is an error, please email <a href="mailto:support@bsarmy.com">support@bsarmy.com</a>.</p>';
							}
							
								?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="container text-center py-5">
		<div class="row">
			<div class="col">
				<h3>
					Archived Schedules:
				</h3>
				<p class="text-muted">
					<!-- None at the moment. Check back next month! -->
					<?php
						$year = date('Y');

						$yearsavaliable = scandir($_SERVER['DOCUMENT_ROOT'] . '/DFAC/schedules/');
						$monthsavaliable = scandir($_SERVER['DOCUMENT_ROOT'] . '/DFAC/schedules/' . $year .'/');

						// remove the first two elements of the arrays (.) and (..)
						array_splice($yearsavaliable, 0, 2);
						array_splice($monthsavaliable, 0, 2);
						// Remove gen_alt_filetypes.php from the array (always gonna be the last one since it's not a number)
						array_pop($yearsavaliable);



						// sort numerically so we can get the elements before the current month
						asort($yearsavaliable, SORT_NUMERIC);
						asort($monthsavaliable, SORT_NUMERIC);

						$monthsbefore = array_pop($monthsavaliable); // remove the current (last in array) month from the array
											
						// print_r($monthsavaliable);
						foreach ($monthsavaliable as $month) {
							// Generate a list for each month with a link to the schedule in each format
							$monthname = date('F', mktime(0, 0, 0, $month, 10));
							$monthname = strtolower($monthname);
							$monthnameNormal = ucfirst($monthname);
							
							echo "<p>$monthnameNormal $year:</p>";
							foreach ($formats as $format) {
								// Prepare filename
								$format_upper = strtoupper($format);
								$base = "liberty";
								$filename = $base . '_' . $monthname . '_' . $year . '.' . $format;

								// Construct link
								$href = <<<EOT
								<a href="/DFAC/schedules/$year/$month/$filename" target="_blank" rel="noopener noreferrer" class="text-muted"> $format_upper version </a>&middot;
								EOT;

								// if it's the last element in the array, don't add the middot
								if ($format == end($formats)) {
									$href = substr($href, 0, -9);
								}

								// Output link to page
								echo $href;
							}

						}
						?>
				</p>
			</div>
		</div>
	</section>
	<?php
			// Add footer to page
			require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/footer.php';
		?>
</body>

</html>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/afterIncludes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/db_disconnect.php';

?>