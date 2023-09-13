<?php

if($_POST['git_pull'] == 'git_pull') {
	shell_exec('git pull');
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
	<form action="<?php echo $PHP_SELF ?>" method="POST">
		<input type="button" value="Run <kbd>git pull</kbd>">
	</form>
</body>

</html>