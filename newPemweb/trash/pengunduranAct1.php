<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($imageFileType != "pdf" ) {
    die( "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
}

if(!unlink($target_file)){
	die("gagal delete");
}

// Check if file already exists
if (file_exists($target_file)) {
    die( "Sorry, file already exists.");
}