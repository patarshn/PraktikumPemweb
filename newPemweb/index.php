<?php
session_start();
if (@$_SESSION['level'] == 'admin'){
	header('location: admin/');
}
else if (@$_SESSION['level'] == 'pegawai'){
	header('location: pegawai/');	
}
?>

<html>
<head>
	<title>Form Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

	<link rel="stylesheet" type="text/css" href="style.css">


<body style="background: #f1f1f1;">
<h1 style="text-align: center; margin-top:50px;">Login Sistem Kepegawaian</h1>
<div class="kotak_login">
<center>
	<form method="post">		
		<table cellpadding="5">
			<tr>
				<td><input class="form-control" type="text" name="nip" placeholder="nip" required></td>
			</tr>
			<tr>
				<td><input class="form-control" type="password" name="password" placeholder="password" required></td>
			</tr>
			<tr>
				<td align="center"><img src="captcha.php" /></td>
			</tr>
			<tr>
				<td><input class="form-control" name="captcha" type="text" placeholder="Tulis ulang gambar di atas" required></td>
			</tr>
			<tr>
				<td align=center><input class="btn btn-success" type="submit" value="submit"></td>
			</tr>
		</table>
	</form>


<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$nip = @$_POST['nip'];
	$password = @$_POST['password'];
	
	if($_SESSION['code'] == $_POST['captcha']){
	include 'koneksi.php';
	$result = mysqli_query($koneksi,"SELECT * FROM akun where nip = '$nip' and password = '$password' ");
		if(mysqli_num_rows($result) > 0){	
			$data = mysqli_fetch_assoc($result);
			if($data['level'] == 'admin'){
				$_SESSION['nip'] = $nip;
				$_SESSION['level'] = 'admin';
				header("location: admin/");
			}
			else if($data['level'] == 'pegawai'){
				$_SESSION['nip'] = $nip;
				$_SESSION['level'] = 'pegawai';
				header('location: pegawai/');
			}
		}
		else{
			session_destroy();
			echo "username/password salah, silahkan isi kembali";
			
		}
	}
	else{
		session_destroy();
		echo "Captcha salah, silahkan coba lagi";
		
	}
}
?>
</center>
</div>
</body>
</html>	
