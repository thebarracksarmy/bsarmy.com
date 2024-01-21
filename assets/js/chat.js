// Totally not from 
// https://developer.mozilla.org/en-US/docs/Web/API/Document/DOMContentLoaded_event
if (document.readyState === "loading") {
	// Loading hasn't finished yet
	document.addEventListener("DOMContentLoaded", DOMLoaded);
} else {
	// `DOMContentLoaded` has already fired
	DOMLoaded();
}



// Run only when the DOM is loaded
function DOMLoaded() {
	

	// Get all messages within the last 2 hours
	const socket = new WebSocket('wss://ntfy.sh/154511bsarmycom1/ws?since=2h');

	// When a message is received display it
	socket.addEventListener('message', function (event) {
		console.log(event.data);

		// Extract the date and message from event.data
		// Parse the JSON
		const data = JSON.parse(event.data);
		const message = data.message;

		// Get the hour:minute:second from the date (plus midigate the Y39K problem)
		const date = new Date(data.time * 1000);
		console.log(date);

		let hours = date.getHours();
		let minutes = date.getMinutes();
		let seconds = date.getSeconds();

		// left-pad time with 0 if it's less than 10
	
		if (minutes < 10) { minutes = '0' + minutes; }
		if (hours < 10) { hours = '0' + hours; }
		if (seconds < 10) { seconds = '0' + seconds; }

		// Create the time string
		const time = hours + ':' + minutes + ':' + seconds;

		// Create new list element to add to the chat window
		var li = document.createElement('li');
		li.classList.values = ['list-group-item'];
		li.id = data.id;

		// Create time element
		var timeElement = document.createElement('span');
		li.classList.values = ['badge', 'bg-secondary'];
		timeElement.classList.add('time');

		// Append the li element to the chat window
		li.appendChild(timeElement);
		li.appendChild(document.createTextNode(message));

		// Append the li element to the chat window
		document.getElementById('chat').appendChild(li);
	});


	// When the submit button is clicked
	document.getElementById('messageInput').addEventListener('submit', function (event) {

		// Prevent the form from submitting
		event.preventDefault();

		// Get the message from the input
		const message = document.getElementById('message').value;
		if (message === '') { return; }

		// Send the message to the server with authentication
		fetch('https://ntfy.sh/154511bsarmycom1', {
			method: 'POST',
			body: message
		});
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