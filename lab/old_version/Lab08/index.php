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

		td {
			padding: 10px;
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


	<script>
		$(document).ready(function() {


			$(".delete").click(function() {

				$('#myModal').modal({
					backdrop: 'static',
					keyboard: false
				});

			});


		});
	</script>


	<table cellpadding="10" cellspacing="10" border="0" style="border-collapse: collapse; margin: auto">

		<tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
			<td colspan="5">
				<a href="add.php">Thêm sản phẩm</a>
			</td>
		</tr>
		<tr class="header">
			<td>Image</td>
			<td>Name</td>
			<td>Price</td>
			<td>Description</td>
			<td>Action</td>
		</tr>
		<?php
		require_once "db_connect.php";
		$query = "SELECT * FROM product";
		$dataset = $conn->query($query);
		?>

		<?php foreach ($dataset as $row) { ?>
			<tr class="item">
				<td><img src="<?= $row['image'] ?>" style="max-height: 80px"></td>
				<td><?= $row['name'] ?></td>
				<td><?= $row['price'] ?></td>
				<td><?= $row['description'] ?></td>
				<td><a href="update.php?id=<?= $row['id'] ?>">Edit</a> | <a href="delete.php?id=<?= $row['id'] ?>" class="delete">Delete</a></td>

			</tr>
		<?php } ?>
		<tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
			<td colspan="5">
				<p>Số lượng sản phẩm: <?= $dataset->num_rows ?></p>
			</td>
		</tr>
	</table>


	<!-- Delete Confirm Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete Product</h4>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this product?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>

			</div>

		</div>
	</div>

	<script>
		// Display the confirm message when deleting a product
		let deleteLinks = document.querySelectorAll('.delete');
		for (let i = 0; i < deleteLinks.length; i++) {
			deleteLinks[i].addEventListener('click', function(event) {
				event.preventDefault();
				let deleteBtnInModal = document.querySelector('#myModal .btn-danger');
				deleteBtnInModal.addEventListener('click', function() {
					window.location = event.target.href;
				})
			});
		}
	</script>
</body>

</html>