<?php

if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['img'])) {
	die('Please send enough information');
}

if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['price']) || empty($_POST['img'])) {
	die("Please don't send empty value");
}

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$img = $_POST['img'];
$desc = $_POST['desc'];

require_once "db_connect.php";

$query = "UPDATE product SET name = ?, price = ?, image = ?, description = ? WHERE id = ?";

$stm  = $conn->prepare($query);

$stm->bind_param("sisss", $name, $price, $img, $desc, $id);

if (!$stm->execute()) {
	die("Update failed" . $stm->error);
}

$conn->close();
header("location: index.php");
