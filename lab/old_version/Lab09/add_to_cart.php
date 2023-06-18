<?php
session_start();

require_once "connect.php";

$product_id = $_GET['id'];

$sql = "SELECT name, description, price, image FROM product Where id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("i", $product_id);
$stm->execute();
$stm->bind_result($name, $description, $price, $image);
$stm->fetch();

if (!isset($_SESSION['cart'][$product_id])) {
	$_SESSION['cart'][$product_id]['id'] = $product_id;
	$_SESSION['cart'][$product_id]['name'] = $name;
	$_SESSION['cart'][$product_id]['price'] = $price;
	$_SESSION['cart'][$product_id]['description'] = $description;
	$_SESSION['cart'][$product_id]['image'] = $image;
	$_SESSION['cart'][$product_id]['quantity'] = 1;
} else {
	$_SESSION['cart'][$product_id]['quantity']++;
}

header("location: index.php");
