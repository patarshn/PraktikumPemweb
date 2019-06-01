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
$nip = $_GET['nip'];
$result1 = mysqli_query($koneksi,"delete from biodata where nip='$nip'");
$result2 = mysqli_query($koneksi,"delete from akun where nip='$nip'");
?>

<p> Data telah dihapus </p>
<br>
<a href="showData.php">Lihat Data</a>
</div>