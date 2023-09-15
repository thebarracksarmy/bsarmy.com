<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db_templates.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/beforeIncludes.php';

// $userList = get_all_users();


?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Manage Users</title>


	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headIncludes.php'; ?>
</head>

<body>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/nav.php'; ?>


	<table class="table">
		<thead>
			<tr>
				<?php 

					$column = array('id', 'last_login_epoch', 'username', 'name', 'bio', 'permissions', 'reputation');

					foreach ($column as $item) {
						echo '<th scope="col">' . $item . '</th>';
					}
	
				?>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php

				// $userList = get_all_users();
				$userList = array(
					array('id' => 1, 'last_login_epoch' => 1, 'username' => 'test1', 'name' => 'test1', 'bio' => 'test1', 'permissions' => 'test1', 'reputation' => 'test1'),
					array('id' => 2, 'last_login_epoch' => 2, 'username' => 'test2', 'name' => 'test2', 'bio' => 'test2', 'permissions' => 'test2', 'reputation' => 'test2'),
					array('id' => 3, 'last_login_epoch' => 3, 'username' => 'test3', 'name' => 'test3', 'bio' => 'test3', 'permissions' => 'test3', 'reputation' => 'test3'),
					array('id' => 4, 'last_login_epoch' => 4, 'username' => 'test4', 'name' => 'test4', 'bio' => 'test5', 'permissions' => 'test4', 'reputation' => 'test4'),
					array('id' => 5, 'last_login_epoch' => 5, 'username' => 'test5', 'name' => 'test5', 'bio' => 'test5', 'permissions' => 'test5', 'reputation' => 'test5'),
				);
				 

				foreach ($userList as $user) {
					echo '<th scope="row">' . var_export($user) . '</th>';
				}
				// foreach ($userList as $user) {
				// 	echo '<td>' . $user['last_login_epoch'] . '</td>';
				// }
				// foreach ($userList as $user) {
				// 	echo '<td>' . $user['username'] . '</td>';
				// }
				// foreach ($userList as $user) {
				// 	echo '<td>' . $user['name'] . '</td>';
				// }
				// // figure out a drop down method for this 
				// foreach ($userList as $user) {
				// 	echo '<td>' . $user['bio'] . '</td>';
				// }
				// foreach ($userList as $user) {
				// 	echo '<td>' . $user['permissions'] . '</td>';
				// }
				// foreach ($userList as $user) {
				// 	echo '<td>' . $user['reputation'] . '</td>';
				// }
				?>
			</tr>
		</tbody>
	</table>

</body>