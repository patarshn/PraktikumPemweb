<html>
<head>
	<title>Home</title>
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
	<center>
	<h2 style="margin-top: 10%; font-size:50px;">Selamat Datang <?=$_SESSION['nip']?></h2>
	<img style="width: 50vh;" src="welcomeAdmin.png">
	</center>
</div>