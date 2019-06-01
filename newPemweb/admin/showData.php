<html>
<head>
	<title>Biodata Pegawai</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style>
	table {
	  border-collapse: collapse;
	  width: 100%;
	}

	th, td {
	  text-align: center;
	  padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
	  background-color: #4CAF50;
	  color: white;
	}
	
	th a{
	  text-decoration:none;
	  color:white;
	}
	
	th a:active{
	  text-decoration:none;
	  color:blue;
	}
	</style>
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


	<h2>Biodata Pegawai</h2>
	<br/>
	<br/>

	
	<?php
	include '../koneksi.php';
	
	$columns = array('nip','nama','email','tmptlahir','tanggal','gender','agama','goldar','alamat','jabatan','notelp','gaji');
	$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
	$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
	$result = mysqli_query($koneksi,"select * from biodata ORDER BY `$column` $sort_order");
	$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
		?>
		
	<table>
		<tr>
			<th>NO</th>
			<th><a href="?column=nip&&order=<?php echo $asc_or_desc ?>">NIP</a></th>
			<th><a href="?column=nama&&order=<?php echo $asc_or_desc ?>">Nama</a></th>
			<th><a href="?column=email&&order=<?php echo $asc_or_desc ?>">Email</a></th>			
			<th><a href="?column=tmptlahir&&order=<?php echo $asc_or_desc ?>">Tempat Lahir </a></th>
			<th><a href="?column=tanggal&&order=<?php echo $asc_or_desc ?>">Tanggal Lahir</a></th>
			<th><a href="?column=gender&&order=<?php echo $asc_or_desc ?>">Gender</a></th>
			<th><a href="?column=agama&&order=<?php echo $asc_or_desc ?>">Agama</a></th>
			<th><a href="?column=goldar&&order=<?php echo $asc_or_desc ?>">GolDar</a></th>
			<th><a href="?column=alamat&&order=<?php echo $asc_or_desc ?>">Alamat</a></th>
			<th><a href="?column=jabatan&&order=<?php echo $asc_or_desc ?>">Jabatan</a></th>
			<th><a href="?column=notelp&&order=<?php echo $asc_or_desc ?>">Telp</a></th>
			<th><a href="?column=gaji&&order=<?php echo $asc_or_desc ?>">Gaji</a></th>
			<th>Opsi</th>
		</tr>
	<?php 
		if(mysqli_fetch_row(mysqli_query($koneksi,"select * from biodata")) == NULL){
			echo '<tr><td colspan="14">Data kosong, silahkan <a href="inputForm.php"><img width="12" src="tambah.png">TAMBAH DATA</a></td></tr>';
		}
		if(mysqli_fetch_row(mysqli_query($koneksi,"select * from biodata")) > 0){
		$no = 1;
			while($r = mysqli_fetch_array($result)){
		
		?>
		<tr>
			<td><b><?php echo $no++; ?></b></td>
			<td><?php echo $r['nip']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['email']; ?></td>
			<td><?php echo $r['tmptlahir']; ?></td>
			<td><?php echo $r['tanggal']; ?></td>
			<td><?php echo $r['gender']; ?></td>
			<td><?php echo $r['agama']; ?></td>
			<td><?php echo $r['goldar']; ?></td>
			<td><?php echo $r['alamat']; ?></td>
			<td><?php echo $r['jabatan']; ?></td>
			<td><?php echo $r['notelp']; ?></td>
			<td><?php echo $r['gaji']; ?></td>
			<td><a href="inputForm.php"><img width="12" src="tambah.png"></a>
				<a href="editForm.php?nip=<?php echo $r['nip']; ?>"><img width="12" src="edit.png"></a>
				<a href="hapusForm.php?nip=<?php echo $r['nip']; ?>"><img width="12" src="hapus.png"></a></td>
		</tr>
	<?php 
			}
		}

//		else{
//		echo "<tr><td colspan='13'>Data Kosong, Silahkan Tambah Data</td>
//			  <td><a href='inputForm.php'>Tambah</a></td></tr>";
//		}
		?>
	</table>
</div>
</body>
</html>