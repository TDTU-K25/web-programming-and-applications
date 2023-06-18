<?php
class ClassController {
    private $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root", "", "school");
        if ($this->db->connect_errno) 
            die("Lỗi: " .$this->db->connect_error);
    }

    public function __destruct() {
        $this->db->close();
    }
    
    public function get_all() {
        $result_set = $this->db->query("SELECT * from class");
        $rows = [];
        while($row = mysqli_fetch_assoc($result_set)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function get($id) {
        $result_set = $this->db->query("SELECT * from class where id = '$id'");
        $row = mysqli_fetch_assoc($result_set);
        return $row;
    }
}

header("Content-Type: application/json; charset=utf-8");
$c = new ClassController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // insert
}
else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // update
}
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $c->get_all();
    echo '{"success": true, "data": ' . json_encode($result) . '}';
}
else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // delete
}
else {
    echo '{"success": false, "message": "Method không hỗ trợ"}';
}
