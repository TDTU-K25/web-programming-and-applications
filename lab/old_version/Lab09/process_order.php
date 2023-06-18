<?php
session_start();

require_once "connect.php";

$date = $_POST['date'];

$total_price = 0;
foreach ($_SESSION['cart'] as $product_id => $product_info) {
	$total_price += $product_info['price'] * $product_info['quantity'];
}

$sql = "SELECT * from bill order by id desc limit 1";
$result_set = $conn->query($sql);
$bill_id = null;
if ($result_set->num_rows == 0) {
	$bill_id = 1;
} else {
	$row = $result_set->fetch_assoc();
	$bill_id = $row['id'] + 1;
}

$sql = "INSERT INTO bill VALUES(?, ?, ?)";
$stm = $conn->prepare($sql);
$stm->bind_param("iis", $bill_id, $total_price, $date);
$stm->execute();

if ($stm->affected_rows) {
	$sql = "INSERT INTO bill_details(id, bill_id, product_id, quantity) VALUES(?, ?, ?, ?)";
	$stm = $conn->prepare($sql);
	foreach ($_SESSION['cart'] as $product_id => $product_info) {
		$sql = "SELECT * from bill_details order by id desc limit 1";
		$result_set = $conn->query($sql);
		$bill_detail_id = null;
		if ($result_set->num_rows == 0) {
			$bill_detail_id = 1;
		} else {
			$row = $result_set->fetch_assoc();
			$bill_detail_id = $row['id'] + 1;
		}
		$stm->bind_param("iiii", $bill_detail_id, $bill_id, $product_id, $_SESSION['cart'][$product_id]['quantity']);
		$stm->execute();
	}
	unset($_SESSION['cart']);
} else {
	die("Can not create bill");
}

header("location: index.php");
