<?php
session_start();
$filepath = $_GET['path'];
if (is_file($filepath)) {
	unlink($filepath);
	$filename = basename($filepath);
	$_SESSION['success'] = "Delete file $filename successfully";
} else {
	rmdir($filepath);
	$foldername = basename($filepath);
	$_SESSION['success'] = "Delete folder $foldername successfully";
}
header("location: exercise2.php");
