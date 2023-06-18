<?php 
session_start();
require_once "../../connect.php";

$id = $_POST['id'];
$name = $_POST['name'];

$sql = "UPDATE genre set name = ? where id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param('si', $name, $id);

if (!$stm->execute()) {
	$_SESSION['error'] = $stm->error;
} else {
	$_SESSION['success'] = 'Update genre successfully';
}

header('location: index.php');