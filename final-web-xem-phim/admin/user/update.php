<?php
require_once "../../connect.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$status = $_POST['status'];
$role = $_POST['role'];
$old_avatar = $_POST['oldAvatar'];

function file_handling($file, $target_dir, $acceptedType, $maxFileSize)
{
	$fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
	$target_file = $target_dir . basename($file["name"]);

	if ($file["size"] > $maxFileSize) {
		echo json_encode(array('success' => false, 'message' => 'Sorry, your file is too large.'));
		exit;
	}

	if (!in_array($fileType, $acceptedType)) {
		echo json_encode(array('success' => false, 'message' => 'Sorry, file type is not allowed.'));
		exit;
	}

	move_uploaded_file($file['tmp_name'], $target_file);
}

$avatarName = null;
if (isset($_FILES['avatar']) && !$_FILES['avatar']['error']) {
	$avatar = $_FILES['avatar'];
	file_handling($avatar, "../../images/avatar/", array('jpg', 'jpeg', 'png'), 20000000);
	$avatarName = $avatar['name'];
} else {
	$avatarName = $old_avatar;
}


$sql = "UPDATE user set name = ?, avatar = ?, email = ?, status = ?, role = ? where id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("sssiii", $name, $avatarName, $email, $status, $role, $id);
if (!$stm->execute()) {
	echo json_encode(array('success' => false, 'message' => $stm->error));
} else {
	echo json_encode(array('success' => true, 'message' => 'Update user successfully'));
}
