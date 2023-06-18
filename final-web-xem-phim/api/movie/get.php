<?php
    require_once ('../../connect.php');

	$search_content = $_GET['searchContent'];

    $sql = "SELECT * FROM movie WHERE name like '%$search_content%' LIMIT 3";
    try{
		$result = $conn->query($sql);
        $data = array();
    	if ($result) {
        	while ($row = $result->fetch_assoc()) {
            	$data[] = $row;
        }
        echo json_encode(array('status' => true, 'data' => $data));
    } else {
        die(json_encode(array('status' => false, 'data' => 'Query failed')));
    }
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }
