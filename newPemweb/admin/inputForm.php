<html>
<head>
	<title>Form Input Data Pegawai</title>
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

	include 'navbar.php'
?>

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
<div class="isi">
	<h2>Form Input Data Pegawai</h2>
	<form method="post" action="inputAct.php">
		<table cellpadding="10" width="40%">
			<tr>
				<td>NIP</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="nip" required></td>
			</tr>
			
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input class="form-control" type="password" name="password" id="password" required></td>
				<td><input type="checkbox" onclick="showhide()"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input class="form-control"  type="text" name="nama" required></td>
			</tr>
			
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><input class="form-control" type="email" name="email" required></td>
			</tr>
			
			<tr>
				<td>Tempat Lahir</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="tmptlahir" required></td>
			</tr>
			
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input class="form-control" type="date" name="tanggal" required></td>
			</tr>
			
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><input  type="radio" name="gender" value="laki" required >Laki-laki
					<input  type="radio" name="gender" value="perempuan">Perempuan</td>
			</tr>
			
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td><select class="form-control" name="agama" required>				
					<option value="">Pilih Agama</option>
					<option>Kristen Protestan</option>
					<option>Kristen Katolik</option>
					<option>Islam</option>
					<option>Buddha</option>
					<option>Hindu</option>
					<option>Lainnya</option>
					</select>
			</tr>
			
			<tr>
				<td>Goldar</td>
				<td>:</td>
				<td><input  type="radio" name="goldar" value="A" required>A
					<input  type="radio" name="goldar" value="B">B
					<input  type="radio" name="goldar" value="AB">AB
					<input  type="radio" name="goldar" value="O">O</td>
			</tr>
			
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="alamat" required></td>
			</tr>
			
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="jabatan" required></td>
			</tr>
			
			<tr>
				<td>Telp</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="notelp" required></td>
			</tr>
			
			<tr>
				<td>Gaji</td>
				<td>:</td>
				<td><input class="form-control" type="number" name="gaji" required></td>
			</tr>
			
			<tr>
				<td></td>
				<td></td>
				<td><input class="btn btn-success" type="submit" value="tambah"></td>
			</tr>
		</table>
	</form>
</div>
</body>

</html>