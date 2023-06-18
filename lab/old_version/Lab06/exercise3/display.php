<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercise3</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>

<body>
	<?php
	// empty(0) -> false
	if (empty($_POST['name']) || empty($_POST['gender']) || empty($_POST['browsers']) || !isset($_POST['numOfChildren'])) {
		$_SESSION['errorMsg'] = "Please provide enough information";
		header("location: exercise3.php");
		exit;
	}

	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$browsers = $_POST['browsers'];
	$browsersStr = implode(', ', $browsers);
	$numOfChildren = $_POST['numOfChildren'];
	?>

	<div class="w-25 mx-auto mt-3">
		<div>Your name: <b><?= $name ?></b></div>
		<div>Your sex: <b><?= $gender ?></b></div>
		<div>Your using browser: <b><?= $browsersStr ?></b></div>
		<div>You have <b><?= $numOfChildren ?> children</div>
		<a href="exercise3.php">Return</a>
	</div>
</body>

</html>