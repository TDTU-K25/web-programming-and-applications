function renderMovie(id) {
	fetch(
		`https://api.themoviedb.org/3/movie/${id}?api_key=e9e9d8da18ae29fc430845952232787c`
	)
		.then((response) => response.json())
		.then((data) => {
			let companies = [...data.production_companies].reduce((accumulate, company) => {
				accumulate.push(`<a style="color: purple;" href="">${company.name}</a>`)
				return accumulate;
			}, []).join(", ")
			let countries = [...data.production_countries].reduce((accumulate, country) => {
				accumulate.push(`<a style="color: purple;" href="">${country.name}</a>`)
				return accumulate;
			}, []).join(", ")
			let genres = [...data.genres].reduce((accumulate, genre) => {
				accumulate.push(`<a style="color: purple;" href="">${genre.name}</a>`)
				return accumulate;
			}, []).join(", ")
			let year = data.release_date.split("-")[0]
			let html = `
		<div class="row">
			<div class="col-6" style="margin-top: 25px;">
				<div class="text-center">
					<div style="text-align: center;">
						<img style="width: 350px;" class="card-img-top rounded" src="${"https://image.tmdb.org/t/p/original" + data.poster_path}">
					</div>
					<a href="" class="btn btn-danger" style="margin-top: 20px;">Xem phim</a>
				</div>
			</div>

			<div class="col-6" style="margin-top: 25px;">
				<div class="item">
					<h3 style="color:purple; font-family: 'Oswald', sans-serif; margin-bottom: 10px;"></h3>
					<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Đạo diễn: 
						<a style="color: purple;">Đang cập nhật</a>
					<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Quốc gia: ${countries} 
					<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Năm sản xuất: 
						<a href="" style="color: purple;">${year}</a>
					</p>
					<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Thời lượng: <span href="" style="color: purple;">${data.runtime} phút</span></p>
					<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Thể loại: ${genres}</p>
					<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Lượt xem: <span href="" style="color: purple;">${data.popularity}</span></p>
					<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">NSX: ${companies}
				</div>
			</div>
		</div>`;
			return html
		})
		.then((html) => {
			$("#content").html(html);
		});
}
