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

$query = "INSERT INTO product VALUES(?, ?, ?, ?, ?)";
$stm  = $conn->prepare($query);
$stm->bind_param("ssiss", $id, $name, $price, $img, $desc);

if (!$stm->execute()) {
	die("Add failed" . $stm->error);
}

$conn->close();
header("location: index.php");