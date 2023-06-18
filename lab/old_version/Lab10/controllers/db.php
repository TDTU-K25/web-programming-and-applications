<?php
$conn = new mysqli("localhost", 'root', '', 'MobileDatabase');
if ($conn->connect_errno) {
	die("Lỗi kết nối: " . $conn->connect_error);
}
?>