$(function() {
	$("#searchBar").keyup(function(event) {
		let searchResult = $("#searchResult");
		let searchContent = $(this).val();
		if (searchContent.length === 0) {
			searchResult.hide();
		} else {
			searchResult.show();
		}
		searchResult.html("");
		$.get("api/movie/get.php", {
			searchContent
		}, function(response, status) {
			if (status == "success") {
				let movies = [...response.data];
				movies.forEach(function(movie) {
					let src = null;
					if (movie.poster.startsWith('https')) {
						src = `src="${movie.poster}"`;
					} else {
						src = `src="images/poster/${movie.poster}"`;
					}
					let html = `<a href="detail_page.php?id=${movie.id}" class="text-decoration-none">
					<div class="d-flex flex-row align-items-center p-2">
						<img class="" ${src} alt="Card image" style="height: 100px;">
						<div class="ml-3">
							<p class="mb-0 text-secondary" style="font-size: medium;">${movie.name}</p>
							<p class="mb-1 text-secondary" style="font-size: smaller;">1tr lượt xem</p>
						</div>
					</div>
					</a>`
					searchResult.append(html)
				})
			}

		}, "json")
	})
})