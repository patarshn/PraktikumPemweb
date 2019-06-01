<html>
<head>
	<title>Form Pengajuan Cuti Pegawai</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
<?php
	session_start();
	if($_SESSION['level']==""){
		header("location: ../index.php");
	}
	else if($_SESSION['level']!="pegawai"){
		die ("Access Denied!!!");
	}
include 'navbar.php';
include '../koneksi.php';
?>
<div class="isi">
	<h2>Form Pengajuan Cuti Pegawai</h2>
<?php
$nip = $_SESSION['nip'];
$query = "SELECT * from datacuti where nip='$nip'";
$result = mysqli_query($koneksi,$query);
$r = mysqli_fetch_array($result);
if($r['status'] == 'diproses'){
echo '<div class="alert alert-secondary" role="alert">Permintaan <b>sedang diproses</b> || <input type="button" value="Download" onclick="window.location.href=' ."'"  .$r["filecuti"] ."'"  .'"> - <a href="pembatalanCuti.php">[Batalkan Cuti]</a></div>';
}
elseif($r['status'] == 'disetujui'){
echo '<div class="alert alert-success" role="alert">Permintaan <b>disetujui</b> || <input type="button" value="Download" onclick="window.location.href=' ."'"  .$r["filecuti"] ."'"  .'"></div>';
}
elseif($r['status'] == 'ditolak'){
echo '<div class="alert alert-danger" role="alert">Permintaan <b>ditolak</b> || <input type="button" value="Download" onclick="window.location.href=' ."'"  .$r["filecuti"] ."'"  .'"></div>';
}

?>
	<form method="post" enctype="multipart/form-data">
		<table cellpadding="10">
			<tr>
				<td>Dari Tanggal</td>
				<td>:</td>
				<td><input class="form-control" type="date" name="date1" required></td>
			</tr>
			
			<tr>
				<td>Sampai Tanggal</td>
				<td>:</td>
				<td><input class="form-control" type="date" name="date2" required></td>
			</tr>

			<tr>
				<td>Alasan Mengambil Cuti</td>
				<td>:</td>
				<td><textarea class="form-control" name="alasancuti" cols="50" rows="5" placeholder="Alasan saya mengambil cuti adalah" required></textarea></td>
			</tr>

			<tr>
				<td>Pilih file untuk di upload <br> (format .pdf)</td>
				<td>:</td>	
				<td><input type="file" name="filecuti">
			</tr>
			
			<tr>
				<td></td>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="Kirim"></td>
			</tr>
			<tr>
		</table>
	</form>
	
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$date1 = new DateTime($_POST['date1']);
	$date2 = new DateTime($_POST['date2']);
	
	if($date1 > $date2){
		die( "Tanggal cuti yang anda masukkan salah");
	}
	$lamaCuti = $date1->diff($date2)->format("%a")+1;
	
	$target_file = basename($_FILES["filecuti"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$fileSize = basename($_FILES["filecuti"]["size"]);
	
	if(!$fileSize){
		die( "Silahkan Upload file");
	}
	
	if($imageFileType != "pdf" ) {
		die( "Sorry, only PDF files are allowed.");
	}

	if ($_FILES["filecuti"]["size"] > 2048000) {
		die( "Sorry, your file is too large.");
	}


	// Check if file already exists - and delete file
	//	delete failed and file already exists

	$nip = $_SESSION['nip'];
	$alasanCuti = $_POST['alasancuti'];
	$newNameFile = $nip ."izincuti.pdf";
	$fileCuti = "../uploads/izincuti/" .$newNameFile;
	$date1 = $_POST['date1'];
	$date2 = $_POST['date2'];

	if (file_exists($fileCuti)) {
		$delfiles = unlink($fileCuti);
		if(!$delfiles){
		die( "Sorry, there was an error uploading your file.");
		}
	}


	if (move_uploaded_file($_FILES["filecuti"]["tmp_name"], $fileCuti)) {
		$query = "INSERT into datacuti values('$nip','$date1','$date2','$lamaCuti','$alasanCuti','$fileCuti','diproses') 
				ON DUPLICATE KEY UPDATE lamacuti = '$lamaCuti', date1 = '$date1', date2 = '$date2', alasancuti = '$alasanCuti', filecuti = '$fileCuti', status = 'diproses';";
		$result = mysqli_query($koneksi,$query);
		if(!$result){ echo "error";} 	
		echo "The file ". basename( $_FILES["filecuti"]["name"]). " has been uploaded.";
	} 
	else {
		die( "Sorry, there was an error uploading your file.");
	}
}

?>	
	
	
</div>
</body>
</html>
