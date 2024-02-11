// Initialize service worker

// 10 February 2024 - Service worker is not working as expected, disabling for now
// if ('serviceWorker' in navigator) {
// 	window.addEventListener('load', () => {
// 		navigator.serviceWorker.register('service-worker.js')
// 			.then((reg) => {
// 				console.log('Service worker registered.', reg);
// 			});
// 	});

// 	// Check for updates
// 	navigator.serviceWorker.addEventListener('controllerchange', () => {
// 		if (confirm('A new version of this page is available. Reload?')) {
// 			window.location.reload();
// 		}
// 	});

// 	// if the date is within the first week of the month, show the prompt
// 	// This is to give the user a chance to update the DFAC schedules
// 	const today = new Date();
// 	const dayOfMonth = today.getDate();
// 	if (dayOfMonth <= 7) {
// 		navigator.serviceWorker.ready.then((reg) => {
// 			reg.update();
// 		});
// 	}
// }



// Add a ban icon next to all disabled links
document.onload = () => {
	const disabledLinks = document.querySelectorAll('a[disabled]');
	const disabledLinksClassDeclared = document.querySelectorAll('a.disabled');
	
	disabledLinks.forEach((link) => {
		console.log(link);
		const icon = document.createElement('i');
		icon.classList.add('fas', 'fa-ban');
		link.appendChild(icon);
	});

	disabledLinksClassDeclared.forEach((link) => {
		console.log(link);
		const icon = document.createElement('i');
		icon.classList.add('fas', 'fa-ban');
		link.appendChild(icon);
	});
	console.info('Main JS loaded.');
}


