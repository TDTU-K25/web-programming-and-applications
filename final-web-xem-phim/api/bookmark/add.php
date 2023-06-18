<?php
    require_once ('../../connect.php');

    $movie_id = $_POST['movie_id'];
    $user_id = $_POST['user_id'];

    $sql = 'INSERT INTO bookmark(movie_id, user_id) VALUES(?,?)';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($movie_id, $user_id));

        echo json_encode(array('status' => true, 'data' => 'Bookmark phim thành công'));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }



?>