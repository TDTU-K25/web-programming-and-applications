<?php session_start();
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];
} else {
	$_SESSION['error'] = 'User không tồn tại';
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
$sql = "SELECT * from user where id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param('i', $user_id);
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
					<h4>Cập nhật User</h4>
					<form action="update.php" method="post" enctype="multipart/form-data">
						<input type="hidden" id="id" name="id" value="<?= $row['id'] ?>">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
						</div>
						<div class="form-group">
							<input type="hidden" id="oldAvatar" name="oldAvatar" value="<?= $row['avatar'] ?>">
							<label for="">Avatar</label>
							<label for="avatar">
								<img id="avatarImg" class="rounded-circle" style="height: 100px;" src="../../images/avatar/<?= $row['avatar'] ?>" alt="">
							</label>
							<input type="file" class="form-control" id="avatar" name="avatar" style="display: none;">
						</div>
						<div class="form-group">
							<label for="status">Status</label>
							<select name="status" id="status">
								<option value="0" <?php if ($row['status'] == 0) {
														echo "selected";
													} ?>>Active</option>
								<option value="1" <?php if ($row['status'] == 1) {
														echo "selected";
													} ?>>Disabled</option>
							</select>
						</div>
						<div class="form-group">
							<label for="role">Role</label>
							<select name="role" id="role">
								<option value="0" <?php if ($row['role'] == 0) {
														echo "selected";
													} ?>>Customer</option>
								<option value="1" <?php if ($row['role'] == 1) {
														echo "selected";
													} ?>>Admin</option>
							</select>
						</div>
						<button id="submitBtn" type="button" class="btn btn-primary mt-3">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(function() {
			$('#avatar').change(function(event) {
				let avatar = $(this).prop('files')[0];
				const reader = new FileReader();

				reader.addEventListener('load', function() {
					$('#avatarImg').prop('src', reader.result)
				});

				if (avatar) {
					reader.readAsDataURL(avatar);
				}
			})

			$('#submitBtn').click(function(event) {
				let id = $('#id').val()
				let name = $('#name').val()
				let oldAvatar = $('#oldAvatar').val()
				let avatar = $('#avatar').prop('files')[0]
				let email = $('#email').val()
				let status = $('#status').val()
				let role = $('#role').val()
				
				let formData = new FormData();
				formData.append('id', id);
				formData.append('name', name);
				formData.append('avatar', avatar);
				formData.append('email', email);
				formData.append('status', status);
				formData.append('role', role);
				formData.append('oldAvatar', oldAvatar);

				let xhr = new XMLHttpRequest();

				xhr.onload = function() {
					let response = JSON.parse(this.response)
					if (response.success) {
						$.notify("Update user successfully", "success");
						setTimeout(() => {
							window.location.href = "index.php";
						}, 2000);

					} else {
						$.notify("Update user failed", "error");
					}
				}

				xhr.open("POST", "update.php");
				xhr.send(formData);
			})
		})
	</script>
</body>

</html>