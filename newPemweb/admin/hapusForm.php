<html>
<head>
	<title>Form Hapus Data Pegawai</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>

<body>
<?php
	session_start();
	if($_SESSION['level']==""){
		header("location: ../");
	}
	else if($_SESSION['level']!="admin"){
		die ("Access Denied!!!");
	}

	include 'navbar.php';		
?>

<div class="isi">

	<h1>Form Hapus Data Pegawai</h1>
<?php
include '../koneksi.php';

$nip = $_GET['nip'];

$result = mysqli_query($koneksi,"select * from biodata where nip='$nip';");
$r = mysqli_fetch_array($result);
?>
	<form method="post" action="hapusAct.php?nip=<?php echo $r['nip']; ?>">
		<table cellpadding="10" width="40%">
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td><?php echo $r['nip']; ?></td>
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
				<td><?php echo $r['gaji'];?></td>
			</tr>	
			<tr>
				<td></td>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="Delete"></td>
			</tr>
		</table>
	</form>
</div>
</body>

</html>