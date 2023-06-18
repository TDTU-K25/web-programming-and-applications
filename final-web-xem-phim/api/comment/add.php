<?php
require_once('../../connect.php');

$movie_id = $_POST['movie_id'];
$user_id = $_POST['user_id'];
$comment = $_POST['content'];

$sql = "INSERT INTO comment(content, user_id, movie_id) VALUES(?,?,?)";

try {
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("sii", $comment, $user_id, $movie_id);
	$stmt->execute();
	echo json_encode(array('success' => true, 'message' => 'Add comment successfully', 'inserted_id' => $stmt->insert_id));
} catch (PDOException $ex) {
	die(json_encode(array('success' => false, 'data' => $ex->getMessage())));
}
