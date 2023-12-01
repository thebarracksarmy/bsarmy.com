<?php

/*

For admins to manage users.
Shows a table of all users with their attributes.

TODO: Add pagination, search, sorting, delete, edit, etc.

*/



require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/db_templates.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/beforeIncludes.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Manage Users</title>

	<!-- Use includes to insert snippets of code that will be reused in every page -->
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/head.php'; ?>
</head>

<body>
	<!-- The navbar won't change so insert it for a more consistant exprience -->
	<!-- TODO: #9 figure out how to pass the active page to make it aria accessable -->
	<?php require $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/nav.php'; ?>

	<div class="table-responsive">
		<table class="table container table-hover">
			<thead>
				<tr>
					<?php
					$column = array("#","Username","Name","Date Joined","Last Login","Phone Number","SMS Gateway","Branch","Duty Station","Permissions","Pay Grade","Opted in to DFAC SMS?");

					foreach ($column as $item) {
						echo '<th scope="col">' . $item . '</th>';
					}
					?>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php

					$userList = get_all_users();

					// Get the total number of users
					$total = count($userList);

					// Output a row for each user
					foreach ($userList as $user) {
						echo '<tr>';
						// Output a column for each user attribute
						// Keep track of the index so we can use it to format items
						$index = 0;
						foreach ($user as $item) {
							// Iterate the index
							$index += 1;

							if ($item === null || $item === '') {
								$item = '<span class="text-muted">N/A</span>';
							}

							// If the item is a date, make it human readable, otherwise format it as a phone number
							if ($index === 4 || $index === 5) {
								$item = date('Y-m-d H:i:s', $item);
							}
							
							if ($index === 6) {
								// Get the first digit of the phone number (US country code)
								$countryCode = 1;

								// Get the next 3 digits (area code)
								$areaCode = substr($item, 0, 3);

								// Get the next 3 digits (prefix)
								$prefix = substr($item, 3, 3);

								// Get the last 4 digits (line number)
								$lineNumber = substr($item, 6, 4);
								
								$item = '+' . $countryCode . ' (' . $areaCode . ') ' . $prefix . '-' . $lineNumber;
							}

							if ($index === 11) {
								$item = 'E'	. $item;							
							}


							if ($index === 12) {
								if ($item===1) {
									$item = 'Yes';
								} else  if ($item===0) {
									$item = 'No';
								}
							}

							echo '<td>' . $item . '</td>';
						}
						// Unset the index so we can use it again if needed
						unset($index);

						echo '</tr>';
					}
					?>
				</tr>
				<tr>
					<td colspan="7">Total Users: <?php echo $total; ?></td>
				</tr>
			</tbody>
		</table>
	</div>

	<?php
	// Add footer to page
	require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/elements/footer.php';
	?>
</body>

</html>