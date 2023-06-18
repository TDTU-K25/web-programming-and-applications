<?php
require_once "../../connect.php";

$id = $_POST['id'];
$name = $_POST['name'];
$old_trailer_src = $_POST['oldTrailer'];
$runtime = $_POST['runtime'];
$old_poster_src = $_POST['oldPoster'];
$description = $_POST['description'];
$release_date = $_POST['release_date'];
$genres = $_POST['genres'];
$old_video_src = $_POST['oldVideo'];

$trailer_src = $old_trailer_src;
$poster_src = $old_poster_src;
$video_src = $old_video_src;

if(!isset($_FILES['poster'])) {
	$poster_src = $old_poster_src;
} else {
	$poster = $_FILES['poster'];
	$poster_src = $poster['name'];
	file_handling($poster, "../../images/poster/", array('jpg', 'jpeg', 'png', "webp"), 3000000);
}

if(!isset($_FILES['trailer'])) {
	$trailer_src = $old_trailer_src;
} else {
	$trailer = $_FILES['trailer'];
	$trailer_src = $trailer['name'];
	file_handling($trailer, "../../video/trailer/", array('mp4'), 314572800);
}

if(!isset($_FILES['video'])) {
	$video_src = $old_video_src;
} else {
	$video = $_FILES['video'];
	$video_src = $video['name'];
	file_handling($video, "../../video/movie/", array('mp4'), 5368709120);
}

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


$sql = "UPDATE movie set name = ?, trailer = ?, runtime = ?, poster = ?, description = ?, release_date = ?, src = ? where id = ?";
$stm = $conn->prepare($sql);
$stm->bind_param("ssissssi", $name, $trailer_src, $runtime, $poster_src, $description, $release_date, $video_src, $id);
if (!$stm->execute()) {
	echo json_encode(array('success' => false, 'message' => $stm->error));
} else {
	echo json_encode(array('success' => true, 'message' => 'Update movie successfully'));
}


$stmt_delete_old_movie_genre = $conn->prepare("DELETE FROM movie_genre WHERE movie_id = ?");
$stmt_delete_old_movie_genre->bind_param("i", $id);
$stmt_delete_old_movie_genre->execute();

$genres = explode(",", $genres);
$stmt = $conn->prepare("INSERT into movie_genre(genre_id, movie_id) values(?,?)");
foreach($genres as $genre_id) {
	$stmt->bind_param("ii", $genre_id, $id);
	$stmt->execute();
}