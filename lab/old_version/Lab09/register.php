<?php
	require_once "connect.php";

	$name = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$sql = "INSERT into customer(name, password, email) VALUES(?,?,?)";
	$stm = $conn->prepare($sql);
	$stm->bind_param('sss', $name, $password, $email);
	$stm->execute();

	header('location: login.php');
