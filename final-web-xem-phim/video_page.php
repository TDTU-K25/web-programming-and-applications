<?php
session_start();

require_once "connect.php";

if (!isset($_GET['id'])) {
	$_SESSION['error'] = "Movie not found";
	header("location: index.php");
	exit;
} else {
	$movie_id = $_GET['id'];
	$movie_info = $conn->query("SELECT * from movie where id = $movie_id")->fetch_assoc();

	$movie_genre = $conn->query("SELECT genre.name as genre_name FROM genre
		INNER JOIN movie_genre ON genre.id = movie_genre.genre_id where movie_genre.movie_id = $movie_id")->fetch_assoc();
	if(!isset($movie_genre)) {
		$genres = [];
		$result_set = $conn->query("SELECT * from genre");
		while($row = $result_set->fetch_assoc()) {
			$genres[] = $row['name'];
		}
		$genre = $genres[array_rand($genres)];
	} else {
		$genre = $movie_genre['genre_name'];
	}
}
?>
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
	<script src="js/notify.js"></script>
	<!-- Custom -->
	<link rel="stylesheet" href="css/style_video_page.css">
</head>

<body style="background-color: #080808;">
	<?php require_once "navbar.php" ?>

	<div class="container-fluid">
		<div class="container-fluid g-0">
			<div class="embed-responsive embed-responsive-16by9">
				<?php if (str_starts_with($movie_info['src'], 'http')) { ?>
					<iframe allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" id="iframe" src="<?=$movie_info['src'];?>" frameborder="0"></iframe>									
															<?php	} else { ?>
					<video controls src="<?="video/movie/" . $movie_info['src'];?>"></video>
				<?php } ?>

				?>
			</div>
		</div>

		<!-- Comment box -->
		<h2 class="text-uppercase mt-4 " style="color:#00BFFF;"><b> Comment</b></h2>
		<?php
		if (isset($_SESSION['id'])) {
		?>
			<div class="container ml-5" style="margin-top:50px;">
				<div class="row">
					<div class="col-md-1">
						<img src="<?php echo "images/avatar/" . $_SESSION['avatar']; ?>" class="rounded-circle img-fluid" alt="Profile Picture">
						<span class="text-white"><?= $_SESSION['name'] ?></span>
					</div>
					<div class="col-md-11">
						<textarea class="cmt form-control ml-7" id="mainComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
						<button style="float:left" class="btn-primary btn mr-5" id="addCommentBtn">Add Comment</button>
					</div>
				</div>
				<?php
				$numberOfCmt = $conn->query("SELECT * FROM comment where movie_id = $movie_id")->num_rows;
				$numberOfReplyCmt = $conn->query("SELECT * FROM replies INNER JOIN comment ON comment.comment_id = replies.root_comment_id where comment.movie_id = $movie_id")->num_rows;
				$totalCmt = $numberOfCmt + $numberOfReplyCmt;
				?>
				<div class="row">
					<div class="col-md-12 mt-3">
						<h2 style="color:#00BFFF;"><b><span id="numComments"><?= $totalCmt ?></span> Comments</b></h2>
						<div id="userComments">

						</div>
					</div>
				</div>
			</div>

			<div class="row replyBox" style="display:none">
				<div class="col-md-12">
					<textarea class="form-control" id="replyComment" placeholder="Add Reply Comment" cols="30" rows="2"></textarea><br>
					<button class="btn-primary btn" id="addReplyBtn">Add Reply</button>
					<button class="btn-danger btn" onclick="$('.replyBox').hide();">Close</button>
				</div>
			</div>
		<?php
		} else { ?>
			<div class="alert alert-info" role="alert">
				Vui lòng <a href="#">đăng nhập</a> để bình luận
			</div>
		<?php }
		?>


		<!-- Movie related	 -->
		<?php
		$sql_movie_same_genre = "SELECT movie.id ,movie.name as movie_name, poster FROM movie_genre 
			INNER JOIN genre ON genre.id = movie_genre.genre_id
			INNER JOIN movie ON movie.id = movie_genre.movie_id	
			WHERE genre.name = '$genre' LIMIT 4";
		$result_movie_same_genre = $conn->query($sql_movie_same_genre);
		?>
		<div class="row mt-3">
			<div class="col-lg-12 mb-2">
				<div class="d-flex align-items-end justify-content-between">
					<h4 class="text-primary text-uppercase mb-0">Có thể bạn muốn xem</h4>
					<a href="search_page.php">Xem tất cả</a>
				</div>
			</div>
			<?php
			foreach ($result_movie_same_genre as $row) { ?>
				<div class="col-lg-3 col-md-4 col-6 mt-2">
					<a href="detail_page.php?id=<?= $row['id'] ?>">
						<div class="card">
							<img class="card-img-top" src="<?php if (str_starts_with($row['poster'], 'http')) {
																	echo $row['poster'];
																} else {
																	echo "images/poster/" . $row['poster'];
																} ?>" alt="Card image">
							<div class="card-img-overlay p-0 d-flex flex-column justify-content-end">
								<div style="background-color: rgba(0,0,0,0.5);">
									<h5 class="card-title text-uppercase mb-0" style="color:orange;"><?= $row['movie_name'] ?></h5>
									<p class="card-text text-white"><?= $row['movie_name'] ?></p>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php require_once "footer.html" ?>

	<script>
		$(document).ready(function() {

			<?php if (isset($_SESSION['id'])) { ?>

				$("#addCommentBtn").click(() => {

					let comment = $("#mainComment").val();

					if (comment.length > 0) {
						$.ajax({
							url: 'api/comment/add.php',
							method: 'POST',
							data: {
								content: comment,
								user_id: <?php echo $_SESSION['id']; ?>,
								movie_id: <?php echo $_GET['id']; ?>
							},
							dataType: 'json',
							success: function(response) {
								if (response.success) {
									$.notify(response.message, "success");
									let currentNumCmt = parseInt($('#numComments').text())
									$('#numComments').text(currentNumCmt + 1)

									let cmtHTML = `
		<div class="comment" data-id=${response.inserted_id}>
            <div class="row">
                <img src= "images/avatar/<?= $_SESSION['avatar'] ?>" class="rounded-circle img-fluid">
				<span class="text-white"><?= $_SESSION['name'] ?></span>
                <div class="user mr-2"> <span class="time">${new Date(new Date().getTime() + (7 * 60 * 60 * 1000)).toISOString().replace(/T/, ' ').replace(/\..+/, '')}</span></div>
            </div>
            <div class="row">
                <div class="userComment">${comment}</div>
                <div class="actions">
                    <a class="btnEdit" data-id="${response.inserted_id}">Edit</a>
                    <a href="javascript:void(0)" class="deleteCmtBtn" data-id="${response.inserted_id}">Delete</a>
                </div>
			</div>
			<div class="replyBtn" style="margin-bottom: 20px;">
				<a href="javascript:void(0)" data-id="${response.inserted_id}">REPLY</a>
			</div>
		</div>`
									$('#userComments').prepend(cmtHTML);
									$("#mainComment").val('');
								}
							}
						});
					} else
						$.notify("Please Enter Your Comment", "error");
				})

				// Add reply for root cmt and reply cmt
				$("#addReplyBtn").click((event) => {
					let reply_cmt = $("#replyComment").val();
					let rootCmtID = $(event.target).data('id')
					if (reply_cmt.length > 0) {
						$.ajax({
							url: 'api/comment/reply/add.php',
							method: 'POST',
							data: {
								content: reply_cmt,
								rootCmtID: rootCmtID,
								user_id: <?php echo $_SESSION['id']; ?>,
							},
							dataType: 'json',
							success: function(response) {
								if (response.success) {
									$.notify(response.message, "success");
									let currentNumCmt = parseInt($('#numComments').text())
									$('#numComments').text(currentNumCmt + 1)
									let repliesBlock = $(event.target).closest('.replyBox').closest('.comment').find('.replies');
									let replyHTML = `
		<div class="reply">
            <div class="row">
                <img src= "images/avatar/<?= $_SESSION['avatar'] ?>" class="rounded-circle img-fluid">
				<span class="text-white"><?= $_SESSION['name'] ?></span>
                <div class="user mr-2"> <span class="time">${new Date(new Date().getTime() + (7 * 60 * 60 * 1000)).toISOString().replace(/T/, ' ').replace(/\..+/, '')}</span></div>
            </div>
            <div class="row">
                <div class="userComment">${reply_cmt}</div>
                <div class="actions">
                    <a class="btnEditReply" data-reply-id="${response.inserted_id}">Edit</a>
                    <a href="javascript:void(0)" class="deleteReplyBtn" data-reply-id="${response.inserted_id}">Delete</a>
                </div>
			</div>
			<div class="replyBtn">
				<a href="javascript:void(0)" data-root-comment-ID="${rootCmtID}">REPLY</a>
			</div>
        </div>`
									repliesBlock.append(replyHTML);
									$('.replyBox').css('display', 'none');
									$('#userComments').prepend($('.replyBox'));
									$("#replyComment").val('');
								}
							}
						});
					} else
						$.notify("Please Enter Your Reply Comment", "error");
				});




				function getAllComments() {
					let user_id = <?= $_SESSION['id'] ?> 
					$.ajax({
						url: 'api/comment/get.php',
						method: 'POST',
						data: {
							movie_id: <?php echo $_GET['id']; ?>
						},
						dataType: 'json',
						success: function(response) {
							let data = response
							let cmt_html = '';
							data.forEach((cmt) => {
								if (user_id == cmt.user_id) {
									cmt_html += `
			<div class="comment" data-id=${cmt.id}>
				<div class="row">
					<img src= "images/avatar/${cmt.avatar}" class="rounded-circle img-fluid">
					<span class="text-white">${cmt.name}</span>
					<div class="user mr-2"> <span class="time">${cmt.created_at}</span></div>
				</div>
				<div class="row">
					<div class="userComment">${cmt.content}</div>
					<div class="actions">
						<a class="btnEdit" data-id="${cmt.id}">Edit</a>
						<a href="javascript:void(0)" class="deleteCmtBtn" data-id="${cmt.id}">Delete</a>
					</div>
				</div>
				<div class="replyBtn" style="margin-bottom: 20px;">
					<a href="javascript:void(0)" data-id="${cmt.id}">REPLY</a>
				</div>
				`
									let reply_html = `<div class="replies">`;
									cmt.replies.forEach(function(reply) {
										if (user_id == reply.user_id) {
											reply_html += `
						
				<div class="reply">
					<div class="row">
						<img src= "images/avatar/${reply.avatar}" class="rounded-circle img-fluid">
						<span class="text-white">${reply.name}</span>
						<div class="user mr-2"> <span class="time">${reply.created_at}</span></div>
					</div>
					<div class="row">
						<div class="userComment">${reply.content}</div>
						<div class="actions">
							<a class="btnEditReply" data-reply-id="${reply.reply_comment_id}">Edit</a>
							<a href="javascript:void(0)" class="deleteReplyBtn" data-reply-id="${reply.reply_comment_id}">Delete</a>
						</div>
					</div>
					<div class="replyReplyCmtBtn">
						<a href="javascript:void(0)" data-root-comment-id=${cmt.id}>REPLY</a>
					</div>
				</div>
					`						
										} else {
											reply_html += `
						
				<div class="reply">
					<div class="row">
						<img src= "images/avatar/${reply.avatar}" class="rounded-circle img-fluid">
						<span class="text-white">${reply.name}</span>
						<div class="user mr-2"> <span class="time">${reply.created_at}</span></div>
					</div>
					<div class="row">
						<div class="userComment">${reply.content}</div>
					</div>
					<div class="replyReplyCmtBtn">
						<a href="javascript:void(0)" data-root-comment-id=${cmt.id}>REPLY</a>
					</div>
				</div>
					`	
										}
									})
									reply_html += "</div> </div>"
									cmt_html += reply_html
								} else {
									cmt_html += `
			<div class="comment" data-id=${cmt.id}>
				<div class="row">
					<img src= "images/avatar/${cmt.avatar}" class="rounded-circle img-fluid">
					<span class="text-white">${cmt.name}</span>
					<div class="user mr-2"> <span class="time">${cmt.created_at}</span></div>
				</div>
				<div class="row">
					<div class="userComment">${cmt.content}</div>
				</div>
				<div class="replyBtn" style="margin-bottom: 20px;">
					<a href="javascript:void(0)" data-id="${cmt.id}">REPLY</a>
				</div>
			
				`
									let reply_html = `<div class="replies">`;
									cmt.replies.forEach(function(reply) {
										if (user_id == reply.user_id) {
											reply_html += `
						
				<div class="reply">
					<div class="row">
						<img src= "images/avatar/${reply.avatar}" class="rounded-circle img-fluid">
						<span class="text-white">${reply.name}</span>
						<div class="user mr-2"> <span class="time">${reply.created_at}</span></div>
					</div>
					<div class="row">
						<div class="userComment">${reply.content}</div>
						<div class="actions">
							<a class="btnEditReply" data-reply-id="${reply.reply_comment_id}">Edit</a>
							<a href="javascript:void(0)" class="deleteReplyBtn" data-reply-id="${reply.reply_comment_id}">Delete</a>
						</div>
					</div>
					<div class="replyReplyCmtBtn">
						<a href="javascript:void(0)" data-root-comment-id=${cmt.id}>REPLY</a>
					</div>
				</div>
					`						
										} else {
											reply_html += `
						
				<div class="reply">
					<div class="row">
						<img src= "images/avatar/${reply.avatar}" class="rounded-circle img-fluid">
						<span class="text-white">${reply.name}</span>
						<div class="user mr-2"> <span class="time">${reply.created_at}</span></div>
					</div>
					<div class="row">
						<div class="userComment">${reply.content}</div>
					</div>
					<div class="replyReplyCmtBtn">
						<a href="javascript:void(0)" data-root-comment-id=${cmt.id}>REPLY</a>
					</div>
				</div>
					`	
										}
									})
									reply_html += "</div> </div>"
									cmt_html += reply_html
								}
							})
							$("#userComments").append(cmt_html);
						}
					})
				}

				// Show reply box for root cmt
				$('#userComments').on('click', '.replyBtn a', (event) => {
					let rootCmtID = $(event.target).data('id');
					$(".replyBox").css('display', 'block');
					$("#addReplyBtn").data('id', rootCmtID);
					$(".replyBox").insertAfter($(event.target).closest('div'));
				})

				// Show reply box for reply cmt
				$('#userComments').on('click', '.replyReplyCmtBtn a', (event) => {
					let rootCmtID = $(event.target).data('root-comment-id');
					$(".replyBox").css('display', 'block');
					$("#addReplyBtn").data('id', rootCmtID);
					$(".replyBox").insertAfter($(event.target).closest('div'));
				})

				// Remove root cmt
				$('#userComments').on('click', '.deleteCmtBtn', (event) => {
					if (confirm("Bạn có chắc muốn xóa bình luận này?")) {
						let cmtID = $(event.target).data('id');

						$.ajax({
							url: 'api/comment/remove.php',
							method: 'POST',
							data: {
								commentID: cmtID,
							},
							dataType: 'json',
							success: function(response) {
								if (response.success) {
									let numOfDeletedCmt = parseInt(response.affected_rows);
									$.notify(response.message, "success");
									let currentNumCmt = parseInt($('#numComments').text())
									$('#numComments').text(currentNumCmt - numOfDeletedCmt)
									$(event.target).closest('.comment').remove()
								}

							}
						});
					}
				})

				// Remove reply cmt
				$('#userComments').on('click', '.deleteReplyBtn', (event) => {
					console.log(event)
					if (confirm("Bạn có chắc muốn xóa reply này?")) {
						let replyID = $(event.target).data('reply-id');

						$.ajax({
							url: 'api/comment/reply/remove.php',
							method: 'POST',
							data: {
								replyID: replyID,
							},
							dataType: 'json',
							success: function(response) {
								if (response.success) {
									let numOfDeletedCmt = parseInt(response.affected_rows);
									$.notify(response.message, "success");
									let currentNumCmt = parseInt($('#numComments').text())
									$('#numComments').text(currentNumCmt - numOfDeletedCmt)
									$(event.target).closest('.reply').remove()
								}

							}
						});
					}
				})

				// Show edit box for root cmt
				$('#userComments').on('click', '.btnEdit', (event) => {
					let rootCmtID = $(event.target).data('id');
					// Lấy nội dung bình luận hiện tại
					let cmtContent = $(event.target).parent().prev().text();

					// Hiển thị form để sửa bình luận
					$(event.target).parent().prev().html(
						`<textarea class="editCommentInput">${cmtContent}</textarea>
						<br />
						<button class="updateCmt" data-comment-id="${rootCmtID}">Lưu</button>
						<button class="cancelEditCmt" data-old-cmt=${cmtContent}>Hủy</button>`
					);
				})

				// Show edit box for reply cmt
				$('#userComments').on('click', '.btnEditReply', (event) => {
					let replyCmtID = $(event.target).data('reply-id');
					// Lấy nội dung bình luận hiện tại
					let cmtContent = $(event.target).parent().prev().text();

					// Hiển thị form để sửa bình luận
					$(event.target).parent().prev().html(
						`<textarea class="editReplyCommentInput">${cmtContent}</textarea>
						<br />
						<button class="updateReplyCmt" data-reply-cmt-id="${replyCmtID}">Lưu</button>
						<button class="cancelEditReplyCmt" data-old-cmt=${cmtContent}>Hủy</button>`
					);
				})

				// Update root cmt after click save
				$('#userComments').on('click', '.updateCmt', (event) => {
					let commentID = $(event.target).data('comment-id');
					let commentContent = $(event.target).parent().find('.editCommentInput').val();
					$.ajax({
						url: 'api/comment/update.php',
						method: 'POST',
						data: {
							commentID: commentID,
							content: commentContent,
							user_id: <?php echo $_SESSION['id']; ?>,
						},
						dataType: 'json',
						success: function(response) {
							if (response.success) {
								$.notify(response.message, "success");
								let div = $(event.target).closest('div')
								div.html("");
								div.html(commentContent)
							}
						}
					});
				})

				// Update reply cmt after click save
				$('#userComments').on('click', '.updateReplyCmt', (event) => {
					console.log(event.target)
					let replyID = $(event.target).data('reply-cmt-id');
					let commentContent = $(event.target).parent().find('.editReplyCommentInput').val();
					$.ajax({
						url: 'api/comment/reply/update.php',
						method: 'POST',
						data: {
							replyID: replyID,
							content: commentContent,
							user_id: <?php echo $_SESSION['id']; ?>,
						},
						dataType: 'json',
						success: function(response) {
							if (response.success) {
								$.notify(response.message, "success");
								let div = $(event.target).closest('div')
								div.html("");
								div.html(commentContent)
							}
						}
					});
				})

				// Cancel edit root cmt
				$('#userComments').on('click', '.cancelEditCmt', (event) => {
					let oldCmt = $(event.target).data('old-cmt');
					let div = $(event.target).closest('div')
					div.html("");
					div.html(oldCmt)
				})

				// Cancel edit reply cmt
				$('#userComments').on('click', '.cancelEditReplyCmt', (event) => {
					let oldCmt = $(event.target).data('old-cmt');
					let div = $(event.target).closest('div')
					div.html("");
					div.html(oldCmt)
				})

			<?php } ?>

			$(".alert-info > a").click((event) => {
				console.log(event)
				event.preventDefault();
				$('#loginModal').modal('show');
			})

			getAllComments();
		});
	</script>
	<script src="js/live_search.js"></script>
</body>

</html>