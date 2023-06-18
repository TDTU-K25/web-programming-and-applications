<?php
session_start();

$maxFileSize = 5 * 1024 * 1024; // 5 MB
$allowedTypes = array('mp3', 'jpg', 'mp4');
$uploadedFiles = $_FILES['files'];

foreach ($uploadedFiles['name'] as $key => $filename) {
	$fileError = $uploadedFiles['error'][$key];
	if ($fileError) {
		$_SESSION['errorMsg'] = "Can not upload file";
		return false;
	}

	$path = "upload/" . $filename;
	if (file_exists($path)) {
		$_SESSION['errorMsg'] = "$filename exists";
		return false;
	}

	$fileSize = $uploadedFiles['size'][$key];
	if ($fileSize > $maxFileSize) {
		$_SESSION['errorMsg'] = "$filename too large";
		return false;
	}

	$fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
	if (!in_array($fileExtension, $allowedTypes)) {
		$_SESSION['errorMsg'] = "$filename has extension $fileExtension which is not allowed";
		return false;
	}

	$tmpFilePath = $uploadedFiles['tmp_name'][$key];
	move_uploaded_file($tmpFilePath, $path);
	return true;
}
