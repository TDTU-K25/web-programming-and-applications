<?php
session_start();
require_once "../../connect.php";

$name = $_POST['name'];

$sql = "INSERT into genre(name) values(?)";
$stm = $conn->prepare($sql);
$stm->bind_param("s", $name);
if (!$stm->execute()) {
	$_SESSION['error'] = $stm->error;
} else {
	$_SESSION['success'] = 'Add genre successfully';
}

header('location: index.php');
