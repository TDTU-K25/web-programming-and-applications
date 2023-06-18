<?php
    require_once ('../../connect.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
        $sql = "DELETE FROM comment WHERE comment_id = ?";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
        
            $count = $stmt->affected_rows; 
        
            if ($count == 1) {
                echo json_encode(array('status' => true, 'data' => 'Xóa comment thành công'));
                header('location:index.php');
            }else {
                die(json_encode(array('status' => false, 'data' => 'ID không hợp lệ')));
            }
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
    }    

    if(isset($_GET['idr'])) {
        $idr = $_GET['idr']; 
        $sql_replies = "DELETE FROM replies WHERE reply_comment_id = ?";
        try{
            $stmtreply = $conn->prepare($sql_replies);
            $stmtreply->bind_param("i", $idr); 
            $stmtreply->execute();
    
            $countr = $stmtreply->affected_rows; 
        
            if ($countr == 1) {
                echo json_encode(array('status' => true, 'data' => 'Xóa reply thành công'));
                header('location:index.php');
            }else {
                die(json_encode(array('status' => false, 'data' => 'ID không hợp lệ')));
            }
        }
        catch(PDOException $ex){
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
    }
    
?>
