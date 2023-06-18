<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
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
	<script src="js/notify.js"></script>
	<!-- Custom -->
	<link rel="stylesheet" href="css/style_card.css">
	<link rel="stylesheet" href="css/style_sidebar.css">
</head>

<?php require_once "connect.php" ?>

<body>
	<?php require_once "navbar.php" ?>

	<?php require_once "toast.php" ?>

	<!-- Container -->
	<div class="container">
		<!-- First row -->
		<div class="row mt-3">
			<div class="col-lg-12">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<a href="detail_page.php?id=5"><img class="d-block w-100" src="images/banner/Babylon-Banner.png" alt="First slide" style="height: 500px"></a>	
						</div>
						<div class="carousel-item">
							<a href="detail_page.php?id=41"><img class="d-block w-100" src="images/banner/BlackPanther-Banner.jpg" alt="Second slide" style="height: 500px"></a>	
						</div>
						<div class="carousel-item">
							<a href="detail_page.php?id=89"><img class="d-block w-100" src="images/banner/PussInBoots-Banner.jpg" alt="Third slide" style="height: 500px"></a>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<!-- End First row -->

		<!-- Second row -->
		<?php
		$sql = "SELECT * FROM movie order by release_date desc LIMIT 4";
		$result = $conn->query($sql);
		?>
		<div class="row mt-3">
			<div class="col-lg-9 col-12">
				<!-- First row of col-9 -->
				<div class="row">
					<div class="col-lg-12">
						<div class="d-flex align-items-end justify-content-between">
							<h4 class="text-primary text-uppercase mb-0">Phim mới</h4>
							<a href="search_page.php">Xem tất cả</a>
						</div>
					</div>
					<?php foreach ($result as $row) {
						$movie_id = $row['id'];
					?>
						<?php require "card_movie.php" ?>
					<?php } ?>
				</div>
				<!-- End First row of col-9 -->
				<?php
				$sql = "SELECT * FROM movie order by popularity desc LIMIT 4";
				$result = $conn->query($sql);
				?>
				<!-- Second row of col-9 -->
				<div class="row mt-3">
					<div class="col-lg-12">
						<div class="d-flex align-items-end justify-content-between">
							<h4 class="text-primary text-uppercase mb-0">Phim đề cử</h4>
							<a href="search_page.php">Xem tất cả</a>
						</div>
					</div>
					<?php foreach ($result as $row) {
						$movie_id = $row['id'];
					?>
						<?php require "card_movie.php" ?>
					<?php } ?>
				</div>
				<!-- End Second row of col-9 -->

				<?php
				$sql = "SELECT * FROM movie LIMIT 4";
				$result = $conn->query($sql);
				?>
				<!-- Third row of col-9 -->
				<div class="row mt-3">
					<div class="col-lg-12">
						<div class="d-flex align-items-end justify-content-between">
							<h4 class="text-primary text-uppercase mb-0">Phim chiếu rạp</h4>
							<a href="search_page.php">Xem tất cả</a>
						</div>
					</div>
					<?php foreach ($result as $row) {
						$movie_id = $row['id'];
					?>
						<?php require "card_movie.php" ?>
					<?php } ?>
				</div>
				<!-- End Third row of col-9 -->
			</div>

			<div class="col-lg-3 d-none d-lg-block">
				<div class="row">
					<?php require_once "sidebar.php"; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php require_once "footer.html"; ?>
	<!-- End Footer -->

	<script>
		$(document).ready(function() {
			// Start: Rating

			// Get the forms we want to add validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});

			$('.fa-bookmark').click(function(event) {
				let movie_id = event.target.getAttribute('data-id');
				<?php if (isset($_SESSION['id'])) { ?>
					let user_id = <?= $_SESSION['id'] ?>;
				<?php } ?>
				if (event.target.style.color === "blue") {
					$.post("api/bookmark/add.php", {
						movie_id,
						user_id
					}, function(data, status) {
						if (status === "success") {
							$.notify("Bookmark successfully", "success");
						}
					}, "json").fail(function(xhr, status, error) {
						$.notify("Bookmark failed", "error");

					});
					event.target.style.color = "yellow";
				} else {
					$.post("api/bookmark/remove.php", {
						movie_id,
						user_id
					}, function(data, status) {
						if (status === "success") {
							$.notify("Remove bookmark successfully", "success");
						}
					}, "json").fail(function(xhr, status, error) {
						$.notify("Remove bookmark failed", "error");
					});
					event.target.style.color = "blue";
				}
				event.preventDefault(); // to prevent reloading page after bookmark or remove bookmark
			})

			// End: Rating
		})
	</script>
	<script src="js/live_search.js"></script>
</body>

</html>