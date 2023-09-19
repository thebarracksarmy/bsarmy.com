<?php

/*

Path: includes/db_templates.php
Author: Lucas Burlingham
Last Modified: 17 SEP 23 17:43 by LB

*/
require_once 'db.php';

function log_server_command(string $admin_username, $ip,  $description, int $category) {

	$epoch_time = time();
	$category = get_log_category($category);

	// log to logs/admin_logs.log
	shell_exec('echo ' . $epoch_time . ', \"' . $description . '\", ' . $admin_username . ', ' . $ip . ', \"' . $category . '\" >> /var/www/html/logs/admin_logs.log');

	
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

function insert_user(string $username, string $name, string $bio, int $permissions, int $reputation) {

	global $conn;
	
	$username = 'test';
	$name = 'test';
	$bio = 'test bio';

	$last_login_epoch = time();
	$username = htmlentities($username);
	$name = htmlentities($name);
	$bio = htmlentities($bio);
	$permissions = 00111100; // (not superadmin)(not forum mod)(na)(na)(na)(na)(no strikes)(not banned)
	$reputation = 0;

	// https://www.php.net/manual/en/mysqli.quickstart.multiple-statement.php
	$sql = "
	INSERT INTO `user_nonpii-data` (`username`, `last_login_epoch`) VALUES ('" . $username . "', '" . time() . "');
	INSERT INTO `user_nonpii-data` (`last_login_epoch`, `username`, `name`, `bio`, `permissions`, `reputation`) VALUES ('" . $last_login_epoch . "', '" . $username . "', '". $name . "', '". $bio . "', '". $permissions ."', '". $reputation .");
	INSERT INTO `user_pii-data` (`username`) VALUES ('" . $username . "'); JOIN `user_nonpii-data` ON `user_pii-data`.`id` = `user_nonpii-data`.`id`;
	";


	$result = mysqli_multi_query($conn, $sql);
	
	// if the result is false (0) then log the error and stop
	if (!$result) {
		log_server_command('lburlingham', 'localhost', 'insert_user', '4');
		die('Error: ' . mysqli_error($conn));
	// otherwise log the result and close the connection
	} else {
		log_server_command('lburlingham', 'localhost', 'insert_user', '4');
		mysqli_close($conn);
	}
}

// Default value = no strikes, not banned, not superuser, not forum mod
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



?>