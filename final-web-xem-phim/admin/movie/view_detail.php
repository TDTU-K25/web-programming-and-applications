<?php session_start(); ?>
<?php if (isset($_GET['id'])) {
	$movie_id = $_GET['id'];
} else {
	$_SESSION['error'] = 'Movie không tồn tại';
	header('location: index.php');
	exit;
} ?>
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

	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>

	<!--Font awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Notify -->
	<script src="../../js/notify.js"></script>
</head>

<?php
require_once "../../connect.php";
$sql = "SELECT * from movie where id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param('i', $movie_id);
$stm->execute();
$result_set = $stm->get_result();
$movie_info = $result_set->fetch_assoc();
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
					<div class="d-flex justify-content-between">
						<h4>Chi tiết phim</h4>
						<a class="btn btn-primary" href="index.php">Back</a>
					</div>
				</div>
				<div class="">
					<!-- Movie -->
					<div class="row">
						<div class="col-xs-12 col-md-6 col-lg-4" style="margin-top: 25px;">
							<div class="text-center">
								<div style="text-align: center;">
									<img class="card-img-top rounded" src="<?php if (str_starts_with($movie_info['poster'], 'http')) {
																				echo $movie_info['poster'];
																			} else {
																				echo "images/" . $movie_info['poster'];
																			} ?>" alt="">
								</div>
							</div>
						</div>
						<!-- Item 2 -->
						<div class="col-xs-12 col-md-6 col-lg-5" style="margin-top: 25px;">
							<div class="item">
								<h3 style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;"><?= $movie_info['name'] ?></h3>
								<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Đạo diễn: <b><a href="" style="color: black;">Đang cập nhật</a></p></b>
								<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Quốc gia: <b><a href="" style="color: black;">Đang cập nhật</a></p></b>
								<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Năm sản xuất:
									<b><a href="" style="color: black;"><?= $movie_info['release_date'] ?></a></b>
								</p>
								<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Thời lượng: <b href="" style="color: black;"><?= $movie_info['runtime'] ?> phút</b></p>
								<?php $result_set_genres = $conn->query("SELECT * from movie_genre inner join genre on movie_genre.genre_id = genre.id where movie_genre.movie_id = $movie_id"); ?>
								<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Thể loại:
									<?php $row_genre = $result_set_genres->fetch_assoc(); ?>
									<b><a href="" style="color: black;"><?= $row_genre['name'] ?></a></b>
									<?php while ($row_genre = $result_set_genres->fetch_assoc()) { ?>
										- <b><a href="" style="color: black;"><?= $row_genre['name'] ?></a></b>
									<?php } ?>
								</p>
								<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Lượt xem: <b href="" style="color: black;"><?= number_format($movie_info['popularity'] * 1000, 0, '.', ',')?></b></p>
								<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">NSX: <b href="" style="color: black;">Đang cập nhật</b></p>
								<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Mô tả: <b href="" style="color: black;"><?= $movie_info['description']?></b></p>
								<p style="color:black; font-family: 'Oswald', sans-serif; margin-bottom: 10px;">Nguồn video: <b href="" style="color: black;"><?= $movie_info['src']?></b></p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</body>

</html>