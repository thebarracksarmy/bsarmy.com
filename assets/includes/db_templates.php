<?php

/*

Path: includes/db_templates.php
Author: Lucas Burlingham
Last Modified: 17 SEP 23 17:43 by LB

*/



require_once 'dbconnect.php';

function log_server_command(string $admin_username, $ip,  $description, int $category) {

	global $debug;
	
	$epoch_time = time();
	$category = get_log_category($category);

	// log to logs/admin_logs.log
	shell_exec('echo ' . $epoch_time . ', \"' . $description . '\", ' . $admin_username . ', ' . $ip . ', \"' . $category . '\" >> /var/www/html/logs/admin_logs.log');

	if ($debug==true) {
		echo 'echo ' . $epoch_time . ', \"' . $description . '\", ' . $admin_username . ', ' . $ip . ', \"' . $category . '\" >> /var/www/html/logs/admin_logs.log';
	}
}

function get_log_category(int $category_id) {
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

function insert_new_user(string $username, string $name, $phone_number, string $phone_carrier, string $military_branch, string $military_base_name, int $user_pay_grade, bool $dfac_sms_optin) {

	global $conn;
	$date_joined_epoch = time();
	$last_login_epoch = $date_joined_epoch;
	$home_location = "Feature not yet implemented";
	$user_bio = "Feature not yet implemented";
	// $dfac_sms_optin = "FALSE";


	$username = mysqli_real_escape_string($conn, $username);
	$name = mysqli_real_escape_string($conn, $name);
	$phone_number = mysqli_real_escape_string($conn, $phone_number);
	$phone_carrier = mysqli_real_escape_string($conn, $phone_carrier);
	$military_base_name = mysqli_real_escape_string($conn, $military_base_name);
	$user_pay_grade = mysqli_real_escape_string($conn, $user_pay_grade);
	$username = htmlentities($username);

	$sql = "INSERT INTO user_data (username, name, date_joined_epoch, phone_number, phone_carrier, military_branch, military_base_name, last_login_epoch, user_pay_grade, home_location, user_bio, dfac_sms_optin) VALUES ('" . $username . "', '" . $name . "','" . $date_joined_epoch . "', '" . $phone_number . "', '" . $phone_carrier . "', '" . $military_branch . "', '" . $military_base_name . "', '" . $last_login_epoch . "', '" . $user_pay_grade . "', '" . $home_location . "', '" . $user_bio . "', '" . $dfac_sms_optin . "')";

	echo "SQL: " . $sql . "<br>";

	$result = $conn->query($sql);

	if (!$result) {
		die('Error: ' . mysqli_error($conn));
	} else {
		log_server_command('lburlingham', 'localhost', 'insert_new_user', '2');
		mysqli_close($conn);
		return $result;
	}

}

// Default value = no strikes, not banned, not superuser, not forum mod
// Not actually used in the code right now (it will be used for the admin panel and upgrading user permissions later)
// Database default is non admin no bans no strikes (111100)
function permission_calculator(int $superuser, int $forum_mod=0, int $strikes=0, int $banned=0) {
	$permissions = 0;
	// if true, add the value to the permissions
	if ($superuser) {
		$permissions += 10000000;
	}

	if ($forum_mod) {
		$permissions += 01000000;
	}

	if ($strikes) {
		$permissions += 00010000;
	}

	if ($banned) {
		$permissions += 00001000;
	}

	return $permissions;
}
	
function get_user(string $username) {
	global $conn;

	$sql = "SELECT * FROM `user_nonpii-data` WHERE `username` = '" . $username . "';";

	$result = mysqli_query($conn, $sql);
	
	if (!$result) {
		die('Error: ' . mysqli_error($conn));
	}
	
	return $result;
}
	
function get_all_users() {
    global $conn;

    $sql = "SELECT * FROM `user_nonpii-data`;";
    $result = mysqli_query($conn, $sql);

	$result = json_encode($result);
    // if (!$result) {
    //     die('Error: ' . mysqli_error($conn));
    // } else {
    //     $users = array();
    //     while ($row = mysqli_fetch_object($result)) {
    //         $users[] = $row;
    //     }

    //     log_server_command('lburlingham', 'localhost', 'get_all_users', '2');
    //     mysqli_close($conn);

    //     return $users;
    // }

	return $result;
}

function get_user_by_id(int $id) {
	global $conn;

	$sql = "SELECT * FROM `user_nonpii-data` WHERE `id` = '" . $id . "';";

	$result = mysqli_query($conn, $sql);
	
	if (!$result) {
		die('Error: ' . mysqli_error($conn));
	}
	
	return $result;
}

function get_user_by_name(string $name) {
	global $conn;

	$sql = "SELECT * FROM `user_nonpii-data` WHERE `name` = '" . $name . "';";

	$result = mysqli_query($conn, $sql);
	
	if (!$result) {
		die('Error: ' . mysqli_error($conn));
	}
	
	return $result;
}


// Listing functions

// function new_listing() {
// 	global $conn;


// 	$query = "INSERT INTO listing (owner_username, title, description, start_date_epoch, listing_duration, listing_price, listing_location, listing_location_radius, listing_status, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
// 	$stmt = $conn->prepare($query);
// 	$stmt->bind_param("sssiifssis", $owner_username, $title, $description, $start_date_epoch, $listing_duration, $listing_price, $listing_location, $listing_location_radius, $listing_status, $payment_method);
// 	$listing_status = 'active'; // provide a value for the listing_status column
// 	$stmt->execute();
// }

// Email sms functions\

function get_sms_gateway ($id) {

	global $conn;

	$sql = "SELECT phone_number, phone_carrier FROM `user_data` WHERE `id` = '" . $id . "';";

	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$row['phone_number'] = htmlentities($row['phone_number']);
			$row['phone_carrier'] = htmlentities($row['phone_carrier']);
			$gateway_address = $row['phone_number'] . $row['phone_carrier'];
			log_server_command('lburlingham', 'localhost', 'get_sms_gateway', '2');
			// Such as 1234567891@vtext.com
			return $gateway_address;
		}
	} else {
		die ("Error: " . mysqli_error($conn));
	}
			
	if (!$result) {
		die('Error: ' . mysqli_error($conn));
	}
}




// include_once 'db_disconnect.php';

?>