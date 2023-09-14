<?php

if($_POST['git_pull'] == 'git_pull') {
	shell_exec('git pull');
	// Need to use HTTP_CF_CONNECTING_IP because Cloudflare Tunnels works behind a proxy to serve the site
	// https://stackoverflow.com/questions/14985518/cloudflare-and-logging-visitor-ip-addresses-via-in-php
	shell_exec('wall "Git Pull Complete at ' . date('Y-m-d H:i:s') . ' by ' . $_SERVER['HTTP_CF_CONNECTING_IP'] . ' as ' . $_SERVER['PHP_AUTH_USER'] . '"');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>The Barracks Admin - Git Pull</title>
</head>

<body>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<input type="command" value="git_pull" name="git_pull" hidden>
		<input type="submit" value="Git Pull">
	</form>
</body>

</html>