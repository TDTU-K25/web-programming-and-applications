<?php
session_start();

$current_path = $_POST['currentPath'];
$folder_name = $_POST['folderName'];
$folder_path = $current_path . "/" . $folder_name;

if (file_exists($folder_path)) {
	$folder = basename($folder_path);
	$_SESSION['error'] = "Folder $folder exists";
} else {
	mkdir($folder_path);
	$folder = basename($folder_path);
	$_SESSION['success'] = "Create folder $folder successfully";
}

header("location: exercise2.php");
