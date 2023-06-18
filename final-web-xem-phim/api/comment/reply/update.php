<?php
	require_once ('../../../connect.php');;

	$replyID = $_POST['replyID'];
	$comment = $_POST['content'];;
	$user_id = $_POST['user_id'];

		$sql = 'UPDATE replies SET content = ? WHERE reply_comment_id = ? and user_id =?';
	
		try{
		$stmt = $conn->prepare($sql); 
		$stmt->bind_param("sii", $comment, $replyID, $user_id);
		$stmt->execute();
		echo json_encode(array('success' => true, 'message' => 'Update reply successfully'));
		
		}
		
		catch(PDOException $ex){
			die(json_encode(array('success' => false, 'message' => $ex->getMessage())));
			
		}
