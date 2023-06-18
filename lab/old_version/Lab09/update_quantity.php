<?php
session_start();

$product_id = $_POST['id'];
$quantity = $_POST['quantity'];

if ($quantity <= 0) {
	unset($_SESSION['cart'][$product_id]);
} else {
	$_SESSION['cart'][$product_id]['quantity'] = $quantity;
}

echo json_encode(array('status' => 'success'));
