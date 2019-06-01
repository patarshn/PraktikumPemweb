<?php
session_start();
if (@$_SESSION['level'] == 'admin'){
	header('location: admin/welcome.php');
}
else if (@$_SESSION['level'] == 'pegawai'){
	header('location: pegawai/welcome.php');	
}
?>




<html>
<head>
	<title>Form Login</title>
</head>

<body>
	<form method="post">		
		<table>
			<tr>
				<td><input type="text" name="nip" placeholder="nip" ></td>
			</tr>
			<tr>
				<td><input type="text" name="password" placeholder="password" ></td>
			</tr>
			<tr>
				<td><input type="submit" value="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$nip = @$_POST['nip'];
	$password = @$_POST['password'];
	if(!empty($nip) && !empty($password)){
	include 'koneksi.php';
	$result = mysqli_query($koneksi,"SELECT * FROM akun where nip = '$nip' and password = '$password' ");
		if(mysqli_num_rows($result) > 0){	
			$data = mysqli_fetch_assoc($result);
			if($data['level'] == 'admin'){
				$_SESSION['nip'] = $nip;
				$_SESSION['level'] = 'admin';
				header("location: admin/welcome.php");
			}
			else if($data['level'] == 'pegawai'){
				$_SESSION['nip'] = $nip;
				$_SESSION['level'] = 'pegawai';
				header('location: pegawai/showProfil.php');
			}
		}
		else{
			echo "username/password salah, silahkan isi kembali";
		}
	}
	else{
		echo "username/password salah, silahkan isi kembali";
	}
}
?>