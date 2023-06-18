<?php
    require_once ('../../connect.php');

    $genre = $_POST['genre'];

    $sql = 'INSERT INTO genre(name) VALUES(?)';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($genre));

        echo json_encode(array('status' => true, 'data' => 'Thêm thể loại thành công'));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }



?>