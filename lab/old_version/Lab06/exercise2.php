<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercise2</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>

<body>
	<?php
	if (isset($_POST['submit'])) {
		if (empty($_POST['firstOperand']) || empty($_POST['secondOperand']) || empty($_POST['operator'])) {
			$errorMsg = "Please enter enough information";
		} else {
			$firstOperand = $_POST['firstOperand'];
			$secondOperand = $_POST['secondOperand'];
			$operator = $_POST['operator'];

			switch ($operator) {
				case "+":
					$result = $firstOperand + $secondOperand;
					break;
				case "-":
					$result = $firstOperand - $secondOperand;
					break;
				case "*":
					$result = $firstOperand * $secondOperand;
					break;
				case "/":
					$result = $firstOperand / $secondOperand;
					break;
			}
		}
	}

	?>
	<form action="" method="post" class="w-25 mx-auto mt-3">
		<div class="form-group">
			<label for="">Số hạng 1</label>
			<input class="form-control" type="number" name="firstOperand" id="">
		</div>

		<div class="form-group">
			<label for="">Số hạng 2</label>
			<input class="form-control" type="number" name="secondOperand" id="">
		</div>
		<div class="form-group">
			<div class="form-check-inline">
				<input class="form-check-input" type="radio" name="operator" value="+">
				<label for="" class="form-check-label">Cộng</label>
			</div>
			<div class="form-check-inline">
				<input class="form-check-input" type="radio" name="operator" value="-">
				<label for="" class="form-check-label">Trừ</label>
			</div>
			<div class="form-check-inline">
				<input class="form-check-input" type="radio" name="operator" value="*">
				<label for="" class="form-check-label">Nhân</label>
			</div>
			<div class="form-check-inline">
				<input class="form-check-input" type="radio" name="operator" value="/">
				<label for="" class="form-check-label">Chia</label>
			</div>
		</div>

		<div class="form-group">
			<?php if (!empty($_POST['firstOperand']) && !empty($_POST['secondOperand']) && !empty($_POST['operator'])) {
				echo "$firstOperand $operator $secondOperand = " . $result;
			} ?>
		</div>


		<div class="form-group">
			<button class="btn btn-primary" type="submit" name="submit">Xem kết quả</button>
		</div>

		<span id="errorMsgBox" style="color: red;">
			<?php if (!empty($errorMsg)) {
				echo $errorMsg;
			}  ?>
		</span>

	</form>
	<script>
		$(document).ready(function() {
			setTimeout(() => {
				$("#errorMsgBox").css("display", "none");
			}, 1000);
		})
	</script>
</body>

</html>