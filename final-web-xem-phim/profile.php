<?php session_start(); ?>
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
</head>

<?php require_once "connect.php" ?>

<body>
	<?php require_once "navbar.php" ?>

	<div class="container">
		<div class="row">
			<div class="col-12 col-xl-2 mt-3">
				<?php require_once "profile_sidebar.html" ?>
			</div>
			<div class="col-12 col-xl-10 mt-3">
				<h3>My Profile</h3>
				<div class="d-flex">
					<div class="mr-5 text-center">
						<img style="height: 150px;" class="rounded-circle" src="<?= "images/avatar/" . $_SESSION['avatar'] ?>" alt="">
						<h5><?= $_SESSION['name'] ?></h5>
					</div>
					<?php
					$user_id = $_SESSION['id'];
					$row = $conn->query("SELECT * FROM user where id = '$user_id'")->fetch_assoc(); ?>
					<form action="update_profile.php" method="post" class="w-75">
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" value="<?= $row['name'] ?>">
						</div>
						<div class="form-group">
							<label for="">Role</label>
							<input type="text" class="form-control" disabled value="<?php if($row['role'] == 0) echo 'Customer'; else echo 'Admin'; ?>">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" class="form-control" value="<?= $row['email'] ?>" disabled>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require_once "footer.html" ?>
	<script src="js/live_search.js"></script>
</body>

</html>