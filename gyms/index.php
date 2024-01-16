<?php


$description = "View information pertaining to the Fitness Centers on Fort Liberty, NC.";
$title = "Fitness Center Schedules | THE BARRACKS";
$url = "https://bsarmy.com/gyms/";
$image = "";
$type = "article";

$base = "liberty";


require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fitness Centers | THE BARRACKS</title>

	<!-- Use includes to insert snippets of code that will be reused in every page -->
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/head.php'; ?>
</head>

<body>
	<!-- The navbar won't change so insert it for a more consistant exprience -->
	<!-- TODO: figure out how to pass the active page to make it aria accessable -->
	<?php require $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>


	<!-- Current schedule -->
	<section class="py-5 text-center container">
		<div class="row py-lg-3">
			<h3 class="h3">
				<span class="text-muted" disabled>
					Fort Liberty, NC
				</span>
			</h3>

			<div class="container">
				<div class="row">
					<div class="col">
						<h3>
							Fitness Center Locations:
						</h3>
						<p>
							<a href="https://liberty.armymwr.com/application/files/8116/8675/6312/liberty-fitness-centers-location-map.jpg"
								target="_blank">
								<img src="images/liberty-fitness-centers-location-map.jpg"
									alt="Map of Fort Liberty, NC Fitness Center Locations" class="img-fluid">
							</a>
						</p>
					</div>
					<div class="col">
						<h3>
							Fitness Center Hours:
						</h3>
						<p>
							<a href="https://liberty.armymwr.com/application/files/2316/8599/7107/liberty-fitness_centers-PFC_Hrs_Ops_Srvcs_5Jun23.pdf"
								target="_blank" rel="noopener noreferrer">
								<img src="images/liberty-fitness_centers-PFC_Hrs_Ops_Srvcs_5Jun23.jpg"
									alt="Fort Liberty, NC Fitness Center Hours" class="img-fluid">
							</a>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col">
						These hours are subject to change. Please view <a
							href="https://liberty.armymwr.com/programs/fitness-centers" target="_blank"
							rel="noopener noreferrer">https://liberty.armymwr.com/programs/fitness-centers</a>
						for the most up-to-date information.
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<h3>
							Fitness Center Map:
						</h3>
						<p>
							
							<br>
							<iframe
								src="https://www.google.com/maps/d/embed?mid=19j9dt5PQQZ4MPFa1LUQyK4zLspGdSs8&ehbc=2E312F&noprof=1"
								width="640" height="480"></iframe>

								<!-- Yes I know its "deprecated", but still works. Suck it. -->
								<noframes>
									<a href="https://maps.app.goo.gl/tX2PebhymmTs4aR37" target="_blank"
										rel="noopener noreferrer">
										Fort Liberty, NC Fitness Centers Map
									</a>
								</noframes>
						</p>
						<p class="text-muted fs-italic">
							If this becomes outdated, please send an email to <a href="mailto:contact@bsarmy.com">contact@bsarmy.com</a>.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>