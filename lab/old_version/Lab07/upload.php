<?php
session_start();
$current_path = $_POST['currentPath'];
$uploaded_file = $_FILES['fileToUpload'];
$file_name = basename($uploaded_file["name"]);
$target_file = $current_path . "/" . $file_name;

// Check if file already exists
if (file_exists($target_file)) {
	$_SESSION['error'] = "Sorry, file $file_name already exists.";
	header("location: exercise2.php");
	exit;
}

// Check file size
if ($uploaded_file["size"] > pow(1024, 3)) {
	$_SESSION['error'] = "Sorry, file $file_name is too large.";
	header("location: exercise2.php");
	exit;
}

// Allow certain file formats
$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
$acceptedTypes = array("mp4", "zip", "php", "txt");
if (!in_array($file_type, $acceptedTypes)) {
	$_SESSION['error'] = "Sorry, only mp4, zip, php & txt files are allowed.";
	header("location: exercise2.php");
	exit;
}

move_uploaded_file($uploaded_file["tmp_name"], $target_file);
$_SESSION['success'] = "Upload file $file_name successfully";
header("location: exercise2.php");
