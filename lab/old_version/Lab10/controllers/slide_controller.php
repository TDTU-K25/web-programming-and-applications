<?php
require_once "db.php";

class SlideController
{
	public function get_all()
	{
		global $conn;
		$stmt = $conn->prepare("SELECT * from slide");
		$stmt->execute();
		$stmt->bind_result(
			$MaSo,
			$picture,
			$tenQuangCao,
			$maDT
		);
		$slides = array();
		while ($stmt->fetch()) {
			$slides[] = new Slide(
				$MaSo,
				$picture,
				$tenQuangCao,
				$maDT
			);
		}
		return $slides;
	}
}

class Slide
{
	public $MaSo;
	public $picture;
	public $tenQuangCao;
	public $maDT;

	public function __construct(
		$MaSo,
		$picture,
		$tenQuangCao,
		$maDT
	) {
		$this->MaSo = $MaSo;
		$this->picture = $picture;
		$this->tenQuangCao = $tenQuangCao;
		$this->maDT = $maDT;
	}
}
