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
$result = mysqli_query($koneksi,"insert into akun values('$nip','$password','pegawai')");
if(!$result){
	echo $nip;
	die(" telah terdaftar");
}
$result = mysqli_query($koneksi,"insert into biodata values('$nip','$nama','$email','$tmptlahir','$tanggal','$gender','$agama','$goldar','$alamat','$jabatan','$notelp', $gaji,'../uploads/fotoprofil/noimage.png')");
if(!$result){

	echo $nip;
	die(" Sudah Ada di dalam database");
}
else{
	$result = mysqli_query($koneksi,"select nip,nama from biodata where nip='$nip'");
	$r = mysqli_fetch_array($result);
?>

	<table cellpadding="10">
		<tr>
			<th>NIP</th>
			<th>Nama</th>
			<th>Email</th>			
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Gender</th>
			<th>Agama</th>
			<th>GolDar</th>
			<th>Alamat</th>
			<th>Jabatan</th>
			<th>Telp</th>
			<th>Gaji</th>
		</tr>
		<tr>
			<td><?php echo $nip ?></td>
			<td><?php echo $nama ?></td>
			<td><?php echo $email ?></td>
			<td><?php echo $tmptlahir ?></td>
			<td><?php echo $tanggal ?></td>
			<td><?php echo $gender ?></td>
			<td><?php echo $agama ?></td>
			<td><?php echo $goldar ?></td>
			<td><?php echo $alamat ?></td>
			<td><?php echo $jabatan ?></td>
			<td><?php echo $notelp ?></td>
			<td><?php echo $gaji ?></td>	
		</tr>
	</table>

<p> Input Data Sukses </p>
<br>
<a href="showData.php">Lihat Data</a>
<?php
}
?>
</div>
