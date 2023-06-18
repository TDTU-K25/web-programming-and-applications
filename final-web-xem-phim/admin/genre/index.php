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

<?php
require_once "../../connect.php";

// Search
$searchContent = "";
if (isset($_GET['searchContent'])) {
	$searchContent = $_GET['searchContent'];
}

// Pagination
$numberOfGenreEachPage = 5;
$sql = "SELECT * FROM genre WHERE name like '%$searchContent%'";
$numberOfGenre = $conn->query($sql)->num_rows;
$numberOfPage = ceil($numberOfGenre / $numberOfGenreEachPage);
$currentPage = 1;
if (isset($_GET['currentPage'])) {
	$currentPage = $_GET['currentPage'];
}

$numberOfOffsetGenre = ($currentPage - 1) * $numberOfGenreEachPage;

$sql = "SELECT * FROM genre WHERE name like '%$searchContent%' LIMIT $numberOfGenreEachPage OFFSET $numberOfOffsetGenre";
$result = $conn->query($sql);
?>

<body>
	<?php require_once "../../toast.php" ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 p-0">
				<?php require_once "../sidebar.html" ?>
			</div>
			<div class="col-10">
				<?php require_once "../account_box.php" ?>
				<div class="d-flex justify-content-between mt-3">
					<h4>Quản lý thể loại phim</h4>
					<form action="" method="">
						<div class="d-flex">
							<input placeholder="Search by genre" class="form-control" type="search" name="searchContent" id="" value="<?= $searchContent ?>">
							<button class="btn"><i class="fas fa-search fs-4"></i></button>
						</div>
					</form>
					<a class="btn btn-primary" href="form_insert.php">Add Movie Genre</a>
				</div>

				<table class="w-100 mt-3 table table-striped ">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
					<?php
					foreach ($result as $row) { ?>
						<tr>
							<td><?= $row['id'] ?></td>
							<td><?= $row['name'] ?></td>
							<td>
								<a data-id=<?= $row['id'] ?> class="update btn btn-sm btn-primary" href="form_update.php?id=<?= $row['id'] ?>" style="text-decoration: none;">
									<i class="fas fa-edit"></i>
								</a>
								<a data-id=<?= $row['id'] ?> class="delete btn btn-sm btn-danger" href="delete.php?id=<?= $row['id'] ?>" style="text-decoration: none;">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</table>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item <?php if ($currentPage == 1) {
													echo "disabled";
												} ?> ">
							<a class="page-link " href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<?php for ($i = 1; $i <= $numberOfPage; $i++) { ?>
							<li class="page-item "><a class="page-link <?php if ($i == $currentPage) {
																			echo "active";
																		} ?>" href="index.php?currentPage=<?= $i ?>&searchContent=<?= $searchContent ?>"><?= $i ?></a></li>
						<?php } ?>
						<li class="page-item <?php if ($currentPage == $numberOfPage) {
													echo "disabled";
												} ?>">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<?php require_once "../confirm_delete_modal.html" ?>
	<script>
		$('.delete').click(function(event) {
			event.preventDefault();
			$('#confirmModal').modal('show');
			let genre_id = $(this).data('id')
			$('#confirmModal #confirmBtn').data('id', genre_id);
		})

		$('#confirmBtn').click(function(event) {
			let genre_id = $(this).data('id');
			window.location.href = `delete.php?id=${genre_id}`;
		})
	</script>
</body>

</html>