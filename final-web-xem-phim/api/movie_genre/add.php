<?php
    require_once ('../../connect.php');

    $genre_id = $_POST['genre_id'];
    $movie_id = $_POST['movie_id'];

    $sql = 'INSERT INTO movie_genre VALUES(?,?)';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($genre_id, $movie_id));

        echo json_encode(array('status' => true, 'data' => 'Thêm thể loại cho phim thành công'));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }
?>