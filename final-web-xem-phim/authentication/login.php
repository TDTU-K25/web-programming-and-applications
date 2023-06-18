<?php
session_start();

require_once "../connect.php";

if (empty($_POST['email']) || empty($_POST['password'])) {
	$_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin";
	header("location: ../index.php");
	exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user where email = ? and password = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("ss", $email, $password);
if (!$stm->execute()) {
	die($stm->error);
}
$result = $stm->get_result();

if ($result->num_rows == 1) {
	$row = $result->fetch_assoc();
	if ($row['status'] == 1) {
		$_SESSION['error'] = "Tài khoản của bạn đã bị vô hiệu hóa";
		header("location: ../index.php");
		exit;
	}
	$_SESSION['id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
	$_SESSION['avatar'] = $row['avatar'];
	$_SESSION['role'] = $row['role'];
	if (isset($_POST['remember_me'])) {
		$token = uniqid("user_");
		setcookie('token', $token, time() + 1000 * 36000, "/");
		$sql = "UPDATE user SET token = ? WHERE id = ?";
		$stm = $conn->prepare($sql);
		$stm->bind_param("si", $token, $row['id']);
		if(!$stm->execute()) {
			die($stm->error);
		}
	}
} else {
	$_SESSION['error'] = "Email hoặc mật khẩu không hợp lệ";
	header("location: ../index.php");
	exit;
}

$_SESSION['success'] = "Đăng nhập thành công";
header("location: ../index.php");