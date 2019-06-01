<?php
session_start();
echo "<div margin='25%'> Welcome Admin </div>";
include 'navbar.php';
include '../koneksi.php';

	if($_SESSION['level']==""){
		header("location: ../");
	}
	else if($_SESSION['level']!="admin"){
		die ("Access Denied!!!");
	}
?>