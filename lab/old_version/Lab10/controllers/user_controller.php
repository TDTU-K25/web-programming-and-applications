<?php
require_once "db.php";
class UserController
{
	public function login($username, $password)
	{
		global $conn;
		$stmt = $conn->prepare("SELECT * from taikhoan where username = ? and password = ? limit 1");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->bind_result(
			$username,
			$password,
			$email,
			$fullname,
			$phoneNumber,
			$ghiChu,
			$MaLoai
		);
		$stmt->fetch();
		return new User(
			$username,
			$password,
			$email,
			$fullname,
			$phoneNumber,
			$ghiChu,
			$MaLoai
		);
	}
}

class User
{
	public $username;
	public $password;
	public $email;
	public $fullname;
	public $phoneNumber;
	public $ghiChu;
	public $MaLoai;

	public function __construct(
		$username,
		$password,
		$email,
		$fullname,
		$phoneNumber,
		$ghiChu,
		$MaLoai
	) {
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
		$this->fullname = $fullname;
		$this->phoneNumber = $phoneNumber;
		$this->ghiChu = $ghiChu;
		$this->MaLoai = $MaLoai;
	}
}
