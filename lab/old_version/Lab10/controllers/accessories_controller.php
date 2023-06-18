<?php
class AccessoriesController
{

	public function get_accessories_by_product($product_id)
	{
		global $conn;
		$stmt = $conn->prepare("SELECT phukien.* from dienthoaituongthich inner join phukien on dienthoaituongthich.MaPK = phukien.MaPK where MaDT = ?");
		$stmt->bind_param('i', $product_id);
		$stmt->execute();
		$stmt->bind_result(
			$MaPK,
			$TenPhuKien,
			$MauSac,
			$Gia,
			$ThongTin,
			$MaHangSX,
			$OriginalPicture,
			$TinhTrang,
			$MaLoai
		);

		$accessories = array();
		while ($stmt->fetch()) {
			$accessories[] = new Accessories(
				$MaPK,
				$TenPhuKien,
				$MauSac,
				$Gia,
				$ThongTin,
				$MaHangSX,
				$OriginalPicture,
				$TinhTrang,
				$MaLoai
			);
		}
		return $accessories;
	}

	public function get_all()
	{
		global $conn;
		$stmt = $conn->prepare("SELECT * from phukien");
		$stmt->execute();
		$stmt->bind_result(
			$MaPK,
			$TenPhuKien,
			$MauSac,
			$Gia,
			$ThongTin,
			$MaHangSX,
			$OriginalPicture,
			$TinhTrang,
			$MaLoai
		);

		$list_accessories = array();
		while ($stmt->fetch()) {
			$list_accessories[] = new Accessories(
				$MaPK,
				$TenPhuKien,
				$MauSac,
				$Gia,
				$ThongTin,
				$MaHangSX,
				$OriginalPicture,
				$TinhTrang,
				$MaLoai
			);
		}
		return $list_accessories;
	}
}

class Accessories
{


	public $MaPK;
	public $TenPhuKien;
	public $MauSac;
	public $Gia;
	public $ThongTin;
	public $MaHangSX;
	public $OriginalPicture;
	public $TinhTrang;
	public $MaLoai;


	public function __construct(
		$MaPK,
		$TenPhuKien,
		$MauSac,
		$Gia,
		$ThongTin,
		$MaHangSX,
		$OriginalPicture,
		$TinhTrang,
		$MaLoai
	) {
		$this->MaPK = $MaPK;
		$this->TenPhuKien = $TenPhuKien;
		$this->MauSac = $MauSac;
		$this->Gia = $Gia;
		$this->ThongTin = $ThongTin;
		$this->MaHangSX = $MaHangSX;
		$this->OriginalPicture = $OriginalPicture;
		$this->TinhTrang = $TinhTrang;
		$this->MaLoai = $MaLoai;
	}
}
