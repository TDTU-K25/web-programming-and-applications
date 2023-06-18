<?php
	require_once ('../../connect.php');;
	
	$commentID = $_POST['commentID'];
	$comment = $_POST['content'];
	$user_id = $_POST['user_id'];

		$sql = 'UPDATE comment SET content = ? WHERE comment_id = ? and user_id = ? ';
	
		try{
		$stmt = $conn->prepare($sql); 
		$stmt->bind_param("sii", $comment, $commentID,$user_id);
		$stmt->execute();
		
		echo json_encode(array('success' => true, 'message' => 'Update comment successfully'));
		
		}
		
		catch(PDOException $ex){
			die(json_encode(array('success' => false, 'message' => $ex->getMessage())));
			
		}
?>