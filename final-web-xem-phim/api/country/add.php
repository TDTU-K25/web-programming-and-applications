<?php
    require_once ('../../connect.php');

    $country = $_POST['country'];

    $sql = 'INSERT INTO country(name) VALUES(?)';

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($country));

        echo json_encode(array('status' => true, 'data' => 'Thêm quốc gia thành công'));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }



?>