<html>
<head>
	<title>Form Login Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

	<link rel="stylesheet" type="text/css" href="style.css">


<body style="background: #f1f1f1;">
<div class="kotak_login">
<center>
	<form method="post">		
		<table cellpadding="10">
			<tr>
				<td><input class="form-control" type="text" name="npm" placeholder="npm" required></td>
			</tr>
			<tr>
				<td><input class="form-control" type="password" name="password" placeholder="password" required></td>
			</tr>
				<td align=center><input class="btn btn-success" type="submit" value="submit"></td>
			</tr>
		</table>
	</form>


<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$npm = @$_POST['npm'];
	$password = @$_POST['password'];
	
	include 'koneksi.php';
	$result = mysqli_query($koneksi,"SELECT * FROM akun where npm = '$npm' and password = '$password' ");
		if(mysqli_num_rows($result) > 0){	
		echo "sukses";
	}
}
?>
</center>
</div>
</body>
</html>	
