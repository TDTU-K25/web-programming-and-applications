<?php
class AccessoriesTypeController {

	public function get_all()
	{
		global $conn;
		$stmt = $conn->prepare("SELECT * from danhmucphukien");
		$stmt->execute();
		$stmt->bind_result(
			$MaDM,
			$TenDM
		);

		$accessories_types = array();
		while ($stmt->fetch()) {
			$accessories_types[] = new AccessoriesType(
				$MaDM,
				$TenDM
			);
		}
		return $accessories_types;
	}
}

class AccessoriesType {
	public $MaDM;
	public $TenDM;

	public function __construct(
		$MaDM,
		$TenDM
	) {
		$this->MaDM = $MaDM;
		$this->TenDM = $TenDM;
	}
}