document.addEventListener("click", (event) => {
	event.preventDefault();
	const { target } = event;
	let aElement = target.closest("a");
	if (!aElement) {
		return;
	}
	route(aElement);
});

const route = (aElement) => {
	window.history.pushState("", "", aElement.getAttribute("href"));
	routeHandler();
};

const routeHandler = () => {
	const location = window.location.hash.substring(1);
	let locationParts = location.split("-");
	if (locationParts.length > 1) {
		identify = parseInt(locationParts[1]);

		switch (locationParts[0]) {
			case "listMovie":
				renderListMovie(identify);
				break;
			case "movie":
				renderMovie(identify);
				break;
			default:
				console.log("404 Not Found");
		}
	} else {
		switch (location) {
			case "":
				renderHome();
				break;
			case "listMovie":
				renderListMovie();
				break;
			case "about":
				renderAbout()
				break;
			default:
				console.log("404 Not Found");
		}
	}
};

window.addEventListener("popstate", (event) => {
	const location = window.location.hash.substring(1);
	locationParts = location.split("-");
	if (locationParts.length > 1) {
		identify = parseInt(locationParts[1]);

		switch (locationParts[0]) {
			case "listMovie":
				renderListMovie(identify);
				break;
			case "movie":
				renderMovie(identify);
				break;
			default:
				console.log("404 Not Found");
		}
	} else {
		switch (location) {
			case "":
				renderHome();
				break;
			case "listMovie":
				renderListMovie();
				break;
			case "about":
				renderAbout()
				break;
			default:
				console.log("404 Not Found");
		}
	}
});

routeHandler(); // access page for the first time
