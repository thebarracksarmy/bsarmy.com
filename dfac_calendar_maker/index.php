<?php
// https://photos.app.goo.gl/UQNRFzuLLw7FTd2V6


$title = "The Barracks Army | DFAC Schedule Creator";
$url = "https://".$_SERVER['HTTP_HOST']."/";
$type = "website";
$description = 'Digital DFAC Schedule Creator.';
$image = "https://".$_SERVER['HTTP_HOST']."/assets/images/bsarmy.com_og-image.jpeg";



$dfacs = [
 'DEVIL DEN: BLDG B-1732<br>BASTOGNE DR',
 'SPEARS READY: BLDG M-5530<br>GOLDBERG ST',
 'FALCON CAFE: BLDG C-9453<br>GRUBER RD',
 'CULINARY OUTPOST KIOSK:<br>BLDG H-5718<br>KEDENBURG ST',
 'PANTHER INN: BLDG A-3556<br>BUTNER RD',
 'SWCS DFAC: BLDG D-3624<br>ARDENNES ST',
 'PROVIDER CAFE: BLDG 3-5103<br>LONG STREET',
 'TRIBE CAFE: BLDG X-3429<br>SPARTAN WAY',
];



function gen_table($dfac) {
	$year = date('Y');
	$month = date('m');

	$days = (int) cal_days_in_month(CAL_GREGORIAN, $month, $year);
	$first_day = (string) date('l', strtotime("{$year}-{$month}-01"));
	$last_day = (string) date('l', strtotime("{$year}-{$month}-{$days}"));
	$date_long = (string) strtoupper(date('F', strtotime("{$year}-{$month}-01")));


	$weekdays_shortened = (array) ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];


	switch ($first_day) {
		case 'Sunday':
			$first_day_num = 0;
			break;
		case 'Monday':
			$first_day_num = 1;
			break;
		case 'Tuesday':
			$first_day_num = 2;
			break;
		case 'Wednesday':
			$first_day_num = 3;
			break;
		case 'Thursday':
			$first_day_num = 4;
			break;
		case 'Friday':
			$first_day_num = 5;
			break;
		case 'Saturday':
			$first_day_num = 6;
			break;
	}

	switch ($last_day) {
		case 'Sunday':
			$last_day_num = 0;
			break;
		case 'Monday':
			$last_day_num = 1;
			break;
		case 'Tuesday':
			$last_day_num = 2;
			break;
		case 'Wednesday':
			$last_day_num = 3;
			break;
		case 'Thursday':
			$last_day_num = 4;
			break;
		case 'Friday':
			$last_day_num = 5;
			break;
		case 'Saturday':
			$last_day_num = 6;
			break;
	}


	// 0 plus $first_day_num index of the week
	$days_month_in_weeks = $first_day_num;

	// Number of days plus the offset of the first day of the month divided by 7
	$weeks_in_month = ceil(($days + $first_day_num) / 7);


	echo <<<EOT
		<section>
			<div class="col">
				<h1 id="dfac_name">$dfac</h1>
			</div>
			<div class="col">
				<table>
					<tr>
						<th style="background-color: navy; color: white;" colspan="7">
							<?php echo "$date_long $year"; ?>
						</th>
					</tr>
					<tr>
	EOT;
			foreach ($weekdays_shortened as $weekday) {
				echo "<th>{$weekday}</th>";
				}
					echo <<<EOT
					</tr>
					EOT;
					// Count up from 1
					$day = 1;
					for ($i = 0; $i < $weeks_in_month; $i++) { echo '<tr>' ; for ($j=0; $j < 7; $j++) { if ($days_month_in_weeks> 0) {
						echo '<td class="disable" disable></td>';
						$days_month_in_weeks--;
					} else { 
						if ($day <= $days) { echo "<td class=\" day\">{$day}</td>";
							$day++;
						} else {
							echo '<td class="disable" disable></td>';
						}
					}
				}
				echo '</tr>';
			}
	echo <<<EOT
				</table>
			</div>
		</section>
	EOT;
}



