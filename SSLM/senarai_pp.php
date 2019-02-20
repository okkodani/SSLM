<?php
include "connection.php";

session_start();
if (!$_SESSION['log_nama']) {
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>DESKBOARD PENTADBIR SSLM</title>
</head>
<body>
<center>
	<h3>CARIAN PELAJAR</h3><br>
	<form action="" method="post">
<label>Nama Pelajar atau No KP: </label>
<input type="text" name="search_val">
<input type="submit" name="submit" value="Carian">
</form>
	<a href="page_admin.php">Ke Menu Utama</a><br>
	<a href="logout.php">Log keluar</a>
<?php
if (isset($_POST["search_val"])) {
	
$search_val=$_POST["search_val"];

?>
	<h3>SENARAI PELAJAR</h3><br>
	<fieldset>
		<table width="960" border="1" align="center">
			<tr>
				<td width="40"><b>Bil.</b></td>
				<td width="243"><b>Nama Pelajar</b></td>
				<td width="100"><b>No KP</b></td>
				<td width="102"><b>Jantina</b></td>
				<td width="154"><b>Kelas/Kohot</b></td>
				<td width="138"><b>Keturunan</b></td>
				<td width="138"><b>Agama</b></td>
				<td width="243"><b>Alamat</b></td>
				<td width="243"><b>Guru Kelas</b></td>
				<td width="100"><b>Tel Penjaga</b></td>
				<td width="50"><b>Asrama</b></td>
			</tr>

		<?php
			$data1=mysqli_query($connection,"SELECT * FROM maklumat_pelajar WHERE no_kp LIKE '%$search_val%' OR nama_pelajar LIKE '%$search_val%' ");
			$no=1;
			while ($info1=mysqli_fetch_array($data1)) {

			
		?>

	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $info1['nama_pelajar']; ?></td>
		<td><?php echo $info1['no_kp']; ?></td>
		<td><?php echo $info1['jantina']; ?></td>
		<td><?php echo $info1['kelas_kohot']; ?></td>
		<td><?php echo $info1['keturunan']; ?></td>
		<td><?php echo $info1['agama']; ?></td>
		<td><?php echo $info1['alamat']; ?></td>
		<td><?php echo $info1['guru_kls']; ?></td>
		<td><?php echo $info1['tel_penjaga']; ?></td>
		<td><?php echo $info1['asrama']; ?></td>
		<td><a href="kemaskini_pp.php?id_pelajar=<?php echo $info1['id_pelajar']; ?>">Kemaskini</a></td>
	</tr>
		<?php
		$no++;
	}
		?>
		</table>
	</fieldset>
<?php
}
?>
</center>
</body>
</html>