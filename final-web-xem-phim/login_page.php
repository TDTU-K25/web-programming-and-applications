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
</head>

<body class="d-flex align-items-center justify-content-center" style="height: 100vh">
	<div class="">
		<button id="adminLogin" class="btn btn-danger">Đăng nhập admin</button>
		<button id="customerLogin" class="btn btn-success">Đăng nhập customer</button>
	</div>
	<form id="loginForm" method="post" class="w-25 mx-auto p-5 d-none">
		<div class="form-group">
			<label for="email" class="">Email address</label>
			<input type="email" id="email" class="form-control" placeholder="Email address" required name="email">
		</div>
		<div class="form-group">
			<label for="password" class="sr-only">Password</label>
			<input type="password" id="password" class="form-control" placeholder="Password" required name="password">
		</div>
		<div class="form-group">
			<div class="checkbox mb-3">
				<label>
					<input type="checkbox" name="remember_me"> Remember me
				</label>
			</div>
		</div>
		<div class="form-group">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</div>
	</form>

	<script>
		$('#adminLogin').click(function(event) {
			$('#adminLogin').hide()
			$('#customerLogin').hide()

			$('#loginForm').attr("action", "admin/login.php")
			$('#loginForm').removeClass('d-none');
			$('#loginForm').addClass('d-block');
		})

		$('#customerLogin').click(function(event) {
			$('#adminLogin').hide()
			$('#customerLogin').hide()

			$('#loginForm').attr("action", "authentication/login.php")
			$('#loginForm').removeClass('d-none');
			$('#loginForm').addClass('d-block');
		})
	</script>
</body>

</html>