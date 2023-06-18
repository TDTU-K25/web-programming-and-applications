<?php
    require_once ('../../connect.php');

    $movie_id = $_POST['movie_id'];
    $user_id = $_POST['user_id'];
	$score = $_POST['score'];

    $sql = 'UPDATE rate SET score = ? WHERE movie_id = ? and user_id = ?';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($score, $movie_id, $user_id));

        echo json_encode(array('status' => true, 'data' => 'Update rating phim thành công'));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }



?>