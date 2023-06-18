<?php
require_once('../../connect.php');

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE user set status = ? WHERE id = ?";

try {
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ii", $status, $id);
	

	if ($stmt->execute()) {
		if ($status == 0) {
			echo json_encode(array('status' => true, 'data' => 'Active thành công'));
		} else {
			echo json_encode(array('status' => true, 'data' => 'Disable thành công'));
		}
	}
} catch (PDOException $ex) {
	echo(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
