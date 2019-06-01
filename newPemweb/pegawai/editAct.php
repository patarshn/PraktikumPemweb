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
$nip = $_SESSION['nip'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$tmptlahir = $_POST['tmptlahir'];
$tanggal = $_POST['tanggal'];
$gender = $_POST['gender'];
$agama = $_POST['agama'];
$goldar = $_POST['goldar'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$target_file = basename($_FILES["newFotoProfil"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fileSize = basename($_FILES["newFotoProfil"]["size"]);



	if(!$fileSize){
		$result = mysqli_query($koneksi,"update biodata set nama='$nama',email='$email',tmptlahir='$tmptlahir',tanggal='$tanggal',gender='$gender',agama='$agama',goldar='$goldar',alamat='$alamat',notelp='$notelp' where nip='$nip'");
		if(!$result){ echo "error";} 	
	}
	else{	
	
	if($imageFileType != "jpg" ) {
		die( "Sorry, only jpg files are allowed.");
	}

	if ($_FILES["newFotoProfil"]["size"] > 2048000) {
		die( "Sorry, your file is too large.");
	}




$newNameFile = $nip ."fotoprofil.jpg";
$newFotoProfil = "../uploads/fotoprofil/" .$newNameFile;

	// Check if file already exists - and delete file
	//	delete failed and file already exists
	if (file_exists($newFotoProfil)) {
		$delfiles = unlink($newFotoProfil);
		if(!$delfiles){
		die( "Sorry, there was an error uploading your file.");
		}
	}

	if (move_uploaded_file($_FILES["newFotoProfil"]["tmp_name"], $newFotoProfil)) {
		
		$result = mysqli_query($koneksi,"update biodata set nama='$nama',email='$email',tmptlahir='$tmptlahir',tanggal='$tanggal',gender='$gender',agama='$agama',goldar='$goldar',alamat='$alamat',notelp='$notelp',foto='$newFotoProfil' where nip='$nip'");
		if(!$result){ echo "error";} 	
	} 
	else {
		die( "Sorry, there was an error uploading your file.");
	}
}

?>
Data berhasil di edit, <a href="showProfil.php">Lihat Data</a>
</div>