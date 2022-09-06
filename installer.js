/*
 * https://stackoverflow.com/questions/52971082/how-to-create-an-offline-web-app-using-javascript
 * 
 * Thanks!
 */

self.addEventListener("install", (e) => {
	console.log("ServiceWorker: Installing Coachium into the browser's cache.");

	e.waitUntil(caches.open("Coachium").then((cache) => {
		console.log("ServiceWorker: Finished installing.");

		return cache.addAll([ "/" ]);
	}))
});

self.addEventListener("fetch", (e) => {
	e.respondWith(caches.match(e.request).then((response) => {
		if(response) {
			console.log("ServiceWorker: File " + e.request.url + " retrieved from cache.");
			return response;
		} else {
			return fetch(e.request);
		}
	}))
});
