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
				<h3>My comment</h3>
				<table class="table">
					<tr>
						<th>Movie</th>
						<th>Comment at</th>
						<th>Content</th>
						<th>Action</th>
					</tr>
					<!-- Pagination -->
					<?php
					$currentPage = 1;
					$user_id = $_SESSION['id'];
					if (isset($_GET['currentPage'])) {
						$currentPage = $_GET['currentPage'];
					}
					$numberOfCmtEachPage = 5;
					$numberOfCmt = $conn->query("SELECT * from comment where user_id = $user_id")->num_rows;
					$numberOfPage = ceil($numberOfCmt / $numberOfCmtEachPage);
					$numberOfOffsetCmt = ($currentPage - 1) * $numberOfCmtEachPage;
					
					$result_set = $conn->query("SELECT movie.id as id, movie.name as name, movie.poster as poster, comment.* FROM comment INNER JOIN movie ON comment.movie_id = movie.id where comment.user_id = $user_id LIMIT $numberOfCmtEachPage OFFSET $numberOfOffsetCmt");
					while ($row = $result_set->fetch_assoc()) {
						$movie_id = $row['id'];
					?>
						<tr>
							<td>
								<a href="detail_page.php?id=<?= $movie_id ?>">
									<img height="100px" src="<?php if (str_starts_with($row['poster'], 'https')) { echo $row['poster']; } 
			else { echo "images/" . $row['poster']; }	?>" alt="">
									<?= $row['name'] ?>
								</a>
							</td>
							<td class="align-middle"><?= $row['created_at'] ?></td>
							<td class="align-middle"><?= $row['content'] ?></td>
							<td class="align-middle">
								<btn data-cmt-id="<?=$row['comment_id']?>" class="btn btn-danger delete">Remove</btn>
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
							<li class="page-item "><a class="page-link <?php if ($i == $currentPage) { echo "active";} ?>" href="view_user_comment.php?currentPage=<?= $i ?>"><?= $i ?></a></li>
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

	<?php require_once "footer.html" ?>
	<script src="js/live_search.js"></script>
	<script>
		$(function() {
			$(".delete").click((event) => {
				let cmt_id = $(event.target).data('cmt-id');
				fetch('api/comment/remove.php', {
					method: 'post',
					headers: {
						'Content-Type': "application/x-www-form-urlencoded"
					},
					body: new URLSearchParams({
						commentID: cmt_id
					})
				})
				.then(response => response.json())
				.then(json => {
					if(json.success) {
						$(event.target).closest('td').closest('tr').remove()
					}
				})
			})
		})
	</script>
</body>

</html>