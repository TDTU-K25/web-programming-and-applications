<?php
    class LopHocController {
        private $db;
        public function __construct()
        {
            $this->db = new mysqli('mysql-server', 'root', 'root', 'dbstudent');
            if ($this->db->connect_errno) 
                die ("Lỗi kết nối: " . $this->db->connect_error);
        }
        public function __destruct()
        {
            $this->db->close();
        }
        public function get_list($kw = "") {
            $res = $this->db->query("select * from lop");
            $rows = [];
            while($row = mysqli_fetch_assoc($res)) {
                $rows[] = $row;
            }
            return $rows;
        }
        public function get_one($ms) {
            //..
        }
    }
    header('Content-Type: application/json; charset=utf-8');
    $sv = new LopHocController;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //...
        //trả về json dssv
        $data = array('success' => true, "data"=> $sv->get_list());
        echo json_encode($data);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '{"success":false, "message":"Method Chưa hỗ trợ"}';
    }
    //PUT, DELETE
    else {
        echo '{"success":false, "message":"Method không hỗ trợ"}';
    }
?>