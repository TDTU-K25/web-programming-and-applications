<?php
	$conn = new mysqli("localhost", "root", "");
	$conn->select_db("watch_movies_online");
	$conn->set_charset("utf8");
	if ($conn->connect_errno) {
		die("Can not connect to database " . $conn->connect_error);
	}
?>