<?php
require_once('../../../connect.php');;

$replyID = $_POST['replyID'];


$sql = 'DELETE FROM replies WHERE reply_comment_id = ?';

try {
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $replyID);
	$stmt->execute();

	echo json_encode(array('success' => true, 'message' => 'Delete reply successfully', "affected_rows" => $stmt->affected_rows));
} catch (PDOException $ex) {
	die(json_encode(array('success' => false, 'message' => $ex->getMessage())));
}