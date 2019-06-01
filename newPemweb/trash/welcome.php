<?php
session_start();
echo "<div margin='25%'> Welcome Pegawai </div>";
include 'navbar.php';
include '../koneksi.php';

	if($_SESSION['level']==""){
		header("location: ../");
	}
	else if($_SESSION['level']!="pegawai"){
		die ("Access Denied!!!");
	}
?>