<html>
<head>
	<title>Form Pengajuan pengunduran Pegawai</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

</head>
<body>
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
<div class="isi">
	<h2>Form Pengajuan Pengunduran Diri Pegawai</h2>
<?php
$nip = $_SESSION['nip'];
$query = "SELECT * from dataresign where nip='$nip' ";
$result = mysqli_query($koneksi,$query);
$r = mysqli_fetch_array($result);
if($r['status'] == 'diproses'){
echo '<div class="alert alert-secondary" role="alert">Permintaan <b>sedang diproses</b> || <input type="button" value="Download" onclick="window.location.href=' ."'"  .$r["fileresign"] ."'"  .'"> - <a href="pembatalanResign.php">[Batalkan Resign]</a></div>';
}
elseif($r['status'] == 'disetujui'){
echo '<div class="alert alert-success" role="alert">Permintaan <b>disetujui</b> || <input type="button" value="Download" onclick="window.location.href=' ."'"  .$r["fileresign"] ."'"  .'"></div>';
}
elseif($r['status'] == 'ditolak'){
echo '<div class="alert alert-danger" role="alert">Permintaan <b>ditolak</b> || <input type="button" value="Download" onclick="window.location.href=' ."'"  .$r["fileresign"] ."'"  .'"></div>';
}
?>
	<form method="post" enctype="multipart/form-data">
		<table cellpadding="10">
			<tr>
				<td>Alasan Mengundurkan Diri</td>
				<td>:</td>
				<td><textarea class="form-control" name="alasanresign" cols="50" rows="5" placeholder="Alasan saya mengunduran diri adalah"></textarea></td>
			</tr>

			<tr>
				<td>Pilih file untuk di upload <br> (format .pdf)</td>
				<td>:</td>	
				<td><input type="file" name="fileresign">
			</tr>
			
			<tr>
				<td></td>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="Kirim"></td>
			</tr>			
		</table>
	</form>
	
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$target_file = basename($_FILES["fileresign"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$fileSize = basename($_FILES["fileresign"]["size"]);
	
	if(!$fileSize){
		die( "Silahkan Upload file");
	}
	if($imageFileType != "pdf" ) {
		die( "Sorry, only PDF files are allowed.");
	}

	if ($_FILES["fileresign"]["size"] > 2048000) {
		die( "Sorry, your file is too large.");
	}


	// Check if file already exists - and delete file
	//	delete failed and file already exists
	if (file_exists($target_file)) {		
		$delfiles = unlink($fileResign);
		if(!$delfiles){
		die( "Sorry, there was an error uploading your file.");
		}
	}

	$nip = $_SESSION['nip'];
	$alasanResign = $_POST['alasanresign'];
	$newNameFile = $nip ."pengunduran.pdf";
	$fileResign = "../uploads/pengunduran/" .$newNameFile;

	if (move_uploaded_file($_FILES["fileresign"]["tmp_name"], $fileResign)) {
		$query = "INSERT into dataresign values('$nip','$alasanResign','$fileResign','diproses') 
				  ON DUPLICATE KEY UPDATE alasanresign = '$alasanResign', fileresign = '$fileResign', status = 'diproses'";
		$result = mysqli_query($koneksi,$query);
		if(!$result){ echo "error";} 	
		echo "The file ". basename( $_FILES["fileresign"]["name"]). " has been uploaded.";
	} 
	else {
		die( "Sorry, there was an error uploading your file.");
	}
}
?>	
	
</div>
</body>
</html>
