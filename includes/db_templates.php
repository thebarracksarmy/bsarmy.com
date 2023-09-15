<?php

include_once('db.php');

function log_server_command($admin_username, $ip, $description, $category) {
	// global so that we can use the $conn variable
	global $conn;

	$epoch_time = time();

	$category = get_log_category($category);

	$sql = "INSERT INTO bsarmy_main.admin_logs (epoch_time, description, admin_username, ip, category) VALUES ('" . $epoch_time . "', '" . $description . "', '" . $admin_username . "', '" . $ip . "', '" . $category . "');";

	$result = mysqli_query($conn, $sql);
	echo $sql;
	echo $result;

	if (!$result) {
		die('Error: ' . mysqli_error($conn));
	} else {
		mysqli_close($conn);
		echo 'Closed connection';
	}
	return $sql;
}


function get_log_category($category_id) {
	$categories = array(
		1 => '- server command',
		2 => '$ user command',
		3 => '$ user delete',
		4 => '$ user add',
		5 => '$ user edit',
		6 => '# admin user modify',
		7 => '# admin user ban',
		8 => '# admin user unban',
		9 => '# admin user delete'
	);

	return $categories[$category_id];

}

?>