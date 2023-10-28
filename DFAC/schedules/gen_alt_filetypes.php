<?php

// get all files in current month directory and add to array

// get current month and year
$month = strtoupper(date('M'));
$year = date('Y');

echo "month: $month<br>";
echo "year: $year<br>";

$dir = __dir__ . "/$year/$month/";
echo "dir: $dir<br>";

$files = scandir($dir);

// remove the first two elements of the array (.) and (..)
array_shift($files);
array_shift($files);

print_r($files);
echo "<br>";


// check if there are schedules for the current month in different formats

$format_not_found = [];
$formats_needed = ['jpg', 'png', 'pdf'];

// Check for schedules in each format
foreach ($formats_needed as $format ) {
	$pattern = "/^liberty_$month\w{0,}_$year\.$format$/i";
	$matches = preg_grep($pattern, $files);

	// if there are schedules for the current month in the currently being checked format
	if (!empty($matches)) {
		echo "Schedule for the current month found in $format format.<br>";

	// add $format to the array named format_not_found because it was not found
	} else {
		echo "No schedules for the current month in $format format found.<br>";

		// add $format to the array named format_not_found
		array_push($format_not_found, $format);
	}
}

// echo count($formats_needed);
// echo count($format_not_found);

// if there are missing formats, then generate them from the existing schedule found
if (count($formats_needed) == 0) {
	echo "No schedules for the current month found in any format.<br>";

// If all formats are found
} elseif (count($format_not_found) == 0) {
	echo "Schedules for the current month found in all formats.<br>";

	// if there are missing formats, then generate them from the existing schedule found
} else {
	
	echo "Schedules for the current month found in at least one format. Generating missing formats...<br>";

	// get the name of the schedule files that were found
	$formats_found = array_diff($formats_needed, $format_not_found);

	echo "Formats found: ";
	print_r($formats_found);
	echo "<br>";
	echo "Formats not found: ";
	print_r($format_not_found);
	echo "<br>";

	foreach ($format_not_found as $format) {
		// get the first format found (probably JPG)
		$from_format = $formats_found[0];

		$full_month = strtolower(date('F'));

		$convert_command = 'convert -quality 100 '. $dir . 'liberty_' . $full_month . '_' . $year . '.' . $from_format . ' ' . $dir . 'liberty_' . $full_month . '_' . $year . '.' . $format; 
		
		echo "Convert command: $convert_command<br>";

		$status = shell_exec($convert_command);

		if ($status) {
			echo "Successfully converted schedule to $format format.<br>";
		} else {
			echo "Failed to convert schedule to $format format.<br>";
		}
	}
}


// TODO: if there are no schedules for the current month, then email the head of bsarmy.com at support@bsarmy 
