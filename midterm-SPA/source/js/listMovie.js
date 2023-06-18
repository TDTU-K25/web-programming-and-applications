function renderListMovie(page=1) {
	fetch(
		`https://api.themoviedb.org/3/movie/now_playing?api_key=e9e9d8da18ae29fc430845952232787c&page=${page}`
	)
		.then((response) => response.json())
		.then((data) => {
			let html = `<div class="row">`;
			data.results.forEach((result) => {
				html += `
<div class="col-lg-3 col-md-4 col-6 mt-3">
	<a class="movie-link" href="#movie-${result.id}">
		<div class="card">
			<img class="card-img-top" src="${"https://image.tmdb.org/t/p/original" + result.poster_path
						}" alt="Card image">
			<div class="card-img-overlay p-0 d-flex flex-column justify-content-end">
				<div style="background-color: rgba(0,0,0,0.5);">
					<h6 class="card-title text-uppercase mb-0 text-truncate" style="color:orange;">${result.original_title
						}</h6>
					<p class="card-text text-white text-truncate">${result.original_title}</p>
				</div>
			</div>
		</div>
	</a>
</div>`;
			});
			html += `
			</div>
			<nav class="mt-3">
				<ul class="pagination">
					<li class="page-item">
					<a class="page-link" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
					</li>
					<li class="page-item"><a class="page-link" href="#listMovie-1">1</a></li>
					<li class="page-item"><a class="page-link" href="#listMovie-2">2</a></li>
					<li class="page-item"><a class="page-link" href="#listMovie-3">3</a></li>
					<li class="page-item">
					<a class="page-link" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
					</li>
				</ul>
			</nav>`;
			return html;
		})
		.then((html) => {
			$("#content").html(html);
		});
}