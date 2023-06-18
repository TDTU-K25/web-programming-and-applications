<?php
session_start();
$old_path = $_POST['oldPath'];
$new_name = $_POST['newName'];
$new_path = pathinfo($old_path, PATHINFO_DIRNAME) . "/" . $new_name;
rename($old_path, $new_path);
$_SESSION['success'] = "Rename successfully";
header("location: exercise2.php");
