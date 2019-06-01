<?php
	session_start();
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
			include "loginForm.php";
		}
	}
	else{
		echo "username/password salah, silahkan isi kembali";
		include "loginForm.php";
	}
	
?>