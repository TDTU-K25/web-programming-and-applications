<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	<style>
		body {
			padding-top: 50px;
		}

		table {

			text-align: center;
		}

		tr.item {
			border-top: 1px solid #5e5e5e;
			border-bottom: 1px solid #5e5e5e;
		}

		tr.item:hover {
			background-color: #d9edf7;
		}

		tr.item td {
			min-width: 150px;
		}

		tr.header {
			font-weight: bold;
		}

		a {
			text-decoration: none;
		}

		a:hover {
			color: deeppink;
			font-weight: bold;
		}
	</style>

	<?php
	require_once "db_connect.php";
	$id = $_GET['id'];
	$query = "SELECT * FROM product WHERE id = ?";
	$stm = $conn->prepare($query);
	$stm->bind_param('s', $id);

	if (!$stm->execute()) {
		die("Can't read" . $stm->error);
	}

	$dataset = $stm->get_result();
	$row = $dataset->fetch_assoc();
	?>

	<div class="container" style="width: 600px">
		<h2>Sửa sản phẩm</h2>
		<form action="process_update.php" method="post">
			<div class="form-group">
				<label for="id">ID:</label>
				<input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" value="<?= $row['id'] ?>">
			</div>
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $row['name'] ?>">
			</div>
			<div class="form-group">
				<label for="price">Price:</label>
				<input type="number" class="form-control" id="price" placeholder="Enter price" name="price" value="<?= $row['price'] ?>">
			</div>
			<div class="form-group">
				<label for="img">Image:</label>
				<input type="text" class="form-control" id="img" placeholder="Enter the path of the image" name="img" value="<?= $row['image'] ?>">
			</div>
			<div class="form-group">
				<label for="desc">Description:</label>
				<textarea class="form-control" name="desc" id="desc" rows="3"><?= $row['description'] ?></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
			<button type="reset" class="btn btn-default">Reset</button>
		</form>

		<br>
		<div class="alert alert-danger" style="display: none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<span id="alertMsg"></span>
		</div>
	</div>

	<script>
		let idBox = document.getElementById('id');
		let nameBox = document.getElementById('name');
		let priceBox = document.getElementById('price');
		let imgBox = document.getElementById('img');
		let descBox = document.getElementById('desc');
		let alertBox = document.querySelector('.alert.alert-danger');
		let alertMsg = document.getElementById('alertMsg');

		function validateForm() {
			let id = idBox.value;
			let name = nameBox.value;
			let price = priceBox.value;
			let img = imgBox.value;
			let desc = descBox.value;
			let isValid = true;

			if (id.length === 0) {
				alertMsg.innerText = "Vui lòng nhập ID";
				isValid = false;
			} else if (name.length === 0) {
				alertMsg.innerText = "Vui lòng nhập name";
				isValid = false;
			} else if (price.length === 0) {
				alertMsg.innerText = "Vui lòng nhập price";
				isValid = false;
			} else if (img.length === 0) {
				alertMsg.innerText = "Vui lòng nhập đường dẫn của file ảnh";
				isValid = false;
			} else {
				alertMsg.innerText = "";
			}
			return isValid;
		}

		let addBtn = document.querySelector('[type="submit"]');

		addBtn.addEventListener('click', function(event) {
			if (!validateForm()) {
				event.preventDefault();
				alertBox.style.display = 'block';
			} else {
				alertBox.style.display = 'none';
			}
		});
	</script>
</body>

</html>