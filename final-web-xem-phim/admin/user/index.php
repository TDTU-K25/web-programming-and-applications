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

	<!-- Notify -->
	<script src="../../js/notify.js"></script>
</head>

<?php
require_once "../../connect.php";

// Search
$searchContent = "";
if (isset($_GET['searchContent'])) {
	$searchContent = $_GET['searchContent'];
}

// Pagination
$numberOfUserEachPage = 5;
$sql = "SELECT * FROM user WHERE email like '%$searchContent%'";
$numberOfUser = $conn->query($sql)->num_rows;
$numberOfPage = ceil($numberOfUser / $numberOfUserEachPage);
$currentPage = 1;
if (isset($_GET['currentPage'])) {
	$currentPage = $_GET['currentPage'];
}

$numberOfOffsetUser = ($currentPage - 1) * $numberOfUserEachPage;

$sql = "SELECT * FROM user WHERE email like '%$searchContent%' LIMIT $numberOfUserEachPage OFFSET $numberOfOffsetUser";
$result = $conn->query($sql);
?>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-sm-12 p-0">
				<?php require_once "../sidebar.html" ?>
			</div>
			<div class="col-lg-10 col-sm-12">
				<?php require_once "../account_box.php" ?>
				<div class="d-flex justify-content-between mt-3">
					<h4>Quản lý user</h4>
					<form action="" method="">
						<div class="d-flex">
							<input placeholder="Search by email of user" class="form-control" type="search" name="searchContent" id="" value="<?= $searchContent ?>">
							<button class="btn"><i class="fas fa-search fs-4"></i></button>
						</div>
					</form>
				</div>

				<div class="table-responsive">
					<table class="w-100 mt-3 table table-striped ">
						<tr>
							<th>ID</th>
							<th>Avatar</th>
							<th>Name</th>
							<th>Email</th>
							<th>Status</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
						<?php
						foreach ($result as $row) { ?>
							<tr>
								<td><?= $row['id'] ?></td>
								<td>
									<img class="rounded-circle" style="height: 50px;" src="../../images/avatar/<?php echo $row['avatar'] ?>" alt="">
	
								</td>
								<td><?= $row['name'] ?></td>
								<td><?= $row['email'] ?></td>
								<td><?php if ($row['status'] == 0) echo "Active";
									else echo "Disabled"; ?></td>
								<td><?php if ($row['role'] == 0) echo "User";
									else echo "Admin"; ?></td>
								<td>
									<a data-id=<?= $row['id'] ?> href="form_update.php?id=<?= $row['id'] ?>" style="text-decoration: none;" class="update btn btn-sm btn-primary">
										<i class="fas fa-edit"></i>
									</a>
									<?php if ($row['role'] == 0) { ?>
										<a data-status=<?= $row['status'] ?> data-id=<?= $row['id'] ?> href="view_detail.php?id=<?= $row['id'] ?>" style="text-decoration: none;" class="btn btn-sm btn-success statusBtn">
	
										</a>
										<a data-id=<?= $row['id'] ?> href="delete.php?id=<?= $row['id'] ?>" style="text-decoration: none;" class="delete btn btn-sm btn-danger">
											<i class="fa fa-trash" aria-hidden="true"></i>
										</a>
									<?php } ?>
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
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
		$(function() {
			function getStatusOfUser() {
				$('.statusBtn').each(function() {
					if (parseInt($(this).data('status')) == 0) {
						$(this).text('Disabled')
					} else {
						$(this).text('Active')
					}
				})
			}

			getStatusOfUser()

			$('.statusBtn').click(function(event) {
				event.preventDefault();
				let updatedStatus = null;
				if (parseInt($(this).data('status')) == 0) {
					updatedStatus = 1
				} else {
					updatedStatus = 0
				}
				fetch('../../api/user/update.php', {
						method: 'post',
						header: {
							'Content-Type': 'application/x-www-form-urlencoded'
						},
						body: new URLSearchParams({
							id: $(this).data('id'),
							status: updatedStatus
						})
					})
					.then(response => response.json())
					.then(json => {
						let tr = $(this).closest('tr');
						if (updatedStatus == 0) {
							tr.find('td')[4].innerText = 'Active'
							$(this).text('Disabled')
							$(this).data('status', 0)
						} else {
							tr.find('td')[4].innerText = 'Disabled'
							$(this).text('Active')
							$(this).data('status', 1)
						}
						$.notify(json.data, "success");
					})
			})

			$('.delete').click(function(event) {
				event.preventDefault();
				$('#confirmModal').modal('show');
				let user_id = $(this).data('id')
				$('#confirmModal #confirmBtn').data('id', user_id);
			})

			$('#confirmBtn').click(function(event) {
				let user_id = $(this).data('id');
				window.location.href = `delete.php?id=${user_id}`;
			})
		})
	</script>
</body>

</html>