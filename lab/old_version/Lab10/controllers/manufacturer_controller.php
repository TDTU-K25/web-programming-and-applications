<?php
require_once "db.php";

class ManufacturerController
{
	public function get_all()
	{
		global $conn;
		$stmt = $conn->prepare("SELECT * from hangsanxuat");
		$stmt->execute();
		$stmt->bind_result(
			$MaHangSX,
			$TenHangSX
		);

		$manufacturers = array();
		while ($stmt->fetch()) {
			$manufacturers[] = new Manufacturer(
				$MaHangSX,
				$TenHangSX
			);
		}
		return $manufacturers;
	}
}

class Manufacturer
{
	public $MaHangSX;
	public $TenHangSX;

	public function __construct(
		$MaHangSX,
		$TenHangSX
	) {
		$this->MaHangSX = $MaHangSX;
		$this->TenHangSX = $TenHangSX;
	}
}
