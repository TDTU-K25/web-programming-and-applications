<?php
require_once('../../../connect.php');

$user_id = $_POST['user_id'];
$comment = $_POST['content'];
$root_comment_id = $_POST['rootCmtID'];


$sql = "INSERT INTO replies(content, root_comment_id, user_id) VALUES(?,?,?)";

try {
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sii", $comment, $root_comment_id, $user_id);
	$stmt->execute();
	echo json_encode(array('success' => true, 'message' => 'Add reply successfully', 'inserted_id' => $stmt->insert_id));
} catch (PDOException $ex) {
	die(json_encode(array('success' => false, 'data' => $ex->getMessage())));
}
