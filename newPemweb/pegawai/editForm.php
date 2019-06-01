<html>
<head>
	<title>Edit Form</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script> 
		function showhide() {
		  var x = document.getElementById("password");
		  if (x.type === "password") {
			x.type = "text";
		  } else {
			x.type = "password";
		  }
		} 
	</script>
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

	<h2>Edit Form</h2>

<?php	
$nip = $_SESSION['nip'];
$result = mysqli_query($koneksi,"SELECT * from biodata join akun where akun.nip = biodata.nip AND akun.nip='$nip';");
$r = mysqli_fetch_array($result);
?>

	<form method="post" action="editAct.php" enctype="multipart/form-data">
		<table cellpadding="10" width="40%">
			<tr>
				<td>Foto Profil<br>(format .jpg)</td>
				<td>:</td>	
				<td><input type="file" name="newFotoProfil" accept="image/jpeg">
			</tr>

			<tr>
				<td>NIP</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="nip" value="<?php echo $nip ?>" readonly></td>
			</tr>
			
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input class="form-control" type="password" name="password" id="password" value="<?php echo $r['password'] ?>" required></td>
				<td><input type="checkbox" onclick="showhide()"></td>
			</tr>

			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="nama" value="<?php echo $r['nama']?>" required></td>
			</tr>
			
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input class="form-control" type="email" name="email" value="<?php echo $r['email']?>" required></td>
			</tr>
			
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="tmptlahir" value="<?php echo $r['tmptlahir']?>" required></td>
			</tr>
			
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input class="form-control" type="date" name="tanggal" value="<?php echo $r['tanggal']?>" required></td>
			</tr>
			
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><input  type="radio" name="gender" value="laki" <?php if($r['gender'] == "laki") echo "checked"; ?>>Laki-laki
					<input  type="radio" name="gender" value="perempuan" <?php if($r['gender'] == "perempuan") echo "checked"; ?>>Perempuan</td>
			</tr>
			
			
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td><select class="form-control" name="agama">
					<option <?php if($r['agama'] == "Kristen Protestan") echo "selected"; ?>>Kristen Protestan</option>
					<option <?php if($r['agama'] == "Kristen Katolik") echo "selected"; ?>>Kristen Katolik</option>
					<option <?php if($r['agama'] == "Islam") echo "selected"; ?>>Islam</option>
					<option <?php if($r['agama'] == "Buddha") echo "selected"; ?>>Buddha</option>
					<option <?php if($r['agama'] == "Hindu") echo "selected"; ?>>Hindu</option>
					<option <?php if($r['agama'] == "Lainnya") echo "selected"; ?>>Lainnya</option>
					</select>
			</tr>
			
			<tr>
				<td>Goldar</td>
				<td>:</td>
				<td><input type="radio" name="goldar" value="A" <?php if($r['goldar'] == "A") echo "checked"; ?>>A</span>
					<input type="radio" name="goldar" value="B" <?php if($r['goldar'] == "B") echo "checked"; ?>>B
					<input type="radio" name="goldar" value="AB" <?php if($r['goldar'] == "AB") echo "checked"; ?>>AB
					<input type="radio" name="goldar" value="O" <?php if($r['goldar'] == "O") echo "checked"; ?>>O</td>
			</tr>
			
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="alamat" value="<?php echo $r['alamat']?>" required></td>
			</tr>
			
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo $r['jabatan']?></td>
			</tr>
			
			<tr>
				<td>Telp</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="notelp" value="<?php echo $r['notelp']?>" required></td>
			</tr>
			
			<tr>
				<td>Gaji</td>
				<td>:</td>
				<td><?php echo $r['gaji']?></td>
			</tr>
			
			<tr>
				<td></td>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="Edit Profil"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>