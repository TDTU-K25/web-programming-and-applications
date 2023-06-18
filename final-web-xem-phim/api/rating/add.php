<?php
    require_once ('../../connect.php');

    $movie_id = $_POST['movie_id'];
    $user_id = $_POST['user_id'];
	$score = $_POST['score'];

    $sql = 'INSERT INTO rate(movie_id, user_id, score) VALUES(?,?,?)';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($movie_id, $user_id, $score));

        echo json_encode(array('status' => true, 'data' => 'Rating phim thành công'));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }



?>