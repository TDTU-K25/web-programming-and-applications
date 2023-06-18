<?php
require_once('../../connect.php');;

$commentID = $_POST['commentID'];

$replies_affected_row = $conn->query("SELECT * FROM replies WHERE root_comment_id = $commentID")->num_rows;
$sql = 'DELETE FROM comment WHERE comment_id= ?';

try {
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $commentID);
	$stmt->execute();


	echo json_encode(array('success' => true, 'message' => 'Delete comment successfully', "affected_rows" => $stmt->affected_rows + $replies_affected_row));
} catch (PDOException $ex) {
	die(json_encode(array('success' => false, 'message' => $ex->getMessage())));
}
