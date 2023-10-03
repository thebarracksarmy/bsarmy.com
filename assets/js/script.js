// Initialize service worker

if ('serviceWorker' in navigator) {
	window.addEventListener('load', () => {
		navigator.serviceWorker.register('service-worker.js')
			.then((reg) => {
				console.log('Service worker registered.', reg);
			});
	});

	// Check for updates
	navigator.serviceWorker.addEventListener('controllerchange', () => {
		if (confirm('A new version of this page is available. Reload?')) {
			window.location.reload();
		}
	});

	// if the date is within the first week of the month, show the prompt
	// This is to give the user a chance to update the DFAC schedules
	const today = new Date();
	const dayOfMonth = today.getDate();
	if (dayOfMonth <= 7) {
		navigator.serviceWorker.ready.then((reg) => {
			reg.update();
		});
	}
}

