<?php
$db = new mysqli('localhost', 'root', '', 'students');
if ($db->connect_errno)
	die("Lỗi kết nối: " . $db->connect_error);