?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
		<?php require $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/head.php'; ?>

		
		<style>
		
		@media print {
			@page { 
				size: landscape;
				margin: .5in;
			}

			#print_button, header, footer {
				display: none;
			}
		}


		/* Global styles */
		body {
			font-family: Arial, sans-serif;
		}

		section {
			margin: 10px;
			border: 3px solid darkblue;
		}

		section * #dfac_name {
			background-color: darkblue;
			color: white;
			padding: 10px;
			margin: 10px;
			text-align: center;
			margin:auto;
			font-weight: bold;
		}

		/* Table styles */
		table {
			border-collapse: collapse;
		}

		table,
		th,
		td {
			border: 1px solid black;
			margin: 10px;
		}

		th,
		td {
			padding: 10px;
			user-select: none;
		}

		/* DFAC Schedule Color codes */
		.brk-lun-dinner {
			background-color: darkgreen;
			color: white;
		}

		.brk-lun-dinner-wh {
			background-color: darkblue;
			color: white;
		}

		.closed {
			background-color: red;
			color: black;
		}

		.closed-wh {
			background-color: blue;
			color: white;
		}

		.food-truck {
			background-color: purple;
			color: white;
		}

		.disable {
			background-color: grey;
		}
		</style>


	</head>

	<body>

	<?php require $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>

	<div class="container mt-4">
		<div class="row">
		<?php
			foreach ($dfacs as $dfac) {
				echo "<div class=\"col-md-6\">";
				gen_table($dfac);
				echo "</div>";
			}
		?>
		</div>
	</div>
				<div class="container" id="print_button">
					<div class="row">
						<div class="col">
							<button onclick="window.print()" class="btn btn-success">Print this page</button>
							<small>For best results, please uncheck "Show headers and footers", and make sure "Show backgrounds" is turned on and the orientation is set to "Landscape".</small>
						</div>
					</div>
				</div>
	<script>
		// For each click, rotate through the colors
		// darkgreen -> darkblue -> red -> blue -> purple -> darkgreen

		$(document).ready(function() {

			var colors = ['darkgreen', 'darkblue', 'red', 'blue', 'purple', 'white'];
			var color_index = 0;

			$('td.day').click(function() {
				$(this).css('background-color', colors[color_index]);
				color_index = (color_index + 1) % colors.length;
			});
		});


		// For each day of the month, assign a color code and popover depending on the class
		// For example, if the class is "brk-lun-dinner", the color code will be darkgreen and the popover will be "Breakfast, Lunch, Dinner"
		// on hover over the day, the popover will display the message "Breakfast, Lunch, Dinner"

		$(document).ready(function() {
			$('.day').each(function() {
				var class_name = $(this).attr('class');
				var popover = '';
				var color = '';

				switch (class_name) {
					case 'brk-lun-dinner':
						popover = 'Breakfast, Lunch, Dinner';
						color = 'darkgreen';
						text_color = 'white';
						break;
					case 'brk-lun':
						popover = 'Breakfast & Lunch';
						color = 'yellow';
						text_color = 'black';
						break;
					case 'brk-lun-dinner-wh':
						popover = 'Breakfast, Lunch, Dinner (Weekend/Holiday)';
						color = 'darkblue';
						text_color = 'white';
						break;
					case 'closed':
						popover = 'Closed';
						color = 'red';
						text_color = 'white';
						break;
					case 'closed-wh':
						popover = 'Closed (Weekend/Holiday)';
						color = 'blue';
						text_color = 'white';
						break;
					case 'food-truck':
						popover = 'Food Truck';
						color = 'purple';
						text_color = 'white';
						break;
				}

				$(this).css('background-color', color);
				$(this).attr('data-toggle', 'popover');
				$(this).attr('data-content', popover);

				// Set the text color to white if the background color is dark (NOT WORKING)
				if (color === 'darkgreen' || color === 'darkblue' || color === 'purple') {
					$(this).css('color', 'white');
				} else {
					$(this).css('color', 'black');
				}
			});

			$('[data-toggle="popover"]').popover();
		});
	</script>
	<script type="text/javascript">
			var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
			var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
				return new bootstrap.Popover(popoverTriggerEl);
			});
    	</script>
	<?php
	// Add footer to page
	require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/footer.php';

	// Don't put php closing tag at the end, it can cause problems with redirects and headers?
	require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/afterIncludes.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/db_disconnect.php';

	?>
	</body>

	</html>