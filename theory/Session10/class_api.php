<?php
class ClassController {
	private $db;

	public function __construct() {
		$this->db = new mysqli("localhost", "root", "", "school");
		if ($this->db->connect_errno)
			die("Lỗi kết nối: " . $this->db->connect_error);
	}

	public function __destruct() {
		$this->db->close();
	}

	public function get_classes($keyword = "") {
		$result_set = $this->db->query("SELECT * from class");
		$rows = [];
		while ($row = mysqli_fetch_assoc($result_set)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function get_class($id) {
		$result_set = $this->db->query("SELECT * from class where id = '$id'");
        $row = mysqli_fetch_assoc($result_set);
        return $row;
	}
}

header('Content-Type: application/json; charset=utf-8');
$c = new ClassController;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$data = array('success' => true, "data" => $c->get_classes());
	echo json_encode($data);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	echo '{"success":false, "message":"Method Chưa hỗ trợ"}';
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
	echo '{"success":false, "message":"Method Chưa hỗ trợ"}';
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
	echo '{"success":false, "message":"Method Chưa hỗ trợ"}';
} else {
	echo '{"success":false, "message":"Method không hỗ trợ"}';
}
