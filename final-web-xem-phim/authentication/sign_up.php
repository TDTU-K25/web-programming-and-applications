<?php
session_start();
require_once "../connect.php";
require_once "send_email.php";

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
	$_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin";
	header("location: ../index.php");
	exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if email has already existed
$sql = "SELECT * FROM user WHERE email = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("s", $email);
if (!$stm->execute()) {
	die($stm->error);
}
$result = $stm->get_result();


if ($result->num_rows == 1) {
	$_SESSION['error'] = "Email đã tồn tại";
	header("location: ../index.php");
	exit;
} else {
	$status = 0; // active
	$role = 0; // user
	$sql = "INSERT INTO user(name, email, password, status, role) VALUES(?, ?, ?, ?, ?)";
	$stm = $conn->prepare($sql);
	$stm->bind_param("sssii", $name, $email, $password, $status, $role);
	if (!$stm->execute()) {
		die($stm->error);
	}
	$url = $_SERVER['HTTP_HOST'] . "/" . 'index.php';
	send_email($email, "Đăng ký thành công", "Click vào <a href='$url'>đây</a> đề quay lại trang chủ");
}

$_SESSION['success'] = "Đăng ký thành công";
header("location: ../index.php");