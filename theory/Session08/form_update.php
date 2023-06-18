<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<?php require_once "connect.php";
$id = $_GET['id'];
$res = $db->query("SELECT * FROM sinhvien WHERE mssv = $id");
$row = $res->fetch_assoc();
?>

<body>
	<form method="post" action="update.php">
		<input type="hidden" name="mssv" value="<?= $row['mssv'] ?>" /> <br />
		Họ tên: <input type="text" name="hoten" value="<?= $row['hoten'] ?>" /> <br />
		Năm sinh: <input type="text" name="namsinh" value="<?= $row['namsinh'] ?>" /> <br />
		Lớp: <select name="malop">
			<?php
			$result = $db->query("SELECT * from lop");
			while ($record = $result->fetch_assoc()) { ?>
				<option value="<?= $record['ms'] ?>" <?php
														if ($record['ms'] == $row['malop']) {
															echo "selected";
														}
														?>><?= $record['tenlop'] ?></option>
			<?php }
			?>
		</select> <br />
		<input type="submit" name="btn" value="Update" /> <br />
		<a href="qlsv.php">back</a>
	</form>
</body>

</html>