<?php
session_start();

$product_id = $_GET['id'];

unset($_SESSION['cart'][$product_id]);

header("location: cart.php");
