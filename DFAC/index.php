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

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/db_templates.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';

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
							<a href="/DFAC/schedules/2023/OCT/liberty_october_2023.jpg" target="_blank" rel="noopener noreferrer">
								<img src="/DFAC/schedules/2023/OCT/liberty_october_2023.jpg" alt="Fort Liberty, NC DFAC Schedule for October 2023" class="img-fluid" />
							</a>
							<!-- Show links to download different versions -->
							<br>
							<hr style="width: 50%;" class="mx-auto my-1">
							<div class="text-muted mt-1">
								Download a different version:
								<a href="/DFAC/schedules/2023/OCT/liberty_october_2023.pdf" target="_blank" rel="noopener noreferrer" disabled class="text-muted">
									PDF version
								</a>
									&middot;
								<a href="/DFAC/schedules/2023/OCT/liberty_october_2023.png" target="_blank" rel="noopener noreferrer" disabled class="text-muted">
									PNG version
								</a>
								&middot;
								<a href="/DFAC/schedules/2023/OCT/liberty_october_2023.jpg" target="_blank" rel="noopener noreferrer">
									JPG version
								</a>	
							</div>
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
						None at the moment. Check back next month!
					</p>
				</div>
			</div>
		</section>
</body>

</html>