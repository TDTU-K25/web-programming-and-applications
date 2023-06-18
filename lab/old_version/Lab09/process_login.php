<?php
session_start();

require_once "connect.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * from customer where email = ? and password = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("ss", $email, $password);
$stm->execute();
$result_set = $stm->get_result();
if ($result_set->num_rows == 1) {
	$row = $result_set->fetch_assoc();
	$_SESSION['id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
} else {
	die("Email or password invalid");
	header('location: login.php');
	exit;
}

header('location: index.php');
