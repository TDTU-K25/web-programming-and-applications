<?php

$host = 'localhost';
$user = 'root';
$pwd = '';
$db = 'shop';

$conn = new mysqli($host, $user, $pwd, $db);

if ($conn->connect_error) {
	die("Can't connect to Database" . $conn->connect_error);
}
