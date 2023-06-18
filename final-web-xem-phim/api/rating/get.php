<?php
    require_once ('../../connect.php');

    $movie_id = $_GET['movie_id'];
    $user_id = $_GET['user_id'];

    $sql = 'SELECT * from rate where movie_id = ? and user_id = ?';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($movie_id, $user_id));
		$result_set = $stmt->get_result();

		if ($result_set->num_rows == 1) {
			echo json_encode(array('status' => true, 'isRate' => true));
		} else {
			echo json_encode(array('status' => true, 'isRate' => false));
		}
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }



?>