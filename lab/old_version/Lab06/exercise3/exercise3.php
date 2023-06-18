<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercise3</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>

<body>
	<form action="display.php" method="post" class="w-25 mx-auto mt-3">
		<div class="form-group">
			<label>Your name:</label>
			<input class="form-control" type="text" name="name" id="">
		</div>
		<div class="form-group">
			<label>Your sex:</label>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="gender" value="male" id="">
				<label for="" class="form-check-label">Male</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="gender" value="female" id="">
				<label for="" class="form-check-label">Female</label>
			</div>
		</div>
		<div class="form-group">
			<div class="form-check pl-0">
				<input type="checkbox" name="browsers[]" value="IE" id=""> Using Internet Explorer
			</div>
			<div class="form-check pl-0">
				<input type="checkbox" name="browsers[]" value="Firefox" id=""> Using Firefox
			</div>
			<div class="form-check pl-0">
				<input type="checkbox" name="browsers[]" value="Chrome" id=""> Using Google Chrome
			</div>
		</div>

		<div>How many children do you have?</div>
		<div class="form-group">
			<select name="numOfChildren" id="" class="form-control">
				<option value="0" selected>None</option>
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
		</div>
		<button class="btn btn-primary mb-3" type="submit">Submit</button>

		<?php if (isset($_SESSION['errorMsg'])) { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!</strong> <?= $_SESSION['errorMsg'] ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			<?php unset($_SESSION['errorMsg']);
		} ?>
			</div>
	</form>
	<script>
		$(document).ready(function() {
			setTimeout(() => {
				$(".alert-danger").alert('close');
			}, 1000)
		})
	</script>
</body>

</html>