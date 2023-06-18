<?php
require_once ('../../connect.php');

    $movie_id = $_POST['movie_id'];
    $sql_cmt = "SELECT comment.comment_id,comment.user_id, name, avatar, content, comment.created_at 
    FROM comment INNER JOIN user ON comment.user_id = user.id 
    WHERE comment.movie_id = '$movie_id' ORDER BY comment.comment_id DESC";

    $data = array();
    $cmt = [];
    $result_set = $conn->query($sql_cmt);
    foreach($result_set as $row) {
        $id_root_cmt = $row['comment_id'];
        $sql_reply = "SELECT replies.reply_comment_id ,replies.user_id,name,avatar,content, replies.created_at FROM replies INNER JOIN user ON replies.user_id = user.id 
        WHERE replies.root_comment_id = '$id_root_cmt'";
        $result_set_reply = $conn->query($sql_reply);
        $replies = array();
        foreach($result_set_reply as $row_reply) {
            $replies[] = $row_reply;
        }
        $cmt['id'] = $row['comment_id'];
        $cmt['avatar'] = $row['avatar'];
        $cmt['user_id'] = $row['user_id'];
        $cmt['name'] = $row['name'];
        $cmt['content'] = $row['content'];
        $cmt['created_at'] = $row['created_at'];
        $cmt['replies'] = $replies;

        $data[] = $cmt;
    }
    echo json_encode($data);
