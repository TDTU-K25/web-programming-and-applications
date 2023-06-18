<?php

require_once "db_connect.php";

if (!isset($_GET['id'])) {
	die('Please send ID');
}

if (empty($_GET['id'])) {
	die("Please don't send empty value");
}

$id = $_GET['id'];

$query = "DELETE FROM product WHERE id = ?";
$stm = $conn->prepare($query);

$stm->bind_param("s", $id);

if (!$stm->execute()) {
	die('Delete failed' . $stm->error);
}

header("location: index.php");