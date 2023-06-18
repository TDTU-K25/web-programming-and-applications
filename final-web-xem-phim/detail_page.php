<?php session_start();
if (isset($_SESSION['id'])) {
	$user_id = $_SESSION['id'];
}

require_once "connect.php";

if (!isset($_GET['id'])) {
	$_SESSION['error'] = "Movie not found";
	header("location: index.php");
	exit;
} else {
	$movie_id = $_GET['id'];
	$movie_info = $conn->query("SELECT * FROM movie where id = $movie_id")->fetch_assoc();
	if ($movie_info == null) {
		$_SESSION['error'] = "Movie not found";
		header("location: index.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail Page</title>
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<!-- Notify -->
	<script src="js/notify.js"></script>
	<!-- Custom Theme files -->
	<!-- theme-style -->
	<link href="css/style_detail_page.css" rel="stylesheet" type="text/css" media="all" />

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>

	<!-- <link rel="stylesheet" href="css/etalage.css">
	<script src="js/jquery.etalage.min.js"></script> -->

	<!--Font awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?php  ?>

<body>
	<?php require_once "navbar.php" ?>

	<!--Content-->
	<div class="container">
		<div class="row">
			<!-- Movie -->
			<div class="col-xs-12 col-md-6 col-lg-4" style="margin-top: 25px;">
				<div class="text-center">
					<div style="text-align: center;">
						<img class="card-img-top rounded" src="<?php if (str_starts_with($movie_info['poster'], 'http')) {
																	echo $movie_info['poster'];
																} else {
																	echo "images/poster/" . $movie_info['poster'];
																} ?>" alt="">
					</div>
					<a href="video_page.php?id=<?= $movie_id ?>" class="btn btn-danger" style="margin-top: 20px;">Xem phim</a>
				</div>
			</div>

			<!-- Item 2 -->
			<div class="col-xs-12 col-md-6 col-lg-5" style="margin-top: 25px;">
				<div class="item">
					<h3 style="color:yellow; font-family: 'Oswald', sans-serif; margin-bottom: 10px;"><?= $movie_info['name'] ?></h3>
					<?php $result_set_directors = $conn->query("SELECT * from movie_director inner join director on movie_director.director_id = director.id where movie_director.movie_id = $movie_id"); ?>
					<p style="color:#f1f1f1; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Đạo diễn: 
						<?php if($result_set_directors->num_rows == 0) { ?>
							<a style="color: yellow;">Đang cập nhật</a>
						<?php } else { $row_director = $result_set_directors->fetch_assoc(); ?>
						<a style="color: yellow;"><?=$row_director['name']?></a>
						<?php while($row_director = $result_set_directors->fetch_assoc()) { ?>
						- <a style="color: yellow;"><?=$row_director['name']?></a>
						<?php } } ?></p>
					<p style="color:#f1f1f1; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Quốc gia: <a href="" style="color: yellow;">Đang cập nhật</a></p>
					<p style="color:#f1f1f1; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Năm sản xuất:
						<a href="search_page.php?year=<?php $year = explode('-', $movie_info['release_date'])[0]; echo $year;?>" style="color: yellow;"><?= $year ?></a>
					</p>
					<p style="color:#f1f1f1; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Thời lượng: <span href="" style="color: yellow;"><?=$movie_info['runtime']?> phút</span></p>
					<?php $result_set_genres = $conn->query("SELECT * from movie_genre inner join genre on movie_genre.genre_id = genre.id where movie_genre.movie_id = $movie_id"); ?>
					<p style="color:#f1f1f1; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Thể loại:
						<?php $row_genre = $result_set_genres->fetch_assoc(); ?>
						<a href="search_page.php?genre=<?=$row_genre['id']?>" style="color: yellow;"><?=$row_genre['name']?></a>
						<?php while($row_genre = $result_set_genres->fetch_assoc()) { ?>
						- <a href="search_page.php?genre=<?=$row_genre['id']?>" style="color: yellow;"><?=$row_genre['name']?></a>
						<?php } ?>
					</p>
					<p style="color:#f1f1f1; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Lượt xem: <span href="" style="color: yellow;"><?=number_format($movie_info['popularity'] * 1000, 0, '.', ',');?></span></p>
					<p style="color:#f1f1f1; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">NSX: <span href="" style="color: yellow;">Đang cập nhật</span></p>
				</div>

				<!--Rating star-->
				<hr style="height:2px;border-width:0;color:gray;background-color:gray">
				<p style="color:#f1f1f1; font-family: 'Oswald', sans-serif; margin-bottom: 15px;">Đánh giá (<span id="numberOfRate"><?php
																																	echo $conn->query("SELECT * FROM rate WHERE movie_id = $movie_id")->num_rows ?></span> lượt)
				</p>
				<div class="center" style="width: 180px;">
					<div class="stars">
						<input type="radio" id="five" name="rate" value="5" class="star">
						<label for="five"></label>
						<input type="radio" id="four" name="rate" value="4" class="star">
						<label for="four"></label>
						<input type="radio" id="three" name="rate" value="3" class="star">
						<label for="three"></label>
						<input type="radio" id="two" name="rate" value="2" class="star">
						<label for="two"></label>
						<input type="radio" id="one" name="rate" value="1" class="star">
						<label for="one"></label>
						<!-- <span class="result"></span> -->
					</div>
				</div>
			</div>

			<div class="col-lg-3 d-none d-lg-block" style="margin-top: 25px;">
				<div class="row">
					<?php require_once "sidebar.php"; ?>
				</div>
			</div>
		</div>

		<!-- Trailer -->
		<?php if (!str_starts_with($movie_info['trailer'], 'http')) { ?>
			<div class="mt-5">
				<h4 style="color: yellow;">Trailer</h4>
				<video controls src="<?="video/trailer/" . $movie_info['trailer'];?>"></video>
			</div>
		<?php } else { ?>
			<div class="mt-5">
				<h4 style="color: yellow;">Trailer</h4>
				<p class="text-white">Phim hiện chưa có trailer</p>
			</div>
		<?php } ?>

		<!--Tab-->
		<div class="tab-container col-md-12 col-lg-9">
			<ul class="tab-header">
				<li name="tab-1" class="active" onclick="tabClicked(this)">DIỄN VIÊN</li>
				<li name="tab-2" onclick="tabClicked(this)" style="width: 150px;">NỘI DUNG PHIM</li>
			</ul>

			<div class="tab-content">
				<div id="tab-1" class="tab active">
					<p>
						<?php
						$movie_id = $movie_info['id'];
						$result_set_actors = $conn->query("SELECT actor.* from movie_actor inner join actor on movie_actor.actor_id = actor.id where movie_actor.movie_id = $movie_id ");
						if ($result_set_actors->num_rows == 0) {
							echo "Đang cập nhật";
						} else {
							while($row_actor = $result_set_actors->fetch_assoc()) { ?>
							<a style="color: white;"><?=$row_actor['name']?></a>
							<br>
						<?php	}
						}?>
					</p>
				</div>
				<div id="tab-2" class="tab">
					<p>
						<?= $movie_info['description'] ?>
					</p>
				</div>
			</div>
		</div>
		<script src="js/detail_page.js"></script>
		<?php
		if (isset($user_id)) {
			$movie_id = $movie_info['id'];
			$result = $conn->query("SELECT score FROM rate WHERE movie_id = $movie_id and user_id = $user_id");
			$score = null;
			if ($result->num_rows == 1) {
				$score = $result->fetch_assoc()['score'];
			}
		?>
			<script>
				$(document).ready(function() {
					let movie_id = <?= $movie_id ?>;
					
					let user_id = <?= $user_id ?>

					$(".star").click(function(event) {
						let score = $(this).attr("value");
						$.get('api/rating/get.php', {
							movie_id,
							user_id
						}, function(data, status) {
							if (data.isRate) {
								$.post('api/rating/update.php', {
									movie_id,
									user_id,
									score
								}, function(data, status) {
									if (status === "success") {
										$.notify("Update Rating successfully", "success");
										// Update rating star in client side
										$(`.star[value="${score}"`).eq(0).prop("checked", "true");
									}
								}, "json").fail(function(xhr, status, error) {
									$.notify("Update rating failed", "error");
								});
							} else {
								$.post('api/rating/add.php', {
									movie_id,
									user_id,
									score
								}, function(data, status) {
									if (status === "success") {
										$.notify("Rating successfully", "success");
										// Update rating star in client side
										$(`.star[value="${score}"`).eq(0).prop("checked", "true");
										// Update number of rate
										let currentNumberOfRate = parseInt($('#numberOfRate').text())
										$('#numberOfRate').text(currentNumberOfRate + 1)
									}
								}, "json").fail(function(xhr, status, error) {
									$.notify("Rating failed", "error");
								});
							}
						}, 'json')
					});


					$(".star[value=<?= $score ?>]").eq(0).prop("checked", "true");
				})
			</script>
		<?php } else { ?>
			<script>
				$(".star").click(function(event) {
					$.notify("Vui lòng đăng nhập để rating", "error");
					$('#loginModal').modal('show');
				})
			</script>
		<?php } ?>
	</div>

	<!-- Footer -->
	<?php require_once "footer.html"; ?>
	<!-- End Footer -->
	<script src="js/live_search.js"></script>
</body>

</html>