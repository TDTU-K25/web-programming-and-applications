<?php
    require_once ('../../connect.php');

    $movie_id = $_POST['movie_id'];
    $user_id = $_POST['user_id'];

    $sql = 'DELETE FROM rate WHERE movie_id = ? and user_id = ?';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($movie_id, $user_id));

        echo json_encode(array('success' => true, 'data' => 'Remove rating phim thành công'));
    }
    catch(PDOException $ex){
        die(json_encode(array('success' => false, 'data' => $ex->getMessage())));
    }



?>