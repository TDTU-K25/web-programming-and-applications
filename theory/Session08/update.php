<?php

require_once "connect.php";

$mssv = $_POST['mssv'];
$hoten = $_POST['hoten'];
$namsinh = $_POST['namsinh'];
$malop = $_POST['malop'];

$sql = "UPDATE sinhvien SET hoten = '$hoten', namsinh = '$namsinh', malop = '$malop' where mssv = '$mssv'";
$db->query($sql);
header("location: qlsv.php");
