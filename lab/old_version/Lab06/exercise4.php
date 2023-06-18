<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercise4</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style>
		* {
			box-sizing: border-box;
		}

		#colorPanel {
			width: 300px;
			height: 300px;
			margin: auto;
		}

		.colorCell {
			width: 30px;
			height: 30px;
			border: 1px solid black;
			float: left;
		}

		.clearfix {
			content: "";
			display: table;
			clear: both;
		}
	</style>

	<script>
		$(document).ready(function() {
			
			$(".alert-success").hide();
			
			let lastColor = null;
			$('.colorCell')
				.mouseenter(function(event) {
					lastColor = $('body').css('background-color');
					$('body').css('background-color', event.target.style.backgroundColor);
				})
				.mouseout(function(event) {
					$('body').css('background-color', lastColor);
				})
				.click(function(event) {
					lastColor = event.target.style.backgroundColor;
					$('body').css('background-color', event.target.style.backgroundColor);
					$(".alert-success").show();
					$(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
						$(".alert-success").slideUp(500);
					});
				})
		})
	</script>
</head>

<body>
	<div id="colorPanel" class="clearfix mt-3">
		<?php
		$numberOfCells = 100;
		for ($i = 1; $i <= $numberOfCells; $i++) {
			$r = rand(0, 255);
			$g = rand(0, 255);
			$b = rand(0, 255);
		?>
			<div class="colorCell" style="background-color: rgb(<?= $r ?>, <?= $g ?>, <?= $b ?>);"></div>
		<?php	}
		?>
	</div>

	<br>

	<div class="alert alert-success alert-dismissable text-center w-25 mx-auto">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Background color has been changed.
	</div>
</body>

</html>