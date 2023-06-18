<?php
require_once "db.php";

class ProductController
{
	public function get_pages($page_size=6) {
		global $conn;
		$count_products = $conn->query("SELECT * from dienthoai")->num_rows;
		return ceil($count_products / $page_size);
	}

	public function get_all($page=1, $page_size=6)
	{
		global $conn;
		$offset = ($page - 1) * $page_size;
		$stmt = $conn->prepare("SELECT * from dienthoai limit $offset, $page_size");
		$stmt->execute();
		$stmt->bind_result(
			$MaDT,
			$TenDT,
			$GiaSP,
			$TinhTrang,
			$MaHangSX,
			$MaHDH,
			$SoNguoiXem,
			$dai,
			$rong,
			$cao,
			$canNang,
			$mau,
			$OriginalPicture
		);

		$products = array();
		while ($stmt->fetch()) {
			$products[] = new Product(
				$MaDT,
				$TenDT,
				$GiaSP,
				$TinhTrang,
				$MaHangSX,
				$MaHDH,
				$SoNguoiXem,
				$dai,
				$rong,
				$cao,
				$canNang,
				$mau,
				$OriginalPicture
			);
		}
		return $products;
	}

	public function search($keyword, $manufacturer_id, $os_id, $min_price, $max_price, $page, $page_size=6) {
		$sql = "SELECT * from dienthoai";

        $query_params = array();
        $params = array(); 
		if (!empty($keyword)) {
            $query_params[] = "TenDT like CONCAT('%', ?, '%')";
			$params[] = $keyword;
        }

        if (!empty($manufacturer_id)) {
            $query_params[] = "MaHangSX = $manufacturer_id";
        }

        if (!empty($os_id)) {
            $query_params[] = "MaHDH = $os_id";
        }

        if (!empty($min_price)) {
            $query_params[] = "GiaSP >= $min_price";
        }

        if (!empty($max_price)) {
            $query_params[] = "GiaSP <= $max_price";
        }

        if(count($query_params) != 0) {	
            $query_str = join(' and ', $query_params);
            $sql .= " where " . $query_str;  
        }

		$offset = ($page - 1) * $page_size;

		global $conn;
		$stmt = $conn->prepare($sql);
		if (count($params) != 0) {
			$stmt->bind_param("s", $keyword);
		}
		$stmt->execute();
		$result_set = $stmt->get_result();
		$count_products = $result_set->num_rows;
		$stmt->close();

		$sql .= " limit $offset, $page_size";

		$stmt = $conn->prepare($sql);
		if (count($params) != 0) {
			$stmt->bind_param("s", $keyword);
		}
		$stmt->execute();
		$stmt->bind_result(
			$MaDT,
			$TenDT,
			$GiaSP,
			$TinhTrang,
			$MaHangSX,
			$MaHDH,
			$SoNguoiXem,
			$dai,
			$rong,
			$cao,
			$canNang,
			$mau,
			$OriginalPicture
		);

		$products = array();
		while ($stmt->fetch()) {
			$products[] = new Product(
				$MaDT,
				$TenDT,
				$GiaSP,
				$TinhTrang,
				$MaHangSX,
				$MaHDH,
				$SoNguoiXem,
				$dai,
				$rong,
				$cao,
				$canNang,
				$mau,
				$OriginalPicture
			);
		}
		return array("products" => $products, "num_pages" => ceil($count_products / $page_size));
	}

	public function get_products_by_manufacturer($manufacturer_id, $limit = 6)
	{
		global $conn;
		$stmt = $conn->prepare("SELECT * from dienthoai where MaHangSX = ? LIMIT $limit");
		$stmt->bind_param('i', $manufacturer_id);
		$stmt->execute();
		$stmt->bind_result(
			$MaDT,
			$TenDT,
			$GiaSP,
			$TinhTrang,
			$MaHangSX,
			$MaHDH,
			$SoNguoiXem,
			$dai,
			$rong,
			$cao,
			$canNang,
			$mau,
			$OriginalPicture
		);

		$products = array();
		while ($stmt->fetch()) {
			$products[] = new Product(
				$MaDT,
				$TenDT,
				$GiaSP,
				$TinhTrang,
				$MaHangSX,
				$MaHDH,
				$SoNguoiXem,
				$dai,
				$rong,
				$cao,
				$canNang,
				$mau,
				$OriginalPicture
			);
		}
		return $products;
	}

	public function get_hot_products()
	{
		global $conn;
		$stmt = $conn->prepare("SELECT * from dienthoai where MaDT in (SELECT maDT from dienthoainoibat)");
		$stmt->execute();
		$stmt->bind_result(
			$MaDT,
			$TenDT,
			$GiaSP,
			$TinhTrang,
			$MaHangSX,
			$MaHDH,
			$SoNguoiXem,
			$dai,
			$rong,
			$cao,
			$canNang,
			$mau,
			$OriginalPicture
		);

		$hot_products = array();
		while ($stmt->fetch()) {
			$hot_products[] = new Product(
				$MaDT,
				$TenDT,
				$GiaSP,
				$TinhTrang,
				$MaHangSX,
				$MaHDH,
				$SoNguoiXem,
				$dai,
				$rong,
				$cao,
				$canNang,
				$mau,
				$OriginalPicture
			);
		}
		return $hot_products;
	}
}

class Product
{

	public $MaDT;
	public $TenDT;
	public $GiaSP;
	public $TinhTrang;
	public $MaHangSX;
	public $MaHDH;
	public $SoNguoiXem;
	public $dai;
	public $rong;
	public $cao;
	public $canNang;
	public $mau;
	public $OriginalPicture;

	public function __construct(
		$MaDT,
		$TenDT,
		$GiaSP,
		$TinhTrang,
		$MaHangSX,
		$MaHDH,
		$SoNguoiXem,
		$dai,
		$rong,
		$cao,
		$canNang,
		$mau,
		$OriginalPicture
	) {
		$this->MaDT = $MaDT;
		$this->TenDT = $TenDT;
		$this->GiaSP = $GiaSP;
		$this->TinhTrang = $TinhTrang;
		$this->MaHangSX = $MaHangSX;
		$this->MaHDH = $MaHDH;
		$this->SoNguoiXem = $SoNguoiXem;
		$this->dai = $dai;
		$this->rong = $rong;
		$this->cao = $cao;
		$this->canNang = $canNang;
		$this->mau = $mau;
		$this->OriginalPicture = $OriginalPicture;
	}
}
