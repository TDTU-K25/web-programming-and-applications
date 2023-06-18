<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Material Symbols and Icons - Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php require_once "../connect.php" ?>

<body>
	<div class="mt-3 text-center">
		<button id="getInfoMovieBtn" class="btn btn-primary">Click here to get info of movie</button>
		<br>
		<br>
		<button id="getTypeBtn">Click here to get genres and add to db</button>
		<br>
		<br>
		<button id="getListCountryBtn">Click here to get countries and add to db</button>
	</div>
	<script>
		// idea get with fetch then insert with fetch
		let list_imdb_id = ["tt14874302", "tt21986198", "tt26689543", "tt12823454", "tt15163652", "tt15333984", "tt23330084", "tt20899952", "tt16953666", "tt12193804", "tt14402146", "tt15289312", "tt13614388", "tt21448540", "tt2353868", "tt13216846", "tt7013708", "tt7111864", "tt5884796", "tt11687104", "tt18924468", "tt23697628", "tt19704920", "tt14187472", "tt22769820", "tt10640346", "tt14201576", "tt11492524", "tt23924182", "tt15829754", "tt13457926", "tt26458228", "tt9383752", "tt15793076", "tt19766334", "tt13364008", "tt23030444", "tt25049966", "tt11891068", "tt9114286", "tt14826022", "tt12121582", "tt21816892", "tt15015460", "tt16420502", "tt23173132", "tt10833378", "tt13103732", "tt26215632", "tt12372438", "tt6986990", "tt15426740", "tt6826120", "tt25134270", "tt17640752", "tt15262634", "tt20198774", "tt15486810", "tt8760708", "tt9737876", "tt14873054", "tt22394702", "tt22352848", "tt4586828", "tt15441472", "tt8005118", "tt14085258", "tt22811298", "tt11569658", "tt16127696", "tt12835186", "tt24640474", "tt15334430", "tt19758112", "tt8593824", "tt7693316", "tt14138650", "tt3915174", "tt22247502", "tt23950956", "tt18953258", "tt22308008", "tt24806922", "tt7326608", "tt15690636", "tt25406946", "tt22258178", "tt18395072", "tt25396646", "tt18260368", "tt7560830", "tt16377888", "tt9764362", "tt6160448", "tt18688184", "tt3447590", "tt11564570", "tt10298840", "tt12003946", "tt22307204", "tt15721088", "tt21220842", "tt15205434", "tt13624384", "tt18178194", "tt13098300", "tt14781026", "tt21663620", "tt21072238", "tt22334238", "tt23867800", "tt22494914", "tt23622516", "tt20215392", "tt11696276", "tt23747062", "tt24082346", "tt13055982"];

		let apiKey = "e9e9d8da18ae29fc430845952232787c";

		$('#getTypeBtn').click(function(event) {
			fetch(`https://api.themoviedb.org/3/genre/movie/list?api_key=e9e9d8da18ae29fc430845952232787c`)
				.then((response) => response.json())
				.then((data) => {
					let list_genre = data.genres;
					list_genre.forEach(function(element) {
						let genre = element.name;
						$.post("../api/genre/add.php", {
							genre
						}, function(data, status) {
							if (status == "success") {
								console.log(`add ${genre} to db successfully`);
							}
						})
					})
				})
		})

		$('#getListCountryBtn').click(function(event) {
			fetch(`https://api.themoviedb.org/3/configuration/countries?api_key=e9e9d8da18ae29fc430845952232787c`)
				.then((response) => response.json())
				.then((data) => {
					let list_country = data;
					list_country.forEach(function(element) {
						let country = element.english_name;
						$.post("../api/country/add.php", {
							country
						}, function(data, status) {
							if (status == "success") {
								console.log(`add ${country} to db successfully`);
							}
						})
					})
				})
		})

		let video_src = "https://2embed.org/embed/movie?imdb=";
		let imageUrl = "https://image.tmdb.org/t/p/original";
		let youtubeUrl = "https://www.youtube.com/watch?v=";


		$('#getInfoMovieBtn').click(function(event) {
			list_imdb_id.forEach(function(imdb_id) {
			fetch(`https://api.themoviedb.org/3/movie/${imdb_id}?api_key=e9e9d8da18ae29fc430845952232787c`)
				.then((response) => response.json())
				.then((data) => {
					// console.log(data)
					// imdb_id = "tt13055982";
					let name = data.original_title
					let description = data.overview
					let popularity = data.popularity
					let poster = null;
					let trailer = null
					let release_date = data.release_date
					let runtime = data.runtime
					let video = video_src + imdb_id;
					let genres = data.genres
					// console.log(video)



					// Get poster
					fetch(`https://api.themoviedb.org/3/movie/${imdb_id}/images?api_key=e9e9d8da18ae29fc430845952232787c`, {})
						.then(response => response.json())
						.then(data => {
							poster = imageUrl + data.posters[0].file_path
							console.log(poster)
						}).then(() => {
							// Get Trailer
							fetch(`https://api.themoviedb.org/3/movie/${imdb_id}/videos?api_key=e9e9d8da18ae29fc430845952232787c`, {})
								.then(response => response.json())
								.then(data => {
									if (data.results[0] !== undefined) {
										trailer = youtubeUrl + data.results[0].key
									}
									console.log(trailer)

									$.post('../api/movie/add.php', {
										name,
										description,
										popularity,
										poster,
										trailer,
										release_date,
										runtime,
										video,
										imdb_id
									}, function(response, status) {
										if (status == "success") {
											console.log(response)
											let movie_id = response.data
											genres.forEach(function(genre) {
												// Get genre id
												let name = genre.name
												let genre_id = null
												$.post('../api/genre/get.php', {
													name
												}, function(response, status) {
													if (status == "success") {
														genre_id = response.data.id
													}
													$.post('../api/movie_genre/add.php', {
														genre_id,
														movie_id
													}, function(response, status) {
														if (status == "success") {
															console.log(response.data.id)
														}
														$.post()
													}, 'json')
												}, 'json')
											})
										}
									}, 'json')
								})
						})
				})
			})
		})
	</script>
</body>

</html>