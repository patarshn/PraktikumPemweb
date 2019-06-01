<?php
	session_start();
	if($_SESSION['level']==""){
		header("location: ../");
	}
	else if($_SESSION['level']!="admin"){
		die ("Access Denied!!!");
	}

include 'navbar.php';
include '../koneksi.php';
?>

	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	
<div class="isi">

<?php
$konfirmasi = @$_GET['konfirmasi'];
$nip = @$_GET['nip'];
echo $nip;
if($konfirmasi == 'disetujui' OR $konfirmasi == 'ditolak'){
	$result = mysqli_query($koneksi,"UPDATE dataresign SET `status`='$konfirmasi' where nip='$nip'");
}
?>

<p> Data Cuti <?= $nip ?> telah <?= $konfirmasi ?> </p>
<br>
<a href="showResign.php">Lihat Data</a>
</div>