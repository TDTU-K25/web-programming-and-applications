<?php
	$conn = new mysqli('localhost', 'root', '', 'online_marketing');
	if ($conn->connect_errno) {
		die('Lỗi: ' . $conn->connect_error);
	}
