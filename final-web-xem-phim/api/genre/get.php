<?php
    require_once ('../../connect.php');

	$name = $_POST['name'];

    $sql = 'SELECT * FROM genre WHERE name = ?';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($name));
		$result_set = $stmt->get_result();
		$genre_id = $result_set->fetch_assoc();

        echo json_encode(array('status' => true, 'data' => $genre_id));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }



?>