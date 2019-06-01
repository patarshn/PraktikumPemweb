<html>
<head>
	<title>My Profil</title>
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

	<h2>My Profil</h2>
	
<?php
$nip = $_SESSION['nip'];
	$result = mysqli_query($koneksi,"select * from biodata where nip = '$nip'");
	$r = mysqli_fetch_array($result);
?>
	<table  cellpadding="10" width="">
		<tr>
			<td rowspan="12" valign="top"><img width="150" height="200" src=<?php echo $r['foto']?>></td>
			<td>NIP</td>
			<td>: <?php echo $r['nip']; ?></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td>: <?php echo $r['nama']; ?></td>
		</tr>
		
		<tr>
			<td>Email</td>
			<td>: <?php echo $r['email']; ?></td>
		</tr>
		
		<tr>
			<td>Tempat Lahir</td>
			<td>: <?php echo $r['tmptlahir']; ?></td>
		</tr>
		
		<tr>
			<td>Tanggal Lahir</td>
			<td>: <?php echo $r['tanggal']; ?></td>
		</tr>
		
		<tr>
			<td>Jenis Kelamin</td>
			<td>: <?php echo $r['gender']; ?></td>
		</tr>
			
		<tr>
			<td>Agama</td>
			<td>: <?php echo $r['agama']; ?></td>
		</tr>
		
		<tr>
			<td>Golongan Darah</td>
			<td>: <?php echo $r['goldar']; ?></td>
		</tr>
		
		<tr>
			<td>Alamat</td>
			<td>: <?php echo $r['alamat']; ?></td>
		</tr>
		
		<tr>
			<td>Jabatan</td>
			<td>: <?php echo $r['jabatan']; ?></td>
		</tr>
		
		<tr>
			<td>No.Telp</td>
			<td>: <?php echo $r['notelp']; ?></td>
		</tr>
		
		<tr>
			<td>Gaji</td>
			<td>: <?php echo $r['gaji']; ?></td>
		</tr>

	</table>
</div>
</body>

</html>