<?php
require_once "connect.php";

$selectedClass = 1;
if (isset($_GET['lop'])) {
	$selectedClass = $_GET['lop'];
}
$stm = $db->prepare("select * from lop");
$stm->execute();
$stm->bind_result($malop, $tenlop);

$options = '';
$first_malop = null;
$found = false;
while ($stm->fetch()) {
	if (!$selectedClass)
		$selectedClass = $malop;
	if (!$first_malop)
		$first_malop = $malop;
	$sel = '';
	if ($selectedClass == $malop) {
		$found = true;
		$sel = ' selected';
	}
	$options .= "<option value='$malop'$sel>$tenlop</option>";
}
if (!$found) {
	$selectedClass = $first_malop;
}
$msg = '';

if (isset($_GET['idXoa'])) {
	$id = $_GET['idXoa'];
	$db->query("DELETE FROM sinhvien WHERE mssv = $id");
}

if (isset($_POST['btn'])) {
	$mssv = $_POST['mssv'];
	$hoten = $_POST['hoten'];
	$namsinh = $_POST['namsinh'];
	$malopsv = $_POST['malop'];
	if (empty($mssv) || empty($hoten) || empty($namsinh) || empty($malopsv)) {
		$msg = "Chưa nhập đủ thông tin";
	}

	// kiểm tra malop có trong bảng lop hay không.
	else if ($db->query("SELECT * from lop where ms = $malopsv")->num_rows != 1) {
		$msg = "Lớp không tồn tại";
	}

	// kiểm tra trùng mssv trong CSDL,
	else if ($db->query("SELECT * from sinhvien where mssv = $mssv")->num_rows == 1) {
		$msg = "Trùng MSSV";
	} else {
		$stm = $db->prepare("insert into sinhvien(mssv,hoten,namsinh,malop) values(?,?,?,?)");
		$stm->bind_param('ssii', $mssv, $hoten, $namsinh, $malopsv);
		$stm->execute();
		if ($stm->affected_rows == 1)
			$msg = "Đã lưu";
		else
			$msg = "Lỗi lưu: " . $db->error;
	}
}

?>
<!DOCTYPE html> <!--We can mix HTML, CSS, JS commands inside PHP file -->
<html lang="en">

<head>
	<?php echo '<title>Quản lý SV</title>'; ?>
	<script>
		function change_class(cbo) {
			//lấy mã lớp đang chọn
			let ml = cbo.options[cbo.selectedIndex].value; //$(cbo).val() // 
			window.location.href = 'qlsv.php?lop=' + ml
		}
	</script>
</head>

<body>
	<form method="post">
		MSSV: <input type="text" name="mssv" /> <br />
		Họ tên: <input type="text" name="hoten" /> <br />
		Năm sinh: <input type="text" name="namsinh" /> <br />
		Lớp: <select name="malop">
			<?php echo $options ?>
		</select> <br />
		<div style="color:red"><?php echo $msg ?></div>
		<input type="submit" name="btn" value="Thêm" /> <br />
	</form>
	<div>Danh sách sinh viên</div>
	Chọn lớp: <select name="malop" onchange="change_class(this)">
		<?php echo $options ?>
	</select>
	<table border="1">
		<thead>
			<tr>
				<th>MSSV</th>
				<th>Họ tên</th>
				<th>Lớp</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$res = $db->query("select s.*, l.tenlop from sinhvien s inner join lop l on s.malop = l.ms where l.ms=$selectedClass");
			while ($row = mysqli_fetch_assoc($res)) {
				$ms = $row['mssv'];
				$ht = $row['hoten'];
				$tl = $row['tenlop'];
				echo "<tr>
				<td>$ms</td>
				<td>$ht</td>
				<td>$tl</td>
				<td>
					<a href='form_update.php?id=$ms'>Update</a>
					<a href='?idXoa=$ms'>Delete</a>
				</td>
				</tr>";
			}
			?>
		</tbody>
	</table>
</body>

</html>
<?php
$db->close();
?>