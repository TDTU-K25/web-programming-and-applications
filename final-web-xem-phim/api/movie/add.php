<?php
    require_once ('../../connect.php');

	$imdb_id = $_POST['imdb_id'];
    $name = $_POST['name'];
    $poster = $_POST['poster'];
    $runtime = $_POST['runtime'];
    $description = $_POST['description'];
    $trailer = $_POST['trailer'];
    $release_date = $_POST['release_date'];
    $popularity = $_POST['popularity'];
    $video = $_POST['video'];

    $sql = 'INSERT INTO movie(name, trailer, runtime, poster, description, imdb_id, release_date, popularity, src) VALUES(?,?,?,?,?,?,?,?,?)';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($name, $trailer, $runtime, $poster, $description, $imdb_id, $release_date, $popularity, $video));

        echo json_encode(array('status' => true, 'data' => $stmt->insert_id));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }



?>