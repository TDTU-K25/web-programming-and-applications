<!-- toast message -->
<?php $isError = null;
if (isset($_SESSION['error']) || isset($_SESSION['success'])) {
	if (isset($_SESSION['error'])) {
		$isError = true;
	} else {
		$isError = false;
	}
?>
	<div id="toast" class="position-fixed" style="bottom: 0; right: 10px; z-index: 5;">
		<div class="alert <?php if ($isError) echo "alert-danger";
							else echo "alert-success" ?>" role="alert">
			<strong><?php if ($isError) echo "Warning!";
					else echo "Success!" ?></strong> <?php if ($isError) {
															echo $_SESSION['error'];
															unset($_SESSION['error']);
														} else {
															echo $_SESSION['success'];
															unset($_SESSION['success']);
														}

														?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
	<script>
		setTimeout(function() {
			$('#toast').animate({
				opacity: 0
			}, 500, function() {
				$(this).remove();
			});
		}, 2000)
	</script>
<?php } ?>