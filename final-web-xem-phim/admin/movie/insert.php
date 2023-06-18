<?php
require_once "../../connect.php";

$name = $_POST['name'];
$trailer = $_FILES['trailer'];
$runtime = $_POST['runtime'];
$poster = $_FILES['poster'];
$description = $_POST['description'];
$release_date = $_POST['release_date'];
$genres = $_POST['genres'];
$video = $_FILES['video'];

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

file_handling($trailer, "../../video/trailer/", array('mp4'), 314572800);
file_handling($poster, "../../images/poster/", array('jpg', 'jpeg', 'png'), 3000000);
file_handling($video, "../../video/movie/", array('mp4'), 5368709120);

$sql = "INSERT into movie(name, trailer, runtime, poster, description, release_date, src) values(?,?,?,?,?,?,?)";
$stm = $conn->prepare($sql);
$stm->bind_param("ssissss", $name, $trailer['name'], $runtime, $poster['name'], $description, $release_date, $video['name']);
if (!$stm->execute()) {
	echo json_encode(array('success' => false, 'message' => $stm->error));
} else {
	echo json_encode(array('success' => true, 'message' => 'Add movie successfully'));
}
$insert_id = $conn->insert_id;

$genres = explode(",", $genres);
$stmt = $conn->prepare("INSERT into movie_genre(genre_id, movie_id) values(?,?)");
foreach($genres as $genre_id) {
	$stmt->bind_param("ii", $genre_id, $insert_id);
	$stmt->execute();
}