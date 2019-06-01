<?php
	session_start();
	if($_SESSION['level']==""){
		header("location: ../");
	}
	else if($_SESSION['level']!="pegawai"){
		die ("Access Denied!!!");
	}
include 'navbar.php';
include '../koneksi.php';
?>

	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	
<div class="isi">

<?php
$target_file = basename($_FILES["fileresign"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if($imageFileType != "pdf" ) {
    die( "Sorry, only PDF files are allowed.");
}

if ($_FILES["fileresign"]["size"] > 2048000) {
    die( "Sorry, your file is too large.");
}


// Check if file already exists - and delete file
//	delete failed and file already exists
if (file_exists($target_file)) {
	if(!unlink($target_file)){
	die( "Sorry, there was an error uploading your file.");
	}
}

$nip = $_SESSION['nip'];
$alasanResign = $_POST['alasanresign'];
$newNameFile = $nip ."pengunduran.pdf";
$fileResign = "../uploads/pengunduran/" .$newNameFile;

if (move_uploaded_file($_FILES["fileresign"]["tmp_name"], $fileResign)) {
	$query = "INSERT into dataresign values('$nip','$alasanResign','$fileResign','sedang diproses') ON DUPLICATE KEY UPDATE alasanresign = '$alasanResign', fileresign = '$fileResign', status = 'sedang diproses';";
	$result = mysqli_query($koneksi,$query);
	if(!$result){ echo "error";} 	
	echo "The file ". basename( $_FILES["fileresign"]["name"]). " has been uploaded.";
} 
else {
	die( "Sorry, there was an error uploading your file.");
}

?>

</div>