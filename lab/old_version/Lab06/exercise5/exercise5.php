<? session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exercise5</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
	<form id="uploadForm" enctype="multipart/form-data" class="w-25 mx-auto mt-3">
		<div class="form-group">
			<label for="">Your files</label>
			<input type="file" class="form-control" id="fileInput" name="files[]" multiple>
		</div>
		<div class="form-group">
			<div class="progress">
				<div id="progress-bar" class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</div>
		<button class="btn btn-primary" type="submit" id="submitBtn">Upload</button>
	</form>
	<script>
		let fileInput = document.getElementById('fileInput');
		let progressBar = document.getElementById('progress-bar');

		document.getElementById('uploadForm').addEventListener('submit', function(event) {
			event.preventDefault();

			if (fileInput.files.length === 0) {
				console.log("Please attach files")
				return
			}

			let data = new FormData();

			for (let i = 0; i < fileInput.files.length; i++) {
				data.append('files[]', fileInput.files[i]);
			}

			let xhr = new XMLHttpRequest();
			xhr.open("POST", "upload.php", true);
			
			
			xhr.upload.addEventListener("progress", function(event) {
				let loaded = event.loaded;
				let total = event.total;
				let percentage = loaded * 100 / total;
				progressBar.style.width = percentage + "%";
			})

			xhr.send(data);
			
		})
	</script>
</body>

</html>