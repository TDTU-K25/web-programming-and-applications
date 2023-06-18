<?php
class StudentController {
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
        $result_set = $this->db->query("SELECT s.*, c.name as class_name from student s inner join class c on s.class_id = c.id order by s.id");
        $rows = [];
        while($row = mysqli_fetch_assoc($result_set)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function get($id) {
        $result_set = $this->db->query("SELECT s.*, c.name as class_name from student s inner join class c on s.class_id = c.id where s.id = '$id'");
        $row = mysqli_fetch_assoc($result_set);
        return $row;
    }

    public function insert($name, $yob, $class_id) {
        $sql = "INSERT into student(name, yob, class_id) values(?, ?, ?)";
        $stm = $this->db->prepare($sql);
        $stm->bind_param('ssi', $name, $yob, $class_id);
        if (!$stm->execute()) {
            return 0;
        }
        return $stm->insert_id;
    }

    public function delete($id) {
        $sql = "DELETE from student where id = ?";
        $stm = $this->db->prepare($sql);
        $stm->bind_param('i', $id);
        if (!$stm->execute()) {
            return false;
        }
        return true;
    }

    public function update($id, $name, $yob, $class_id) {
        $sql = "UPDATE student set name = ?, yob = ?, class_id = ? where id = ?";
        $stm = $this->db->prepare($sql);
        $stm->bind_param('ssii', $name, $yob, $class_id, $id);
        if (!$stm->execute()) {
            return false;
        }
        return true;
    }

    public function search($keyword) {
        $result_set = $this->db->query("SELECT s.*, c.name as class_name from student s inner join class c on s.class_id = c.id where s.name like '%$keyword%' order by s.id");
        $rows = [];
        while($row = mysqli_fetch_assoc($result_set)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

header("Content-Type: application/json; charset=utf-8");

$st = new StudentController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // insert
    $input = json_decode(file_get_contents("php://input"));
    $name = $input->name;
    $yob = $input->yob;
    $class_id = $input->class_id;

    $insert_id = $st->insert($name, $yob, $class_id);
    if ($insert_id) {
        echo json_encode(array('success' => 'true', "insert_id" => $insert_id));
    } else {
        echo json_encode(array('success' => 'false', "message" => "Thêm thất bại"));
    }
}
else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // update
    $input = json_decode(file_get_contents("php://input"));
    $id = $input->id;
    $name = $input->name;
    $yob = $input->yob;
    $class_id = $input->class_id;

    if ($st->update($id, $name, $yob, $class_id)) {
        echo json_encode(array('success' => 'true', "message" => "Cập nhật thành công"));
    } else {
        echo json_encode(array('success' => 'false', "message" => "Cập nhật thất bại"));
    }
}
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['keyword'])) {
        $result = $st->search($_GET['keyword']);
    } else if (isset($_GET['id']))
        $result = $st->get($_GET['id']);
    else {
        $result = $st->get_all();
    }
    echo '{"success": true, "data": ' . json_encode($result) . '}';
}
else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // delete
    if ($st->delete($_GET['id'])) {
        echo json_encode(array('success' => 'true', "message" => "Xóa thành công"));
    } else {
        echo json_encode(array('success' => 'false', "message" => "Xóa thất bại"));
    }
}
else {
    echo '{"success": false, "message": "Method không hỗ trợ"}';
}
?>