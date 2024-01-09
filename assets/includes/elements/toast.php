<?php

// Shows a toast notification on the page
// https://getbootstrap.com/docs/5.3/components/toasts/

if (isset($_POST['title'])) {
	$page = $_POST['title'];
}

if (isset($_POST['content'])) {
	$content = $_POST['content'];
}


function placementFormat(string $placement="bottom-right") {
	// Get placement from $_POST if it exists, otherwise stick to the default value
	// https://stackoverflow.com/a/34869/13059535
	if(isset($_POST['placement'])) {
		$placement = placementFormat($_POST['placement']);
	}

	$placement = strtolower($placement);
	$placement = str_replace(" ", "-", $placement);

	switch ($placement) {
		case "top-left":
			$placement = "top-0 start-0";
			break;
		case "top-center":
			$placement = "top-0 start-50 translate-middle-x";
			break;
		case "top-right":
			$placement = "top-0 end-0";
			break;
		case "middle-left":
			$placement = "top-50 start-0 translate-middle-y";
			break;
		case "middle-center":
			$placement = "top-50 start-50 translate-middle";
			break;
		case "middle-right":
			$placement = "top-50 end-0 translate-middle-y";
			break;
		case "bottom-left":
			$placement = "bottom-0 start-0";
			break;
		case "bottom-center":
			$placement = "bottom-0 start-50 translate-middle-x";
			break;
		case "bottom-right":
			$placement = "bottom-0 end-0";
			break;
		default:
			$placement = "bottom-0 end-0";
			break;
	}
	return $placement;
}

placementFormat();

$timeNow = date("h:i:sa");

$echo = <<<EOT
<div aria-live="polite" aria-atomic="true" class="bg-body-secondary position-relative rounded-3">
	<div class="toast-container p-3">
		<div class="toast">
			<div class="toast-header">
			<strong class="me-auto">$title</strong>
			<small>$timeNow/small>
		</div>
		<div class="toast-body">
			$content
		</div>
	</div>
</div>
EOT;

echo $echo;

?>