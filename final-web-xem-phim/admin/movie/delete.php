<?php
session_start();
require_once('../../connect.php');

if (isset($_GET['id'])) {
	$movie_id = $_GET['id'];
	$sql = "DELETE FROM movie WHERE id = ?";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $movie_id);
	$stmt->execute();
	$_SESSION['success'] = "Xóa thành công";
	header("location: index.php");
	exit();
} else {
	$_SESSION['error'] = "ID không tồn tại";
	header("location: index.php");
	exit();
}
