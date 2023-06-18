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
$id = $_GET['id']; 

$searchContent = "";
if (isset($_GET['searchContent'])) {
	$searchContent = $_GET['searchContent'];
}


$numberOfReplyEachPage = 4;
$sqlr = "SELECT reply_comment_id,root_comment_id,name,content,replies.created_at FROM replies INNER JOIN user on user.id = replies.user_id
WHERE name like '%$searchContent%' and root_comment_id = '$id'";
$numberOfReply = $conn->query($sqlr)->num_rows;
$numberOfPage1 = ceil($numberOfReply / $numberOfReplyEachPage);
$currentPage1 = 1;
if (isset($_GET['currentPage1'])) {
	$currentPage1 = $_GET['currentPage1'];
}
$numberOfOffsetReply = ($currentPage1 - 1) * $numberOfReplyEachPage;



$sql_reply = "SELECT reply_comment_id,root_comment_id,name,content,replies.created_at FROM replies INNER JOIN user on user.id = replies.user_id
			  WHERE name like '%$searchContent%' and root_comment_id = '$id' LIMIT $numberOfReplyEachPage OFFSET $numberOfOffsetReply";
$result_reply = $conn->query($sql_reply);


?>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2 p-0">
				<?php require_once "../sidebar.html" ?>
			</div>
			<div class="col-10">
			<?php require_once "../account_box.php" ?>
				<div class="d-flex justify-content-between mt-3">
						<h4>Quản lý bình luận</h4>
						<form action="" method="">
							<div class="d-flex">
								<input placeholder="Search by name of reply" class="form-control" type="search" name="searchContent" id="" value="<?= $searchContent ?>">
								<button class="btn"><i class="fas fa-search fs-4"></i></button>
							</div>
						</form>
						<a class="btn btn-primary" href="index.php">Back</a>
				</div>
				<table class="w-100 mt-3 table table-striped ">
		<h3 style ="text-align: center">Phản hồi</h3>
					<tr>
						<th>Id Reply</th>
						<th>Id Comment</th>
						<th>Name</th>
						<th>Comment</th>
						<th>Time</th>
						<th>Action</th>
					</tr>
					<?php
					foreach ($result_reply as $row) { ?>
						<tr>
							<td><?= $row['reply_comment_id'] ?></td>
							<td><?= $row['root_comment_id'] ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= $row['content'] ?></td>
							<td><?= $row['created_at'] ?></td>

							<td>
								<a href="delete.php?idr=<?= $row['reply_comment_id'] ?>" style="text-decoration: none;">
									<button class="btn btn-sm btn-danger">Delete</button>
								</a>
							</td>
						</tr>
					<?php } ?>
	</table>
	<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item <?php if ($currentPage1 == 1) {
													echo "disabled";
												} ?> ">
							<a class="page-link " href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<?php for ($i = 1; $i <= $numberOfPage1; $i++) { ?>
							<li class="page-item "><a class="page-link <?php if ($i == $currentPage1) { echo "active";} ?>" href="index.php?currentPage1=<?= $i ?>&searchContent=<?= $searchContent ?>"><?= $i ?></a></li>
						<?php } ?>
						<li class="page-item <?php if ($currentPage1 == $numberOfPage1) {
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


</body>

</html>