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
	<h4>Konfirmasi pembatalan permohonan cuti</h4>
	<form method="post">
		<input type="submit" value="Batalkan">
	</form>

	<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$nip = $_SESSION['nip'];
		$query = "DELETE FROM datacuti where nip = '$nip' AND status='diproses'";
		$result = mysqli_query($koneksi,$query);
		$file = "../uploads/izinCuti/" .$nip .'izinCuti.pdf';
		$delfiles = unlink($file);
		if(!$result OR !$delfiles){
			echo "<script type='text/javascript'>alert('Pembatalan gagal dilakukan');</script>";
		}
		echo "<script type='text/javascript'>alert('Pembatalan berhasil dilakukan'); window.location.href='izinCuti.php';</script>";
	}

	?>
</div>
</body>
</html>