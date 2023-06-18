<?php
require_once('../../connect.php');

$id = $_POST['id'];

$sql = "SELECT * FROM user WHERE id = ?";

try {
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result_set = $stmt->get_result();

	if ($result_set) {
		$row = $result_set->fetch_assoc();

		echo json_encode(array('status' => true, 'data' => $row));
	} else {
		die(json_encode(array('status' => false, 'data' => 'Query failed')));
	}
} catch (PDOException $ex) {
	die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
