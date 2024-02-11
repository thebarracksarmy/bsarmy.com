<?php

// Yes, this is a JS file. Why? Because of this: 
header("Content-type: application/javascript");

// Set the user variable to the session owner's name or 'Guest'
// If the session variable 'name' is set, use it. Otherwise, use 'Guest'
if(isset($_SESSION['name'])) {
	$user_name = $_SESSION['name'];
	// Sanitize the user variable
	$user_name = htmlentities($user_name);
	$user_name = htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8');
} else {
	$user_name = 'Guest';
}

$chat_server = 'ntfy.sh/15df9e9811bsarmycom1';

?>

// Totally not from https://developer.mozilla.org/en-US/docs/Web/API/Document/DOMContentLoaded_event
if (document.readyState === "loading") {
	// Loading hasn't finished yet
	document.addEventListener("DOMContentLoaded", DOMLoaded);
} else {
	// `DOMContentLoaded` has already fired
	DOMLoaded();
}

// Get the debug cookie
const debug = document.cookie.split(';').find(c => c.includes('debug'));
if(debug) {
	console.debug('Debug mode enabled');
}

// Run only when the DOM is loaded
function DOMLoaded() {


	// Get all messages within the last 2 hours
	const socket = new WebSocket('wss://<?php echo $chat_server; ?>/ws?since=2h');

	// When a message is received display it
	socket.addEventListener('message', function (event) {

		if(debug) {
			console.log(event.data);

		}

		// Extract the date and message from event.data
		// Parse the JSON
		const data = JSON.parse(event.data);

		let message = data.message;

		// If the message is undefined, set it to a default message (the message is likely gone because it's a system message)
		if (message === undefined) {
			message = '<i class="text-muted">Connected to chat service.<i>';
			let user_name = 'System';
			console.info('Connected to chat service.');
		}

		let user_name = message.split('UN|')[1];
		message = message.split('UN|')[0];

		if (user_name === undefined) {
			user_name = 'System';
		} else {
			user_name = user_name.split('UN|')[0];
		}
		

		
		// Get the hour:minute:second from the date (plus mitigate the Y39K problem)
		const date = new Date(data.time * 1000);
		

		let hours = date.getHours();
		let minutes = date.getMinutes();
		let seconds = date.getSeconds();

		// left-pad time with 0 if it's less than 10

		if (minutes < 10) {
			minutes = '0' + minutes;
		}
		if (hours < 10) {
			hours = '0' + hours;
		}
		if (seconds < 10) {
			seconds = '0' + seconds;
		}

		// Create the message_prefix string that includes a user_name and the time
		const message_prefix = '<span class="badge bg-secondary time">' + hours + ':' + minutes + ':' + seconds + ' ' + user_name + '</span><br>';
		
		const li = document.createElement("li");

		li.id = data.id;
		li.classList.add('list-group-item');
		li.style = 'text-align: left;';

		finalMessage = message_prefix + " " + message;

		li.innerHTML = finalMessage;
		document.getElementById("chat").appendChild(li);
	});


	// When the submit button is clicked
	document.getElementById('messageInput').addEventListener('submit', function (event) {

		// Prevent the form from submitting
		event.preventDefault();

		// Get the message from the input
		let message = document.getElementById('message').value;
		if (message === '') {
			return;
		}

		const user_name = '<?php echo "UN|".$user_name; ?>';

		message = message + user_name;

		// Send the message to the server
		fetch('https://<?php echo $chat_server; ?>', {
			method: 'POST',
			body: message
		});

		console.log('Message sent: ' + message + ' by ' + user_name);
	});


	// When the toggle chat button is clicked toggle the chat window
	document.getElementById('activate-chat').addEventListener('click', function () {

		if (document.getElementById('chat').style.display === 'block') {
			// Hide the chat element
			document.getElementById('chat').style.display = 'none';

			console.info('Chat hidden');
		} else {
			// Show the chat element
			document.getElementById('chat').style.display = 'block';

			console.info('Chat shown');
		}

	});

}