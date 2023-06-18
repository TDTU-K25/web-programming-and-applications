<?php
// Check if user has already clicked remember me when login => If yes, user does not need to login again
if (isset($_COOKIE['token'])) {
	$sql = "SELECT * FROM user WHERE token = ?";
	$stm = $conn->prepare($sql);
	$stm->bind_param('s', $_COOKIE['token']);
	if (!$stm->execute()) {
		die($stm->error);
	}
	$result = $stm->get_result();
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$_SESSION['id'] = $row['id'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['avatar'] = $row['avatar'];
		$_SESSION['role'] = $row['role'];
	}
}
?>

<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<div class="container">
		<a href="index.php" class="navbar-brand">
			<i class="fa fa-cube"></i>Online<b>Movies</b>
		</a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
			<div class="navbar-nav">
				<a href="index.php" class="nav-item nav-link active text-uppercase">Trang chủ</a>
				<?php
				$sql = "SELECT * from genre LIMIT 10";
				$result = $conn->query($sql);
				?>
				<div class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle text-uppercase" data-toggle="dropdown">Thể loại</a>
					<div class="dropdown-menu d-inline-bloack">
						<?php foreach ($result as $row) {
						?>
							<a href="search_page.php?keyword=&genre=<?= $row['id']?>&country=0&year=0&btn="  class="dropdown-item nav-item"><?= $row['name'] ?></a>
						<?php }
						?>
						<a href="#" class="dropdown-item nav-item">...</a>
					</div>
				</div>
				<?php
				$sql = "SELECT * from country LIMIT 10";
				$result = $conn->query($sql);
				?>
				<div class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle text-uppercase" data-toggle="dropdown">Quốc gia</a>
					<div class="dropdown-menu d-inline-bloack">
						<?php foreach ($result as $row) {
						?>
							<a href="search_page.php?keyword=&genre=&country=<?= $row['id']?>&year=0&btn=" class="dropdown-item nav-item"><?= $row['name'] ?></a>
						<?php }
						?>
						<a href="#" class="dropdown-item nav-item">...</a>
					</div>
				</div>
				<?php
				if (isset($_SESSION['role']) && $_SESSION['role'] != 0) { ?>
					<div class="nav-item">
						<a href="admin" class="nav-link text-uppercase">Admin Page</a>
					</div>
				<?php } ?>
			</div>

			<div class="d-flex ml-auto">
				<form action="search_page.php" method="get" class="navbar-form form-inline position-relative" style="width: 300px;">
					<input name="keyword" type="text" id="searchBar" class="form-control w-100" placeholder="Tìm: tên phim">
					<div id="searchResult" class="bg-white position-absolute w-100" style="top: 40px; z-index: 1"></div>
				</form>

				<div class="navbar-nav ml-2">
					<!-- When user logins -->
					<?php if (isset($_SESSION['id'])) { ?>
						<div class="nav-item dropdown">
							<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
								<img class="avatar rounded-circle" style="height: 50px;" src="<?php if (is_null($_SESSION['avatar'])) {
																									echo "images/avatar/sample.jpg";
																								} else {
																									echo "images/avatar/" . $_SESSION['avatar'];
																								} ?>"><b class="caret"></b>
							</a>
							<div class="dropdown-menu">
								<a href="profile.php" class="dropdown-item">
									<i class="fa-solid fa-user mr-1">
									</i> Profile</a>
								<div class="dropdown-divider"></div>
								<a href="authentication/logout.php" class="dropdown-item d-flex">
									<i class="material-icons mr-1">&#xE8AC;</i> Logout
								</a>
							</div>
						</div>

						<!-- End When user logins  -->
					<?php } else { ?>
						<!-- When user doesn't login -->
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle text-uppercase" data-toggle="dropdown">
								<i class="fa fa-user" aria-hidden="true"></i>
							</a>
							<div class="dropdown-menu d-inline-bloack">
								<a href="#" class="dropdown-item nav-item" id="login-btn" data-target="#loginModal" data-toggle="modal">Đăng nhập</a>
								<a href="#" class="dropdown-item nav-item" id="sign-up-btn" data-target="#signUpModal" data-toggle="modal">Đăng ký</a>
							</div>
						</div>


						<!-- Login modal -->
						<div class="modal fade" id="loginModal">
							<div class="modal-dialog ">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">Đăng nhập</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<form action="authentication/login.php" method="post" class="needs-validation" novalidate>
											<div class="form-group">
												<label for="email">Email:</label>
												<input type="email" class="form-control" placeholder="Enter email" id="email" required name="email">
											</div>
											<div class="form-group">
												<label for="pwd">Password:</label>
												<input type="password" class="form-control" placeholder="Enter password" id="pwd" required name="password">
											</div>
											<div class="form-group custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me">
												<label class="custom-control-label" for="remember_me">Remember
													me</label>
											</div>
											<button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
										</form>
									</div>

									<!-- Modal footer -->
									<div class="modal-footer" style="justify-content: center;">
										Not a member yet?<a href="#">Sign Up</a>
									</div>
								</div>
							</div>
						</div>
						<!-- End Login modal -->

						<!-- Sign up modal -->
						<div class="modal fade" id="signUpModal">
							<div class="modal-dialog ">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">Đăng ký</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<form action="authentication/sign_up.php" method="post" class="needs-validation" novalidate>
											<div class="form-group">
												<label for="name">Name:</label>
												<input type="text" class="form-control" placeholder="Enter name" id="name" required name="name">
												<div class="invalid-feedback">
													Please enter your name
												</div>
											</div>
											<div class="form-group">
												<label for="email">Email:</label>
												<input type="email" class="form-control" placeholder="Enter email" id="email" required name="email">
												<div class="invalid-feedback">
													Please enter your email
												</div>
											</div>
											<div class="form-group">
												<label for="pwd">Password:</label>
												<input type="password" class="form-control" placeholder="Enter password" id="pwd" required name="password">
												<div class="invalid-feedback">
													Please enter your password
												</div>
											</div>
											<button type="submit" class="btn btn-primary w-100">Đăng ký</button>
										</form>
									</div>

									<!-- Modal footer -->
									<div class="modal-footer" style="justify-content: center;">
										Are you a member?<a href="#">Sign in</a>
									</div>
								</div>
							</div>
						</div>
						<!-- End Sign up modal -->
					<?php } ?>
					<!-- End When user doesn't login -->
				</div>

			</div>
		</div>
	</div>
</nav>
<script>
	$('#loginModal .modal-footer a').click(function(event) {
		$('#loginModal').modal('hide');
		$('#signUpModal').modal('show');
	})

	$('#signUpModal .modal-footer a').click(function(event) {
		$('#loginModal').modal('show');
		$('#signUpModal').modal('hide');
	})
</script>