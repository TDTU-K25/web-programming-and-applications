<?php session_start();
if (isset($_GET['id'])) {
	$genre_id = $_GET['id'];
} else {
	$_SESSION['error'] = 'Thể loại không tồn tại';
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

	<!-- Material Symbols and Icons - Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Notify -->
	<script src="../../js/notify.js"></script>
</head>

<?php
require_once "../../connect.php";
$sql = "SELECT * from genre where id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param('i', $genre_id);
$stm->execute();
$result_set = $stm->get_result();
$row = $result_set->fetch_assoc();
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
					<h4>Cập nhật thể loại</h4>
					<form action="update.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?=$row['id']?>">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" placeholder="Movie Name" id="name" name="name" value="<?=$row['name']?>">
							<button id="submitBtn" type="submit" class="btn btn-primary mt-3">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>