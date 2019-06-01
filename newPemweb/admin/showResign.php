<html>
<head>
	<title>Permohonan Resign</title>
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

	<h2>Data Permohonan Resign Pegawai</h2>
	<br/>
	<br/>

	
<?php
include '../koneksi.php';
$result = mysqli_query($koneksi,"select * from dataresign join biodata where biodata.nip = dataresign.nip");
$no = 1;
while($r = mysqli_fetch_array($result)){
?>

	<table cellpadding="10">
		<tr>
			<td colspan="3" ><h4>Permohonan Resign <?php echo $no++;?></h4></td>
		</tr>
		<tr>
			<td width="100px" >NIP</td>
			<td>:</td>
			<td width="200px" ><?php echo $r['nip'];?></td>
		</tr>
		
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?php echo $r['nama'];?></td>
		</tr>
		
		<tr>
			<td>Alasan Resign</td>
			<td>:</td>
			<td><?php echo $r['alasanresign'];?></td>
		</tr>
		
		<tr>
			<td>File Resign</td>
			<td>:</td>
			<td><input type="button" value="Download" onclick="window.location.href='<?php echo  $r["fileresign"];?>'"></td>
		</tr>
		
		<tr>
			<td>Status</td>
			<td>:</td>
		<?php
		if($r['status'] == 'diproses'){
			echo "<td><b>".$r['status'] ."</b></td>";
		}
		else if($r['status'] == 'disetujui'){
			echo "<td style='color:green;'><b>".$r['status'] ."</b></td>";
		}
		else if($r['status'] == 'ditolak'){
			echo "<td style='color:red;'><b>".$r['status'] ."</b></td>";
		}
		?>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td>
			<input class="btn btn-success" type="button" value="Setuju" onclick="window.location.href='showResignAct.php?nip=<?php echo $r["nip"];?>&konfirmasi=disetujui'" />
			<input class="btn btn-danger" type="button" value="Tolak" onclick="window.location.href='showResignAct.php?nip=<?php echo $r["nip"];?>&konfirmasi=ditolak'" />
			</td>
		</tr>

	</table>
<hr style="border-width: 5px; border-color:black">
<?php
}
?>
</div>


