<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<style>
		tr.header {
			font-weight: bold;
			color: white;
			background-color: deepskyblue;
		}

		td {
			padding: 10px;
		}
	</style>
</head>

<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$drive = $root . "/TDTU/Lab07/drive";
if (isset($_GET['path'])) {
	$drive = $_GET['path'];
}
?>

<body>
	<!-- Error toast message -->
	<?php if (isset($_SESSION['error'])) { ?>
		<div class="toast" style="position: absolute; top: 50px; right: 50px;">
			<div class="toast-body">
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Warning!</strong> <?php echo $_SESSION['error'];
												unset($_SESSION['error']); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	<?php } ?>

	<!-- Success toast message -->
	<?php if (isset($_SESSION['success'])) { ?>
		<div class="toast" style="position: absolute; top: 50px; right: 50px;">
			<div class="toast-body">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success!</strong> <?php echo $_SESSION['success'];
												unset($_SESSION['success']); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	<?php } ?>

	<br>

	<div style="width: 300px; margin: auto; margin-bottom: 50px">
		<form action="create_new_folder.php" method="post">
			<input type="hidden" name="currentPath" value="<?= $drive ?>">
			<input type="text" name="folderName">
			<input type="submit" value="New folder" name="submit">
		</form>

		<br>

		<form action="upload.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="currentPath" value="<?= $drive ?>">
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload" name="submit">
		</form>
	</div>


	<table border="1" cellpadding="15" cellspacing="10" style="text-align: center; margin: auto; border-collapse: collapse">
		<tr>
			<td colspan="6">
				<button id="backBtn" class="btn">Back</button>
			</td>
		</tr>
		<tr class="header">
			<td>Icon</td>
			<td>File name</td>
			<td>Type</td>
			<td>Last modified</td>
			<td>File size</td>
			<td>Action</td>
		</tr>
		<?php
		$files = scandir($drive);
		foreach ($files as $file) {
			$filePath = $drive . "/" . $file;
			if ($file === "." || $file === "..") {
				continue;
			}
		?>
			<tr>
				<td><img src="<?php
								$mime = mime_content_type($filePath);
								if (strstr($mime, "video/")) {
									echo "images/mp4-icon.png";
								} else if (strstr($mime, "audio/")) {
									echo "images/audio-x-generic-icon.png";
								} else if (strstr($mime, "text/")) {
									echo "images/text-x-tex-icon.png";
								} else if (strstr($mime, "application/x-rar") || strstr($mime, "application/zip")) {
									echo "images/document-compress-icon.png";
								} else {
									echo "images/Folder-icon.png";
								}
								?>"></td>
				<td><a href="<?php
								if (is_dir($filePath)) {
									echo "?path=" . $filePath;
								}
								?>"><?= $file ?></a></td>
				<td>
					<?php
					if (is_dir($filePath)) {
						echo "Folder";
					} else {
						if (strstr($mime, "video/")) {
							echo "Video";
						} else if (strstr($mime, "audio/")) {
							echo "Audio";
						} else if (strstr($mime, "text/")) {
							echo "Text";
						} else if (strstr($mime, "application/x-rar") || strstr($mime, "application/zip")) {
							echo "Compressed";
						}
					}
					?>
				</td>
				<td>
					<?php
					date_default_timezone_set("Asia/Bangkok");
					echo date("d/m/Y H:i:s", filemtime($filePath));
					?>
				</td>
				<td>
					<?php
					clearstatcache();
					$size = null;
					if (is_file($filePath)) {
						if (filesize($filePath) > 0) {
							$size = ceil(filesize($filePath) / 1024) . " KB";
						}
						if (filesize($filePath) > pow(1024, 2)) {
							$size = ceil(filesize($filePath) / pow(1024, 2)) . " MB";
						}
						if (filesize($filePath) > pow(1024, 3)) {
							$size = ceil(filesize($filePath) / pow(1024, 3)) . " GB";
						}
						echo $size;
					} else {
						echo "-";
					}
					?>
				</td>
				<td><a href="#" data-path="<?= $filePath ?>" class="rename" data-toggle="modal" data-target="#renameModal">Rename</a> | <a class="delete" href="#" data-path="<?= $filePath ?>" data-toggle="modal" data-target="#confirmModal">Delete</a></td>
			</tr>
		<?php } ?>
	</table>


	<!-- Rename dialog -->
	<div class="modal fade" id="renameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Đổi tên</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="renameForm" action="rename.php" method="post">
						<input type="hidden" name="oldPath" id="oldPathInput">
						<p>Nhập tên mới</p>
						<input type="text" id="fileNameInput" name="newName">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<button id="saveBtn" type="button" class="btn btn-success" data-dismiss="modal">Lưu</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Rename dialog -->

	<!-- Confirm delete dialog -->
	<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<button id="confirmDeleteBtn" type="button" class="btn btn-danger" data-dismiss="modal">Xóa</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Confirm delete dialog -->

	<script>
		$('#backBtn').click(function(event) {
			let currentURL = window.location.href;
			let driveURL = currentURL.split("?");
			window.location.href = driveURL[0];
		})

		$('.rename').click(function(event) {
			let filename = $(this).closest('tr').find('td')[1].innerText;
			$('#fileNameInput').val(filename);
			$('#oldPathInput').val($(this).data('path'));
		})

		$('#saveBtn').click(function(event) {
			$("#renameForm").submit();
		})

		$('.delete').click(function(event) {
			$('#confirmDeleteBtn').data("path", $(this).data('path'));
		})

		$('#confirmDeleteBtn').click(function(event) {
			let path = $('#confirmDeleteBtn').data('path');
			window.location.href = "delete.php?path=" + path;
		})
	</script>
</body>

</html>