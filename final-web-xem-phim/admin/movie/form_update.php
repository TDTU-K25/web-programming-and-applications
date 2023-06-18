<?php 
session_start();
if (isset($_GET['id'])) {
	$movie_id = $_GET['id'];
} else {
	$_SESSION['error'] = 'Movie không tồn tại';
	header('location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

	<!-- Material Symbols and Icons - Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Notify -->
	<script src="../../js/notify.js"></script>
</head>

<?php
require_once "../../connect.php";
?>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 p-0">
				<?php require_once "../sidebar.html" ?>
			</div>
			<div class="col-10">
				<?php require_once "../account_box.php" ?>
				<div class="mt-3">
					<h4>Cập nhật phim</h4>
					<?php $movie_info = $conn->query("SELECT * from movie where id = $movie_id")->fetch_assoc(); ?>
					<form action="update.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" id="id" value="<?=$movie_id?>">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" placeholder="Movie Name" id="name" name="name" value="<?=$movie_info['name']?>">
						</div>
						<div class="form-group">
							<label for="">Trailer</label>
							<div>
								<label for="">Nguồn hiện tại:</label>
								<input class="form-control" type="text" name="oldTrailerSrc" id="oldTrailerSrc" value="<?=$movie_info['trailer']?>" readonly>
							</div>
							<div>
								<label for="trailer">Nguồn mới</label>
								<input type="file" class="form-control" id="trailer" name="trailer">
							</div>
						</div>
						<div class="form-group">
							<label for="runtime">Runtime</label>
							<input type="number" class="form-control" id="runtime" name="runtime" value="<?=$movie_info['runtime']?>">
						</div>
						<div class="form-group">
							<div>
								<span>Current poster</span>
								<img style="width: 100px" src="<?php if (str_starts_with($movie_info['poster'], 'http')) {
																	echo $movie_info['poster'];
																} else {
																	echo "../../images/poster/" . $movie_info['poster'];
																} ?>"  alt="">
								<input type="hidden" id="oldPosterSrc" name="oldPosterSrc" value="<?=$movie_info['poster']?>" readonly>
							</div>
							<label for="poster">Poster</label>
							<input type="file" class="form-control" id="poster" name="poster">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" id="description" cols="30" rows="5" class="form-control"><?=$movie_info['description']?></textarea>
						</div>
						<div class="form-group">
							<label for="release_date">Release Date</label>
							<input name="release_date" id="release_date" class="form-control" type="date" value="<?=$movie_info['release_date']?>">
						</div>
						<div class="form-group">
							<label for="genres">Genres</label>
							<select name="genres[]" id="genres" multiple>
								<?php
								$sql_genre = "SELECT * from genre";
								$result_genre = $conn->query($sql_genre);
								
								$sql_movie_genre = "SELECT genre_id from movie_genre where movie_id = $movie_id";
								$result_movie_genre = $conn->query($sql_movie_genre);

								$movie_genres = array();
								while($row_movie_genre = $result_movie_genre->fetch_assoc()) {
									$movie_genres[] = $row_movie_genre['genre_id'];
								}

								foreach ($result_genre as $row_genre) {
								?>	
									<option <?php if(in_array($row_genre['id'], $movie_genres)) {echo "selected";} ?> value="<?= $row_genre['id'] ?>"><?= $row_genre['name'] ?></option>
									<?php } ?>
									
							</select>
						</div>
						<div class="form-group">
							<label for="video">Video</label>
							<div>
								<label for="">Nguồn hiện tại:</label>
								<input class="form-control" type="text" name="oldVideoSrc" id="oldVideoSrc" value="<?=$movie_info['src']?>" readonly>
							</div>
							<div>
								<label for="">Nguồn mới:</label>
								<input type="file" class="form-control" id="video" name="video">
							</div>
							<div class="progress mt-2">
								<div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(function() {
			$('#submitBtn').click(function(event) {
				let id = $('#id').val()
				let name = $('#name').val()
				let trailer = $('#trailer').prop('files')[0]
				let oldTrailerSrc = $('#oldTrailerSrc').val()
				let runtime = $('#runtime').val()
				let poster = $('#poster').prop('files')[0]
				let oldPosterSrc = $('#oldPosterSrc').val()
				let description = $('#description').val()
				let release_date = $('#release_date').val()
				let genres = $('#genres').val()
				let video = document.getElementById('video').files[0];
				let oldVideoSrc = $('#oldVideoSrc').val()

				let formData = new FormData();
				formData.append('id', id);
				formData.append('name', name);
				formData.append('oldTrailer', oldTrailerSrc);
				formData.append('trailer', trailer);
				formData.append('runtime', runtime);
				formData.append('oldPoster', oldPosterSrc);
				formData.append('poster', poster);
				formData.append('description', description);
				formData.append('release_date', release_date);
				formData.append('genres', genres);
				formData.append('oldVideo', oldVideoSrc);
				formData.append('video', video);

				let xhr = new XMLHttpRequest();
				for (const [key, value] of formData.entries()) {
					console.log(key, value);
				}

				xhr.onload = function() {
					let response = JSON.parse(this.response)
					if (response.success) {
						$.notify("Upload movie successfully", "success");
						setTimeout(() => {
							location.reload();
						}, 2000);

					} else {
						$.notify("Upload movie failed", "error");
					}
				}

				xhr.upload.addEventListener('progress', (event) => {
					let loaded = event.loaded;
					let total = event.total;
					let percentage = Math.round(loaded / total * 100);

					$('.progress-bar').css('width', `${percentage}%`);
					$('.progress-bar').text(`${percentage}%`);
				})

				xhr.open("POST", "update.php");
				xhr.send(formData);
			})
		})
	</script>
</body>

</html>