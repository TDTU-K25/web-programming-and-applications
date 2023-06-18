<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shop Category</title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/shop-homepage.css" rel="stylesheet">
</head>

<?php require_once "connect.php" ?>

<body>
	<!-- Navigation -->
	<?php require_once "navbar.php" ?>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<div class="col-lg-3">

				<?php require_once "sidebar.php" ?>

			</div>
			<!-- /.col-lg-3 -->

			<div class="col-lg-9">
				<div class="row">

					<?php
					$sql = "SELECT p.*, c.name as brand from product p inner join category c on p.type = c.id where c.name = ?";
					$stm = $conn->prepare($sql);
					$stm->bind_param("s", $_GET['category']);
					$stm->execute();
					$result_set = $stm->get_result();
					while ($row = $result_set->fetch_assoc()) {
					?>
						<div class="col-lg-4 col-md-6 mb-4 mt-4">
							<div class="card h-100">
								<a href="#"><img class="card-img-top" src="<?= $row['image'] ?>" alt=""></a>
								<div class="card-body">
									<h4 class="card-title">
										<a href="#"><?= $row['name'] ?></a>
									</h4>
									<h5 style="color: #f47442">$<?= $row['price'] ?></h5>
									<p class="card-text"><?= $row['description'] ?></p>
									<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
								</div>
								<?php if (!empty($_SESSION['id'])) { ?>
									<div class="card-footer">
										<a href="add_to_cart.php?id=<?= $row['id'] ?>" class="btn btn-primary">Add to cart</a>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

	</div>
	<!-- Footer -->
	<?php require_once "footer.html" ?>

	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>