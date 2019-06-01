<?php 

$localhost = "localhost";
$user = "root";
$pswd = "";
$db = "pegawai";

$koneksi = new mysqli($localhost,$user,$pswd,$db);

if($koneksi->connect_error){
	die($koneksi->connect_error);
}
else{
}

?>