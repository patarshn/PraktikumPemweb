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

$result = mysqli_query($koneksi,"update biodata set nama='$nama',email='$email',tmptlahir='$tmptlahir',tanggal='$tanggal',
								gender='$gender',agama='$agama',goldar='$goldar',alamat='$alamat',
								notelp='$notelp' where nip='$nip'");
$result = mysqli_query($koneksi,"select * from biodata where nip='$nip';");
$r = mysqli_fetch_array($result);
?>
<!--
	<table border="0" cellpadding="10">
		<tr>
			<td>NIP</td>
			<td>:</td>
			<td><?php echo $nip; ?></td>
		</tr>
		
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $r['nama']; ?></td>
		</tr>
		
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo $r['email']; ?></td>
		</tr>
		
		<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td><?php echo $r['tmptlahir']; ?></td>
		</tr>
		
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php echo $r['tanggal']; ?></td>
		</tr>
		
		<tr>
			<td>Gender</td>
			<td>:</td>
			<td><?php echo $r['gender']; ?></td>
		</tr>
		
		<tr>
			<td>Agama</td>
			<td>:</td>
			<td><?php echo $r['agama']; ?></td>
		</tr>
		
		<tr>
			<td>Goldar</td>
			<td>:</td>
			<td><?php echo $r['goldar']; ?></td>
		</tr>
		
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $r['alamat']; ?></td>
		</tr>
		
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td><?php echo $r['jabatan']; ?></td>
		</tr>
		
		<tr>
			<td>Telp</td>
			<td>:</td>
			<td><?php echo $r['notelp']; ?></td>
		</tr>
		
		<tr>
			<td>Gaji</td>
			<td>:</td>
			<td><?php echo $r['gaji']?></td>
		</tr>
	</table>

<p> Edit Data Sukses </p>
<br>
-->
<a href="showProfil.php">Lihat Data</a>
</div>