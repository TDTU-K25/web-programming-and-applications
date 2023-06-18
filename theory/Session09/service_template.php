<?php
class SinhVienController {
    private $db;
    public function __construct()
    {
        $this->db = new mysqli("mysql-server", "root", "root", "dbstudent");
        if ($this->db->connect_errno) 
            die ("Lỗi: ".$this->db->connect_error);
    }
    public function __destruct()
    {
        $this->db->close();
    }
    public function get_list() {
        $res = $this->db->query("select s.*, l.tenlop from sinhvien s inner join lop l on s.malop=l.ms");
        $rows = [];
        while($row = mysqli_fetch_assoc($res)) {
            $rows[] = $row;
        }
        return $rows;
    }
    public function get_one($mssv)
    {
        //lấy sv có msss=$mssv
    }
}
header("Content-Type: application/json; charset=utf-8");
$sv = new SinhVienController();
//thêm, xoá, sửa, lấy ds, lấy 1sv
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //thêm
}
else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    //sửa
}
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //lấy 1sv, lấy dssv
    // if (isset($_GET['id']))
        //$kq = gọi hàm get_one
    //else
    $kq = $sv->get_list();
    echo '{"success": true, "data": ' . json_encode($kq) . '}';
}
else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    //xoá
}
else {
    echo '{"success": false, "message": "Method không hỗ trợ"}';
}
?>