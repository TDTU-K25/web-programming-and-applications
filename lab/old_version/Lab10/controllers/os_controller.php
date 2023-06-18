<?php
class OSController {

	public function get_all()
	{
		global $conn;
		$stmt = $conn->prepare("SELECT * from hedieuhanh");
		$stmt->execute();
		$stmt->bind_result(
			$MaHDH,
			$TenHDH
		);

		$list_os = array();
		while ($stmt->fetch()) {
			$list_os[] = new OS(
				$MaHDH,
				$TenHDH
			);
		}
		return $list_os;
	}
}

class OS {
	public $MaHDH;
	public $TenHDH;

	public function __construct(
		$MaHDH,
		$TenHDH
	) {
		$this->MaHDH = $MaHDH;
		$this->TenHDH = $TenHDH;
	}
}