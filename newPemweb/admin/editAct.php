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
$nip = $_POST['nip'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$tmptlahir = $_POST['tmptlahir'];
$tanggal = $_POST['tanggal'];
$gender = $_POST['gender'];
$agama = $_POST['agama'];
$goldar = $_POST['goldar'];
$alamat = $_POST['alamat'];
$jabatan = $_POST['jabatan'];
$notelp = $_POST['notelp'];
$gaji = $_POST['gaji'];

$result = mysqli_query($koneksi,"UPDATE akun SET `password`='$password' where nip='$nip'");

$result = mysqli_query($koneksi,"UPDATE biodata SET `nama`='$nama',`email`='$email',`tmptlahir`='$tmptlahir',`tanggal`='$tanggal',
								`gender`='$gender',`agama`='$agama',`goldar`='$goldar',`alamat`='$alamat',`jabatan`='$jabatan',
								`notelp`='$notelp',`gaji`=$gaji where nip='$nip'");

?>

	<table cellpadding="10">
		<tr>
			<td>NIP</td>
			<td>:</td>
			<td><?php echo $nip; ?></td>
		</tr>
		
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><?php echo $password; ?></td>
		</tr>

		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $nama; ?></td>
		</tr>
		
		<tr>
			<td>Email</td>
			<td>:</td>
			<td><?php echo $email; ?></td>
		</tr>
		
		<tr>
			<td>Tempat Lahir</td>
			<td>:</td>
			<td><?php echo $tmptlahir; ?></td>
		</tr>
		
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php echo $tanggal; ?></td>
		</tr>
		
		<tr>
			<td>Gender</td>
			<td>:</td>
			<td><?php echo $gender; ?></td>
		</tr>
		
		<tr>
			<td>Agama</td>
			<td>:</td>
			<td><?php echo $agama; ?></td>
		</tr>
		
		<tr>
			<td>Goldar</td>
			<td>:</td>
			<td><?php echo $goldar; ?></td>
		</tr>
		
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $alamat; ?></td>
		</tr>
		
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td><?php echo $jabatan; ?></td>
		</tr>
		
		<tr>
			<td>Telp</td>
			<td>:</td>
			<td><?php echo $notelp; ?></td>
		</tr>
		
		<tr>
			<td>Gaji</td>
			<td>:</td>
			<td><?php echo $gaji?></td>
		</tr>
	</table>

<p> Edit Data Sukses </p>
<br>
<a href="showData.php">Lihat Data</a>
</div>